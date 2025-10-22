#!/usr/bin/env python3
"""Fix avatar links in exported phpBB HTML.

Maps dynamic avatar URLs like:
  ./download/file.php?avatar=50_1668514384.jpg
to files present in ./images/avatars/upload/ when possible.

Also normalizes direct references to images/avatars/upload to relative paths.
"""

import re
from pathlib import Path
from concurrent.futures import ThreadPoolExecutor
from typing import List, Optional, Set, Tuple


def build_upload_index(upload_dir: Path) -> List[str]:
    if not upload_dir.exists():
        return []
    return [p.name for p in upload_dir.iterdir() if p.is_file()]


def find_best_match(filename: str, upload_files: List[str]) -> Optional[str]:
    if not filename:
        return None
    fname = filename.split('&')[0].split('?')[0]
    # exact
    for f in upload_files:
        if f == fname:
            return f
    # case-insensitive exact
    lower = fname.lower()
    for f in upload_files:
        if f.lower() == lower:
            return f
    # If filename begins with an id like 50_..., try to match upload files that end with _50.<ext>
    m = re.match(r'^(?P<id>\d+)_', fname)
    if m:
        id_part = m.group('id')
        for f in upload_files:
            lf = f.lower()
            # common extensions
            for ext in ('.jpg', '.jpeg', '.png', '.gif'):
                if lf.endswith(f'_{id_part}' + ext):
                    return f
    # endswith
    for f in upload_files:
        if f.lower().endswith(lower):
            return f
    # contains
    for f in upload_files:
        if lower in f.lower():
            return f
    return None


def fix_avatar_links(content: str, upload_files: List[str]) -> Tuple[str, Set[str]]:
    unresolved: Set[str] = set()

    # Normalize absolute -> relative for upload folder
    content = re.sub(r'src=("|\')https?://[^"\']*/images/avatars/upload/', r'src=\1./images/avatars/upload/', content)
    content = re.sub(r'src=("|\')[^"\']*images/avatars/upload/', r'src=\1./images/avatars/upload/', content)

    # Match download/file.php?params inside a src attribute
    pattern = re.compile(r'src=(?P<q>["\'])(?:\./)?download/file\.php\?(?P<params>[^"\']*)\1')

    def repl(m: re.Match) -> str:
        q = m.group('q')
        params = m.group('params')
        avatar_match = re.search(r'avatar=([^&]+)', params)
        id_match = re.search(r'id=(\d+)', params)
        if avatar_match:
            lookup = avatar_match.group(1)
        elif id_match:
            # cannot map id -> filename without DB; report unresolved
            unresolved.add('id=' + id_match.group(1))
            return m.group(0)
        else:
            unresolved.add(params)
            return m.group(0)

        matched = find_best_match(lookup, upload_files)
        if matched:
            return f'src={q}./images/avatars/upload/{matched}{q}'
        unresolved.add(lookup)
        return m.group(0)

    new_content = pattern.sub(repl, content)
    return new_content, unresolved


def process_html(path: Path, upload_files: List[str]) -> Tuple[bool, Set[str]]:
    try:
        text = path.read_text(encoding='utf-8')
    except Exception:
        return False, set()
    new_text, unresolved = fix_avatar_links(text, upload_files)
    if new_text != text:
        path.write_text(new_text, encoding='utf-8')
        return True, unresolved
    return False, unresolved


def main() -> None:
    root = Path('.')
    upload_dir = root / 'images' / 'avatars' / 'upload'
    upload_files = build_upload_index(upload_dir)
    print(f'Found {len(upload_files)} files in {upload_dir}')

    html_files = list(root.rglob('*.html'))
    print(f'Processing {len(html_files)} HTML files...')

    unresolved_total: Set[str] = set()
    fixed = 0

    with ThreadPoolExecutor(max_workers=8) as ex:
        futures = [ex.submit(process_html, p, upload_files) for p in html_files]
        for f in futures:
            changed, unresolved = f.result()
            if changed:
                fixed += 1
            unresolved_total.update(unresolved)

    print(f'✅ {fixed} files updated')
    if unresolved_total:
        print('⚠️ Unresolved avatar references (examples):')
        for i, u in enumerate(sorted(unresolved_total)):
            print(' -', u)
            if i >= 50:
                break


if __name__ == '__main__':
    main()

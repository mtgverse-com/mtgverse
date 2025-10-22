#!/usr/bin/env python3
"""Analyze broken internal links frequency by rescanning the site.

This is a lighter-weight analyzer that rechecks internal links and counts which
targets (raw href or resolved path) are most often missing so we can prioritize fixes.
"""
from pathlib import Path
from urllib.parse import urlparse, unquote
import re
from collections import Counter
import json

ROOT = Path('.')

def extract_links(text: str):
    return [u for _, u in re.findall(r'(?:href|src)\s*=\s*(["\'])(.*?)\1', text, flags=re.I)]

def is_ignorable(url: str) -> bool:
    if not url or url.strip() == '':
        return True
    l = url.lower()
    return l.startswith('http://') or l.startswith('https://') or l.startswith('mailto:') or l.startswith('javascript:') or l.startswith('tel:')

def resolve(base: Path, href: str):
    parsed = urlparse(href)
    if parsed.scheme in ('http', 'https'):
        return None, parsed.fragment
    path = unquote(parsed.path or '')
    frag = parsed.fragment or None
    if path.startswith('/'):
        tgt = (ROOT / path.lstrip('/')).resolve()
    else:
        tgt = (base.parent / path).resolve()
    return tgt, frag

def check_exists_and_fragment(tgt: Path, frag: str):
    # check existence (try .html alt) and fragment presence
    if tgt.is_dir():
        idx = tgt / 'index.html'
        if idx.exists():
            if not frag:
                return True, str(idx)
            txt = idx.read_text(encoding='utf-8', errors='ignore')
            return (f'id="{frag}"' in txt or f"name=\'{frag}\'" in txt or f"name=\"{frag}\"" in txt), str(idx)
        return False, str(tgt)
    if tgt.exists():
        if not frag:
            return True, str(tgt)
        txt = tgt.read_text(encoding='utf-8', errors='ignore')
        return (f'id="{frag}"' in txt or f"name=\'{frag}\'" in txt or f"name=\"{frag}\"" in txt), str(tgt)
    # try .html
    alt = Path(str(tgt) + '.html')
    if alt.exists():
        if not frag:
            return True, str(alt)
        txt = alt.read_text(encoding='utf-8', errors='ignore')
        return (f'id="{frag}"' in txt or f"name=\'{frag}\'" in txt or f"name=\"{frag}\"" in txt), str(alt)
    return False, str(tgt)

def main():
    html_files = list(ROOT.rglob('*.html'))
    print(f'Rescanning {len(html_files)} HTML files...')
    missing_target_counter = Counter()
    raw_href_counter = Counter()
    missing_fragment_counter = Counter()

    for f in html_files:
        try:
            text = f.read_text(encoding='utf-8', errors='ignore')
        except Exception:
            continue
        links = extract_links(text)
        for href in links:
            if is_ignorable(href):
                continue
            tgt, frag = resolve(f, href)
            if tgt is None:
                continue
            ok, resolved = check_exists_and_fragment(tgt, frag)
            if not ok:
                # count by resolved path if available, else by raw href
                missing_target_counter[resolved] += 1
                raw_href_counter[href] += 1
                if frag:
                    missing_fragment_counter[f'{resolved}#{frag}'] += 1

    top_targets = missing_target_counter.most_common(100)
    top_hrefs = raw_href_counter.most_common(100)
    top_frags = missing_fragment_counter.most_common(100)

    out = {
        'top_missing_targets': top_targets,
        'top_missing_raw_hrefs': top_hrefs,
        'top_missing_fragments': top_frags,
    }
    Path('broken_targets_top.json').write_text(json.dumps(out, indent=2), encoding='utf-8')
    print('Wrote broken_targets_top.json')
    print('Top 20 missing targets:')
    for t, c in top_targets[:20]:
        print(f'{c:8d}  {t}')

if __name__ == '__main__':
    main()

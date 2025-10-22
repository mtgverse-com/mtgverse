#!/usr/bin/env python3
"""Check internal links in the static site.

Produces a JSON report listing all links and which are broken (internal file missing or fragment missing).

Usage: run from site root; it will crawl all .html files under the current dir.
"""
import re
import json
from pathlib import Path
from urllib.parse import unquote, urlparse

ROOT = Path('.')

def extract_links(text: str):
    # crude extraction: href and src attributes
    attrs = re.findall(r'(?:href|src)\s*=\s*(["\'])(.*?)\1', text, flags=re.I)
    return [u for _, u in attrs]

def is_ignorable(url: str) -> bool:
    url = url.strip()
    if not url:
        return True
    lower = url.lower()
    if lower.startswith('mailto:') or lower.startswith('tel:') or lower.startswith('javascript:'):
        return True
    return False

def resolve_target(base_file: Path, href: str):
    """Return (target_path (Path or None for external), fragment or None)."""
    href = href.strip()
    parsed = urlparse(href)
    if parsed.scheme in ('http', 'https'):
        return None, parsed.fragment
    if parsed.scheme != '':
        # other schemes (mailto etc)
        return None, parsed.fragment

    path = unquote(parsed.path or '')
    frag = parsed.fragment or None

    if path.startswith('/'):
        target = (ROOT / path.lstrip('/')).resolve()
    else:
        target = (base_file.parent / path).resolve()

    return target, frag

def check_fragment(target_path: Path, fragment: str) -> bool:
    if not fragment:
        return True
    try:
        text = target_path.read_text(encoding='utf-8')
    except Exception:
        return False
    # look for id="fragment" or name="fragment" or anchor
    if f'id="{fragment}"' in text or f"id='{fragment}'" in text:
        return True
    if f'name="{fragment}"' in text or f"name='{fragment}'" in text:
        return True
    return False

def main():
    html_files = list(ROOT.rglob('*.html'))
    report = []
    total_links = 0
    broken_links = []

    for html in html_files:
        try:
            text = html.read_text(encoding='utf-8')
        except Exception:
            continue
        links = extract_links(text)
        for link in links:
            total_links += 1
            if is_ignorable(link):
                continue
            target, frag = resolve_target(html, link)
            entry = {
                'source': str(html),
                'link': link,
                'target_path': None if target is None else str(target),
                'fragment': frag,
                'status': 'ok'
            }

            if target is None:
                # external or mailto/etc — we mark as external
                entry['status'] = 'external'
            else:
                # check existence
                # if target is a directory, look for index.html
                if target.is_dir():
                    index = target / 'index.html'
                    if index.exists():
                        ok = check_fragment(index, frag)
                        entry['target_path'] = str(index)
                        entry['status'] = 'ok' if ok else 'missing-fragment'
                    else:
                        entry['status'] = 'missing'
                else:
                    # if the link had no extension and file doesn't exist, try appending .html
                    if not target.exists():
                        alt = Path(str(target) + '.html')
                        if alt.exists():
                            ok = check_fragment(alt, frag)
                            entry['target_path'] = str(alt)
                            entry['status'] = 'ok' if ok else 'missing-fragment'
                        else:
                            # maybe target is a directory returning index
                            folder = target
                            if folder.exists() and folder.is_dir():
                                idx = folder / 'index.html'
                                if idx.exists():
                                    ok = check_fragment(idx, frag)
                                    entry['target_path'] = str(idx)
                                    entry['status'] = 'ok' if ok else 'missing-fragment'
                                else:
                                    entry['status'] = 'missing'
                            else:
                                entry['status'] = 'missing'
                    else:
                        ok = check_fragment(target, frag)
                        entry['status'] = 'ok' if ok else 'missing-fragment'

            report.append(entry)
            if entry['status'] != 'ok' and entry['status'] != 'external':
                broken_links.append(entry)

    summary = {
        'total_html_files': len(html_files),
        'total_links_checked': total_links,
        'broken_links_count': len(broken_links)
    }

    Path('link_report.json').write_text(json.dumps({'summary': summary, 'broken': broken_links}, indent=2), encoding='utf-8')
    Path('link_report_summary.txt').write_text(json.dumps(summary, indent=2), encoding='utf-8')

    print(f"Checked {total_links} links in {len(html_files)} HTML files.")
    print(f"Broken internal links: {len(broken_links)}. See link_report.json for details.")

if __name__ == '__main__':
    main()

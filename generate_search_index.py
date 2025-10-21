#!/usr/bin/env python3
"""Generate a lightweight search index (JSON) from the exported forum HTML files.

Outputs: search_index.json in site root containing list of {title,url,excerpt}
"""
import os
import json
import re
from html import unescape

ROOT = os.path.dirname(__file__)

def extract_text(html):
    # crude text extractor
    text = re.sub(r'<script[^>]*>.*?</script>', '', html, flags=re.S|re.I)
    text = re.sub(r'<style[^>]*>.*?</style>', '', text, flags=re.S|re.I)
    text = re.sub(r'<[^>]+>', ' ', text)
    text = unescape(text)
    text = re.sub(r'\s+', ' ', text).strip()
    return text

def find_title(html):
    m = re.search(r'<title>(.*?)</title>', html, flags=re.I|re.S)
    if m:
        return unescape(m.group(1)).strip()
    # fallback: first h1/h2
    m = re.search(r'<h1[^>]*>(.*?)</h1>', html, flags=re.I|re.S)
    if m:
        return unescape(re.sub(r'<[^>]+>', '', m.group(1))).strip()
    return ''

def build_index():
    items = []
    for dirpath, dirs, files in os.walk(ROOT):
        for fname in files:
            if not fname.lower().endswith('.html'):
                continue
            fpath = os.path.join(dirpath, fname)
            rel = os.path.relpath(fpath, ROOT)
            # skip style/theme templates and extensions which contain many non-user-facing files
            if rel.startswith('styles/') or rel.startswith('ext/') or '/styles/' in rel or '/ext/' in rel:
                continue
            # skip search.html itself
            if rel in ('search.html',):
                continue
            try:
                with open(fpath, 'r', encoding='utf-8', errors='ignore') as f:
                    html = f.read()
            except Exception:
                continue
            title = find_title(html)
            text = extract_text(html)
            excerpt = text[:300]
            if title or excerpt:
                items.append({
                    'title': title,
                    'url': './' + rel.replace('\\\\', '/'),
                    'excerpt': excerpt,
                })
    out = os.path.join(ROOT, 'search_index.json')
    with open(out, 'w', encoding='utf-8') as f:
        json.dump(items, f, ensure_ascii=False)
    print(f'Wrote {len(items)} index items to {out}')

if __name__ == '__main__':
    build_index()

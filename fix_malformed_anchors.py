#!/usr/bin/env python3
"""
Fix malformed pagination anchors created by earlier replacements.
It looks for patterns like:
  <li><a class="button" href="href=" class="button" "viewtopic_t1496.html>1496</a></li>
and replaces them with:
  <li><a class="button" href="viewtopic_t1496.html">1496</a></li>

The script makes a .bak copy for each modified file.
"""
import re
import sys
from pathlib import Path

PATTERN = re.compile(r'<a[^>]*href="href="[^>]*"([^">]+)>([^<]+)</a>', re.IGNORECASE)

# Scan the whole repository for HTML files so we fix broken anchors wherever they appear
root = Path('.')
files = list(root.rglob('*.html'))
count = 0
for p in files:
    text = p.read_text(encoding='utf-8')
    if 'href="href="' not in text:
        continue
    new_text, n = PATTERN.subn(r'<a class="button" href="\1">\2</a>', text)
    if n:
        bak = p.with_suffix(p.suffix + '.bak')
        p.rename(bak)
        bak.write_text(text, encoding='utf-8')
        p.write_text(new_text, encoding='utf-8')
        count += n
        print(f'Fixed {n} occurrences in {p}')

print(f'Done. Total replacements: {count} on {len(files)} files scanned')

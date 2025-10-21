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

PATTERN_HREF_HREF = re.compile(r'<a[^>]*href="href="[^>]*"([^">]+)>([^<]+)</a>', re.IGNORECASE)
PATTERN_DUP_ANCHOR = re.compile(r'<a\s+class="button"\s+<a\s+class="button"\s+href="([^"]+)">([^<]+)</a>', re.IGNORECASE)

def fix_text(text: str) -> (str, int):
  """Return (new_text, replacements_count) after applying known fixes."""
  total = 0
  new_text, n1 = PATTERN_HREF_HREF.subn(r'<a class="button" href="\1">\2</a>', text)
  total += n1
  new_text2, n2 = PATTERN_DUP_ANCHOR.subn(r'<a class="button" href="\1">\2</a>', new_text)
  total += n2
  return new_text2, total


def main(dry_run: bool = False):
  # Scan the whole repository for HTML files so we fix broken anchors wherever they appear
  root = Path('.')
  files = list(root.rglob('*.html'))
  count = 0
  files_changed = 0
  for p in files:
    text = p.read_text(encoding='utf-8')
    if 'href="href="' not in text and '<a class="button" <a class="button"' not in text:
      continue
    new_text, n = fix_text(text)
    if n:
      files_changed += 1
      count += n
      print(f'Would fix {n} occurrences in {p}' if dry_run else f'Fixed {n} occurrences in {p}')
      if not dry_run:
        bak = p.with_suffix(p.suffix + '.bak')
        # only create bak if it doesn't already exist
        if not bak.exists():
          bak.write_text(text, encoding='utf-8')
        p.write_text(new_text, encoding='utf-8')

  print(f'Done. Total replacements: {count} on {len(files)} files scanned; {files_changed} files changed')


if __name__ == '__main__':
  dry = '--dry' in sys.argv or '--dry-run' in sys.argv
  main(dry_run=dry)

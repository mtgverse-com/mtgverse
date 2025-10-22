#!/usr/bin/env bash
set -euo pipefail
# Simple helper: copy site files into docs/ for GitHub Pages
ROOT="$(cd "$(dirname "$0")" && pwd)"
DEST="$ROOT/docs"
echo "Copying site to $DEST"
rm -rf "$DEST"
mkdir -p "$DEST"
# Copy everything except .git and the docs folder itself
rsync -a --exclude='.git' --exclude='docs' --exclude='.github' --exclude='*.pyc' --exclude='__pycache__' "$ROOT/" "$DEST/"
# ensure .nojekyll exists
touch "$DEST/.nojekyll"
echo "Done. Commit the docs/ folder to publish via GitHub Pages."

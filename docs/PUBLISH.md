# Publishing the static site to GitHub Pages

This repository contains a static export of a phpBB forum. To publish it to GitHub Pages you have two simple options:

1) Use the `docs/` folder on the `main` branch (recommended for small sites).
2) Use the `gh-pages` branch and push build artifacts there.

This project includes a helper script that copies the site into `docs/` and a GitHub Actions workflow that can deploy the `docs/` folder automatically.

Quick local steps (option 1 - `docs/`):

```bash
# from repo root
./deploy_to_docs.sh
git add docs/
git commit -m "Publish site to docs/"
git push origin main
```

Then enable GitHub Pages in the repository settings (Source: `main` branch / `docs/` folder).

If you prefer the `gh-pages` branch approach, the included workflow (`.github/workflows/gh-pages.yml`) can be enabled and will push the `docs/` contents to the `gh-pages` branch automatically when commits are pushed to `main`.

Notes:

- A `.nojekyll` file is added to prevent GitHub Pages from ignoring files starting with an underscore.
- If you have a custom domain, add `CNAME` in the `docs/` folder or configure it in repo settings.

# fix_links_final.py
import re
from pathlib import Path
from concurrent.futures import ThreadPoolExecutor


def fix_banner_css(content: str) -> str:
    """Replace the brittle inline header CSS so only one banner shows and images keep aspect ratio.

    This looks for the <style> block that contains ".header-banner {" and replaces the whole
    <style>...</style> with a safer, responsive snippet.
    """
    idx = content.find('.header-banner')
    if idx == -1:
        return content

    # find the <style ...> that contains this
    style_start = content.rfind('<style', 0, idx)
    style_end = content.find('</style>', idx)
    if style_start == -1 or style_end == -1:
        return content
    style_end += len('</style>')

    new_css = (
        '<style type="text/css">\n'
        '/* Responsive header banner: show only the full banner on desktop and the mobile one on small screens. */\n'
        '.banner-header { text-align: center; margin: 0 auto; }\n'
        '.banner-header .header-banner img, .banner-header .mobile-header-banner img { display:block; max-width:100%; height:auto; margin:0 auto; }\n'
        '/* hide mobile banner on desktop */\n'
        '.banner-header .mobile-header-banner { display: none; }\n'
        '/* show mobile banner only on small screens and hide full banner there */\n'
        '@media only screen and (max-width: 700px) {\n'
        '  .banner-header .mobile-header-banner { display: block !important; }\n'
        '  .banner-header .header-banner { display: none !important; }\n'
        '}\n'
        '/* Hide the style name and other small theme credit labels which were left in the static export */\n'
    '/* Hide the style name and other small theme credit labels which were left in the static export */\n'
    '.copyright .footer-row, .site_logo::before, .style-name, .prosilver-label { display: none !important; }\n'
    '/* Additional header selectors to hide ProSilver label/logo left by theme in header */\n'
    '.site_logo, .site_logo::before, .site_logo::after, .site_logo .prosilver, .style-name, .theme-author, .prosilver-label, .headerbar .site_logo { display: none !important; visibility: hidden !important; }\n'
    '/* Hide posting / reply / new topic / registration / login controls on static site */\n'
    '.button[title="R\u00e9pondre"], a.button[title="R\u00e9pondre"], .post_buttons, .post-buttons, .post-buttons li, .action-bar, form[action*="posting.php"], a[href*="ucp.php?mode=register"], a[href*="ucp.php?mode=login"], a[title="Connexion"], a[title="Inscription"], .quick-login, .headerspace { display: none !important; visibility: hidden !important; }\n'
    '/* Hide reply/quote links inside posts */\n'
    'a[href*="posting.php?mode=reply"], a[href*="posting.php?mode=quote"], a[href*="posting.php?mode=post"] { display: none !important; }\n'
        '/* Hide the duplicated header block used by phpBB (#hidden) produced in the static export */\n'
        '#hidden { display: none !important; }\n'
        '</style>\n'
    )

    return content[:style_start] + new_css + content[style_end:]


def fix_pagination_block(block: str, per_page: int = 25) -> str:
    """Fix numeric pagination anchors inside a pagination block for viewforum and viewtopic links.

    - Transforms <a ... href="viewforum_fX.html">P</a> -> viewforum_fX_startY.html for P>1
    - Same for viewtopic_tT.html anchors
    - Fixes rel="next" links using the active page when present
    """
    # Try to detect the currently active page within the pagination block
    active = re.search(r'class=["\']?active["\']?[^>]*>\s*(?:<span[^>]*>)?\s*(\d+)\s*(?:</span>)?', block, flags=re.I | re.S)
    current = int(active.group(1)) if active else None

    # We'll parse anchor tags inside the block and update hrefs when appropriate.
    def anchor_repl(match):
        attrs = match.group(1)  # attributes string inside <a ...>
        inner = match.group(2)  # inner HTML/text between <a>...</a>

        # find href if present
        href_m = re.search(r'href="([^"]+)"', attrs)
        if not href_m:
            return match.group(0)
        href = href_m.group(1)

        # helper to replace href value inside attrs
        def replace_href_in_attrs(new_href):
            return attrs.replace(f'href="{href}"', f'href="{new_href}"')
        # numeric page in inner text? accept only when the inner text (after removing tags)
        # is exactly a number (prevents picking up other nearby counters like post counts)
        inner_text = re.sub(r'<[^>]+>', '', inner).strip()
        page_num = int(inner_text) if re.fullmatch(r'\d+', inner_text) else None

        # handle viewforum anchors
        vf = re.search(r'viewforum_f(\d+)\.html', href)
        if vf and page_num and page_num > 1:
            fid = vf.group(1)
            start = (page_num - 1) * per_page
            if '_start' not in href:
                new_href = href.replace(f'viewforum_f{fid}.html', f'viewforum_f{fid}_start{start}.html')
                return f'<a{replace_href_in_attrs(new_href)}>{inner}</a>'

        # handle viewtopic numeric anchors
        vt = re.search(r'viewtopic_t(\d+)\.html', href)
        if vt and page_num and page_num > 1:
            tid = vt.group(1)
            start = (page_num - 1) * per_page
            if '_start' not in href:
                new_href = href.replace(f'viewtopic_t{tid}.html', f'viewtopic_t{tid}_start{start}.html')
                return f'<a{replace_href_in_attrs(new_href)}>{inner}</a>'

        # handle rel="next" / rel="prev" regardless of attribute order
        rel_m = re.search(r'rel="(next|prev)"', attrs, flags=re.I)
        if rel_m and current is not None:
            rel = rel_m.group(1).lower()
            target_page = current + 1 if rel == 'next' else max(1, current - 1)
            start = (target_page - 1) * per_page
            # if href points to a base viewforum/viewtopic filename, switch to _start form
            if vf and '_start' not in href:
                fid = vf.group(1)
                new_href = f'viewforum_f{fid}_start{start}.html'
                return f'<a{replace_href_in_attrs(new_href)}>{inner}</a>'
            if vt and '_start' not in href:
                tid = vt.group(1)
                new_href = f'viewtopic_t{tid}_start{start}.html'
                return f'<a{replace_href_in_attrs(new_href)}>{inner}</a>'

        return match.group(0)

    # replace all anchors inside the pagination block
    block = re.sub(r'<a([^>]*)>(.*?)</a>', anchor_repl, block, flags=re.I | re.S)

    return block


def fix_forum_links(content: str) -> str:
    """Corrige les liens pour les nouveaux noms de fichiers simples et effectue d'autres nettoyages."""

    # convert generated php-like links to static filenames if present
    content = re.sub(
        r'href="[^"]*viewforum\.php\?f=(\d+)(?:&start=(\d+))?[^"]*"',
        lambda m: f'href="viewforum_f{m.group(1)}{f"_start{m.group(2)}" if m.group(2) else ""}.html"',
        content
    )

    content = re.sub(
        r'href="[^"]*viewtopic\.php\?t=(\d+)(?:&start=(\d+))?[^"]*"',
        lambda m: f'href="viewtopic_t{m.group(1)}{f"_start{m.group(2)}" if m.group(2) else ""}.html"',
        content
    )

    content = re.sub(
        r'href="[^"]*viewtopic\.php\?p=(\d+)[^"]*"',
        r'href="viewtopic_p\1.html"',
        content
    )

    content = re.sub(r'href="[^"]*index\.php[^"]*"', 'href="index.html"', content)

    content = content.replace('href="topics/', 'href="')
    content = content.replace('href="forums/', 'href="')

    # fix pagination blocks: process each <div class="pagination">...</div>
    def pag_repl(m):
        block = m.group(0)
        # detect per-page if present
        per_page_match = re.search(r'data-per-page="(\d+)"', block)
        per_page = int(per_page_match.group(1)) if per_page_match else 25
        return fix_pagination_block(block, per_page)

    content = re.sub(r'<div class="pagination">.*?</div>', pag_repl, content, flags=re.S)

    # fix banner CSS inline
    content = fix_banner_css(content)

    # Additional pass: some pagination links use the same href for all pages
    # (e.g. href="viewforum_f15.html">2</a>). Convert those using the link text as page number.
    def convert_numeric_anchor(m):
        before = m.group(1) or ''
        href = m.group(2)
        fid = m.group(3)
        after = m.group(4) or ''
        page = int(m.group(5))
        per_page = 25
        if page <= 1:
            return m.group(0)
        start = (page - 1) * per_page
        new_href = href.replace(f'viewforum_f{fid}.html', f'viewforum_f{fid}_start{start}.html')
        return f'<a{before}href="{new_href}"{after}>{page}</a>'

    content = re.sub(r'<a([^>]*?)href="(viewforum_f(\d+)\.html)"([^>]*?)>\s*(\d+)\s*</a>', convert_numeric_anchor, content, flags=re.I)

    # same for viewtopic pagination numeric anchors
    def convert_numeric_topic(m):
        before = m.group(1) or ''
        href = m.group(2)
        tid = m.group(3)
        after = m.group(4) or ''
        page = int(m.group(5))
        per_page = 25
        if page <= 1:
            return m.group(0)
        start = (page - 1) * per_page
        new_href = href.replace(f'viewtopic_t{tid}.html', f'viewtopic_t{tid}_start{start}.html')
        return f'<a{before}href="{new_href}"{after}>{page}</a>'

    content = re.sub(r'<a([^>]*?)href="(viewtopic_t(\d+)\.html)"([^>]*?)>\s*(\d+)\s*</a>', convert_numeric_topic, content, flags=re.I)

    return content

def process_html(file_path):
    try:
        with open(file_path, 'r', encoding='utf-8') as f:
            content = f.read()
        
        new_content = fix_forum_links(content)
        
        if new_content != content:
            with open(file_path, 'w', encoding='utf-8') as f:
                f.write(new_content)
            return f"✅ {file_path.name}"
        return f"➖ {file_path.name}"
        
    except Exception as e:
        return f"❌ {file_path.name}: {e}"

def main():
    base_dir = Path(".")
    html_files = list(base_dir.rglob("*.html"))
    
    print(f"🔧 Correction finale des liens dans {len(html_files)} fichiers...")
    
    with ThreadPoolExecutor(max_workers=8) as executor:
        results = list(executor.map(process_html, html_files))
    
    successful = len([r for r in results if '✅' in r])
    print(f"✅ {successful} fichiers corrigés")

if __name__ == "__main__":
    main()

import re
from pathlib import Path
from concurrent.futures import ThreadPoolExecutor

def fix_forum_links(content):
    """Corrige les liens pour pointer vers les vrais noms de fichiers"""
    
    # 1. viewforum_f4.html -> viewforum.php?f=4.html (vos vrais fichiers)
    content = re.sub(
        r'href="viewforum_f(\d+)(?:_start(\d+))?\.html"',
        lambda m: f'href="viewforum.php?f={m.group(1)}{f"&start={m.group(2)}" if m.group(2) else ""}.html"',
        content
    )
    
    # 2. topic_t123.html -> viewtopic.php?t=123.html  
    content = re.sub(
        r'href="topics/topic_t(\d+)(?:_start(\d+))?\.html"',
        lambda m: f'href="viewtopic.php?t={m.group(1)}{f"&start={m.group(2)}" if m.group(2) else ""}.html"',
        content
    )
    
    # 3. topic_p123.html -> viewtopic.php?p=123.html
    content = re.sub(
        r'href="topics/topic_p(\d+)\.html"',
        r'href="viewtopic.php?p=\1.html"',
        content
    )
    
    # 4. forums/forum_f4.html -> viewforum.php?f=4.html
    content = re.sub(
        r'href="forums/forum_f(\d+)(?:_start(\d+))?\.html"',
        lambda m: f'href="viewforum.php?f={m.group(1)}{f"&start={m.group(2)}" if m.group(2) else ""}.html"',
        content
    )
    
    # 5. Nettoyer les chemins dossiers inexistants
    content = content.replace('href="topics/', 'href="')
    content = content.replace('href="forums/', 'href="')
    
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
    
    print(f"🔧 Correction des liens vers vrais fichiers dans {len(html_files)} fichiers...")
    
    with ThreadPoolExecutor(max_workers=8) as executor:
        results = list(executor.map(process_html, html_files))
    
    successful = len([r for r in results if '✅' in r])
    print(f"✅ {successful} fichiers corrigés")

if __name__ == "__main__":
    main()

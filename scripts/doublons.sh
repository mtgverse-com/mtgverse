cd /home/clement/mtgverse_fast

# Corriger les doubles extensions
find . -name "*.html.html" | while read file; do
    new_name="${file%.html}"
    echo "🔧 $file -> $new_name"
    mv "$file" "$new_name"
done

# Supprimer les fichiers view=print (pas utiles pour navigation statique)
find . -name "*view=print*" -delete
echo "✅ Fichiers print supprimés"

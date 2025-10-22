#!/bin/bash

echo "🔧 Ajout des extensions .html manquantes..."

# Trouver tous les fichiers sans extension .html mais qui sont des fichiers HTML
find . -name "*.php?*" -type f | while read file; do
    # Vérifier que c'est bien un fichier HTML
    if file "$file" | grep -q "HTML\|text"; then
        new_name="${file}.html"
        echo "📄 $file -> $new_name"
        mv "$file" "$new_name" 2>/dev/null || true
    fi
done

# Aussi traiter les fichiers .php sans paramètres
find . -name "*.php" -type f | while read file; do
    if file "$file" | grep -q "HTML\|text"; then
        new_name="${file}.html"
        echo "📄 $file -> $new_name"
        mv "$file" "$new_name" 2>/dev/null || true
    fi
done

echo "✅ Extensions corrigées"

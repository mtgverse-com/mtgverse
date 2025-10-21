#!/bin/bash

echo "🧹 Nettoyage des noms de fichiers..."

# Renommer tous les fichiers avec sid en version propre
find . -name "*sid=*" -type f | while read file; do
    # Extraire le nom de base sans les paramètres sid
    basename=$(echo "$file" | sed 's/\?sid=[^&]*//g' | sed 's/&sid=[^&]*//g')
    
    if [ "$file" != "$basename" ]; then
        echo "📄 $file -> $basename"
        mv "$file" "$basename" 2>/dev/null || true
    fi
done

# Nettoyer les autres paramètres de session
find . -name "*\?*" -type f | while read file; do
    # Garder seulement les paramètres importants (f=, t=, start=)
    clean_name=$(echo "$file" | sed -E 's/\?([^?]*)/?\1/' | sed -E 's/&?sid=[^&]*//g' | sed -E 's/&?hilit=[^&]*//g')
    
    if [ "$file" != "$clean_name" ] && [ ! -f "$clean_name" ]; then
        echo "🔧 $file -> $clean_name"
        mv "$file" "$clean_name" 2>/dev/null || true
    fi
done

echo "✅ Nettoyage terminé"

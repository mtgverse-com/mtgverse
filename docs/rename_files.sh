#!/bin/bash

echo "🔄 Renommage des fichiers pour compatibilité navigateur..."

# Renommer viewforum.php?f=X.html -> viewforum_fX.html
find . -name "viewforum.php?f=*.html" | while read file; do
    # Extraire le numéro de forum
    if [[ $file =~ f=([0-9]+) ]]; then
        forum_id="${BASH_REMATCH[1]}"
        
        # Vérifier s'il y a un paramètre start
        if [[ $file =~ start=([0-9]+) ]]; then
            start="${BASH_REMATCH[1]}"
            new_name="viewforum_f${forum_id}_start${start}.html"
        else
            new_name="viewforum_f${forum_id}.html"
        fi
        
        echo "📄 $file -> $new_name"
        mv "$file" "$new_name"
    fi
done

# Renommer viewtopic.php?t=X.html -> viewtopic_tX.html
find . -name "viewtopic.php?t=*.html" | while read file; do
    if [[ $file =~ t=([0-9]+) ]]; then
        topic_id="${BASH_REMATCH[1]}"
        
        if [[ $file =~ start=([0-9]+) ]]; then
            start="${BASH_REMATCH[1]}"
            new_name="viewtopic_t${topic_id}_start${start}.html"
        else
            new_name="viewtopic_t${topic_id}.html"
        fi
        
        echo "📄 $file -> $new_name"
        mv "$file" "$new_name"
    fi
done

# Renommer viewtopic.php?p=X.html -> viewtopic_pX.html
find . -name "viewtopic.php?p=*.html" | while read file; do
    if [[ $file =~ p=([0-9]+) ]]; then
        post_id="${BASH_REMATCH[1]}"
        new_name="viewtopic_p${post_id}.html"
        
        echo "📄 $file -> $new_name"
        mv "$file" "$new_name"
    fi
done

echo "✅ Renommage terminé"

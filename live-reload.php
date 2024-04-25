<?php

/*
 * Live Reload Server.
 * 
 * Ajoutez ce script à un fichier PHP pour activer le rechargement automatique. Voici
 * ce qui se passera :
 * 
 *  - Si un fichier CSS change, seul le fichier CSS sera rechargé.
 *  - Si un fichier Html, PHP ou JavaScript change, la page sera rechargée au complet.
 * 
 * Placez le dans le <head>, un peu comme ceci :
 * 
 *     <head>
 *         <title>Ma page</title>
 *         <?php require_once __DIR__."/live-reload.php"; ?>
 *     </head>
 *  
 * Ce script peut aussi supporter le rechargement des images, mais sous certaines
 * conditions seulement. Pour mettre à jour une image, vous devrez obligatoirement la 
 * supprimer en premier! Si vous remplacez directement une image, elle sera corrompue. 
 * Si vous voulez tout de même activer cette fonction, décommentez les lignes plus bas.
 * 
 * N'oubliez pas de faire CTRL-F5 sur votre navigateur pour forcer un rechargement des
 * fichiers en cache.
 */

/// Watched files.
const WATCHED_EXTENSIONS = [
    "html",
    "css",
    "js",
    "php",
    # Rechargement des images est désactivé. Décommentez ces lignes pour l'activer.
    #"svg",
    #"jpg",
    #"png",
    #"webp",
    #"gif",
];

/// Recursively list files.
function list_watched_files(string $path) {
    $directory = new RecursiveDirectoryIterator($path);
    $iterator = new RecursiveIteratorIterator($directory);
    $iterator = new RegexIterator($iterator, "/^.+\.(".join('|', WATCHED_EXTENSIONS).")$/i", RecursiveRegexIterator::GET_MATCH);
    
    $result = [];
    foreach ($iterator as [$path]) {
        $key = substr($path, strlen(__DIR__) + 1);
        $hash = filemtime($path);
        $result[$key] = $hash;
    }
    return $result;
}

// Check if request is for server events.
$is_server = $_SERVER["HTTP_ACCEPT"] == "text/event-stream";

// Serve JavaScript script.
if (!$is_server) { ?>
    <script>
        const liveReloadEventSource = new EventSource("<?=basename(__FILE__)?>");
        liveReloadEventSource.addEventListener("added", event => {
            onChanged(event.data);
        });
        liveReloadEventSource.addEventListener("removed", event => {
            onChanged(event.data);
        });
        liveReloadEventSource.addEventListener("changed", event => {
            onChanged(event.data);
        });

        function onChanged(path) {
            console.log(`Reloading ${path} ...`);

            if (path.endsWith("css")){
                update_css(path);
            } else if (["svg", "jpg", "png", "webp", "gif"].some(it => path.endsWith(it))) {
                update_img(path);
            } else {
                location.reload(true);
            }
        }

        function update_css(path) {
            const links = document.querySelectorAll(`link[href^="${path}"]`);
            for(const link of links) {
                link.href = `${path}?reload=${new Date().getTime()}`;     
            }
        }

        function update_img(path) {
            const images = document.querySelectorAll(`img[src^="${path}"]`);
            for(const img of images) {
                img.src = `${path}?reload=${new Date().getTime()}`;     
            }
        }
    </script><?php
} 
// Serve server side events.
else {
    header("Cache-Control: no-store");
    header("Content-Type: text/event-stream");

    $previous_files = list_watched_files(__DIR__);

    while (true) {
        // Ensure connection is active.
        if (connection_aborted()) break;

        // Wait between refreshes.
        sleep(1);

        // List files.
        $current_files = list_watched_files(__DIR__);

        // Check for differences.
        foreach ($current_files as $path => $hash) {
            // Added file.
            if (!array_key_exists($path, $previous_files)) {
                echo "event:added\n";
                echo "data: $path";
                echo "\n\n";
            } 
            // Changed file.
            else if ($previous_files[$path] != $hash) {
                echo "event:changed\n";
                echo "data: $path";
                echo "\n\n";
            }
        }
        foreach ($previous_files as $path => $hash) {
            // Removed file.
            if (!array_key_exists($path, $current_files)) {
                echo "event:removed\n";
                echo "data: $path";
                echo "\n\n";
            }
        }

        $previous_files = $current_files;

        ob_end_flush();
        flush();
    }
}
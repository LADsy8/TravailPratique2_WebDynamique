<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noto</title>
    <link rel="shortcut icon" href="img/favicon.svg" type="image/x-icon" />
    <link rel="stylesheet" href="css/app.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- TODO : Ce script JavaScript ajuste la hauteur des <textarea> pour
            s'ajuster automatiquement au contenu. Pour spécifier une hauteur
            minimale, utilisez l'attribut "rows".
        
            Par exemple :

            <textarea rows="4"></textarea>
            
            -->
    <script src="js/app.js" defer></script>
    <?php require_once __DIR__ . "/../live-reload.php"; ?>
</head>

<body>
    <header>
        <nav class="px-6 py-4 flex text-white h-max content-center justify-between items-center">
            <div class="justify-self-start">
                <a class="flex" href="index.php">
                    <img src="img/noto_blank.svg" class="h-6 w-6 lg:h-6 lg:w-6" alt="Noto" />
                    <span class="flex text-white px-2">Noto</span>
                </a>
            </div>
            <div class="justify-items-end flex">
                <a class="flex hover:bg-[#181b20] px-5 py-2 rounded" href="new.php">
                    <img class="pr-1.5" src="img/add.svg" alt="Nouveau" />
                    Nouveau
                </a>
                <a class="hover:opacity-80 px-5 py-2 rounded" href="sign-in.php">
                    Se déconnecter
                </a>
            </div>
        </nav>
    </header>
    <main class="grid grid-cols-1 lg:grid-cols-3 gap-x-4 gap-y-4 px-4 pt-0">

    </main>
</body>

</html>
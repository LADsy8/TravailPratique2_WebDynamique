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
            <div class="justify-self-start flex items-center">
                <a class="p-1.5 hover:bg-[#181b20] rounded-full" href="Note-data.php">
                    <img src="img/back.svg" alt="Retour" />
                </a>
                <a class="flex items-center pl-1.5" href="index.php">
                    <img src="img/noto_blank.svg" class="h-6 w-6 lg:h-6 lg:w-6" alt="Noto" />
                    <span class="text-white px-2">Noto</span>
                </a>
            </div>
            <div class="justify-items-end flex items-center">
                <a class="flex hover:bg-[#181b20] px-5 py-2 rounded" href="create.php">
                    <img class="pr-1.5" src="img/add.svg" alt="Nouveau" />
                    Nouveau
                </a>
                <a class="hover:opacity-80 px-5 py-2 rounded" href="sign-out.php">
                    Se déconnecter
                </a>
            </div>
        </nav>
    </header>
    <main class="flex flex-col justify-center items-center">
        <div class="border-[#777777] bg-[#181b20] border-2 h-[300px] w-[600px] flex flex-col rounded">
            <input type="text" class="bg-transparent p-4 text-white" placeholder="Titre" />
            <textarea rows="2" class="bg-transparent border-none px-4 flex-grow text-white"
                placeholder="Créer une note..."></textarea>
            <div class="pl-4 pb-1.5 pr-1.5 flex justify-between items-center ">
                <fieldset class="flex">
                    <input id="color-black" name="color" value="black" type="radio" checked />
                    <label for="color-black" class="color-label bg-black mr-1"></label>

                    <input id="color-red" name="color" value="red" type="radio" />
                    <label for="color-red" class="color-label bg-[#ff5d7370] mr-1"></label>

                    <input id="color-orange" name="color" value="orange" type="radio" />
                    <label for="color-orange" class="color-label bg-[#f7925670] mr-1"></label>

                    <input id="color-yellow" name="color" value="yellow" type="radio" />
                    <label for="color-yellow" class="color-label bg-[#fec60170] mr-1"></label>

                    <input id="color-green" name="color" value="green" type="radio" />
                    <label for="color-green" class="color-label bg-[#7dcfB670] mr-1"></label>

                    <input id="color-blue" name="color" value="blue" type="radio" />
                    <label for="color-blue" class="color-label bg-[#3da5d970]"></label>
                </fieldset>
                <a class="flex hover:bg-[#181b20] px-5  rounded text-white justify-end" href="Note-data.php">
                    <img class="pr-1.5" src="img/save.svg" alt="Save" />
                    Enregistrer
                </a>
            </div>
        </div>
    </main>
</body>

</html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noto</title>
    <link rel="shortcut icon" href="img/favicon.svg" type="image/x-icon" />
    <link rel="stylesheet" href="css/app.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/app.js" defer></script>
    <?php require_once __DIR__ . "/../live-reload.php"; ?>
    <?php
    function getBackgroundColorClass($color)
    {
        switch ($color) {
            case "red":
                return "bg-[#ff5d7370]";
            case "orange":
                return "bg-[#f7925670]";
            case "yellow":
                return "bg-[#fec60170]";
            case "green":
                return "bg-[#7dcfB670]";
            case "blue":
                return "bg-[#3da5d970]";
            default:
                return ""; // Couleur par défaut si aucune correspondance n'est trouvée
        }
    }


    ?>

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
                <a class="hover:opacity-80 px-5 py-2 rounded" href="sign-out.php">
                    Se déconnecter
                </a>
            </div>
        </nav>
    </header>
    <main class="grid grid-cols-1 lg:grid-cols-3 gap-x-4 gap-y-4 px-4 pt-0">
        <?php foreach ($notes as $note): ?>
        <?php $backgroundClass = getBackgroundColorClass($note['color']); ?>
        <?php $textColorClass = 'text-white'; ?> <?php $noteId = $note['id']; ?>
        <?php if (!empty($note['title'])): ?>
        <div class="card <?= $backgroundClass ?> <?= $textColorClass ?> rounded border-2 pt-2 px-4 pb-2 grid"
            onmouseover="showLinksTitle('<?= $noteId ?>')" onmouseout="hideLinksTitle('<?= $noteId ?>')">
            <div class="row-start-1 col-start-1 font-semibold pd-2">
                <?= htmlspecialchars($note['title']) ?>
            </div>
            <div class="row-start-2 col-start-1 py-5" style="overflow: auto; word-wrap: break-word;">
                <?= htmlspecialchars($note['content']) ?>
            </div>

            <div id="<?= $noteId ?>_linksTitle" class="opacity-0 pd-2 flex place-content-end">
                <a class="p-3 rounded-full hover:bg-[#181b20] hover:opacity-100" href="edit.php?id=<?= $noteId ?>"
                    target="_self">
                    <img src="img/edit.svg" alt="Modifier" class="opacity-50 rounded-full" />
                </a>
                <a class="p-3 rounded-full hover:bg-[#181b20] hover:opacity-100" href="delete.php?id=<?= $noteId ?>"
                    target="_self">
                    <img src="img/delete.svg" alt="Supprimer" class="opacity-50 rounded-full" />
                </a>
            </div>
        </div>
        <?php else: ?>
        <div class="card <?= $backgroundClass ?> <?= $textColorClass ?> rounded border-2 px-4 pb-2 grid relative"
            onmouseover="showLinksNoTitle('<?= $noteId ?>')" onmouseout="hideLinksNoTitle('<?= $noteId ?>')">
            <div class="row-start-1 col-start-1 py-5" style="overflow: auto; word-wrap: break-word;">
                <?= htmlspecialchars($note['content']) ?>
            </div>
            <div id="<?= $noteId ?>_linksNoTitle"
                class="absolute bottom-0 left-0 right-0 flex justify-end items-end opacity-0 p-3">
                <a class="p-3 rounded-full hover:bg-[#181b20] hover:opacity-100" href="edit.php?id=<?= $noteId ?>"
                    target="_self">
                    <img src="img/edit.svg" alt="Modifier" class="opacity-50 rounded-full" />
                </a>
                <a class="p-3 rounded-full hover:bg-[#181b20] hover:opacity-100" href="delete.php?id=<?= $noteId ?>"
                    target="_self">
                    <img src="img/delete.svg" alt="Supprimer" class="opacity-50 rounded-full" />
                </a>
            </div>
        </div>

        <?php endif; ?>
        <?php endforeach; ?>
    </main>

    <script>
    function showLinksTitle(noteId) {
        document.getElementById(noteId + '_linksTitle').style.opacity = 1;
    }

    function hideLinksTitle(noteId) {
        document.getElementById(noteId + '_linksTitle').style.opacity = 0;
    }

    function showLinksNoTitle(noteId) {
        document.getElementById(noteId + '_linksNoTitle').style.opacity = 1;
    }

    function hideLinksNoTitle(noteId) {
        document.getElementById(noteId + '_linksNoTitle').style.opacity = 0;
    }
    </script>
</body>

</html>script
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
</head>
<style>
div {
    max-width: 400px;
}
</style>

<body>
    <main class="flex flex-col border-2 border-white w-screen h-screen items-center justify-center">
        <div class="align-center py-4"> <img src="img/noto_blank.svg" class="h-10 w-10" alt="Noto" /> </div>
        <span class="align-center text-white py-4 px-16 text-2xl "> Se connecter à Noto</span>
        <div class="text-white border-2 border-white h-auto w-[400px] rounded bg-[#181b20] mt-4">
            <form method="post" action="sign-in.php" class="p-4">
                <?php if (empty($errors) === false) { ?>
                <div class="form-errors">
                    <h2>Erreur de connexion</h2>
                    <ul>
                        <?php
                            foreach ($errors as $message) {
                                echo "<li> $message </li>";
                            }

                            ?>
                    </ul>
                </div>
                <?php } ?>
                <div class="mb-4 flex-wrap flex">
                    <label for="email" class="pb-1.5">Courriel</label>
                    <input type="text" class="rounded bg-[#0d1117] w-[400px] h-8" name="email" id="email" required>
                </div>
                <div class="mb-4 flex-wrap flex">
                    <label for="password" class="pb-1.5">Mot de passe</label>
                    <input type="password" class="rounded bg-[#0d1117] w-[400px] h-8" name="password" id="password"
                        required>
                </div>
                <button type="submit" class="rounded w-full px-5 py-2 bg-[#b83daf] hover:bg-[#c154b7]">Se
                    connecter</button>
            </form>

        </div>
    </main>
</body>
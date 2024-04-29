<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noto</title>
    <link rel="shortcut icon" href="img/favicon.svg" type="image/x-icon" />
    <link rel="stylesheet" href="css/app.css">
    <script src="js/app.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php require_once __DIR__."/live-reload.php"; ?>
    <style>
        body {
            background: #0d1117;
        }

        main {
            padding: 1rem;

            > article {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
                gap: 1rem;

                h2 {
                    margin : 0;
                }

                > section {
                    padding: 1rem;

                    display: flex;
                    flex-direction: column;
                    gap: 1rem;

                    border: 1px solid #777;
                    border-radius: .3rem;

                    > h2 {
                        width: 100%;
                    }

                    &.center {
                        align-items: center;
                    }
                }
            }
        }
    </style>
</head>
<body>
    <header class="px-6 py-4 flex items-center text-white">
        <div class="flex justify-self-start">
            <a class="flex" href="index.php">
                <img src="img/noto_blank.svg" class="h-6 w-6 lg:h-10 lg:w-10" alt="Noto" />
                <span class="flex text-white px-2" >Noto</span>
            </a>
        </div>
        <div class="flex justify-self-end">
            <a class="hover:opacity-80" href="#">
                    Se déconnecter
            </a>
        </div>
    </header>
    <main>
        <h1 class="text-white">Gallerie de composants</h1>
        <article>
            <section class="center text-white">
                <h2>Bouton style hyperlien</h2>
                <a class="hover:opacity-80" href="#">
                    Créer mon compte
                </a>
            </section>
            <section class="center text-white">
                <h2>Bouton avec bordure</h2>
                <a class="hover:opacity-80 px-5 py-1 border-white border-2 rounded" href="#">
                    Se connecter
                </a>
            </section>
            <section class="center text-white">
                <h2>Bouton plat</h2>
                <a class="hover:opacity-80" href="#">
                    Se déconnecter
                </a>
            </section>
            <section class="center text-white">
                <h2>Bouton plat avec icône</h2>
                <div class="flex items-center">
                    <a class="flex hover:bg-gray-900 px-5 py-1 rounded" href="#">
                        <img class="pr-1.5" src="img/add.svg" alt="Nouveau" />
                        Nouveau
                    </a>
                </div>
            </section>
            <section class="center text-white">
                <h2>Bouton circulaire</h2>
                <a class="p-1.5 hover:bg-gray-900 rounded-full" href="#">
                    <img src="img/back.svg" alt="Retour" />
                </a>
            </section>
            <section class="center text-white">
                <h2>Bouton style hyperlien</h2>
                <a class="px-5 py-2 bg-[#b83daf] hover:bg-[#c154b7] rounded" href="#">
                    Créer mon compte
                </a>
            </section>
            <section class="center text-white">
                <h2>Bouton style hyperlien</h2>
                <a class="px-5 py-2 hover:bg-gray-900 rounded" href="#">
                    Créer mon compte
                </a>
            </section>
            <section class="center text-white">
                <h2>Bouton primaire avec icône</h2>
                <a class="flex items-center px-5 py-2 bg-[#b83daf] hover:bg-[#c154b7] rounded" href="#">
                    <img class="flex text-justify" src="img/add.svg" alt="Nouveau" />
                    Créer ma première note
                </a>
            </section>
            <section>
                <h2>Champ de texte</h2>
                <input type="text" />
            </section>
            <section>
                <h2>Champ de texte transparent</h2>
                <input type="text" />
            </section>
            <section>
                <h2>Zone de texte</h2>
                <textarea rows="2"></textarea>
            </section>
            <section>
                <h2>Zone de texte transparent</h2>
                <textarea rows="2"></textarea>
            </section>
            <section class="center">
                <h2>Logo</h2>
                <a href="#">
                    <img src="img/noto_blank.svg" alt="Noto"/>
                </a>
            </section>
            <section class="center">
                <h2>Logo large</h2>
                <a href="#">
                    <img src="img/noto_blank.svg" alt="Noto"/>
                </a>
            </section>
            <section class="center">
                <h2>Logo avec texte</h2>
                <a href="#">
                    <img src="img/noto_blank.svg" alt="Noto"/>
                    <span>Noto</span>
                </a>
            </section>
            <section>
                <h2>Carte</h2>
                <div>
                    Lorem ipsum
                </div>
            </section>
            <section>
                <h2>Carte avec titre</h2>
                <div class="card">
                    <h1>Lorem ipsum</h1>
                    Dolor sit amet
                </div>
            </section>
            <section>
                <h2>Carte de couleur</h2>
                <div>
                    Carte rouge
                </div>
                <div>
                    Carte orange
                </div>
                <div>
                    Carte jaune
                </div>
                <div>
                    Carte verte
                </div>
                <div>
                    Carte bleu
                </div>
            </section>
            <section>
                <h2>Color picker</h2>
                <fieldset>
                    <input name="color" type="radio" checked />
                    <input name="color" value="red" type="radio" />
                    <input name="color" value="orange" type="radio" />
                    <input name="color" value="yellow" type="radio" />
                    <input name="color" value="green" type="radio" />
                    <input name="color" value="blue" type="radio" />
                </fieldset>
            </section>
            <section>
                <h2>Erreurs</h2>
                <ul>
                    <li>Le contenu est requis.</li>
                    <li>Couleur inconnue : purple.</li>
                </ul>
            </section>
        </article>
    </main>
</body>
</html>
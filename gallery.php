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
    <?php require_once __DIR__ . "/live-reload.php"; ?>
    <style>
    main {
        padding: 1rem;

        >article {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 1rem;

            h2 {
                margin: 0;
            }

            >section {
                padding: 1rem;

                display: flex;
                flex-direction: column;
                gap: 1rem;

                border: 1px solid #777;
                border-radius: .3rem;

                >h2 {
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
                <span class="flex text-white px-2">Noto</span>
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
                    <a class="flex hover:bg-[#181b20] px-5 py-2 rounded" href="#">
                        <img class="pr-1.5" src="img/add.svg" alt="Nouveau" />
                        Nouveau
                    </a>
                </div>
            </section>
            <section class="center text-white">
                <h2>Bouton circulaire</h2>
                <a class="p-1.5 hover:bg-[#181b20] rounded-full" href="#">
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
                <a class="px-5 py-2 hover:bg-[#181b20] rounded" href="#">
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
            <section class="text-white">
                <h2>Champ de texte</h2>
                <input type="text" class="rounded bg-[#181b20]" />
            </section>
            <section class="text-white">
                <h2>Champ de texte transparent</h2>
                <input type="text" class="bg-transparent" />
            </section>
            <section class="text-white ">
                <h2>Zone de texte</h2>
                <textarea rows="2" class="bg-[#181b20]"></textarea>
            </section>
            <section class="text-white">
                <h2>Zone de texte transparent</h2>
                <textarea rows="2" class="bg-transparent border-none"></textarea>
            </section>
            <section class="center text-white">
                <h2>Logo</h2>
                <a href="#">
                    <img src="img/noto_blank.svg" class="h-6 w-6" alt="Noto" />
                </a>
            </section>
            <section class="center text-white">
                <h2>Logo large</h2>
                <a href="#">
                    <img src="img/noto_blank.svg" class="h-10 w-10" alt="Noto" />
                </a>
            </section>
            <section class="center text-white" class="flex justify-self-start">
                <h2>Logo avec texte</h2>
                <a href="#" class="flex">
                    <img src="img/noto_blank.svg" alt="Noto" />
                    <span class="pl-2">Noto</span>
                </a>
            </section>
            <section class="text-white">
                <h2>Carte</h2>
                <div class="card border-[#181b20] rounded border-2 px-4 pb-2 grid" onmouseover="showLinksNoTitle()"
                    onmouseout="hideLinksNoTitle()">
                    <div class="row-start-1 col-start-1 py-5">
                        Lorem isadibaskjdhsajjk sdanjda uabjbajb b b jbdhb dsh bhjbhb jb jbsjbdjbjb jbj bjb
                    </div>
                    <div id="linksNoTitle" class="opacity-0 pd-2 flex place-content-end">
                        <a class="p-3 hover:bg-[#181b20] rounded-full hover:opacity-100" href="#">
                            <img src="img/edit.svg" alt="Retour" class="opacity-50" />
                        </a>
                        <a class="p-3 hover:bg-[#181b20] rounded-full hover:opacity-100" href="#">
                            <img src="img/delete.svg" alt="Retour" class="opacity-50" />
                        </a>
                    </div>
                </div>

                <script>
                function showLinksNoTitle() {
                    document.getElementById('linksNoTitle').style.opacity = 1;
                }

                function hideLinksNoTitle() {
                    document.getElementById('linksNoTitle').style.opacity = 0;
                }
                </script>

            </section>
            <section class="text-white">
                <h2>Carte avec titre</h2>
                <div class="card border-[#181b20] rounded border-2 pt-2 px-4 pb-2 grid" onmouseover="showLinksTitle()"
                    onmouseout="hideLinksTitle()">
                    <div class="row-start-1 col-start-1 font-semibold pd-2">
                        Lorem Ipsum
                    </div>
                    <div class="row-start-2 col-start-1 py-5">
                        fsjfnasjnajfnsa iasncanc n nun ujdnujnujnu nu nu du ud nd nd nid ni
                    </div>
                    <div id="linksTitle" class="opacity-0 pd-2 flex place-content-end">
                        <a class="p-3 hover:bg-[#181b20] rounded-full hover:opacity-100" href="#">
                            <img src="img/edit.svg" alt="Retour" class="opacity-50" />
                        </a>
                        <a class="p-3 hover:bg-[#181b20] rounded-full hover:opacity-100" href="#">
                            <img src="img/delete.svg" alt="Retour" class="opacity-50" />
                        </a>
                    </div>
                </div>

                <script>
                function showLinksTitle() {
                    document.getElementById('linksTitle').style.opacity = 1;
                }

                function hideLinksTitle() {
                    document.getElementById('linksTitle').style.opacity = 0;
                }
                </script>

            </section>
            <section class="text-white">
                <h2>Carte de couleur</h2>
                <div class="card bg-[#ff5d7370] flex justify-start items-center rounded py-3">
                    <div class="text-left px-4">
                        Carte rouge
                    </div>
                </div>
                <div class="card bg-[#f7925670] flex justify-start items-center rounded py-3">
                    <div class="text-left px-4">
                        Carte orange
                    </div>
                </div>
                <div class="card bg-[#fec60170] flex justify-start items-center rounded py-3">
                    <div class="text-left px-4">
                        Carte jaune
                    </div>
                </div>
                <div class="card bg-[#7dcfB670] flex justify-start items-center rounded py-3">
                    <div class="text-left px-4">
                        Carte verte
                    </div>
                </div>
                <div class="card bg-[#3da5d970] flex justify-start items-center rounded py-3">
                    <div class="text-left px-4">
                        Carte bleue
                    </div>
                </div>
            </section>
            <section>
                <h2 class="text-white">Color picker</h2>
                <fieldset>
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
            </section>
            <section class="text-white">
                <h2>Erreurs</h2>
                <ul
                    class="list-disc bg-[#da3e5233] bg-opacity-15 border-2 border-[#da3e52] border-opacity-15 rounded-lg p-4 pl-8">
                    <li>Le contenu est requis.</li>
                    <li>Couleur inconnue : purple.</li>
                </ul>
            </section>
        </article>
    </main>
</body>

</html>
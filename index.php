<?php declare(strict_types=1);
require_once __DIR__ . "/src/config.php";
require_once __DIR__ . "/src/database.php";
require_once __DIR__ . "/src/forms.php";

// TODO : Cette variable devrait contenir l'utilisateur actuellement connecté.
$user = null;

// TODO : Remarquez que la vue change si l'utilisateur est connecté ou pas.
if (!$user)
    require_once __DIR__ . "/html/index-view.php";
else
    require_once __DIR__ . "/html/list-view.php";
<?php declare(strict_types=1);

if (session_id() == "") {
    session_start();
}

require_once __DIR__ . "/src/config.php";
require_once __DIR__ . "/src/database.php";
require_once __DIR__ . "/src/forms.php";
require_once __DIR__ . "/src/Note.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données du formulaire
    $title = $_POST["title"] ?? "";
    $content = $_POST["content"] ?? "";
    $color = $_POST["color"] ?? "";

    if (!empty($title) && !empty($content) && !empty($color)) {
        $user_id = $_SESSION["user_id"] ?? null;

        if ($user_id !== null) {

            $db = connect_db();
            $note_dao = new NoteDAO($db);
            $note_dao->addNote($user_id, $title, $content, $color);

            header("Location: index.php");
            exit;
        }
    }
}

require_once __DIR__ . "/html/create-view.php";
<?php declare(strict_types=1);

require_once __DIR__ . "/src/database.php";
require_once __DIR__ . "/src/forms.php";
require_once __DIR__ . "/src/Note.php";
require_once __DIR__ . "/src/config.php";

$db = connect_db();
$noteDAO = new NoteDAO($db);

$noteId = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $noteId = $_POST['noteId'] ?? null;

    $noteForm = NoteForm::fromPost();
    $errors = $noteForm->validate();

    if (empty($errors)) {
        if ($noteId !== null) {
            $noteDAO->updateNote((int) $noteId, $noteForm->title, $noteForm->content, $noteForm->color);
            header("Location: index.php");
            exit;
        } else {
            exit("ID de note invalide.");
        }
    }
}

$note = $noteDAO->getNoteById((int) $noteId);

require_once __DIR__ . "/html/modif-view.php";
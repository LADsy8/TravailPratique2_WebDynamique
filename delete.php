<?php declare(strict_types=1);

require_once __DIR__ . "/src/database.php";
require_once __DIR__ . "/src/Note.php";

if (isset($_GET['id'])) {

    $db = connect_db();

    $noteDAO = new NoteDAO($db);

    $noteId = $_GET['id'];

    $noteDAO->deleteNote((int) $noteId);

    header("Location: index.php");

    exit;

} else {

    header("Location: index.php");
    exit;
}
<?php declare(strict_types=1);
if (session_id() == "") {
    session_start();
}

require_once __DIR__ . "/src/config.php";
require_once __DIR__ . "/src/database.php";
require_once __DIR__ . "/src/forms.php";
require_once __DIR__ . "/src/user.php";
require_once __DIR__ . "/src/Note.php";

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $db = connect_db();

    $statement = $db->prepare("SELECT COUNT(*) FROM note WHERE user_id = ?");
    $statement->execute([$user_id]);
    $count = $statement->fetchColumn();

    if ($count > 0) {
        $note_dao = new NoteDAO($db);
        $notes = $note_dao->getAllNotes($user_id);
        require_once __DIR__ . "/html/Note-view.php";
        exit;
    }

    require_once __DIR__ . "/html/empty-view.php";
} else {
    require_once __DIR__ . "/html/index-view.php";
}
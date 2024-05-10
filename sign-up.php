<?php declare(strict_types=1);
session_start();
require_once __DIR__ . "/src/config.php";
require_once __DIR__ . "/src/forms.php";
require_once __DIR__ . "/src/database.php";
require_once __DIR__ . "/src/user.php";

$form = new SignUpForm();
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $form = SignUpForm::fromPost();
    $errors = $form->validate();

    if (empty($errors)) {
        $db = connect_db();
        $user_dao = new UserDAO($db);

        try {
            $db->beginTransaction();


            $user_dao->insertOne($form->email, $form->password);

            $db->commit();
            header("location:index.php");
            exit;
        } catch (PDOException $e) {
            $db->rollback();
            $errors[] = "Une erreur s'est produite. Veuillez réessayer.";
        }
    }
}

require_once __DIR__ . "/html/sign-up-view.php";
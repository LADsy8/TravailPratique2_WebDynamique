<?php declare(strict_types=1);
session_start();
require_once __DIR__ . "/src/config.php";
require_once __DIR__."/src/forms.php";
require_once __DIR__."/src/database.php";
require_once __DIR__."/src/user.php";

$form = new SignInForm();
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $form = SignInForm::fromPost();
    $errors = $form->validate();

    if (empty($errors)) {
        $db = connect_db();
        $user_dao = new UserDAO($db);

        $user = $user_dao->find($form->email, $form->password);
        if ($user) {
            $_SESSION["email"] = $form->email;

            header("location:index.php");
            exit;
        } else {
            $errors[] = "Identifiants invalides.";
        }
    }
}

require_once __DIR__."/html/sign-in-view.php";
<?php declare(strict_types=1);

class SignInForm
{
    public readonly string $email;
    public readonly string $password;

    public function __construct(
        string $email = "",
        string $password = ""
    ) {
        $this->email = $email;
        $this->password = $password;
    }

    public static function fromPost(): SignInForm
    {
        $email = $_POST["email"] ?? "";
        $password = $_POST["password"] ?? "";

        return new SignInForm($email, $password);
    }

    public function validate(): array
    {
        $errors = [];

        if (empty(trim($this->email))) {
            $errors[] = "Le email est requis.";
        } else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Le email est invalide.";
        }
        if (empty($this->password)) {
            $errors[] = "Le mot de passe est requis.";
        }

        return $errors;
    }
}

class SignUpForm
{
    public readonly string $email;
    public readonly string $password;
    public readonly string $passwordConfirmation;

    public function __construct(
        string $email = "",
        string $password = "",
        string $passwordConfirmation = ""
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->passwordConfirmation = $passwordConfirmation;
    }

    public static function fromPost(): SignUpForm
    {
        $email = $_POST["email"] ?? "";
        $password = $_POST["password"] ?? "";
        $passwordConfirmation = $_POST["passwordConfirmation"] ?? ""; // Changer le nom du champ ici

        return new SignUpForm($email, $password, $passwordConfirmation);
    }

    public function validate(): array
    {
        $errors = [];

        if (empty(trim($this->email))) {
            $errors[] = "Le email est requis.";
        } else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Le email est invalide.";
        }
        if (empty($this->password)) {
            $errors[] = "Le mot de passe est requis.";
        } else if ($this->password !== $this->passwordConfirmation) {
            $errors[] = "La confirmation du mot de passe est différente.";
        }

        return $errors;
    }
}

class NoteForm
{
    public readonly string $title;
    public readonly string $content;
    public readonly string $color;

    public function __construct(
        string $title = "",
        string $content = "",
        string $color = ""
    ) {
        $this->title = $title;
        $this->content = $content;
        $this->color = $color;
    }

    public static function fromPost(): NoteForm
    {
        $title = $_POST["title"] ?? "";
        $content = $_POST["content"] ?? "";
        $color = $_POST["color"] ?? "";

        return new NoteForm($title, $content, $color);
    }

    public function validate(): array
    {
        $errors = [];

        if (empty(trim($this->content))) {
            $errors[] = "Le contenu est requis.";
        }

        $validColors = ["clear", "red", "orange", "yellow", "green", "blue"];
        if (empty($this->color)) {
            $errors[] = "La couleur est requise.";
        } else if (!in_array($this->color, $validColors)) {
            $errors[] = "La couleur sélectionnée n'est pas valide.";
        }

        return $errors;
    }
}
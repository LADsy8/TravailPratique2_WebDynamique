<?php declare(strict_types=1);

class SignInForm {
    public readonly string $email;
    public readonly string $password;

    public function __construct(
        string $email = "", 
        string $password = ""
    ) {
        $this->email = $email;
        $this->password = $password;
    }

    public static function fromPost(): SignInForm {
        $email = $_POST["email"] ?? "";
        $password = $_POST["password"] ?? "";

        return new SignInForm($email, $password);
    }

    public function validate() : array {
        $errors = [];

        if (empty(trim($this->email))) {
            $errors[] = "Le email est requis.";
        } 
        else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL )) {
            $errors[] = "Le email est invalide.";
        }
        if (empty($this->password)) {
            $errors[] = "Le mot de passe est requis.";
        }

        return $errors;
    }
}

class SignUpForm {
    public readonly string $code;
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

    public static function fromPost() : SignUpForm {
        $email = $_POST["email"] ?? "";
        $password = $_POST["password"] ?? "";
        $passwordConfirmation = $_POST["password-confirmation"] ?? "";

        return new SignUpForm($email, $password, $passwordConfirmation);
    }

    public function validate() : array {
        $errors = [];

        
        if (empty(trim($this->email))) {
            $errors[] = "Le email est requis.";
        } 
        else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Le email est invalide.";
        }
        if (empty($this->password)) {
            $errors[] = "Le mot de passe est requis.";
        }
        else if ($this->password !== $this->passwordConfirmation) {
            $errors[] = "La confirmation du mot de passe est différente.";
        }

        return $errors;
    }
}
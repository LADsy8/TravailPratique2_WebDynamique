<?php declare(strict_types=1);

class UserDAO {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function find(string $email, string $password): ?array {
        $statement = $this->db->prepare("SELECT * FROM user WHERE email = ?");
        $statement->execute([$email]);
        $user = $statement->fetch();
    
        if ($user) {
            $hash = $user['password']; 
            $is_valid = password_verify($password, $hash);
    
            if ($is_valid) {
                return $user;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function insertOne(string $email, string $password) {
        $hash = password_hash($password, PASSWORD_ARGON2ID);

        $statement = $this->db->prepare("INSERT INTO user (email, password) VALUES (?,?)");
        $statement->execute([$email, $hash]);
    }

    public function updateOne(string $email, string $password) {
        $statement = $this->db->prepare("UPDATE user SET password = ? WHERE email = ?");
        $statement->execute([$email, $password]);
    }

    public function delete(string $email) {
        $statement = $this->db->prepare("DELETE FROM user WHERE email = ?");
        $statement->execute([$email]);
    }
}
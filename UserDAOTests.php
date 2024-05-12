<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

require_once __DIR__ . "/../src/user.php";

class UserDAOTest extends TestCase
{

    private PDO $db;
    private UserDAO $userDAO;

    #[Test]
    public function canInsertAndFindUser(): void
    {
        $userDAO = new UserDAO($this->db);
        $email = 'test@exemple.com';
        $password = 'password123';

        $userDAO->insertOne($email, $password);
        $result = $userDAO->find($email, $password);

        $this->assertNotNull($result);
        $this->assertEquals($email, $result['email']);
    }

    #[Test]
    public function canUpdatePassword(): void
    {
        $userDAO = new UserDAO($this->db);
        $email = 'test@exemple.com';
        $password = 'password123';
        $newPassword = 'nouveaupassword123';
        $userDAO->insertOne($email, $password);

        $userDAO->updateOne($email, $newPassword);
        $result = $userDAO->find($email, $newPassword);

        $this->assertNotNull($result);
        $this->assertEquals($email, $result['email']);
    }
}
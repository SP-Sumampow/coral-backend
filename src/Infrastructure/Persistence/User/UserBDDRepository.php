<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;

use App\Domain\User\User;
use \PDO;

/**
 * Class UserBDDRepository
 * @package App\Infrastructure\Persistence\User
 */
class UserBDDRepository
{

    /**
     * @var PDO
     */
    private $pdo;


    /**
     * UserBDDRepository constructor.
     */
    public function __construct()
    {
        $host = $_ENV['CORAL_IP_MYSQL'];
        $dbName = "coral";
        $user = $_ENV['CORAL_ACCOUNT_MYQSL'];
        $pass = $_ENV['CORAL_PASSWORD_MYSQL'];

        $this->pdo = new PDO("mysql:host=" . $host . ";dbname=" . $dbName, $user, $pass);
    }

    /**
     * @param string $email
     * @param string $firstname
     * @param string $lastname
     * @param string $password
     * @param string $description
     * @return bool
     */
    public function addUser(string $email, string $firstname, string $lastname, string $password, string $description): bool
    {
        $salt = $_ENV['SALT_CORAL'];
        $password = sha1($password . $salt);
        try {
            $sql = "insert INTO User (firstname, lastname, email, password, description) VALUES (?, ?, ?, ?, ?)";
            $preparedSQL = $this->pdo->prepare($sql);
            $preparedSQL->execute([$firstname, $lastname, $email, $password, $description]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * @param int $id
     * @param string $email
     * @param string $firstname
     * @param string $lastname
     * @param string|null $password
     * @param string $description
     * @return bool
     */
    public function updateUser(int $id, string $email, string $firstname, string $lastname, ?string $password, string $description): bool
    {
        $salt = $_ENV['SALT_CORAL'];
        $password = sha1($password . $salt);
        try {
            $sql = "UPDATE User SET firstname=?,lastname=?,email=?,description=?";
            if (isset($password)) {
                $sql = $sql . ",password=?:";
            }
            $sql = $sql . " WHERE id = ?";
            $preparedSQL = $this->pdo->prepare($sql);
            $paramArray = [$firstname, $lastname, $email, $description];
            if (isset($password)) {
                array_push($paramArray, $password);
            }
            array_push($paramArray, $id);
            $preparedSQL->execute($paramArray);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * @param int $UserId
     * @return bool
     */
    public function deleteUserById(int $UserId): bool
    {
        try {
            $sql = "DELETE FROM User WHERE id = ?";
            $preparedSQL = $this->pdo->prepare($sql);
            $preparedSQL->execute([$UserId]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * @return array|null
     */
    public function findAll(): ?array
    {
        try {
            $sql = "SELECT id, firstname, lastname, email, description FROM User";
            $preparedSQL = $this->pdo->prepare($sql);
            $preparedSQL->execute();
            $users = $preparedSQL->fetchAll();
            return $users;
        } catch (PDOException $e) {
            return null;
        }
    }


    /**
     * @param string $email
     * @param string $password
     * @return int|null
     */
    public function findUserIdByEmailPassword(string $email, string $password): ?int
    {
        $salt = $_ENV['SALT_CORAL'];
        $password = sha1($password . $salt);
        try {
            $sql = "SELECT id FROM User WHERE email = ? AND password = ?";
            $preparedSQL = $this->pdo->prepare($sql);
            $preparedSQL->execute([$email, $password]);
            $userInfo = $preparedSQL->fetch();
            if ($userInfo == false) {
                return null;
            }
            var_dump($userInfo);
            return (int)$userInfo['id'];
        } catch (PDOException $e) {
            return null;
        }
    }

    /**
     * @param int $UserId
     * @return User|null
     */
    public function findUserById(int $UserId): ?User
    {

        try {
            $sql = "SELECT id, firstname, lastname, email, description FROM User WHERE id = ?";
            $preparedSQL = $this->pdo->prepare($sql);
            $preparedSQL->execute([$UserId]);
            $userInfo = $preparedSQL->fetch();
            return new User((int)$userInfo['id'], $userInfo['email'], $userInfo['firstname'], $userInfo['lastname'], $userInfo['description']);
        } catch (PDOException $e) {
            return null;
        }

        $key = array_search($UserId, array_column($this->users, 'id'));
        $user = $this->users[$key];
        if ($user->id != $UserId) {
            return null;
        }
        return $user;
    }
}

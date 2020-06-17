<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Article;

use App\Domain\Article\Article;
use \PDO;


/**
 * Class ArticleBDDRepository
 * @package App\Infrastructure\Persistence\Article
 */
class ArticleBDDRepository
{


    /**
     * @var PDO
     */
    private $pdo;


    /**
     * ArticleBDDRepository constructor.
     */
    public function __construct()
    {
        $host = isset($_SERVER['CORAL_IP_MYSQL']) ? $_SERVER['CORAL_IP_MYSQL'] : $_ENV['CORAL_IP_MYSQL'];
        $dbName = "coral";
        $user = isset($_SERVER['CORAL_ACCOUNT_MYQSL']) ? $_SERVER['CORAL_ACCOUNT_MYQSL'] : $_ENV['CORAL_ACCOUNT_MYQSL'];
        $pass = isset($_SERVER['CORAL_PASSWORD_MYSQL']) ? $_SERVER['CORAL_PASSWORD_MYSQL'] : $_ENV['CORAL_PASSWORD_MYSQL'];
        $this->pdo = new PDO("mysql:host=" . $host . ";dbname=" . $dbName, $user, $pass);
    }


    /**
     * @param string $name
     * @param string $title
     * @param string $text
     * @param string $video
     * @param string $picture1
     * @param string $picture2
     * @param string $picture3
     * @param string $picture4
     * @return bool
     */
    public function addArticle(string $name, string $title, string $text, string $video, string $picture1, string $picture2, string $picture3, string $picture4): bool
    {
        try {
            $sql = "INSERT INTO Article (name, title, text, video, picture1, picture2, picture3, picture4) VALUES (?,?,?,?,?,?,?,?)";
            $preparedSQL = $this->pdo->prepare($sql);
            return $preparedSQL->execute([$name, $title, $text, $video, $picture1, $picture2, $picture3, $picture4]);
        } catch (PDOException $e) {
            return false;
        }
    }


    /**
     * @param int $id
     * @param string $name
     * @param string $title
     * @param string $text
     * @param string $video
     * @param string $picture1
     * @param string $picture2
     * @param string $picture3
     * @param string $picture4
     * @return bool
     */
    public function updateArticle(int $id, string $name, string $title, string $text, string $video, string $picture1, string $picture2, string $picture3, string $picture4): bool
    {
        try {
            $sql = "UPDATE Article SET name=?,title=?,text=?,video=?,picture1=?,picture2=?,picture3=?,picture4=? WHERE id=?";
            $preparedSQL = $this->pdo->prepare($sql);
            $paramArray = [$name, $title, $text, $video, $picture1, $picture2, $picture3, $picture4, $id];
            $preparedSQL->execute($paramArray);
            return $preparedSQL->execute($paramArray);
        } catch (PDOException $e) {
            return false;
        }
    }


    /**
     * @param int $articleId
     * @return bool
     */
    public function deleteArticleById(int $articleId): bool
    {
        try {
            $sql = "DELETE FROM Article WHERE id = ?";
            $preparedSQL = $this->pdo->prepare($sql);
            return $preparedSQL->execute([$articleId]);;
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
            $sql = "SELECT * FROM Article";
            $preparedSQL = $this->pdo->prepare($sql);
            $preparedSQL->execute();
            $articles = $preparedSQL->fetchAll();
            return $articles;
        } catch (PDOException $e) {
            return null;
        }
    }


    /**
     * @param int $articleId
     * @return Article|null
     */
    public function findArticleById(int $articleId): ?Article
    {
        try {
            $sql = "SELECT * FROM Article WHERE id = ?";
            $preparedSQL = $this->pdo->prepare($sql);
            $preparedSQL->execute([$articleId]);
            $articleInfo = $preparedSQL->fetch();
            if (isset($articleInfo["id"])) {
                return new Article((int)$articleInfo["id"], $articleInfo["name"], $articleInfo["title"], $articleInfo["text"], $articleInfo["video"], $articleInfo["picture1"], $articleInfo["picture2"], $articleInfo["picture3"], $articleInfo["picture4"]);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return null;
        }
    }
}
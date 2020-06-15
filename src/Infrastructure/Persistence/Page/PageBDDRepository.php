<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Article;

use App\Domain\Article\Article;
use \PDO;

/**
 * Class PageBDDRepository
 * @package App\Infrastructure\Persistence\Page
 */
class PageBDDRepository
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
        $host = isset($_SERVER['CORAL_IP_MYSQL']) ? $_SERVER['CORAL_IP_MYSQL'] : $_ENV['CORAL_IP_MYSQL'];
        $dbName = "coral";
        $user = isset($_SERVER['CORAL_ACCOUNT_MYQSL']) ? $_SERVER['CORAL_ACCOUNT_MYQSL'] : $_ENV['CORAL_ACCOUNT_MYQSL'];
        $pass = isset($_SERVER['CORAL_PASSWORD_MYSQL']) ? $_SERVER['CORAL_PASSWORD_MYSQL'] : $_ENV['CORAL_PASSWORD_MYSQL'];
        $this->pdo = new PDO("mysql:host=" . $host . ";dbname=" . $dbName, $user, $pass);
    }


    public function addPage(string $name, string $title, string $picture, string $video, ?int $article1Id, ?int $article2Id, ?int $quiz1Id, ?int $quizId): bool
    {
        try {
            $sql = "INSERT INTO Page (name, title, picture, video, quiz1_id, quiz2_id, article1_id, article2_id) VALUES (?,?,?,?,?,?,?,?,?)";
            $preparedSQL = $this->pdo->prepare($sql);
            return $preparedSQL->execute([$name, $title, $picture, $video, $article1Id, $article2Id, $quiz1Id, $quizId]);
        } catch (PDOException $e) {
            return false;
        }
        return true;
    }


    public function updatePage(int $id, string $name, string $title, string $text, string $video, string $picture1, string $picture2, string $picture3, string $picture4): bool
    {
//        try {
//            $sql = "UPDATE Article SET name=?,title=?,text=?,video=?,picture1=?,picture2=?,picture3=?,picture4=? WHERE id=?";
//            $preparedSQL = $this->pdo->prepare($sql);
//            $paramArray = [$name, $title, $text, $video, $picture1, $picture2, $picture3, $picture4, $id];
//            $preparedSQL->execute($paramArray);
//            return $preparedSQL->execute($paramArray);
//        } catch (PDOException $e) {
//            return false;
//        }
        return true;
    }


    /**
     * @param int $articleId
     * @return bool
     */
    public function deleteArticleById(int $articleId): bool
    {
//        try {
//            $sql = "DELETE FROM Article WHERE id = ?";
//            $preparedSQL = $this->pdo->prepare($sql);
//            return $preparedSQL->execute([$articleId]);;
//        } catch (PDOException $e) {
//            return false;
//        }
        return true;
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
        return [];
    }


    /**
     * @param int $articleId
     * @return Article|null
     */
    public function findArticleById(int $articleId): ?Article
    {
//        try {
//            $sql = "SELECT * FROM Article WHERE id = ?";
//            $preparedSQL = $this->pdo->prepare($sql);
//            $preparedSQL->execute([$articleId]);
//            $articleInfo = $preparedSQL->fetch();
//            return new Article((int)$articleInfo["id"], $articleInfo["name"], $articleInfo["title"], $articleInfo["text"], $articleInfo["video"], $articleInfo["picture1"], $articleInfo["picture2"], $articleInfo["picture3"], $articleInfo["picture4"]);
//        } catch (PDOException $e) {
//            return null;
//        }
        return null;
    }
}

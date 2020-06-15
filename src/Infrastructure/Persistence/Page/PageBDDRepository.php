<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Page;

use App\Domain\Page\Page;
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


    /**
     * @param string $name
     * @param string $title
     * @param string $text
     * @param string $picture
     * @param string $video
     * @param string|null $article1Id
     * @param string|null $article2Id
     * @param string|null $article3Id
     * @param string|null $quiz1Id
     * @param string|null $quiz2Id
     * @return bool
     */
    public function addPage(string $name, string $title, string $text, string $picture, string $video, string $music, ?string $article1Id, ?string $article2Id, ?string $article3Id, ?string $quiz1Id, ?string $quiz2Id): bool
    {
        try {
            $sql = "INSERT INTO Page (id, name, title, text, picture, video, music, quiz1_id, quiz2_id, article1_id, article2_id, article3_id) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
            $preparedSQL = $this->pdo->prepare($sql);
            $result = $preparedSQL->execute([$name, $title, $text, $picture, $video, $music, $quiz1Id, $quiz2Id, $article1Id, $article2Id, $article3Id]);
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }


    /**
     * @param int $id
     * @param string $name
     * @param string $title
     * @param string $picture
     * @param string $video
     * @param int|null $article1Id
     * @param int|null $article2Id
     * @param int|null $quiz1Id
     * @param int|null $quizId
     * @return bool
     */
    public function updatePage(int $id, string $name, string $title, string $text, string $picture, string $video, string $music, ?string $article1Id, ?string $article2Id, ?string $article3Id, ?string $quiz1Id, ?string $quiz2Id): bool
    {
        try {
            $sql = "UPDATE Page SET name=?,title=?, text=?, picture=?,video=?, music=?, quiz1_id=?,quiz2_id=?,article1_id=?,article2_id=?,article3_id=? WHERE id=?";
            $preparedSQL = $this->pdo->prepare($sql);
            $paramArray = [$name, $title, $text, $picture, $video, $music, $quiz1Id, $quiz2Id, $article1Id, $article2Id, $article3Id, $id];
            $preparedSQL->execute($paramArray);
            return $preparedSQL->execute($paramArray);
        } catch (PDOException $e) {
            return false;
        }
    }


    /**
     * @param int $pageId
     * @return bool
     */
    public function deletePageById(int $pageId): bool
    {
        try {
            $sql = "DELETE FROM Page WHERE id = ?";
            $preparedSQL = $this->pdo->prepare($sql);
            return $preparedSQL->execute([$pageId]);;
        } catch (PDOException $e) {
            return false;
        }
        return true;
    }

    /**
     * @return array|null
     */
    public function findAll(): ?array
    {
        try {
            $sql = "SELECT * FROM Page";
            $preparedSQL = $this->pdo->prepare($sql);
            $preparedSQL->execute();
            $pages = $preparedSQL->fetchAll();
            return $pages;
        } catch (PDOException $e) {
            return null;
        }
    }

    /**
     * @param int $pageId
     * @return Page|null
     */
    public function findPageById(int $pageId): ?Page
    {
        try {
            $sql = "SELECT * FROM Page WHERE id = ?";
            $preparedSQL = $this->pdo->prepare($sql);
            $preparedSQL->execute([$pageId]);
            $pageInfo = $preparedSQL->fetch();
            return new Page((int)$pageInfo["id"], $pageInfo["name"], $pageInfo["title"], $pageInfo["text"], $pageInfo["picture"], $pageInfo["video"], $pageInfo["music"],  (int)$pageInfo["article1_id"], (int)$pageInfo["article2_id"], (int)$pageInfo["article3_id"], (int)$pageInfo["quiz1_id"], (int)$pageInfo["quiz2_id"]);
        } catch (PDOException $e) {
            return null;
        }
        return null;
    }
}

<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Quiz;

use App\Domain\Quiz\Quiz;
use App\Domain\User\User;
use \PDO;

/**
 * Class UserBDDRepository
 * @package App\Infrastructure\Persistence\User
 */
class QuizBDDRepository
{

    /**
     * @var PDO
     */
    private $pdo;


    /**
     * QuizBDDRepository constructor.
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
     * @param string $question
     * @param string $answer1Text
     * @param int|null $answer1State
     * @param string $answer2Text
     * @param int|null $answer2State
     * @param string|null $answer3Text
     * @param int|null $answer3State
     * @param string|null $answer4Text
     * @param int|null $answer4State
     * @param string $answerTrueText
     * @param string $answerFalseText
     * @return bool
     */
    public function addQuiz(string $question, string $answer1Text, ?int $answer1State, string $answer2Text, ?int $answer2State, ?string $answer3Text, ?int $answer3State, ?string $answer4Text, ?int $answer4State, string $answerTrueText, string $answerFalseText): bool
    {

        try {
            $sql = "INSERT INTO Quiz (question, answer1Text, answer1State, answer2Text, answer2State, answer3Text, answer3State, answer4Text, answer4State, answerTrueText, answerFalseText) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $preparedSQL = $this->pdo->prepare($sql);
            $preparedSQL->execute([$question, $answer1Text, $answer1State, $answer2Text, $answer2State, $answer3Text, $answer3State, $answer4Text, $answer4State, $answerTrueText, $answerFalseText]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    /**
     * @param int $id
     * @param string $question
     * @param string $answer1Text
     * @param int|null $answer1State
     * @param string $answer2Text
     * @param int|null $answer2State
     * @param string|null $answer3Text
     * @param int|null $answer3State
     * @param string|null $answer4Text
     * @param int|null $answer4State
     * @param string $answerTrueText
     * @param string $answerFalseText
     * @return bool
     */
    public function updateQuiz(int $id, string $question, string $answer1Text, ?int $answer1State, string $answer2Text, ?int $answer2State, ?string $answer3Text, ?int $answer3State, ?string $answer4Text, ?int $answer4State, string $answerTrueText, string $answerFalseText): bool
    {
        try {
            $sql = "UPDATE Quiz SET question=?,answer1Text=?,answer1State=?,answer2Text=?,answer2State=?,answer3Text=?,answer3State=?,answer4Text=?,answer4State=?,answerTrueText=?,answerFalseText=? WHERE id=?";
            $preparedSQL = $this->pdo->prepare($sql);
            $paramArray = [$question, $answer1Text, $answer1State, $answer2Text, $answer2State, $answer3Text, $answer3State, $answer4Text, $answer4State, $answerTrueText, $answerFalseText, $id];
            $preparedSQL->execute($paramArray);
            return $preparedSQL->execute($paramArray);
        } catch (PDOException $e) {
            return false;
        }
    }


    /**
     * @param int $quizId
     * @return bool
     */
    public function deleteQuizById(int $quizId): bool
    {
        try {
            $sql = "DELETE FROM Quiz WHERE id = ?";
            $preparedSQL = $this->pdo->prepare($sql);
            return $preparedSQL->execute([$quizId]);;
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
            $sql = "SELECT * FROM Quiz";
            $preparedSQL = $this->pdo->prepare($sql);
            $preparedSQL->execute();
            $quizzes = $preparedSQL->fetchAll();
            return $quizzes;
        } catch (PDOException $e) {
            return null;
        }
    }

    /**
     * @param int $quizId
     * @return Quiz|null
     */
    public function findQuizzById(int $quizId): ?Quiz
    {
        try {
            $sql = "SELECT * FROM Quiz WHERE id = ?";
            $preparedSQL = $this->pdo->prepare($sql);
            $preparedSQL->execute([$quizId]);
            $quizInfo = $preparedSQL->fetch();
            if (isset($quizInfo['id'])) {
                return new Quiz((int)$quizInfo['id'], $quizInfo['question'], $quizInfo['answer1Text'], $quizInfo['answer1State'], $quizInfo['answer2Text'], $quizInfo['answer2State'], $quizInfo['answer3Text'], $quizInfo['answer3State'], $quizInfo['answer4Text'], $quizInfo['answer4State'], $quizInfo['answerTrueText'], $quizInfo['answerFalseText']);
            } else {
                return null;
            }

        } catch (PDOException $e) {
            return null;
        }
    }
}

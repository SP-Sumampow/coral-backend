<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Quiz;

use App\Domain\Quizz\Quiz;
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
     * @param string $question
     * @param string $answer1Text
     * @param string $answer1State
     * @param string $answer2Text
     * @param string $answer2State
     * @param string $answer3Text
     * @param string $answer3State
     * @param string $answer4Text
     * @param string $answer4State
     * @param string $quizAnswerTrueText
     * @param string $quizAnswerFalseText
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
     * @param string $answer1State
     * @param string $answer2Text
     * @param string $answer2State
     * @param string $answer3Text
     * @param string $answer3State
     * @param string $answer4Text
     * @param string $answer4State
     * @param string $quizAnswerTrueText
     * @param string $quizAnswerFalseText
     * @return bool
     */
    public function updateQuiz(int $id, string $question, string $answer1Text, ?string $answer1State, string $answer2Text, ?string $answer2State, ?string $answer3Text, ?string $answer3State, ?string $answer4Text, ?string $answer4State, string $answerTrueText, string $answerFalseText): bool
    {
        try {
            $sql = "UPDATE User SET question=?, answer1Text=?,answer1State=?,answer2State=?,answer2State=?, answer3Text=?, answer3State=?, answer4Text=?, answer4State=?, answerTrueText=?, answerFalseText=? WHERE id = ?";
            $preparedSQL = $this->pdo->prepare($sql);
            $paramArray = [$question, $answer1Text, $answer1State, $answer2Text, $answer2State, $answer3Text, $answer3State, $answer4Text, $answer4State, $answerTrueText, $answerFalseText];
            if (isset($password)) {
                array_push($paramArray, $password);
            }
            array_push($paramArray, $id);
            $preparedSQL->execute($paramArray);
            return true;
        } catch (PDOException $e) {
            return false;
        }
        return true;
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
            $preparedSQL->execute([$quizId]);
            return true;
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
            $sql = "SELECT * FROM Quiz";
            $preparedSQL = $this->pdo->prepare($sql);
            $preparedSQL->execute();
            $users = $preparedSQL->fetchAll();
            return $users;
        } catch (PDOException $e) {
            return null;
        }
        return [];
    }

    /**
     * @param int $UserId
     * @return User|null
     */
    public function findQuizzById(int $quizId): ?Quiz
    {

//        try {
//            $sql = "SELECT * FROM Quiz WHERE id = ?";
//            $preparedSQL = $this->pdo->prepare($sql);
//            $preparedSQL->execute([$quizId]);
//            $quizInfo = $preparedSQL->fetch();
//            var_dump($quizInfo);
//            return new Quiz((int)$quizInfo['id'], $quizInfo['question'], $quizInfo['answer1Text'], $quizInfo['answer1State'], $quizInfo['answer2Text'], $quizInfo['answer2State'], $quizInfo['answer3Text'], $quizInfo['answer3State'], $quizInfo['answer4Text'], $quizInfo['answer4State'], $quizInfo['answerTrueText'], $quizInfo['answerFalseText']);
//        } catch (PDOException $e) {
//            return null;
//        }

        return null;
    }
}

<?php
declare(strict_types=1);

namespace App\Application\Actions\BackOffice\Quizzes;

use App\Application\Actions\Action;
use App\Infrastructure\Persistence\Quiz\QuizBDDRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

class BackOfficeQuizAction extends Action
{
    /**
     * @var QuizBDDRepository
     */
    private $quizBDDRepository;

    public function __construct(LoggerInterface $logger)
    {
        $this->quizBDDRepository = new QuizBDDRepository();
        parent::__construct($logger);
    }

    protected function isPostValid(): bool
    {
        $question = $this->request->getParsedBody()["question"];
        $hasQuestion = isset($question) && !empty($question);

        $answer1Text = $this->request->getParsedBody()["answer1Text"];
        $hasAnswer1Text = isset($answer1Text) && !empty($answer1Text);

        $answer2Text = $this->request->getParsedBody()["answer2Text"];
        $hasAnswer2Text = isset($answer2Text) && !empty($answer2Text);

        $answerTrueText = $this->request->getParsedBody()["answerTrueText"];
        $hasAnswerTrueText = isset($answerTrueText) && !empty($answerTrueText);

        $answerFalseText = $this->request->getParsedBody()["answerFalseText"];
        $hasAnswerFalseText = isset($answerFalseText) && !empty($answerFalseText);

        return $hasQuestion && $hasAnswer1Text && $hasAnswer2Text && $hasAnswerTrueText && $hasAnswerFalseText;
    }

    /**
     * {@inheritdoc}
     */

    protected function action(): Response
    {
        // isUser login
        if (isset($_SESSION["userId"])) {
            $view = Twig::fromRequest($this->request);
            // param id in url
            if (isset($this->args["id"])) {
                // Update user
                if ($this->request->getMethod() == "POST") {
                    if ($this->isPostValid()) {

                        $quizId = (int)$this->args["id"];
                        $question = $this->request->getParsedBody()["question"];

                        $answer1Text = $this->request->getParsedBody()["answer1Text"];
                        $answer1State = 0;
                        if (isset($this->request->getParsedBody()["answer1State"])) {
                            $answer1State = ($this->request->getParsedBody()["answer1State"] == 'on') ? 1 : 0;
                        }

                        $answer2Text = $this->request->getParsedBody()["answer2Text"];
                        $answer2State = 0;
                        if (isset($this->request->getParsedBody()["answer2State"])) {
                            $answer2State = ($this->request->getParsedBody()["answer2State"] == 'on') ? 1 : 0;
                        }

                        $answer3Text = $this->request->getParsedBody()["answer3Text"];
                        $answer3State = 0;
                        if (isset($this->request->getParsedBody()["answer3State"])) {
                            $answer3State = ($this->request->getParsedBody()["answer3State"] == 'on') ? 1 : 0;
                        }

                        $answer4Text = $this->request->getParsedBody()["answer4Text"];
                        $answer4State = 0;
                        if (isset($this->request->getParsedBody()["answer4State"])) {
                            $answer4State = ($this->request->getParsedBody()["answer4State"] == 'on') ? 1 : 0;
                        }

                        $answerTrueText = $this->request->getParsedBody()["answerTrueText"];
                        $answerFalseText = $this->request->getParsedBody()["answerFalseText"];

                        if ($this->quizBDDRepository->updateQuiz($quizId, $question, $answer1Text, $answer1State, $answer2Text, $answer2State, $answer3Text, $answer3State, $answer4Text, $answer4State, $answerTrueText, $answerFalseText)) {
                            $url = "?success=Quiz updated";
                            return $this->response->withRedirect('/backoffice/quizzes' . $url, 301);
                        } else {
                            $url = "?error=Error when add quiz in BDD";
                            return $this->response->withRedirect('/backoffice/quizzes' . $url, 301);
                        }
                    } else {
                        return $view->render($this->response, 'quizzes_back_office.twig', []);
                    }
                } else {
                    $quizId = (int)$this->args["id"];
                    // User in bdd
                    $quiz = $this->quizBDDRepository->findQuizzById($quizId);
                    if (isset($quiz)) {
                        return $view->render($this->response, 'quiz-BackOffice.twig', [
                            'quiz' => $quiz
                        ]);
                    } else {
                        $url = "?error=Quiz not found";
                        return $this->response->withRedirect('/backoffice/quizzes' . $url, 301);
                    }
                }
            } else {
                if ($this->request->getMethod() == "POST") {
                    if ($this->isPostValid()) {

                        $question = $this->request->getParsedBody()["question"];

                        $answer1Text = $this->request->getParsedBody()["answer1Text"];
                        $answer1State = 0;
                        if (isset($this->request->getParsedBody()["answer1State"])) {
                            $answer1State = ($this->request->getParsedBody()["answer1State"] == 'on') ? 1 : 0;
                        }

                        $answer2Text = $this->request->getParsedBody()["answer2Text"];
                        $answer2State = 0;
                        if (isset($this->request->getParsedBody()["answer2State"])) {
                            $answer2State = ($this->request->getParsedBody()["answer2State"] == 'on') ? 1 : 0;
                        }

                        $answer3Text = $this->request->getParsedBody()["answer3Text"];
                        $answer3State = 0;
                        if (isset($this->request->getParsedBody()["answer4State"])) {
                            $answer3State = ($this->request->getParsedBody()["answer3State"] == 'on') ? 1 : 0;
                        }

                        $answer4Text = $this->request->getParsedBody()["answer4Text"];
                        $answer4State = 0;
                        if (isset($this->request->getParsedBody()["answer4State"])) {
                            $answer4State = ($this->request->getParsedBody()["answer4State"] == 'on') ? 1 : 0;
                        }

                        $answerTrueText = $this->request->getParsedBody()["answerTrueText"];
                        $answerFalseText = $this->request->getParsedBody()["answerFalseText"];

                        if ($this->quizBDDRepository->addQuiz($question, $answer1Text, $answer1State, $answer2Text, $answer2State, $answer3Text, $answer3State, $answer4Text, $answer4State, $answerTrueText, $answerFalseText)) {
                            $url = "?success=Quiz added";
                            return $this->response->withRedirect('/backoffice/quizzes' . $url, 301);
                        } else {
                            $url = "?error=Error when add quiz in BDD";
                            return $this->response->withRedirect('/backoffice/quizzes' . $url, 301);
                        }
                    }
                    return $view->render($this->response, 'quiz-BackOffice.twig', [
                        "error" => 'Field missing'
                    ]);
                } else {
                    return $view->render($this->response, 'quiz-BackOffice.twig', []);
                }
            }
        } else {
            return $this->response->withRedirect('/', 301);
        }
    }
}
<?php
declare(strict_types=1);

namespace App\Application\Actions\BackOffice\Quizzes;

use App\Application\Actions\Action;
use App\Infrastructure\Persistence\Quiz\QuizBDDRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

class BackOfficeDeleteQuizAction extends Action
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

    /**
     * {@inheritdoc}
     */

    protected function action(): Response
    {
        $view = Twig::fromRequest($this->request);
        // isUser login
        if (isset($_SESSION["userId"])) {
            // param id in url
            if (isset($this->args["id"])) {
                $quizId = (int)$this->args["id"];
                // Quiz in bdd
                $isSuccess = $this->quizBDDRepository->deleteQuizById($quizId);
                if ($isSuccess) {
                    $url = "?success=Delete quiz ".$quizId;
                    return $this->response->withRedirect('/backoffice/quizzes'.$url, 301);
                } else {
                    $url = "?error=Quiz " . $quizId." not found";
                    return $this->response->withRedirect('/backoffice/quizzes'.$url, 301);
                }
            } else {
                return $view->render($this->response, 'quizzes-BackOffice.twig', []);
            }
        } else {
            return $this->response->withRedirect('/', 301);
        }
    }
}
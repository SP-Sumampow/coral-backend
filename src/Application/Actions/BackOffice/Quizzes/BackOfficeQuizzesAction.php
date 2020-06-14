<?php

declare(strict_types=1);

namespace App\Application\Actions\BackOffice\Quizzes;

use App\Application\Actions\Action;
use App\Infrastructure\Persistence\Quiz\QuizBDDRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

class BackOfficeQuizzesAction extends Action
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
        if (isset($_SESSION["userId"])) {
            if ($this->request->getMethod() == '')
                $data = [];
            $data["quizzes"] = $this->quizBDDRepository->findAll();
            if (isset($this->request->getQueryParams()["error"])) {
                $data["error"] = $this->request->getQueryParams()["error"];
            }
            if (isset($this->request->getQueryParams()["success"])) {
                $data["success"] = $this->request->getQueryParams()["success"];
            }
            $view = Twig::fromRequest($this->request);
            return $view->render($this->response, 'quizzes-BackOffice.twig', $data);
        } else {
            return $this->response->withRedirect('/', 301);
        }
    }
}
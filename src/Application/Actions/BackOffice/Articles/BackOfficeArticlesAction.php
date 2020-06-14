<?php
declare(strict_types=1);

namespace App\Application\Actions\BackOffice\Articles;

use App\Application\Actions\Action;
use App\Infrastructure\Persistence\Article\ArticleBDDRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

class BackOfficeArticlesAction extends Action
{

    /**
     * @var ArticleBDDRepository
     */
    private $articleBDDRepository;

    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
        $this->articleBDDRepository = new ArticleBDDRepository();
    }

    /**
     * {@inheritdoc}
     */

    protected function action(): Response
    {
        if (isset($_SESSION["userId"])) {
            if ($this->request->getMethod() == '')
                $data = [];
            $data["articles"] = $this->articleBDDRepository->findAll();
            if (isset($this->request->getQueryParams()["error"])) {
                $data["error"] = $this->request->getQueryParams()["error"];
            }
            if (isset($this->request->getQueryParams()["success"])) {
                $data["success"] = $this->request->getQueryParams()["success"];
            }
            $view = Twig::fromRequest($this->request);
            return $view->render($this->response, 'articles-BackOffice.twig', $data);
        } else {
            return $this->response->withRedirect('/', 301);
        }
    }
}

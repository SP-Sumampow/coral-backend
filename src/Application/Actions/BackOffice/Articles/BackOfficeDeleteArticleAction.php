<?php
declare(strict_types=1);

namespace App\Application\Actions\BackOffice\Articles;

use App\Application\Actions\Action;
use App\Infrastructure\Persistence\Article\ArticleBDDRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

class BackOfficeDeleteArticleAction extends Action
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
        $view = Twig::fromRequest($this->request);
        // isUser login
        if (isset($_SESSION["userId"])) {
            // param id in url
            if (isset($this->args["id"])) {
                $articleId = (int)$this->args["id"];
                // Quiz in bdd
                $isSuccess = $this->articleBDDRepository->deleteArticleById($articleId);
                if ($isSuccess) {
                    $url = "?success=Delete article ".$articleId;
                    return $this->response->withRedirect('/backoffice/articles'.$url, 301);
                } else {
                    $url = "?error=Article " . $articleId." not found";
                    return $this->response->withRedirect('/backoffice/articles'.$url, 301);
                }
            } else {
                return $view->render($this->response, 'articles_back_office.twig', []);
            }
        } else {
            return $this->response->withRedirect('/', 301);
        }
    }
}

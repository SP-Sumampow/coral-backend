<?php
declare(strict_types=1);

namespace App\Application\Actions\BackOffice\Pages;

use App\Application\Actions\Action;
use App\Infrastructure\Persistence\Article\ArticleBDDRepository;
use App\Infrastructure\Persistence\Page\PageBDDRepository;
use App\Infrastructure\Persistence\Quiz\QuizBDDRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

class BackOfficePageDeleteAction extends Action
{

    /**
     * @var PageBDDRepository
     */
    private $pageBDDRepository;

    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
        $this->pageBDDRepository = new PageBDDRepository();
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
                $pageId = (int)$this->args["id"];
                // Page in bdd
                $isSuccess = $this->pageBDDRepository->deletePageById($pageId);
                if ($isSuccess) {
                    $url = "?success=Delete page ".$pageId;
                    return $this->response->withRedirect('/backoffice/pages'.$url, 301);
                } else {
                    $url = "?error=Page " . $pageId." not found";
                    return $this->response->withRedirect('/backoffice/pages'.$url, 301);
                }
            } else {
                return $view->render($this->response, 'pages-back_office.twig', []);
            }
        } else {
            return $this->response->withRedirect('/', 301);
        }
    }
}

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



    protected function isPostValid(): bool
    {
        $name = $this->request->getParsedBody()["name"];
        $hasName = isset($name) && !empty($name);

        $title = $this->request->getParsedBody()["title"];
        $hasTitle = isset($title) && !empty($title);

        $text = $this->request->getParsedBody()["text"];
        $hasText = isset($text);

        $picture = $this->request->getParsedBody()["picture"];
        $hasPicture = isset($picture);

        $video = $this->request->getParsedBody()["video"];
        $hasVideo = isset($video);

        $article1 = $this->request->getParsedBody()["article1Id"];
        $hasArticle1 = isset($article1);

        $article2 = $this->request->getParsedBody()["article2Id"];
        $hasArticle2 = isset($article2);

        $article3 = $this->request->getParsedBody()["article3Id"];
        $hasArticle3 = isset($article3);

        $quiz1Id = $this->request->getParsedBody()["quiz1Id"];
        $hasQuiz1Id = isset($quiz1Id);

        $quiz2Id = $this->request->getParsedBody()["quiz2Id"];
        $hasQuiz2Id = isset($quiz2Id);


        return $hasName && $hasTitle && $hasText && $hasPicture && $hasVideo && $hasArticle1 && $hasArticle2 && $hasArticle3 && $hasQuiz1Id && $hasQuiz2Id;
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

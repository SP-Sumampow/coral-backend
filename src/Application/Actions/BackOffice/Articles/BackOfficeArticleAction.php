<?php
declare(strict_types=1);

namespace App\Application\Actions\BackOffice\Articles;

use App\Application\Actions\Action;
use App\Infrastructure\Persistence\Article\ArticleBDDRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

/**
 * Class BackOfficeArticleAction
 * @package App\Application\Actions\BackOffice\Articles
 */
class BackOfficeArticleAction extends Action
{

    /**
     * @var ArticleBDDRepository
     */
    private $articleBDDRepository;

    /**
     * BackOfficeArticleAction constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
        $this->articleBDDRepository = new ArticleBDDRepository();
    }

    /**
     * @return bool
     */
    protected function isPostValid(): bool
    {
        $name = $this->request->getParsedBody()["name"];
        $hasName = isset($name) && !empty($name);

        $title = $this->request->getParsedBody()["title"];
        $hasTitle = isset($title);

        $text = $this->request->getParsedBody()["text"];
        $hasText = isset($text);

        $video = $this->request->getParsedBody()["video"];
        $hasVideo = isset($video);

        $picture1 = $this->request->getParsedBody()["picture1"];
        $hasPicture1 = isset($picture1);

        $picture2 = $this->request->getParsedBody()["picture2"];
        $hasPicture2 = isset($picture2);

        $picture3 = $this->request->getParsedBody()["picture3"];
        $hasPicture3 = isset($picture3);

        $picture4 = $this->request->getParsedBody()["picture4"];
        $hasPicture4 = isset($picture4);


        return $hasName && $hasTitle && $hasText && $hasVideo && $hasPicture1 && $hasPicture2 && $hasPicture3 && $hasPicture4;
    }

    /**
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
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

                        $articleId = (int)$this->args["id"];
                        $name = $this->request->getParsedBody()["name"];
                        $title = $this->request->getParsedBody()["title"];
                        $text = $this->request->getParsedBody()["text"];
                        $video = $this->request->getParsedBody()["video"];
                        $picture1 = $this->request->getParsedBody()["picture1"];
                        $picture2 = $this->request->getParsedBody()["picture2"];
                        $picture3 = $this->request->getParsedBody()["picture3"];
                        $picture4 = $this->request->getParsedBody()["picture4"];

                        if ($this->articleBDDRepository->updateArticle($articleId, $name, $title, $text, $video, $picture1, $picture2, $picture3, $picture4)) {
                            $url = "?success=Article updated";
                            return $this->response->withRedirect('/backoffice/articles' . $url, 301);
                        } else {
                            $url = "?error=Error when add articles in BDD";
                            return $this->response->withRedirect('/backoffice/articles' . $url, 301);
                        }
                    } else {
                        return $view->render($this->response, 'articles_back_office.twig', []);
                    }
                } else {
                    $articleId = (int)$this->args["id"];
                    // Article in bdd
                    $article = $this->articleBDDRepository->findArticleById($articleId);
                    if (isset($article)) {
                        return $view->render($this->response, 'article-BackOffice.twig', [
                            'article' => $article
                        ]);
                    } else {
                        $url = "?error=Quiz not found";
                        return $this->response->withRedirect('/backoffice/quizzes' . $url, 301);
                    }
                }
            } else {
                if ($this->request->getMethod() == "POST") {
                    if ($this->isPostValid()) {

                        $name = $this->request->getParsedBody()["name"];
                        $title = $this->request->getParsedBody()["title"];
                        $text = $this->request->getParsedBody()["text"];
                        $video = $this->request->getParsedBody()["video"];
                        $picture1 = $this->request->getParsedBody()["picture1"];
                        $picture2 = $this->request->getParsedBody()["picture2"];
                        $picture3 = $this->request->getParsedBody()["picture3"];
                        $picture4 = $this->request->getParsedBody()["picture4"];

                        if ($this->articleBDDRepository->addArticle($name, $title, $text, $video, $picture1, $picture2, $picture3, $picture4)) {
                            $url = "?success=Quiz added";
                            return $this->response->withRedirect('/backoffice/articles' . $url, 301);
                        } else {
                            $url = "?error=Error when add article in BDD";
                            return $this->response->withRedirect('/backoffice/articles' . $url, 301);
                        }
                    }
                    return $view->render($this->response, 'article-BackOffice.twig', [
                        "error" => 'Field missing'
                    ]);
                } else {
                    return $view->render($this->response, 'article-BackOffice.twig', []);
                }
            }
        } else {
            return $this->response->withRedirect('/', 301);
        }
    }
}

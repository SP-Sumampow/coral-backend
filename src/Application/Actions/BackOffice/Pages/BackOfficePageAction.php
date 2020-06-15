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

class BackOfficePageAction extends Action
{

    /**
     * @var ArticleBDDRepository
     */
    private $pageBDDRepository;

    /**
     * @var QuizBDDRepository
     */
    private $quizBDDRepository;

    /**
     * @var ArticleBDDRepository
     */
    private $articleBDDRepository;

    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
        $this->pageBDDRepository = new PageBDDRepository();
        $this->quizBDDRepository = new QuizBDDRepository();
        $this->articleBDDRepository = new ArticleBDDRepository();
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

        $music = $this->request->getParsedBody()["music"];
        $hasMusic = isset($music);

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


        return $hasName && $hasTitle && $hasText && $hasPicture && $hasVideo && $hasMusic && $hasArticle1 && $hasArticle2 && $hasArticle3 && $hasQuiz1Id && $hasQuiz2Id;
    }

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

                        $pageId = (int)$this->args["id"];
                        $name = $this->request->getParsedBody()["name"];
                        $title = $this->request->getParsedBody()["title"];
                        $text = $this->request->getParsedBody()["text"];
                        $picture = $this->request->getParsedBody()["picture"];
                        $video = $this->request->getParsedBody()["video"];
                        $music = $this->request->getParsedBody()["music"];
                        $article1Id = $this->request->getParsedBody()["article1Id"];
                        $article2Id = $this->request->getParsedBody()["article2Id"];
                        $article3Id = $this->request->getParsedBody()["article3Id"];
                        $quiz1Id = $this->request->getParsedBody()["quiz1Id"];
                        $quiz2Id = $this->request->getParsedBody()["quiz2Id"];

                        if ($this->pageBDDRepository->updatePage($pageId, $name, $title, $text, $picture, $video, $music, $article1Id, $article2Id, $article3Id, $quiz1Id, $quiz2Id)) {
                            $url = "?success=Page updated";
                            return $this->response->withRedirect('/backoffice/pages' . $url, 301);
                        } else {
                            $url = "?error=Error when add page in BDD";
                            return $this->response->withRedirect('/backoffice/pages' . $url, 301);
                        }
                    } else {
                        return $view->render($this->response, 'articles_back_office.twig', []);
                    }
                } else {
                    $pageId = (int)$this->args["id"];
                    // Article in bdd
                    $page = $this->pageBDDRepository->findPageById($pageId);
                    if (isset($page)) {

                        return $view->render($this->response, 'page-BackOffice.twig', [
                            'page' => $page,
                            'quizzes' => $this->quizBDDRepository->findAll(),
                            'articles' => $this->articleBDDRepository->findAll()
                        ]);
                    } else {
                        $url = "?error=Quiz not found";
                        return $this->response->withRedirect('/backoffice/pages' . $url, 301);
                    }
                }
            } else {
                if ($this->request->getMethod() == "POST") {
                    if ($this->isPostValid()) {

                        $name = $this->request->getParsedBody()["name"];
                        $title = $this->request->getParsedBody()["title"];
                        $text = $this->request->getParsedBody()["text"];
                        $picture = $this->request->getParsedBody()["picture"];
                        $video = $this->request->getParsedBody()["video"];
                        $music = $this->request->getParsedBody()["music"];
                        $article1Id = $this->request->getParsedBody()["article1Id"];
                        $article2Id = $this->request->getParsedBody()["article2Id"];
                        $article3Id = $this->request->getParsedBody()["article3Id"];
                        $quiz1Id = $this->request->getParsedBody()["quiz1Id"];
                        $quiz2Id = $this->request->getParsedBody()["quiz2Id"];

                        if ($this->pageBDDRepository->addPage($name, $title, $text, $picture, $video, $music, $article1Id, $article2Id, $article3Id, $quiz1Id, $quiz2Id)) {
                            $url = "?success=Page added";
                            return $this->response->withRedirect('/backoffice/pages' . $url, 301);
                        } else {
                            $url = "?error=Error when add page in BDD";
                            return $this->response->withRedirect('/backoffice/pages' . $url, 301);
                        }
                    } else {
                        return $view->render($this->response, 'page-BackOffice.twig', [
                            "error" => 'Field missing',
                            'quizzes' => $this->quizBDDRepository->findAll(),
                            'articles' => $this->articleBDDRepository->findAll()
                        ]);
                    }
                } else {
                    return $view->render($this->response, 'page-BackOffice.twig', [
                        'quizzes' => $this->quizBDDRepository->findAll(),
                        'articles' => $this->articleBDDRepository->findAll()
                    ]);
                }
            }
        } else {
            return $this->response->withRedirect('/', 301);
        }
    }
}

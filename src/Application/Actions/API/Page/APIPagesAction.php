<?php
declare(strict_types=1);

namespace App\Application\Actions\API\Page;

use App\Application\Actions\Action;
use App\Infrastructure\Persistence\Article\ArticleBDDRepository;
use App\Infrastructure\Persistence\Page\PageBDDRepository;
use App\Infrastructure\Persistence\Quiz\QuizBDDRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class APIPagesAction extends Action
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

    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        if (isset($this->args["id"])) {
            $pageId = (int)$this->args["id"];
            $page = $this->pageBDDRepository->findPageById($pageId);

            if (isset($page)) {
                $pageInfo = [
                    'id' => $page->id,
                    'name' => $page->name,
                    'title' => $page->title,
                    'text' => $page->text,
                    'picture' => $page->picture,
                    'video' => $page->video,
                    'music' => $page->music,
                    "article1" => $this->articleBDDRepository->findArticleById((int)$page->article1Id),
                    "article2" => $this->articleBDDRepository->findArticleById((int)$page->article2Id),
                    "article3" => $this->articleBDDRepository->findArticleById((int)$page->article3Id),
                    "quiz1" => $this->quizBDDRepository->findQuizzById((int)$page->quiz1Id),
                    "quiz2" => $this->quizBDDRepository->findQuizzById((int)$page->quiz2Id)
                ];
                return $this->respondWithData($pageInfo);
            } else {
                return $this->respondWithData(["error" => "Page id not found"], 404);
            }
        } else {
            return $this->respondWithData(["error" => "Page id is required"], 404);
        }

    }
}

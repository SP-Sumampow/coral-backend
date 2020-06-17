<?php
declare(strict_types=1);

namespace App\Application\Actions\API\Page;

use App\Application\Actions\Action;
use App\Infrastructure\Persistence\Article\ArticleBDDRepository;
use App\Infrastructure\Persistence\Page\PageBDDRepository;
use App\Infrastructure\Persistence\Quiz\QuizBDDRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

/**
 * Class APIPagesAction
 * @package App\Application\Actions\API\Page
 */
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

    /**
     * APIPagesAction constructor.
     * @param LoggerInterface $logger
     */
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

        $pagesInfo = [];
        $pages = $this->pageBDDRepository->findAll();


        foreach ($pages as $page) {

            $pageInfo = [
                'id' => $page["id"],
                'name' => $page["name"],
                'title' => $page["title"],
                'text' => $page["text"],
                'picture' => $page["picture"],
                'video' => $page["video"],
                'music' => $page["music"],
                "article1" => $this->articleBDDRepository->findArticleById((int)$page["article1_id"]),
                "article2" => $this->articleBDDRepository->findArticleById((int)$page["article2_id"]),
                "article3" => $this->articleBDDRepository->findArticleById((int)$page["article3_id"]),
                "quiz1" => $this->quizBDDRepository->findQuizzById((int)$page["quiz1_id"]),
                "quiz2" => $this->quizBDDRepository->findQuizzById((int)$page["quiz2_id"])
            ];
            array_push($pagesInfo, $pageInfo);
        }

        return $this->respondWithData($pagesInfo);
    }
}

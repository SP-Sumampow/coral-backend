<?php
declare(strict_types=1);

namespace App\Domain\Page;

use App\Domain\Article\Article;
use App\Domain\Quiz\Quiz;
use JsonSerializable;

/**
 * Class Page
 * @package App\Domain\Quizz
 */
class Page implements JsonSerializable
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $picture;

    /**
     * @var string
     */
    public $video;

    /**
     * @var ?int
     */
    public $article1Id;

    /**
     * @var ?int
     */
    public $article2Id;

    /**
     * @var ?int
     */
    public $quiz1Id;

    /**
     * @var int
     */
    public $quiz2Id;


    public function __construct(int $id, string $name, string $title, string $picture, string $video, ?int $article1Id, ?int $article2Id, ?int $quiz1Id, ?int $quiz2Id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->title = $title;
        $this->picture = $picture;
        $this->video = $video;
        $this->article1Id = $article1Id;
        $this->article2Id = $article2Id;
        $this->quiz1Id = $quiz1Id;
        $this->quiz2Id = $quiz2Id;
    }


    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'title' => $this->title,
            'picture' => $this->picture,
            'video' => $this->video,
            'article1Id' => $this->article1Id,
            'article2Id' => $this->article2Id,
            'quiz1Id' => $this->quiz1Id,
            'quiz2Id' => $this->quiz2Id
        ];
    }
}
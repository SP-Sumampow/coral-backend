<?php
declare(strict_types=1);

namespace App\Domain\Article;

use JsonSerializable;

/**
 * Class Article
 * @package App\Domain\Article
 */
class Article implements JsonSerializable
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
    public $text;

    /**
     * @var string
     */
    public $video;

    /**
     * @var string
     */
    public $picture1;

    /**
     * @var string
     */
    public $picture2;

    /**
     * @var string
     */
    public $picture3;

    /**
     * @var string
     */
    public $picture4;


    /**
     * Article constructor.
     * @param int $id
     * @param string $name
     * @param string $title
     * @param string $text
     * @param string $video
     * @param string $picture1
     * @param string $picture2
     * @param string $picture3
     * @param string $picture4
     */
    public function __construct(int $id, string $name, string $title, string $text, string $video, string $picture1, string $picture2, string $picture3, string $picture4)
    {
        $this->id = $id;
        $this->name = $name;
        $this->title = $title;
        $this->text = $text;
        $this->video = $video;
        $this->picture1 = $picture1;
        $this->picture2 = $picture2;
        $this->picture3 = $picture3;
        $this->picture4 = $picture4;
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
            'text' => $this->text,
            'video' => $this->video,
            'picture1' => $this->picture1,
            'picture2' => $this->picture2,
            'picture3' => $this->picture3,
            'picture4' => $this->picture4
        ];
    }
}

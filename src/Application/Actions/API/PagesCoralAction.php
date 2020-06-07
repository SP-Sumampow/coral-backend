<?php
declare(strict_types=1);

namespace App\Application\Actions\Api;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class PagesCoralAction extends Action
{
    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
    }

    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $data = array(
            array(
                "id" => 1,
                "title" => "Sentiany Priska Sumampow",
                "article" => "bla bla bla",
                "picture" =>  null,
                "video" => null
            ),
            array(
                "id" => 1,
                "title" => "Sentiany Priska Sumampow",
                "article" => "bla bla bla",
                "picture" =>  null,
                "video" => null
            ),
            array(
                "id" => 1,
                "title" => "Sentiany Priska Sumampow",
                "article" => "bla bla bla",
                "picture" =>  null,
                "video" => null
            ),
            array(
                "id" => 1,
                "title" => "Sentiany Priska Sumampow",
                "article" => "bla bla bla",
                "picture" =>  null,
                "video" => null
            ),
            array(
                "id" => 1,
                "title" => "Sentiany Priska Sumampow",
                "article" => "bla bla bla",
                "picture" =>  null,
                "video" => null
            ),
            array(
                "id" => 1,
                "title" => "Sentiany Priska Sumampow",
                "article" => "bla bla bla",
                "picture" =>  null,
                "video" => null
            )
        );
        return $this->respondWithData($data);
    }
}

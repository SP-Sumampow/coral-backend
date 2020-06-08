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
                "id" => 01,
                "name" => "Explication",
                "title" => "Explication",
                "article" => "bla bla bla",
                "picture" =>  null,
                "video" => null
            ),
            array(
                "id" => 02,
                "name" => "Introduction",
                "title" => "Introduction",
                "article" => "bla bla bla",
                "picture" =>  null,
                "video" => null
            ),
            array(
                "id" => 03,
                "name" => "What is coral?",
                "title" => "Qu'est ce qu'un corail ?",
                "article" => "bla bla bla",
                "picture" =>  null,
                "video" => null
            ),
            array(
                "id" => 04,
                "name" => "Role of the corals",
                "title" => "Quel est leur rôle ?",
                "article" => "bla bla bla",
                "picture" =>  null,
                "video" => null
            ),
            array(
                "id" => 05,
                "name" => "Actual situation",
                "title" => "Mais que se passe t-il ?",
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

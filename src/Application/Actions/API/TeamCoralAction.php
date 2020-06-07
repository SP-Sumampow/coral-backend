<?php
declare(strict_types=1);

namespace App\Application\Actions\Api;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class TeamCoralAction extends Action
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
                "id" => "admin-01",
                "name" => "Sentiany Priska Sumampow"
            ),
            array(
                "id" => "admin-02",
                "name" => "Anthony Roux"
            ),
            array(
                "id" => "admin-03",
                "name" => "Annie Tran"
            ),
            array(
                "id" => "admin-04",
                "name" => "Nicolas Jesenberger"
            ),
            array(
                "id" => "admin-05",
                "name" => "Pierre=Marten Alexis"
            ),
            array(
                "id" => "admin-06",
                "name" => "Axel Charel"
            )
        );
        return $this->respondWithData($data);
    }
}

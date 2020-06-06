<?php
declare(strict_types=1);

namespace App\Application\Actions\Api;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class ListOfCoralAction extends Action
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
            'island' => array(
                array(
                    'name'=> 'Manado'
                ),
                array(
                    'name'=> 'Reunion island'
                )
            ),
        );
        return $this->respondWithData($data);
    }
}

<?php
declare(strict_types=1);

namespace App\Application\Actions\Backend;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class LoginAction extends Action
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
            'login'
        );
        return $this->respondWithData($data);
    }
}

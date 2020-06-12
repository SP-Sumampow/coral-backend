<?php
declare(strict_types=1);

namespace App\Application\Actions\BackOffice;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

class HomeBackOfficeAction extends Action
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
        $view = Twig::fromRequest($this->request);

        if (isset($_SESSION["userId"])) {
            return $view->render($this->response, 'home-BackOffice.twig', [
                'name' => "coucou"
            ]);
        }
    }
}

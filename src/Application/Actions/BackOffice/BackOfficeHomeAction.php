<?php
declare(strict_types=1);

namespace App\Application\Actions\BackOffice;

use App\Application\Actions\Action;
use App\Infrastructure\Persistence\User\UserBDDRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

/**
 * Class BackOfficeHomeAction
 * @package App\Application\Actions\BackOffice
 */
class BackOfficeHomeAction extends Action
{
    /**
     * @var UserBDDRepository
     */
    private $userBDDRepository;

    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
        $this->userBDDRepository = new UserBDDRepository();
    }

    /**
     * {@inheritdoc}
     */

    protected function action(): Response
    {
        $view = Twig::fromRequest($this->request);

        if (isset($_SESSION["userId"])) {
            return $view->render($this->response, 'home-BackOffice.twig', []);
        }
    }
}

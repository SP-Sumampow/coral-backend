<?php
declare(strict_types=1);

namespace App\Application\Actions\BackOffice\Users;

use App\Application\Actions\Action;
use App\Infrastructure\Persistence\User\UserBDDRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

class BackOfficeUsersAction extends Action
{
    /**
     * @var UserBDDRepository
     */
    private $userBDDRepository;

    public function __construct(LoggerInterface $logger)
    {
        $this->userBDDRepository = new UserBDDRepository();
        parent::__construct($logger);
    }

    /**
     * {@inheritdoc}
     */

    protected function action(): Response
    {
        if (isset($_SESSION["userId"])) {
            $view = Twig::fromRequest($this->request);
            return $view->render($this->response, 'users-BackOffice.twig', [
                'users' => $this->userBDDRepository->findAll()
            ]);
        } else {
            return $this->response->withRedirect('/', 301);
        }
    }
}
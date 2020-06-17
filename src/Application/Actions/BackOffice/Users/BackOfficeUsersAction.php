<?php
declare(strict_types=1);

namespace App\Application\Actions\BackOffice\Users;

use App\Application\Actions\Action;
use App\Infrastructure\Persistence\User\UserBDDRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

/**
 * Class BackOfficeUsersAction
 * @package App\Application\Actions\BackOffice\Users
 */
class BackOfficeUsersAction extends Action
{
    /**
     * @var UserBDDRepository
     */
    private $userBDDRepository;

    /**
     * BackOfficeUsersAction constructor.
     * @param LoggerInterface $logger
     */
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
            if ($this->request->getMethod() == '')
            $data = [];
            $data["users"] = $this->userBDDRepository->findAll();
            if (isset($this->request->getQueryParams()["error"])) {
                $data["error"] = $this->request->getQueryParams()["error"];
            }
            if (isset($this->request->getQueryParams()["success"])) {
                $data["success"] = $this->request->getQueryParams()["success"];
            }
            $view = Twig::fromRequest($this->request);
            return $view->render($this->response, 'users-BackOffice.twig', $data);
        } else {
            return $this->response->withRedirect('/', 301);
        }
    }
}
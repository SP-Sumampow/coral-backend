<?php
declare(strict_types=1);

namespace App\Application\Actions\BackOffice\Users;

use App\Application\Actions\Action;
use App\Infrastructure\Persistence\User\UserBDDRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

class BackOfficeUserAction extends Action
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
        $view = Twig::fromRequest($this->request);
        // isUser login
        if (isset($_SESSION["userId"])) {
            // param id in url
            if (isset($this->args["id"])) {
                $userId = (int)$this->args["id"];
                // User in bdd
                $user = $this->userBDDRepository->findUserById($userId);
                if (isset($user)) {
                    return $view->render($this->response, 'user-BackOffice.twig', [
                        'user' => $this->userBDDRepository->findUserById($userId)
                    ]);
                } else {
                    $url = "?error=User not found";
                    return $this->response->withRedirect('/backoffice/users'.$url, 301);
                }
            } else {
                return $view->render($this->response, 'user-BackOffice.twig', []);
            }
        } else {
            return $this->response->withRedirect('/', 301);
        }
    }
}
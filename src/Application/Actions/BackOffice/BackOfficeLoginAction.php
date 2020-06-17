<?php
declare(strict_types=1);

namespace App\Application\Actions\BackOffice;

use App\Application\Actions\Action;
use App\Infrastructure\Persistence\User\UserBDDRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

/**
 * Class BackOfficeLoginAction
 * @package App\Application\Actions\BackOffice
 */
class BackOfficeLoginAction extends Action
{
    /**
     * @var UserBDDRepository
     */
    private $userBDDRepository;

    /**
     * BackOfficeLoginAction constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
        $this->userBDDRepository = new UserBDDRepository();
    }


    /**
     * @param string $email
     * @param string $password
     * @return int|null
     */
    protected function isLogin(string $email, string $password): ?int {
        return $this->userBDDRepository->findUserIdByEmailPassword($email, $password);
    }

    /**
     * {@inheritdoc}
     */

    protected function action(): Response
    {
        $data = [];
        if (isset($_SESSION["userId"])) {
            return $this->response->withRedirect('/', 301);
        }

        if ($this->request->getMethod() == "POST") {
            $data = $this->request->getParsedBody();
            // verification
            if (isset($data["email"]) && !empty($data["email"]) && isset($data["password"]) && !empty($data["password"])) {
                $email = $data["email"];
                $password = $data["password"];
                // login
                $userId = $this->isLogin($email, $password);
                if (isset($userId)) {
                    $_SESSION["userId"] = $userId;
                    return $this->response->withRedirect('/', 301);
                } else {
                    $data["error"] = 'Login doesn\'t exist';
                }
            } else {
                $data["error"] = 'Missing email or password';;
            }
        }

        $view = Twig::fromRequest($this->request);
        return $view->render($this->response, 'login-backOffice.twig', $data);


    }
}

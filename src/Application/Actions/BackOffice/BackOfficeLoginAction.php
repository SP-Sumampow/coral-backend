<?php
declare(strict_types=1);

namespace App\Application\Actions\BackOffice;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

class BackOfficeLoginAction extends Action
{
    private $view;

    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
    }


    protected function isLogin(string $email, string $password): bool {
        $fakeEmail = "priska@lalaland.fr";
        $fakePassword = "keke";
        return $email == $fakeEmail && $password == $fakePassword;
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
            if (isset($data["email"]) && isset($data["password"])) {
                $email = $data["email"];
                $password = $data["password"];
                // login
                if ($this->isLogin($email, $password)) {
                    $_SESSION["userId"] = "1";
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

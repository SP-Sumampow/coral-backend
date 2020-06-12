<?php
declare(strict_types=1);

namespace App\Application\Actions\Backend;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

class LoginAction extends Action
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
        $view = Twig::fromRequest($this->request);

        if (isset($_SESSION["userId"])) {
            return $view->render($this->response, 'backoffice.twig', [
                'name' => "coucou"
            ]);
        }

        $data = $this->request->getParsedBody();
        // verification
        if (isset($data["email"]) && isset($data["password"])) {
            $email = $data["email"];
            $password = $data["password"];
            // login
            if ($this->isLogin($email, $password)) {
                $_SESSION["userId"] = "1";
                return $view->render($this->response, 'backoffice.twig', [
                    'name' => "coucou"
                ]);
            } else {
                $data = ['error' => "Login doesnt exist"];
                return $this->respondWithData($data,401 );
            }
        } else {
            $data = ['error' => 'Missing email or passowrd'];
            return $this->respondWithData($data,400 );
        }


    }
}

<?php
declare(strict_types=1);

namespace App\Application\Actions\BackOffice\Users;

use App\Application\Actions\Action;
use App\Infrastructure\Persistence\User\UserBDDRepository;
use phpDocumentor\Reflection\Types\Boolean;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

/**
 * Class BackOfficeUserAction
 * @package App\Application\Actions\BackOffice\Users
 */
class BackOfficeUserAction extends Action
{
    /**
     * @var UserBDDRepository
     */
    private $userBDDRepository;

    /**
     * BackOfficeUserAction constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
        $this->userBDDRepository = new UserBDDRepository();
    }

    /**
     * {@inheritdoc}
     */

    protected function isPostValid(bool $isPasswordOptional): bool
    {
        $email = $this->request->getParsedBody()["email"];
        $hasEmailValid = isset($email) && !empty($email);

        $lastname = $this->request->getParsedBody()["lastname"];
        $hasLastName = isset($lastname) && !empty($lastname);

        $firstname = $this->request->getParsedBody()["firstname"];
        $hasFirstname = isset($firstname) && !empty($firstname);

        $picture = $this->request->getParsedBody()["picture"];
        $hasPicture = isset($picture) && !empty($picture);

        $hasPasword = false;
        if ($isPasswordOptional) {
            $hasPasword = true;
        } else {
            $password = $this->request->getParsedBody()["password"];
            $hasPasword = isset($password) && !empty($password);
        }

        $description = $this->request->getParsedBody()["description"];
        $isDescription = isset($description) && !empty($description);

        return $hasEmailValid && $hasLastName && $hasFirstname && $hasPicture && $hasPasword && $isDescription;
    }

    /**
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    protected function action(): Response
    {
        // isUser login
        if (isset($_SESSION["userId"])) {
            $view = Twig::fromRequest($this->request);
            // param id in url
            if (isset($this->args["id"])) {
                // Update user
                if ($this->request->getMethod() == "POST") {
                    if ($this->isPostValid(true)) {
                        $userId = (int)$this->args["id"];
                        $email = $this->request->getParsedBody()["email"];
                        $lastname = $this->request->getParsedBody()["lastname"];
                        $firstname = $this->request->getParsedBody()["firstname"];
                        $picture = $this->request->getParsedBody()["picture"];
                        $password = $this->request->getParsedBody()["password"];
                        $description = $this->request->getParsedBody()["description"];

                        if ($this->userBDDRepository->updateUser($userId, $email, $firstname, $lastname, $picture, $password, $description)) {
                            $url = "?success=User updated";
                            return $this->response->withRedirect('/backoffice/users' . $url, 301);
                        } else {
                            $url = "?error=Error when add user in BDD";
                            return $this->response->withRedirect('/backoffice/users' . $url, 301);
                        }
                    } else {
                        return $view->render($this->response, 'users-BackOffice.twig', []);
                    }
                } else {
                    $userId = (int)$this->args["id"];
                    // User in bdd
                    $user = $this->userBDDRepository->findUserById($userId);
                    if (isset($user)) {
                        return $view->render($this->response, 'user-BackOffice.twig', [
                            'user' => $this->userBDDRepository->findUserById($userId)
                        ]);
                    } else {
                        $url = "?error=User not found";
                        return $this->response->withRedirect('/backoffice/users' . $url, 301);
                    }
                }
            } else {
                if ($this->request->getMethod() == "POST") {
                    if ($this->isPostValid(false)) {

                        $email = $this->request->getParsedBody()["email"];
                        $lastname = $this->request->getParsedBody()["lastname"];
                        $firstname = $this->request->getParsedBody()["firstname"];
                        $picture = $this->request->getParsedBody()["picture"];
                        $password = $this->request->getParsedBody()["password"];
                        $description = $this->request->getParsedBody()["description"];

                        if ($this->userBDDRepository->addUser($email, $firstname, $lastname,$picture, $password, $description)) {
                            $url = "?success=User added";
                            return $this->response->withRedirect('/backoffice/users' . $url, 301);
                        } else {
                            $url = "?error=Error when add user in BDD";
                            return $this->response->withRedirect('/backoffice/users' . $url, 301);
                        }
                    }
                    return $view->render($this->response, 'user-BackOffice.twig', [
                        "error" => 'Field missing'
                    ]);
                } else {
                    return $view->render($this->response, 'user-BackOffice.twig', []);
                }
            }
        } else {
            return $this->response->withRedirect('/', 301);
        }
    }
}
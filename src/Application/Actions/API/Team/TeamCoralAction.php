<?php
declare(strict_types=1);

namespace App\Application\Actions\Api\Team;

use App\Application\Actions\Action;
use App\Infrastructure\Persistence\User\UserBDDRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class TeamCoralAction extends Action
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
        $userListInfo = $this->userBDDRepository->findAll();
        $userList = [];
        foreach ($userListInfo as $userInfo) {
            $user = [];
            $user["id"] = $userInfo["id"];
            $user["name"] = $userInfo["firstname"] . ' ' . $userInfo["lastname"];
            $user["description"] = $userInfo["description"];
            array_push($userList, $user);
        }

        return $this->respondWithData($userList);
    }
}

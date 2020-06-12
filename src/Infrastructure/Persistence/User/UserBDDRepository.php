<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;

use App\Domain\User\User;

class UserBDDRepository
{
    /**
     * @var User[]
     */
    private $users;

    public function __construct()
    {
        $this->users = [
            1 => new User(1, 'lala@lala.fr', 'Bill', 'Gates', 'lala'),
            2 => new User(2, 'lala@lala.fr', 'Steve', 'Jobs', 'lala'),
            3 => new User(3, 'lala@lala.fr', 'Mark', 'Zuckerberg', 'lala'),
            4 => new User(4, 'lala@lala.fr', 'Evan', 'Spiegel', 'lala'),
            5 => new User(5, 'lala@lala.fr', 'Jack', 'Dorsey', 'lala')
        ];
    }

    public function findAll(): array
    {
        return array_values($this->users);
    }
}

<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;

use App\Domain\User\User;
use phpDocumentor\Reflection\Types\Null_;

class UserBDDRepository
{
    /**
     * @var User[]
     */
    private $users;

    public function __construct()
    {
        $this->users = [
            new User(1, 'lala@lala.fr', 'Bill', 'Gates', 'Muffin soufflé sugar plum. Chocolate bar muffin gummies chocolate cake gummies lollipop gingerbread soufflé. Chocolate cotton candy jujubes cheesecake pastry macaroon. Oat cake cotton candy chupa chups oat cake tootsie roll toffee caramels.'),
            new User(2, 'lala@lala.fr', 'Steve', 'Jobs', 'Caramels sesame snaps chocolate. Brownie carrot cake lemon drops sweet roll ice cream chocolate. Danish croissant jelly. Brownie gingerbread muffin carrot cake sweet powder marzipan gingerbread dessert.'),
            new User(3, 'lala@lala.fr', 'Mark', 'Zuckerberg', 'Liquorice topping gummies wafer gingerbread halvah chupa chups. Ice cream jelly-o gingerbread jelly candy canes. Jelly jelly toffee bonbon.'),
            new User(4, 'lala@lala.fr', 'Evan', 'Spiegel', 'Gingerbread toffee cheesecake halvah croissant bonbon. Bear claw gingerbread cotton candy cake muffin toffee lemon drops. Gingerbread tart biscuit chocolate cake pie muffin.'),
            new User(5, 'lala@lala.fr', 'Jack', 'Dorsey', 'Pie cheesecake topping soufflé muffin wafer sugar plum. Jujubes brownie chupa chups croissant gummies icing topping. Gummi bears apple pie cake carrot cake jelly powder muffin marshmallow wafer.')
        ];
    }

    public function findAll(): array
    {
        return array_values($this->users);
    }

    public function findUserById(int $UserId): ?User
    {
        $key = array_search($UserId, array_column($this->users, 'id'));
        $user = $this->users[$key];
        if ($user->id != $UserId) {
            return null;
        }
        return $user;
    }

    public function deleteUserById(int $UserId): bool
    {
        return false;
    }
}

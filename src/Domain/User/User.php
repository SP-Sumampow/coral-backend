<?php
declare(strict_types=1);

namespace App\Domain\User;

use JsonSerializable;

class User implements JsonSerializable
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $firstname;

    /**
     * @var ?string
     */
    public $lastname;

    /**
     * @var string
     */
    public $picture;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $description;

    /**
     * @param int $id
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     * @param string $description
     */
    public function __construct(int $id, string $email, string $firstName, string $lastName, string $picture, string $description)
    {
        $this->id = $id;
        $this->email = $email;
        $this->firstname = $firstName;
        $this->lastname = $lastName;
        $this->picture = $picture;
        $this->password = null;
        $this->description = $description;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'firstName' => $this->firstname,
            'picture' => $this->picture,
            'password' => $this->password,
            'firstName' => $this->firstname,
            'lastName' => $this->lastname,
            'description' => $this->description,
        ];
    }
}

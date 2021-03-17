<?php
declare(strict_types = 1);
include_once "Entity.php";

class Teacher extends Entity
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;

    public function __construct(int $id, string $firstName, string $lastName, string $email)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getfirstName(): string
    {
        return $this->firstName;
    }

    public function getlastName(): string
    {
        return $this->lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }


}
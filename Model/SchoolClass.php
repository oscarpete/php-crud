<?php
declare(strict_types = 1);
include_once "Entity.php";

class SchoolClass extends Entity
{
    private int $id;
    private string $name;
    private string $assignedTeacher;
    private string $location;

    public function __construct(int $id, string $name, string $assignedTeacher, string $location)
    {
        $this->id = $id;
        $this->name = $name;
        $this->assignedTeacher = $assignedTeacher;
        $this->location = $location;

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAssignedTeacher(): string
    {
        return $this->assignedTeacher;
    }

    public function getLocation(): string
    {
        return $this->location;
    }


}
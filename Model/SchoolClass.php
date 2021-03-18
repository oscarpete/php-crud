<?php
declare(strict_types = 1);
include_once "Entity.php";

class SchoolClass extends Entity
{
    private int $id;
    private string $name;
    private int $locationId;
    private int $assignedTeacherId
    ;
    private int $totalStudents;

    public function __construct(int $id, string $name, int|string $assignedTeacherId, int|string $locationId)
    {
        $this->id = $id;
        $this->name= $name;
        $this->assignedTeacherId = (int)$assignedTeacherId;
        $this->locationId = (int)$locationId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLocation(): int
    {
        return $this->locationId;
    }

    public function getAssignedTeacher(): int
    {
        return $this->assignedTeacherId;
    }
}
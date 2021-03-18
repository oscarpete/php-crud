<?php
declare(strict_types=1);
include_once "Loader.php";
include_once "Model/Teacher.php";

class TeacherLoader extends Loader
{

        public function fetchAll(): ?array
    {
        $pdo = $this->connect();

        $handle = $pdo->prepare('SELECT * FROM crud.teacher ORDER BY teacher.id');
        $handle->execute();
        return $handle->fetchAll();
    }

    public function fetchSingle(int $id): ?array
    {
        $id = (int)abs($id);
        $pdo = $this->connect();

        $handle = $pdo->prepare('SELECT * FROM crud.teacher WHERE teacher.id = :id ORDER BY teacher.id');
        $handle->bindValue(':id', $id);
        $handle->execute();
        return $handle->fetchAll();
    }


    public function deleteEntry(int $id): bool
    {
        // TODO: Implement deleteEntry() method.
    }

    public function addEntry(): void
    {
        // TODO: Implement addEntry() method.
    }

    public function updateEntry(): void
    {
        // TODO: Implement updateEntry() method.
    }
}
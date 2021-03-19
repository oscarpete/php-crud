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

        $handle = $pdo->prepare('SELECT c.className as class, c.id as classid, t.id as teachid, concat_ws(" ", t.firstName, t.lastName) as name, a.town as location FROM crud.teacher AS t LEFT JOIN crud.class AS c ON t.id = c.assignedTeacher LEFT JOIN crud.address AS a ON c.location = a.id WHERE t.id = :id ORDER BY t.id');
        $handle->bindValue(':id', $id);
        $handle->execute();
        return $handle->fetchAll();
    }

    public function deleteEntry(int $id): bool
    {
        $id = (int)$id;
        $pdo = $this->connect();
        try
        {

            $handle = $pdo->prepare('DELETE FROM crud.teacher WHERE teacher.id = :id');
            $handle->bindValue(':id', $id);
            $handle->execute();
            return true;
        }
        catch (PDOException $exception)
        {
            echo 'something went wrong: ' . $exception;
            return false;
        }
    }

    public function addEntry(Teacher $teacher = null): void
    {
        if ($teacher instanceof Entity)
        {
            echo("attempting to add new item into database");
            $pdo = $this->connect();

            $handle = $pdo->prepare('INSERT INTO crud.teacher (firstName, lastName, email) VALUES (:firstName, :lastName, :email)');
            $handle->bindValue(':firstName', $teacher->getfirstName());
            $handle->bindValue(':lastName', $teacher->getlastName());
            $handle->bindValue(':email', $teacher->getEmail());
            $handle->execute();
        }
    }

    public function UpdateEntry(Teacher $teacher = null): void
    {
        if ($teacher instanceof Entity)
        {
            echo("attempting to edit item!");
            $pdo = $this->connect();

            $handle = $pdo->prepare('UPDATE crud.teacher SET firstName = :firstName, lastName = :lastName, email = :email WHERE teacher.id = :id');

            $handle->bindValue(':id', $teacher->getId());
            $handle->bindValue(':firstName', $teacher->getfirstName());
            $handle->bindValue(':lastName', $teacher->getlastName());
            $handle->bindValue(':email', $teacher->getEmail());
            $handle->execute();
        }

    }
}
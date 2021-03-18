<?php
declare(strict_types=1);
include_once "Loader.php";
include_once "Model/SchoolClass.php";

class ClassLoader extends Loader
{

    public function fetchAll(): ?array
    {
        $pdo = $this->connect();

        $handle = $pdo->prepare(
            'SELECT c.id, c.className, concat_ws(" ", t.firstName, t.lastName) AS assignedTeacher, t.id AS teachId, c.location, s.studentCount  
            FROM crud.class AS c 
            LEFT JOIN crud.teacher AS t ON c.assignedTeacher = t.id 
            LEFT JOIN (SELECT cs.classid, COUNT(*) AS studentCount
                FROM crud.student AS cs
                WHERE cs.classid IS NOT NULL
                GROUP BY cs.classid) AS s ON s.classid = c.id  
            ORDER BY c.id');
        $handle->execute();
        return $handle->fetchAll();
    }

    public function fetchSingle(int $id): ?array
    {
        $id = (int)abs($id);
        $pdo = $this->connect();

//        $handle = $pdo->prepare('SELECT * FROM crud.class LEFT JOIN crud.teacher ON class.assignedTeacher = teacher.id WHERE class.id = :id ORDER BY class.id');
        $handle = $pdo->prepare(
            'SELECT c.id AS classId, c.className, c.location AS classLocation, concat_ws( " ", t.firstName, t.lastName) AS teachName, t.id AS teachId  
            FROM crud.class AS c
            LEFT JOIN crud.teacher AS t ON c.assignedTeacher = t.id 
            WHERE c.id = :id 
            ORDER BY c.id');
        $handle->bindValue(':id', $id);
        $handle->execute();
        return $handle->fetchAll();
    }

    public function fetchByTeacher(int $id): ?array
    {
        $pdo = $this->connect();

        try
        {
            $handle = $pdo->prepare('SELECT class.id as classId, className, location as ClassLocation FROM crud.class WHERE class.assignedTeacher = :teachId');
            $handle->bindValue(':teachId', $id);
            $handle->execute();
            return $handle->fetchAll();
        }
        catch (PDOException $exception)
        {
            echo 'Something went wrong: ' . $exception;
            return null;
        }
    }

    public function deleteEntry(int $id): bool
    {
        $id = (int)$id;
        $pdo = $this->connect();
        try
        {

            $handle = $pdo->prepare('DELETE FROM crud.class WHERE class.id = :id');
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

    public function addEntry(SchoolClass $class = null): void
    {
        if ($class instanceof Entity)
        {
            echo("attempting to add new item into database");
            $pdo = $this->connect();

            $handle = $pdo->prepare('INSERT INTO crud.class (className, location, assignedTeacher) VALUES (:className, :location, :assignedTeacher)');
            $handle->bindValue(':className', $class->getName());
            $handle->bindValue(':location', $class->getLocation());
            $handle->bindValue(':assignedTeacher', $class->getAssignedTeacher());
            $handle->execute();
        }
    }

    public function UpdateEntry(SchoolClass $class = null): void
    {
        if ($class instanceof Entity)
        {
            echo("attempting to edit item!");
            $pdo = $this->connect();

            $handle = $pdo->prepare('UPDATE crud.class SET className = :name, location = :location, assignedTeacher = :teacher WHERE class.id = :id');

            $handle->bindValue(':id', $class->getId());
            $handle->bindValue(':name', $class->getName());
            $handle->bindValue(':location', (int)$class->getLocation());
            $handle->bindValue(':teacher', (int)$class->getAssignedTeacher());
            $handle->execute();
        }

    }
}
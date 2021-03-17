<?php
declare(strict_types=1);
include_once "Loader.php";
include_once "Model/SchoolClass.php";

class ClassLoader extends Loader
{

    public function fetchAll() : ?array
    {
        $pdo = $this->connect();

        $handle = $pdo->prepare('SELECT * FROM crud.class ORDER BY class.id');
        $handle->execute();
        return $handle->fetchAll();
    }

    public function fetchSingle(int $id) : ?array
    {
        $id = (int)abs($id);
        $pdo = $this->connect();

        $handle = $pdo->prepare('SELECT * FROM crud.class WHERE class.id = :id ORDER BY class.id');
        $handle->bindValue(':id', $id);
        $handle->execute();
        return $handle->fetchAll();
    }

    public function deleteEntry(int $id) : bool
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
        catch(PDOException $exception){
            echo 'something went wrong: ' . $exception;
            return false;
        }
    }

    public function addEntry(SchoolClass $class = null) : void
    {
        if($class instanceof Entity)
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

    public function UpdateEntry(SchoolClass $class = null) : void
    {
        if($class instanceof Entity)
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
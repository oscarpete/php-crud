<?php
declare(strict_types=1);
include_once "Loader.php";
include_once "Model/Student.php";

class StudentLoader extends Loader
{

    public function fetchAll(): ?array
    {
        $pdo = $this->connect();

        $handle = $pdo->prepare('SELECT * FROM crud.student ORDER BY student.id');
        $handle->execute();
        return $handle->fetchAll();
    }

    public function fetchSingle(int $id): ?array
    {
        $id = (int)abs($id);
        $pdo = $this->connect();

        $handle = $pdo->prepare('SELECT * FROM crud.student WHERE student.id = :id ORDER BY student.id');
//        $handle = $pdo->prepare('SELECT teacher.id as teacherId, firstName as firstName, lastName as LastName, concat_ws( " ", student.firstName, student.lastName) as studentName, student.id as studentId  FROM crud.student LEFT JOIN crud.teacher ON class.assignedTeacher = teacher.id WHERE class.id = :id ORDER BY class.id');
        $handle->bindValue(':id', $id);
        $handle->execute();
        return $handle->fetchAll();
    }

    public function fetchByTeacher(int $id): ?array
    {
        $pdo = $this->connect();
        $handle = $pdo->prepare('SELECT s.id as id, CONCAT_WS(" ",s.firstName, s.lastName) as name FROM crud.teacher as t JOIN crud.class AS c ON t.id = c.assignedTeacher RIGHT JOIN crud.student AS s on c.id = s.classid WHERE t.id = :id ORDER BY s.firstName;');
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

            $handle = $pdo->prepare('DELETE FROM crud.student WHERE student.id = :id');
            $handle->bindValue(':id', $id);
            $handle->execute();
            return true;
        }
        catch(PDOException $exception){
            echo 'something went wrong: ' . $exception;
            return false;
        }
    }

    public function addEntry(Student $student = null) : void
    {
        if($student instanceof Entity)
        {
            echo("attempting to add new item into database");
            $pdo = $this->connect();

            $handle = $pdo->prepare('INSERT INTO crud.student (firstName, lastName, email) VALUES (:firstName, :lastName, :email)');
            $handle->bindValue(':firstName', $student->getfirstName());
            $handle->bindValue(':lastName', $student->getlastName());
            $handle->bindValue(':email', $student->getEmail());
            $handle->execute();
        }
    }

    public function UpdateEntry(Student $student = null) : void
    {
        if($student instanceof Entity)
        {
            echo("attempting to edit item!");
            $pdo = $this->connect();

            $handle = $pdo->prepare('UPDATE crud.student SET firstName = :firstName, lastName = :lastName, email = :email, classid = :classid WHERE student.id = :id');

            $handle->bindValue(':id', $student->getId());
            $handle->bindValue(':firstName', $student->getfirstName());
            $handle->bindValue(':lastName', $student->getlastName());
            $handle->bindValue(':email', $student->getEmail());
            $handle->bindValue(':classid', $student->getClassId());
            $handle->execute();
        }

    }

    public function FetchByClass(int $id) : ?array
    {
        $pdo = $this->connect();

        $handle = $pdo->prepare('SELECT id, CONCAT_WS(" ", firstName, lastName) as name FROM crud.student as s WHERE s.classid = :id ORDER BY s.id');
        $handle->bindValue(':id', $id);
        $handle->execute();
        return $handle->fetchAll();
    }

}
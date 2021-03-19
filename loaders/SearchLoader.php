<?php


class SearchLoader extends Loader
{

    public function fetchAll(): ?array
    {
        // TODO: Implement fetchAll() method.
    }

    public function fetchSingle(int $id): ?array
    {
        // TODO: Implement fetchSingle() method.
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

    public function searchEntries(string $name): ?array
    {
        $pdo = $this->connect();
        $name = '%' . $name . '%';

        //alright, so what does this search function do?
        //it fetches the student and teacher rows, and ensures their tables are uniform
        //then, union all combines them into a new table
        //in order to differentiate between which table we're drawing from, we put in a new 'role' column that states their origin.
        $handle = $pdo->prepare(
            "SELECT * 
                FROM (SELECT id, concat_ws(' ', firstName, lastName) AS name, :student AS inTable
                    FROM crud.student
                    UNION ALL
                    SELECT id, concat_ws(' ', firstName, lastName) AS name, :teacher AS inTable
                    FROM crud.teacher) as inrinr
                WHERE name LIKE :search
                ORDER BY name;"
        );
        $handle->bindValue(':search', $name);
        $handle->bindValue(':student', STUDENTS);
        $handle->bindValue(':teacher', TEACHERS);
        $handle->execute();
        return $handle->fetchAll();
    }
}
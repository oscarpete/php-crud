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

    public function searchEntries(string $name)
    {
        $pdo = $this->connect();
        $name = '%' . $name . '%';

        $handle = $pdo->prepare(
            "SELECT * 
                FROM (SELECT id, concat_ws(' ', firstName, lastName) AS name, 'student' AS role
                    FROM crud.student
                    UNION ALL
                    SELECT id, concat_ws(' ', firstName, lastName) AS name, 'teacher' AS role
                    FROM crud.teacher) as inrinr
                WHERE name LIKE :search
                ORDER BY name;"
        );
        $handle->bindValue(':search', $name);
        $handle->execute();
        var_dump($handle->fetchAll());
    }
}
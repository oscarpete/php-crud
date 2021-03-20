<?php


class LocationLoader extends Loader
{

    public function fetchAll(): ?array
    {
        $pdo = $this->connect();

        $handle = $pdo->prepare(
            'SELECT a.id AS id, a.town AS name
            FROM crud.address AS a
            ORDER BY name');
        $handle->execute();
        return $handle->fetchAll();
    }

    public function fetchSingle(int $id): ?array
    {
        $pdo = $this->connect();

        $handle = $pdo->prepare(
            'SELECT a.id AS id, a.town AS name
            FROM crud.address AS a
            WHERE a.id = :id
            ORDER BY name');
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
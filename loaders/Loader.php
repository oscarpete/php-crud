<?php
declare(strict_types=1);


abstract class Loader
{
    private string $serverName = 'localhost';
    private string $username = 'becode';
   // private string $username = 'root';
    private string $password = 'EnterMyBeCode123!';
   // private string $password = '';
    private string $db = 'crud';

    protected function connect(): ?PDO
    {
        //driver options array
        //sets driver specific attributes
        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'", //command to execute when connecting to the MySQL server
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //raises e_warning on failure and throws exceptions.
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //returns fetch result as an array indexed by column name
        ];

        try
        {
            //create new PDO (PHP data object)
            //first set up connection information for PDO (database host, database, username, password, driver options)
            $conn = new PDO('mysql:host=' . $this->serverName . ';dbname=' . $this->db, $this->username, $this->password, $driverOptions);
//            echo "connection successful!";
            return $conn;
        }
        catch (PDOException $exception)
        {
//            echo "connection failed: " . $exception->getMessage();
            return null;
        }
    }

    abstract public function fetchAll(): ?array;

    abstract public function fetchSingle(int $id): ?array;

    abstract public function deleteEntry(int $id): bool;

    abstract public function addEntry(): void;

    abstract public function updateEntry(): void;
}

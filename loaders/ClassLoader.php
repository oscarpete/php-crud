<?php
declare(strict_types=1);
include_once "Loader.php";
include_once "Model/SchoolClass.php";

class ClassLoader extends Loader
{
    private string $serverName = 'localhost';
    private string $username = 'becode';
    private string $password = 'EnterMyBeCode123!';
    private string $db = 'crud';

    private array $classes = [];

    public function __construct()
    {

    }

    public function connect(): ?PDO
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


}
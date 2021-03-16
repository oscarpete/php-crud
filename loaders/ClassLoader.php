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

    private SchoolClass $classes;

    public function __construct()
    {

    }

    public function connect(): ?PDO
    {
        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try
        {
            $conn = new PDO('mysql:host=' . $this->serverName . ';dbname=' . $this->db, $this->username, $this->password, $driverOptions);
            echo "connection successful!";
            return $conn;
        }
        catch (PDOException $exception)
        {
            echo "connection failed: " . $exception->getMessage();
            return null;
        }
    }


}
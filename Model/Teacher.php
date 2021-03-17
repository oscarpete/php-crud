<?php
declare(strict_types = 1);
//include_once "Entity.php";

class Teacher extends Entity
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;

    public function __construct() {
        $this->db = Database::connect();
    }
    function getId() {
        return $this->id;
    }

    function getfirstName() {
        return $this->firstName;
    }

    function getlastName() {
        return $this->lastName;
    }

    function getEmail() {
        return $this->email;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setfirstName($firstName) {
        $this->firstName = $this->db->real_escape_string($firstName);
    }

    function setlastName($lastName) {
        $this->lastName = $this->db->real_escape_string($lastName);
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }


    public function save(){
        $sql = "INSERT INTO teacher VALUES(NULL, '{$this->getfirstName()}', '{$this->getlastName()}', '{$this->getEmail()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
}
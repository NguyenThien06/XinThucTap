<?php 

namespace Core;

use mysqli;

class DB
{
    protected $serverName;
    protected $userName;
    protected $password;
    protected $database;
    public $conn;

    public function __construct()
    {
       global $DB;
       $this->serverName = $DB['serverName'];
       $this->userName = $DB['userName'];
       $this->password = $DB['password'];
       $this->database = $DB['database'];

       $this->conn = new mysqli($this->serverName, $this->userName, $this->password, $this->database);
       if($this->conn->connect_error){
        die('Loi ket noi ');
       }
       $this->conn->set_charset('utf8');
    }
}
?>
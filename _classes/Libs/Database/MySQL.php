<?php

namespace Libs\Database;

use PDO;
use PDOException;

class MySQL{

    private $db; //property
    private $dbhost;
    private $dbuser;
    private $dbpass;
    private $dbname;

    public function __construct(
        $dbhost="localhost", // accept parameter
        $dbuser="root",
        $dbpass="",
        $dbname="project",
    )
    {
        $this->dbhost = $dbhost; // change parameter to property
        $this->dbuser = $dbuser;  
        $this->dbpass = $dbpass;
        $this->dbname = $dbname;
    }

    public function connect()
    {
        try{
            // Variable Scope: Parameters vs. Properties
            // parameter variable only exist in connect function
            $this->db = new PDO(
                "mysql:dbhost=$this->dbhost;dbname=$this->dbname",
                $this->dbuser,
                $this->dbpass,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                ]
            );
            return $this->db;
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }

}
<?php

class Polaris
{
    /**
     * @var object $db_connection The database connection
     */
    private $db_connection            = null;
    
    public  $errors                   = array();
    /**
     * @var array collection of success / neutral messages
     */
    public  $messages                 = array();
    
    public   $total                    = 0;

    public function __construct()
    { 
        
    }

    /**
     * Checks if database connection is opened and open it if not
     */
    private function databaseConnection()
    {
        // connection already opened
        if ($this->db_connection != null) {
            return true;
        } else {
            // create a database connection, using the constants from config/config.php
            try {
                $this->db_connection = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
                return true;
            } catch (PDOException $e) {
                $this->errors[] = MESSAGE_DATABASE_ERROR;
                return false;
            }
        }
    }    
    
    public  function addStudentIntoEventTable(){
        // Take form details into variables 
        $name = $_POST["ename"];
        $mobile = $_POST["emobile"];
        $email = $_POST["eemail"];
        $cost = $_POST["ecost"];
        if ($this->databaseConnection()) {
              $query_to_add_in_db = $this->db_connection->prepare('INSERT INTO events (ename , emobile , eemail , ecost) VALUES (:ename , :emobile , :eemail , :ecost)');
              $query_to_add_in_db->bindValue(':ename' , $name , PDO::PARAM_STR);
              $query_to_add_in_db->bindValue(':emobile' , $mobile , PDO::PARAM_INT);
              $query_to_add_in_db->bindValue(':eemail' , $email , PDO::PARAM_STR);
              $query_to_add_in_db->bindValue(':ecost' , $cost , PDO::PARAM_INT);
              $query_to_add_in_db->execute();  
              $this->total = $this->total+1;                           
        }  
    }
    public function deleteStudentInfoFromEventTable(){
    }
    public function updateStudentInforIntoEventTable(){

    }

}






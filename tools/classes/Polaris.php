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
    public function addStudentIntoEventTable(){
        // Take form details into variables 
        $name = $_POST["ename"];
        $mobile = $_POST["emobile"];
        $email = $_POST["eemail"];
        $cost = $_POST["ecost"];
        if ($this->databaseConnection()) {
              $query_to_add_in_db = $this->db_connection->prepare('INSERT INTO events (ename , emobile , eemail , ecost , regtime) VALUES (:ename , :emobile , :eemail , :ecost ,now())');
              $query_to_add_in_db->bindValue(':ename' , $name , PDO::PARAM_STR);
              $query_to_add_in_db->bindValue(':emobile' , $mobile , PDO::PARAM_INT);
              $query_to_add_in_db->bindValue(':eemail' , $email , PDO::PARAM_STR);
              $query_to_add_in_db->bindValue(':ecost' , $cost , PDO::PARAM_INT);
              $this->messages[] = "Student data added successfully!";
              $query_to_add_in_db->execute(); 
                                                     
        }  
    }

    public function deleteStudentInfoFromEventTable(){
      $deleteId = $_POST["edeleteId"];
       if($this->databaseConnection()){
            $queryDelete = $this->db_connection->prepare('DELETE FROM events  WHERE eid = :deleteId');
            $queryDelete->bindValue(':deleteId', $deleteId ,PDO::PARAM_INT);
            $queryDelete->execute();
            if ($queryDelete->rowCount() > 0) {
                $this->messages[] = "Student deleted successfully!";
            }else{
                $this->errors[] = "Error in deleting.";
            }           
    }
  }
  // Query to update the Event students 
  public function updateStudentInfoIntoEventTable(){

      if($this->databaseConnection()){
          $name = $_POST["updateEname"];
          $mobile = $_POST["updateEmobile"];
          $email = $_POST["updateEemail"];
          $cost = $_POST["updateEcost"];
          $eid = $_POST["updateEnumber"];        
          $query = $this->db_connection->prepare('UPDATE events SET ename =:ename , emobile =:emobile , eemail=:eemail,ecost=:ecost
             where eid =:eid');
          $query->bindValue(':eid', $eid ,PDO::PARAM_INT);
          $query->bindValue(':ename', $name ,PDO::PARAM_STR);
          $query->bindValue(':emobile', $mobile ,PDO::PARAM_STR);
          $query->bindValue(':eemail', $email ,PDO::PARAM_STR);
          $query->bindValue(':ecost', $cost ,PDO::PARAM_INT);
          $query->execute();
      }
  }
  public function getTotalEntries(){
      if($this->databaseConnection()){
          $query = $this->db_connection->prepare('select count(*) from events ');
          $query->execute();
          $result = $query->fetchColumn();
          return $result;                
      }
  }
  public function getSelectedEventStudentData($start){
      $start = ($start-1)*10 ;
      $end = $start + 10;
      if($this->databaseConnection()){
          $query = $this->db_connection->prepare('select * from events limit :start , :end');
          $query->bindValue(':start', $start ,PDO::PARAM_INT);
          $query->bindValue(':end', $end ,PDO::PARAM_INT);
          $query->execute();
          return $query;                
      }
  }

  // This method is used to registed into database through android 
  public function registerAndroidUser($name,$mobile,$email,$note){

          if ($this->databaseConnection()) {
              $query_to_add_in_db = $this->db_connection->prepare('INSERT INTO events (ename , emobile , eemail , note , regtime) VALUES (:ename , :emobile , :eemail , :note ,now())');
              $query_to_add_in_db->bindValue(':ename' , $name , PDO::PARAM_STR);
              $query_to_add_in_db->bindValue(':emobile' , $mobile , PDO::PARAM_INT);
              $query_to_add_in_db->bindValue(':eemail' , $email , PDO::PARAM_STR);
              $query_to_add_in_db->bindValue(':note' , $note , PDO::PARAM_INT);
              //$this->messages[] = "Student data added successfully!";
              $query_to_add_in_db->execute(); 
              if ($query_to_add_in_db->rowCount()) {
                    $result = 1;      
                }else{  
                    $result = 0; 
              }
          return $result;                                           
        }             
  }
}







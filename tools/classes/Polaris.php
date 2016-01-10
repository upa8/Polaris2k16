<?php

  // This is Polaris class which has our database 
  // connection and main logic functions 
  class Polaris{
      /**
       * @var object $db_connection The database connection
       */
      private $db_connection            = null;
      
      public  $errors                   = array();
      /**
       * @var array collection of success / neutral messages
       */
      public  $messages                 = array();
      
      // This is constuctor of Polaris class 
      public function __construct(){ 
          
      }
      /**
       * Checks if database connection is opened and open it if not
       */
      private function databaseConnection(){
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

      // Add user into the database table 
      public function addStudentIntoEventTable(){
          
          // Take form details into variables 
          // Avoid sql injections 
          $name = $_POST["ename"];
          $mobile = $_POST["emobile"];
          $email = $_POST["eemail"];
          $cost = $_POST["ecost"];
          
          if ($this->databaseConnection()) {
                $query_to_add_in_db = $this->db_connection->prepare('INSERT INTO 
                          events (ename , emobile , eemail , ecost , regtime) 
                          VALUES (:ename , :emobile , :eemail , :ecost ,now())');
                $query_to_add_in_db->bindValue(':ename' , $name , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':emobile' , $mobile , PDO::PARAM_INT);
                $query_to_add_in_db->bindValue(':eemail' , $email , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':ecost' , $cost , PDO::PARAM_INT);
                $query_to_add_in_db->execute();                                                      
                // Return something to display that we are done with adding user 
          }  
      }

      // Delete the entry from the databse table 
      public function deleteStudentInfoFromEventTable(){
            
            $deleteId = $_POST["edeleteId"];
            
            if ($this->databaseConnection()){
                 $queryDelete = $this->db_connection->prepare('DELETE FROM events  WHERE eid = :deleteId');
                 $queryDelete->bindValue(':deleteId', $deleteId ,PDO::PARAM_INT);
                 $queryDelete->execute();
                // Return something to display the we have delete the entry 
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
            $query = $this->db_connection->prepare('UPDATE events SET ename =:ename , 
                            emobile =:emobile , eemail=:eemail,ecost=:ecost
                            where eid =:eid');
            $query->bindValue(':eid', $eid ,PDO::PARAM_INT);
            $query->bindValue(':ename', $name ,PDO::PARAM_STR);
            $query->bindValue(':emobile', $mobile ,PDO::PARAM_STR);
            $query->bindValue(':eemail', $email ,PDO::PARAM_STR);
            $query->bindValue(':ecost', $cost ,PDO::PARAM_INT);
            $query->execute();
            //Return ack to display that we have updated the user 
        }
    }

    // get the total entries count for pagination system 
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
    public function registerAndroidUser($name,$mobile,$email,$note,$event,$cost){
            $result = 0;
            
            if ($this->databaseConnection()) {
                $query_to_add_in_db = $this->db_connection->prepare('INSERT INTO events (ename , emobile , eemail , note, 
                  event1 , event2 , event3 , event4 , event5,event6,event7,event8, ecost, regtime) VALUES (:ename , :emobile , :eemail , :note ,:event1, :event2 , :event3 , :event4 , :event5 , :event6 , :event7,:event8,:ecost,now())');
                $query_to_add_in_db->bindValue(':ename' , $name , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':emobile' , $mobile , PDO::PARAM_INT);
                $query_to_add_in_db->bindValue(':eemail' , $email , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':note' , $note , PDO::PARAM_STR);

                $query_to_add_in_db->bindValue(':event1' , $event[0] , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':event2' , $event[1] , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':event3' , $event[2] , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':event4' , $event[3] , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':event5' , $event[4] , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':event6' , $event[5] , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':event7' , $event[6], PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':event8' , $event[7] , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':ecost' , $cost , PDO::PARAM_INT);
                //$this->messages[] = "Student data added successfully!";
                $query_to_add_in_db->execute(); 
                if ($query_to_add_in_db->rowCount()) {
                      $result = 1;
                      return $result;      
                  }else{  
                      $result = 0;
                      return $result;
                }                                           
          }     
    }

    // Create functions for college page 
    // Insert student into branch 
    public function addStudentIntoBranchTable(){

          $name = $_POST["addFirstName"];
          $mobile = $_POST["addMiddleName"];
          $email = $_POST["addLastName"];
          $cost = $_POST["addMobile"];
          $cost = $_POST["addEmail"];
          $cost = $_POST["addShift"];
          $cost = $_POST["addYear"];
          $cost = $_POST["addCost"];

          // Now write a query to add into database 
               
    }

    // Delete student from branch 
    public function deleteStudentFromBranchTable(){

    }

    public function updateStudentInfoIntoBranchTable(){

    }

    // Other functions of college page 

    public function getSelectedBranchStudentData($start){
        $start = ($start-1)*10 ;
        $end = $start + 10;
        if($this->databaseConnection()){
            $query = $this->db_connection->prepare('select * from branch limit :start , :end');
            $query->bindValue(':start', $start ,PDO::PARAM_INT);
            $query->bindValue(':end', $end ,PDO::PARAM_INT);
            $query->execute();
            return $query;                
        }
    }

}







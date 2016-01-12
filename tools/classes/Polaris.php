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
    public function registerAndroidUser($name,$mobile,$email,$note,$event,$cost , $ecollege,$admin){
            $result = 0;
            
            if ($this->databaseConnection()) {
                $query_to_add_in_db = $this->db_connection->prepare('INSERT INTO events (ename , emobile , eemail , note, 
                  event1 , event2 , event3 , event4 , event5,event6,event7,event8, ecost, ecollege, whichadmin ,regtime) VALUES (:ename , :emobile , :eemail , :note ,:event1, :event2 , :event3 , :event4 , :event5 , :event6 , :event7,:event8,:ecost, :ecollege, :admin,now())');
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
                $query_to_add_in_db->bindValue(':ecollege' , $ecollege , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':admin' , $admin , PDO::PARAM_STR);
                
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

          $firstName = $_POST["addFirstName"];
          $middleName = $_POST["addMiddleName"];
          $lastName = $_POST["addLastName"];
          $mobile = $_POST["addMobile"];
          $email = $_POST["addEmail"];
          $shift = $_POST["addShift"];
          $year = $_POST["addYear"];
          $cost = $_POST["addCost"];

          // Now write a query to add into database 
          if ($this->databaseConnection()) {
                $query = $this->db_connection->prepare('INSERT INTO branch (bfname , bmname , blname , 
                          bmobile, bemail , bshift , byear , bmoney , btime) 
                          VALUES (:firstName , :middleName , :lastName , :bmobile ,
                            :bemail, :bshift , :byear , :bmoney ,now())');
                $query->bindValue(':firstName' , $firstName, PDO::PARAM_STR);
                $query->bindValue(':middleName' , $middleName , PDO::PARAM_STR);
                $query->bindValue(':lastName' , $lastName , PDO::PARAM_STR);
                $query->bindValue(':bmobile' , $mobile , PDO::PARAM_STR);
                $query->bindValue(':bemail' , $email , PDO::PARAM_STR);
                $query->bindValue(':bshift' , $shift , PDO::PARAM_STR);
                $query->bindValue(':byear' , $year , PDO::PARAM_STR);
                $query->bindValue(':bmoney' , $cost, PDO::PARAM_INT);
                
                $query->execute(); 
                                                           
          }           
    }

    // Delete student from branch 
    public function deleteStudentFromBranchTable(){

        $deleteId = $_POST["bdeleteId"];
            
        if ($this->databaseConnection()){
             $queryDelete = $this->db_connection->prepare('DELETE FROM branch  WHERE bid = :deleteId');
             $queryDelete->bindValue(':deleteId', $deleteId ,PDO::PARAM_INT);
             $queryDelete->execute();
            // Return something to display the we have delete the entry 
        }
    }

    public function updateStudentInfoIntoBranchTable(){
            
            $updateBnumber = $_POST["updateBnumber"];
            $updateBfname = $_POST["updateBfname"];
            $updateBmname = $_POST["updateBmname"];
            $updateBlname = $_POST["updateBlname"];
            $updateBshift = $_POST["updateBshift"];
            $updateByear = $_POST["updateByear"];
            $updateBmoney = $_POST["updateBmoney"];        
            $updateBmobile = $_POST["updateBmobile"];
            $updateBemail = $_POST["updateBemail"];

            if($this->databaseConnection()){
            $query = $this->db_connection->prepare('UPDATE branch SET bfname =:bfname , 
                            bmname =:bmname , blname=:blname ,bmobile=:bmobile, bemail = :bemail, 
                            byear = :byear, bshift = :bshift, bmoney = :bmoney , btime = now()
                            where bid =:bid');
            $query->bindValue(':bid', $updateBnumber ,PDO::PARAM_INT);
            $query->bindValue(':bfname', $updateBfname ,PDO::PARAM_STR);
            $query->bindValue(':bmname', $updateBmname ,PDO::PARAM_STR);
            $query->bindValue(':blname', $updateBlname ,PDO::PARAM_STR);
            $query->bindValue(':bmobile', $updateBmobile ,PDO::PARAM_STR);
            $query->bindValue(':bemail', $updateBemail ,PDO::PARAM_STR);
            $query->bindValue(':byear', $updateByear ,PDO::PARAM_INT);
            $query->bindValue(':bshift', $updateBshift ,PDO::PARAM_INT);
            $query->bindValue(':bmoney', $updateBmoney ,PDO::PARAM_INT);
            $query->execute();
            //Return ack to display that we have updated the user 
        }       
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

    // get the total entries count for pagination system 
    public function getTotalEntriesOfBranch(){
        if($this->databaseConnection()){
            $query = $this->db_connection->prepare('select count(*) from branch ');
            $query->execute();
            $result = $query->fetchColumn();
            return $result;                
        }
    }

}







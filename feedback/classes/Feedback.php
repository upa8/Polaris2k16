<?php
  
  // This is Polaris class which has our database 
  // connection and main logic functions 
  class Feedback{
      /**
       * @var object $db_connection The database connection
       */
      private $db_connection            = null;
      
      
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

      public function testSuccess(){
      	echo "Hey";
      }
    public function addFeedback($q1 , $q2 ,$q3 , $q4 ,$q5 , $q6 ,$workshop  ){
    	if ($this->databaseConnection()) {
                $query_to_add_in_db = $this->db_connection->prepare('INSERT INTO 
                          feedback (quest1 , quest2 , quest3 , quest4 ,quest5 ,quest6 , workshop) 
                          VALUES (:q1 , :q2 , :q3 , :q4 , :q5 , :q6, :q7)');
                
                $query_to_add_in_db->bindValue(':q1' , $q1 , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':q2' , $q2 , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':q3' , $q3 , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':q4' , $q4 , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':q5' , $q5 , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':q6' , $q6 , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':q7' , $workshop , PDO::PARAM_STR);
                $query_to_add_in_db->execute();      
                                                              
          }  
    }
}





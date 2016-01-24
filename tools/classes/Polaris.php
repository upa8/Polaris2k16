<?php
  require_once('Notifications.php');
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
          $collegeName = $_POST["ecname"];
          //$mobile = $_POST["emobile"];
          $mobile       = isset($_POST['emobile']) ?   $_POST['emobile']  :NULL;
          //$email = $_POST["eemail"];
          $email       = isset($_POST['eemail']) ?   $_POST['eemail']  :NULL;
          //$cost = 500;//$_POST["ecost"];
          $event1       = isset($_POST['event1']) ?   $_POST['event1']  :0;
          $event2       = isset($_POST['event2']) ?   $_POST['event2']  :0;
          $event3       = isset($_POST['event3']) ?   $_POST['event3']  :0;
          $event4       = isset($_POST['event4']) ?   $_POST['event4']  :0;
          $event5       = isset($_POST['event5']) ?   $_POST['event5']  :0;
          $event6       = isset($_POST['event6']) ?   $_POST['event6']  :0;
          $event7       = isset($_POST['event7']) ?   $_POST['event7']  :0;
          $event8       = isset($_POST['event8']) ?   $_POST['event8']  :0;
          $note       = isset($_POST['enote']) ?   $_POST['enote']  :NULL;
          // Write logic to calculate cost of the events 
          $cost = $this->calculateEventCost($event1 , $event2 , $event3 , $event4 , $event5 , $event6 , $event7 , $event8 );
          // Logic ends here of calculating cost 

          if ($this->databaseConnection()) {
                $query_to_add_in_db = $this->db_connection->prepare('INSERT INTO 
                          events (ename , emobile , eemail , ecost ,ecollege , note,event1 , event2 ,event3 ,event4
                           ,event5 ,event6 ,   event7 ,event8  ,regtime) 
                          VALUES (:ename , :emobile , :eemail , :ecost , :ecollege ,:note,
                            :event1 , :event2 ,:event3 ,:event4
                           ,:event5 ,:event6 ,   :event7 ,:event8 ,now())');
                $query_to_add_in_db->bindValue(':ename' , $name , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':emobile' , $mobile , PDO::PARAM_INT);
                $query_to_add_in_db->bindValue(':eemail' , $email , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':ecost' , $cost , PDO::PARAM_INT);
                // Adding new parameters 
                $query_to_add_in_db->bindValue(':ecollege' , $collegeName , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':note' , $note , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':event1' , $event1 , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':event2' , $event2 , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':event3' , $event3 , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':event4' , $event4 , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':event5' , $event5 , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':event6' , $event6 , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':event7' , $event7 , PDO::PARAM_STR);
                $query_to_add_in_db->bindValue(':event8' , $event8 , PDO::PARAM_STR);
                $query_to_add_in_db->execute();                                                      
                // Return something to display that we are done with adding user 
                // Send message to user after adding into databse

                $message = "You have been registered successfully in Polaris2k16";
                $subject = "Polaris2k16 Notifications";
                $this->sendSms($mobile, $message);
                $this->sendEmail($email , $message , $subject);  
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
            $collegeName = $_POST["updateCname"];
           // $mobile = $_POST["updateEmobile"];
            //$email = $_POST["updateEemail"];
            //$note = $_POST["updateEenote"];
            //$cost = $_POST["updateEcost"];
            $eid = $_POST["updateEnumber"];
            // Now update events 

            $mobile       = isset($_POST['updateEmobile']) ?   $_POST['updateEmobile']  :NULL;
            $email       = isset($_POST['updateEemail']) ?   $_POST['updateEemail']  :NULL;
            // Calculate the new cost
            $event1       = isset($_POST['updateEvent1']) ?   $_POST['updateEvent1']  :0;
            $event2       = isset($_POST['updateEvent2']) ?   $_POST['updateEvent2']  :0;
            $event3       = isset($_POST['updateEvent3']) ?   $_POST['updateEvent3']  :0;
            $event4       = isset($_POST['updateEvent4']) ?   $_POST['updateEvent4']  :0;
            $event5       = isset($_POST['updateEvent5']) ?   $_POST['updateEvent5']  :0;
            $event6       = isset($_POST['updateEvent6']) ?   $_POST['updateEvent6']  :0;
            $event7       = isset($_POST['updateEvent7']) ?   $_POST['updateEvent7']  :0;
            $event8       = isset($_POST['updateEvent8']) ?   $_POST['updateEvent8']  :0;
            $note       = isset($_POST['updateEenote']) ?   $_POST['updateEenote']  :NULL;          
            $cost = $this->calculateEventCost($event1 , $event2 , $event3 , $event4 , $event5 , $event6 , $event7 , $event8 );//500;//$_POST["ecost"];
            
            $query = $this->db_connection->prepare('UPDATE events SET ename =:ename , 
                            emobile =:emobile , eemail=:eemail,ecost=:ecost, ecollege = :ecollege,
                            event1 =:event1,event2 =:event2, event3 =:event3, event4 =:event4, 
                            event5 =:event5, event6 =:event6, event7 =:event7, event8 =:event8,
                            note =:note  
                            where eid =:eid');
            $query->bindValue(':eid', $eid ,PDO::PARAM_INT);
            $query->bindValue(':ename', $name ,PDO::PARAM_STR);
            $query->bindValue(':emobile', $mobile ,PDO::PARAM_STR);
            $query->bindValue(':eemail', $email ,PDO::PARAM_STR);
            $query->bindValue(':ecost', $cost ,PDO::PARAM_INT);
            $query->bindValue(':ecollege', $collegeName ,PDO::PARAM_STR);
            $query->bindValue(':event1', $event1 ,PDO::PARAM_STR);
            $query->bindValue(':event2', $event2 ,PDO::PARAM_STR);
            $query->bindValue(':event3', $event3 ,PDO::PARAM_STR);
            $query->bindValue(':event4', $event4 ,PDO::PARAM_STR);
            $query->bindValue(':event5', $event5 ,PDO::PARAM_STR);
            $query->bindValue(':event6', $event6 ,PDO::PARAM_STR);
            $query->bindValue(':event7', $event7 ,PDO::PARAM_STR);
            $query->bindValue(':event8', $event8 ,PDO::PARAM_STR);
            $query->bindValue(':note', $note ,PDO::PARAM_STR);
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
    
    
    public function SendEmail($mailTo , $emailMessage , $subject){

          $to = $mailTo;
      		$siteName = "Polaris2k16.in";
      		$name = "Pratik Upacharya";
      		$mail = 'info@polaris2k16.in';
      		$subject = $subject;
      		$message = $emailMessage;
      		$mailSub = $subject;
          $body = "";
      	//	$body .=  $subject ;
      		$body .=  $message;
      		$header = 'From: ' . $mail . "\r\n";
      		$header .= 'Reply-To:  ' . $mail . "\r\n";
      		$header .= 'X-Mailer: PHP/' . phpversion();
      		mail($to, $mailSub, $body, $header);
      	
    }

    public function sendSms( $moibileNumber , $textMessage){
        	$mobile = $moibileNumber;//7588948588;
    	    $message = str_replace(' ', '%20', $textMessage)  ;//" Hi%20working%20sms%20api";
    	    $url = "http://smslane.com/vendorsms/pushsms.aspx?user=Pratik_Upacharya&password=polaris123!&msisdn=91".$mobile."&sid=WEBSMS&msg=".$message."&fl=0";
    	    //$this->messages[] = $url ;  
    	    $ch = curl_init();
    	    curl_setopt($ch, CURLOPT_URL, $url); 
    	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    	    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/6.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.7) Gecko/20050414 Firefox/1.0.3");
    	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    	    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
    	    $result = curl_exec ($ch); 
    	    curl_close ($ch);
	}

  public function calculateEventCost($event1 , $event2, $event3, $event4, $event5, $event6, $event7, $event8){
          
          $event1cost = 150;
          $event2cost = 200;
          $event3cost = 500;
          $event4cost = 200;
          $event5cost =  50;
          $event6cost = 400;
          $event7cost = 400;
          $event8cost = 400;
          $cost = $event1cost*$event1 + $event2cost*$event2 +$event3cost*$event3 +$event4cost*$event4
                  +$event5cost*$event5 +$event6cost*$event6 +$event7cost*$event7 +$event8cost*$event8; 
          return $cost;
  }
}





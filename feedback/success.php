<?php 
	
	require_once('config/config.php');
    require_once('classes/Feedback.php');
    $feedback = new Feedback();
    

    $ans1 = isset($_POST['question1_op']) ? $_POST['question1_op'] : 4;
    $ans2 = isset($_POST['question2_op']) ? $_POST['question2_op'] : 4;
    $ans3 = isset($_POST['question3_op']) ? $_POST['question3_op'] : 4;
    $ans4 = isset($_POST['question4_op']) ? $_POST['question4_op'] : 4;
    $ans5 = isset($_POST['question5']) ? $_POST['question5'] : NULL;
    $ans6 = isset($_POST['question6']) ? $_POST['question6'] : NULL;
   	$ans7 = isset($_POST['workshop']) ? $_POST['workshop'] : NULL;
    $feedback->addFeedback($ans1 , $ans2 , $ans3, $ans4 ,$ans5 , $ans6 , $ans7);
   // $feedback->testSuccess();
   	require_once('thankyou.php');

?>
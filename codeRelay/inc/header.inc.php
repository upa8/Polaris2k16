<?php require_once("connect.inc.php"); 
  ob_start();
  session_start();
?>
<html>
<head>
	<title>CodeRelay</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<!-- navbar -->
	<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">CodeRelay</a>
    </div>
    <div>
      <ul class="nav navbar-nav pull-right">
        <?php
          /*menu when user is not loggedin*/
          if(isset($_SESSION['id'])){

            echo "
            <li><a href='index.php'>Test</a></li>
            <!-- 
              <li><a href='leaderboard.php'>Leaderboard</a></li>
            -->
            <li><a href='logout.php'>Logout</a></li>";
          }else{/*menu when user is loggedin*/
            echo "<li><a href='login.php'>Login</a></li>
                  <!-- 
                  <li><a href='register.php'>Register</a></li>
                  -->
                  ";
          }
          
        ?>
        
      </ul>
    </div>
  </div>
</nav>
	<!-- /navbaer -->
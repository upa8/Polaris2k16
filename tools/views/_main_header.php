
<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Polaris Admin!</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <!-- Angular Js -->
      <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

      <link rel="stylesheet" type="text/css" >
    </head>
    <body>
    <div class="container">                   
          <div class="row">
              <div class="col-sm-4" ></div>
                <div class="col-sm-4" >
                    <h1><a href="index.php">Admin Panel</a></h1>    
                <p>
                  <?php
                  // show potential errors / feedback (from login object)
                      if (isset($login)) {
                          if ($login->errors) {
                              foreach ($login->errors as $error) {
                                  echo $error;
                              }
                          }
                          if ($login->messages) {
                              foreach ($login->messages as $message) {
                                  echo $message;
                              }
                          }
                      }
                    ?>
                    <?php
                  // show potential errors / feedback (from registration object)
                        if (isset($registration)) {
                            if ($registration->errors) {
                                foreach ($registration->errors as $error) {
                                    echo $error;
                                }
                            }
                            if ($registration->messages) {
                                foreach ($registration->messages as $message) {
                                    echo $message;
                                }
                            }
                        }
                    ?>
                  </p>
                  </div>
              <div class="col-sm-3" ></div>
              <div class="col-sm-1"><br>
                <button type="button" class="btn btn-warning" onclick="document.location='index.php?logout'">logout</button>
              </div>
  
        </div>

		
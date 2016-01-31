<!DOCTYPE html>
<html lang="en">
<head>
  <title>Polaris</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    
<div class="container">
  <center>
    <h2>Feedback Form (CodeRelay)</h2>
  </center>
  <br>
  <br>
  <h5>
    
  
  <br>

  </h5>
  <?php

  ?>

  <form class="form-horizontal" role="form" action="success.php" method="post">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Question1</a></li>
        <li><a data-toggle="tab" href="#menu1">Question2</a></li>
        <li><a data-toggle="tab" href="#menu2">Question3</a></li>
        <li><a data-toggle="tab" href="#menu3">Question4</a></li>
        <li><a data-toggle="tab" href="#menu4">Question5</a></li>
        <li><a data-toggle="tab" href="#menu5">Question6</a></li>
        
      </ul>

      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
          <h3>Organization of "code relay" ? .</h3>
          <div class="form-group">
            <label class="control-label col-sm-2" for="question1"></label>
              <div class="radio">
                <label><input type="radio" name="question1_op" value="4">Good</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question1_op" value="3">Bad</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question1_op" value="2">Satisfied</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question1_op" value="1">Poor</label>
              </div>

          </div>
        </div>
        <div id="menu1" class="tab-pane fade">
          <h3>Quality of problem statements . </h3>
          <div class="form-group">
            <label class="control-label col-sm-2" for="question2"></label>
            <div class="radio">
                <label><input type="radio" name="question2_op" value="4">Excellent</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question2_op" value="3">Good</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question2_op" value="2">Average </label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question2_op" value="1">Poor</label>
              </div>
          </div>
        </div>
        <div id="menu2" class="tab-pane fade">
          <h3>  Real time use and application of experience gained here  .</h3>
          <div class="form-group">
            <label class="control-label col-sm-2" for="question3"></label>
              <div class="radio">
                <label><input type="radio" name="question3_op" value="4">Useful</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question3_op" value="3">Not useful</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question3_op" value="2">Not sure</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question3_op" value="1">Disagree</label>
              </div>
          </div>
        </div>
        <div id="menu3" class="tab-pane fade">
          <h3>Overall experience .</h3>
          <div class="form-group">
            <label class="control-label col-sm-2" for="question4"></label>
              
              <div class="radio">
                <label><input type="radio" name="question4_op" value="4">Excellent</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question4_op" value="3">Good</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question4_op" value="2">Average</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question4_op" value="1">Poor</label>
              </div>
          </div>
        </div>
        <div id="menu4" class="tab-pane fade">
          <h3>What could have been done to improve the CodeRelay?</h3>
          <div class="form-group">
            <label class="control-label col-sm-2" for="question5"></label>
              <textarea class="form-control" rows="5" id="question5" name="question5" required></textarea>
          </div>
        </div>
        <div id="menu5" class="tab-pane fade">
          <h3>Additional Comments or suggestions</h3>
          <div class="form-group">
            <label class="control-label col-sm-2" for="question6"></label>
              <textarea class="form-control" rows="5" id="question6" name="question6" required></textarea>
          </div>
          <div class="form-group">
              <input type="hidden" class="form-control"  id="workshop" name="workshop" value="4" required></input>
          </div>
        </div>
      </div>
      <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>

</div>

</body>
</html>


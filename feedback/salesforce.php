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
    <h2>Feedback Form</h2>
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
          <h3>I felt that the workshop was well organized and the main points were well covered and clarified.</h3>
          <div class="form-group">
            <label class="control-label col-sm-2" for="question1"></label>
              <div class="radio">
                <label><input type="radio" name="question1_op" value="4">Strongly Agree</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question1_op" value="3">Agree</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question1_op" value="2">Not sure</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question1_op" value="1">Disagree</label>
              </div>

          </div>
        </div>
        <div id="menu1" class="tab-pane fade">
          <h3>I felt that the facilitator demonstrated comprehensive knowledge of the subject matter.</h3>
          <div class="form-group">
            <label class="control-label col-sm-2" for="question2"></label>
            <div class="radio">
                <label><input type="radio" name="question2_op" value="4">Strongly Agree</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question2_op" value="3">Agree</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question2_op" value="2">Not sure</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question2_op" value="1">Disagree</label>
              </div>
          </div>
        </div>
        <div id="menu2" class="tab-pane fade">
          <h3>I felt that the facilitator conveyed ideas effectively and clearly and the material was informative and easy to understand.</h3>
          <div class="form-group">
            <label class="control-label col-sm-2" for="question3"></label>
              <div class="radio">
                <label><input type="radio" name="question3_op" value="4">Strongly Agree</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question3_op" value="3">Agree</label>
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
          <h3>I gained usable skills and will be able to apply them to my academic or personal life.</h3>
          <div class="form-group">
            <label class="control-label col-sm-2" for="question4"></label>
              
              <div class="radio">
                <label><input type="radio" name="question4_op" value="4">Strongly Agree</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question4_op" value="3">Agree</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question4_op" value="2">Not sure</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="question4_op" value="1">Disagree</label>
              </div>
          </div>
        </div>
        <div id="menu4" class="tab-pane fade">
          <h3>What could have been done to improve the workshop?</h3>
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
              <input type="hidden" class="form-control"  id="workshop" name="workshop" value="2" required></input>
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


<!-- Modals For Event and College  -->
<!-- Modal For Adding Student  -->
<div class="modal fade" id="addEventStudent" role="dialog">
	<div class="modal-dialog">
	  <!-- Modal content-->
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <center>	  
	      	<h4 class="modal-title">Add Student</h4>
	      </center>
	    </div>
	    <div class="modal-body">
	      <form role="form" action="events.php" method="POST">
                  <div class="form-group">
                    <label >Name :</label>
                    <input type="text" class="form-control" id="ename" name="ename" required>
                  </div>
                  <div class="form-group">
                    <label >Mobile :</label>
                    <input type="number" class="form-control" id="emobile" name="emobile" required>
                  </div>
                  <div class="form-group">
                    <label >Email :</label>
                    <input type="email" class="form-control" id="eemail" name="eemail" required>
                  </div>
                  <div class="form-group">
                    <label >Cost :</label>
                    <input type="number" class="form-control" id="ecost" name="ecost" required>
                  </div>
                  <div class="form-group">
                    <input type="hidden" class="form-control" id="formtype" name="formtype" value=1 >
                  </div>
                  <center>
                  	<button type="submit" class="btn btn-primary">Submit</button>
                  </center>
            </form>
	    </div>
	    <div class="modal-footer">
	    </div>
	  </div>	  
	</div>
</div>

<!-- Modal For Editing and showing details of  Student  -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
	  <!-- Modal content-->
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Add Student</h4>
	    </div>
	    <div class="modal-body">
	      <form role="form" action="events.php" method="POST">
                  <div class="form-group">
                    <label >Name :</label>
                    <input type="text" class="form-control" id="ename" name="ename">
                  </div>
                  <div class="form-group">
                    <label >Mobile :</label>
                    <input type="number" class="form-control" id="emobile" name="emobile" >
                  </div>
                  <div class="form-group">
                    <label >Email :</label>
                    <input type="email" class="form-control" id="eemail" name="eemail" >
                  </div>
                  <div class="form-group">
                    <label >Cost :</label>
                    <input type="number" class="form-control" id="ecost" name="ecost" >
                  </div>
                  <div class="form-group">
                    <input type="hidden" class="form-control" id="formtype" name="formtype" value=1 >
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
            </form>
	    </div>
	    <div class="modal-footer">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    </div>
	  </div>	  
	</div>
</div>
    
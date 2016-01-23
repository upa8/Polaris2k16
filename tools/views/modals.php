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
            <?php 
                echo '<form role="form" action="events.php?page_id='.$page_id.'" method="POST">
                      ';
            ?>
            <!-- Row starts here --> 
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label >Name :</label>
                  <input type="text" class="form-control" id="ename" name="ename" required>
                </div>
                <div class="form-group">
                  <label > College Name :</label>
                  <input type="text" class="form-control" id="ecname" name="ecname" required>
                </div>
              </div>
              <div class="col-sm-4">

                <div class="form-group">
                  <label >Mobile :</label>
                  <input type="number" class="form-control" id="emobile" name="emobile" required>
                </div>
                <div class="form-group">
                  <label><input type="checkbox" value="1" name="event1">Code Relay</label>
                  <label><input type="checkbox" value="1" name="event2">Crack-Jack</label>
                  <label><input type="checkbox" value="1" name="event3">Projet</label>
                  <label><input type="checkbox" value="1" name="event4">Hotheads</label>
                  <label><input type="checkbox" value="1" name="event5">Lords of stages</label>
                  <label><input type="checkbox" value="1" name="event6">Linux</label>
                  <label><input type="checkbox" value="1" name="event7">SalesForce</label>
                  <label><input type="checkbox" value="1" name="event8">Android</label>
                </div>

              </div>
              
              <div class="col-sm-4">

                <div class="form-group">
                  <label >Email :</label>
                  <input type="email" class="form-control" id="eemail" name="eemail" >
                </div>
                <div class="form-group">
                  <label >Note :</label>
                  <textarea class="form-control" rows="2" id="enote" name="enote"></textarea>
                </div>
              </div>
            </div>
            <!-- Row ends here -->
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
<div class="modal fade" id="eventStudentInfo" role="dialog">
	<div class="modal-dialog">
	  <!-- Modal content-->
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Update Student</h4>
	    </div>
	    <div class="modal-body">
                <p id="id"></p>
        	      <?php 
                  echo '<form role="form" action="events.php?page_id='.$page_id.'" method="POST">
                ';
                ?>
               <div class="form-group">
                  <label >Name :</label>
                  <input type="text" class="form-control" id="updateEname" name="updateEname">
                </div>
                <div class="form-group">
                  <label >Mobile :</label>
                  <input type="number" class="form-control" id="updateEmobile" name="updateEmobile" >
                </div>
                <div class="form-group">
                  <label >Email :</label>
                  <input type="email" class="form-control" id="updateEemail" name="updateEemail" >
                </div>
                <div class="form-group">
                  <label >Cost :</label>
                  <input type="number" class="form-control" id="updateEcost" name="updateEcost" >
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" id="updateEnumber" name="updateEnumber">
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" id="formtype" name="formtype" value=3 >
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
    
<!-- Modals for college Page --> 

<!-- Modal For Adding Student Into Branch table -->
<div class="modal fade" id="addBranchStudent" role="dialog">
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
            <?php 
                echo '<form role="form" action="college.php?page_id='.$page_id.'" method="POST">
                      ';
            ?>
              <div class="form-group">
                <label >First Name*</label>
                <input type="text" class="form-control" id="addFirstName" name="addFirstName" required>
              </div>
              <div class="form-group">
                <label >Middle Name </label>
                <input type="text" class="form-control" id="addMiddleName" name="addMiddleName">
              </div>
              <div class="form-group">
                <label >Last Name*</label>
                <input type="text" class="form-control" id="addLastName" name="addLastName" required>
              </div>
              <div class="form-group">
                <label >Mobile*</label>
                <input type="number" class="form-control" id="addMobile" name="addMobile" required>
              </div>
              <div class="form-group">
                <label >Email*</label>
                <input type="email" class="form-control" id="addEmail" name="addEmail" required>
              </div>
              <div class="form-group">
                <label >Shift*(1- for first , 2- for second)</label>
                <input type="number" class="form-control" id="addShift" name="addShift" required>
              </div>
              <div class="form-group">
                <label >Year*</label>
                <input type="number" class="form-control" id="addYear" name="addYear" required>
              </div>
              <div class="form-group">
                <label >Cost*</label>
                <input type="number" class="form-control" id="addCost" name="addCost" required>
              </div>
              <div class="form-group">
                <input type="hidden" class="form-control" id="formtype" name="formtype" value=4 >
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
<div class="modal fade" id="branchStudentInfo" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Student</h4>
      </div>
      <div class="modal-body">
                <p id="id"></p>
                <?php 
                    echo '<form role="form" action="college.php?page_id='.$page_id.'" method="POST">
                ';
                ?>
               <div class="form-group">
                  <label >First Name*</label>
                  <input type="text" class="form-control" id="updateBfname" name="updateBfname" required>
                </div>
                <div class="form-group">
                  <label >Middle Name :</label>
                  <input type="text" class="form-control" id="updateBmname" name="updateBmname" >
                </div>
                <div class="form-group">
                  <label >Last Name*</label>
                  <input type="text" class="form-control" id="updateBlname" name="updateBlname" required>
                </div>
                <div class="form-group">
                  <label >Mobile*</label>
                  <input type="text" class="form-control" id="updateBmobile" name="updateBmobile" required>
                </div>
                <div class="form-group">
                  <label >Email*</label>
                  <input type="text" class="form-control" id="updateBemail" name="updateBemail" >
                </div>
                <div class="form-group">
                  <label >Shift :</label>
                  <input type="number" class="form-control" id="updateBshift" name="updateBshift">
                </div>
                <div class="form-group">
                  <label >Year*</label>
                  <input type="number" class="form-control" id="updateByear" name="updateByear">
                </div>
                <div class="form-group">
                  <label >Cost*</label>
                  <input type="number" class="form-control" id="updateBmoney" name="updateBmoney">
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" id="updateBnumber" name="updateBnumber">
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" id="formtype" name="formtype" value=6 >
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

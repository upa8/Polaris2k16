<hr>
<div class="row">
	<div class="col-sm-11">
	</div>
	<div class="col-sm-1">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEventStudent">Add</button>
	</div>
</div>
<?php 
	if (isset($_POST["formtype"])) {
		 $type = $_POST["formtype"];
		 switch ($type) {
		 	// Case 1 to add data into the database 
		 	case 1:
		 		# code...
		 		$Polaris->addStudentIntoEventTable();
		 		break;
		 	// Case 2 to delete the student from the database 
		 	case 2: 
		 		# code...
		 		$Polaris->deleteStudentInforFromEventTable();
		 		break;
		 	// Case 3 to edit the student information into the database 
		 	case 3: 
		 		# code...
		 		$Polaris->updateStudentInfoInEventTable();
		 		break;
		 	
		 	default:
		 		# code...
		 		break;
		 }
         
     } 
?>

<div class="row">
	<?php
		//$Polaris->totalStudents();
	?>
	<table class="table">
	    <thead>
	      <tr>
	        <th>Id</th>
	        <th>Name</th>
	        <th>Mobile</th>
	        <th>Cost</th>
	        <th>Action</th>
	      </tr>
	    </thead>
		<!-- Add pagination as well as -->
	    <tbody>
	      <tr class="success">
	        <td>1</td>
	        <td>Admin</td>
	        <td>7588948588</td>
	        <td>200</td>
	        <td>
	        	<button type="button" class="btn btn-info">Info</button>
	        	<button type="button" class="btn btn-danger">Delete</button>
	        </td>
	      </tr>
	      <tr class="danger">
	      </tr>
	      <tr class="info">
	      </tr>
	    </tbody>
  </table>
  <center>
	  <ul class="pagination">
	    <li class="active"><a href="#">1</a></li>
	    <li><a href="#">2</a></li>
	    <li><a href="#">3</a></li>
	    <li><a href="#">4</a></li>
	    <li><a href="#">5</a></li>
	  </ul>
  </center>
</div>

<!-- Modals for events -->
<?php
	include('modals.php');
?>

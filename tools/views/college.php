	<?php 
		// This is for pagination of the page 
		$start=0;
	    $limit=10;
	    $page_id = 0;

	    if(isset($_GET['page_id'])){
	        $page_id=$_GET['page_id'];
	        $start=($page_id-1)*$limit;
	    }
	?>
	<?php	
		// This is controller coder of our page 
		// For college page , it will be different than 
		// our event page   
		// We can use this in a page and add that page 
		// in this file to avoid redundancy 
		
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
			 		$Polaris->deleteStudentInfoFromEventTable();
			 		break;
			 	// Case 3 to edit the student information into the database 
			 	case 3: 
			 		# code...
			 		$Polaris->updateStudentInfoIntoEventTable();
			 		break;
			 	case 4:
			 		# code...
			 		$Polaris->addStudentIntoBranchTable();
			 		break;
			 	case 5:
			 		# code...
			 		$Polaris->deleteStudentFromBranchTable();
			 		break;
			 	case 6:
			 		# code...
			 		$Polaris->updateStudentInfoIntoBranchTable();
			 		break;
			 	default:
			 		# code...
			 		break;
			 }
	     }
	
	?>

	<?php 
		
		include("views/_main_header.php");

	?>
	<hr>
	<!-- A row starts here -->
	<div class="row">
		<div class="col-sm-11">
		</div>
		<div class="col-sm-1">
			<button type="button" class="btn btn-primary" data-toggle="modal" 
					data-target="#addBranchStudent">Add</button>
		</div>
	</div>
	<!-- A row ends here -->

	<!-- A row starts here -->
	<div class="row">
  		<!-- Table responsive div starts here -->
		<div class="table-responsive">
			<table class="table">
		    	<thead>
		      		<tr>
		        		<th>Id</th>
				        <th>First Name</th>
				        <th>Last Name</th>
				        <th>Shift</th>
				        <th>Year</th>
				        <th>Mobile</th>
				        <th>Money</th>
				        <th>Action</th>
		      		</tr>
		    	</thead>
				<!-- Add pagination as well as -->
				<tbody>
				<?php
						//Here get the entries of branch
						// So pass parameter as a branch in this 
						// following function 
						$rowCount = $Polaris->getTotalEntriesOfBranch();
						$total = ceil($rowCount/$limit);
						$count = ($page_id - 1)*$limit + 1;
						
						// Get the event details of the brnach student 
						// So pass branch as a parameter in this function
						// Directly get an array a result from this function
						// So that we could just display that as a views  

						$query = $Polaris->getSelectedBranchStudentData($page_id);
						
						while($result = $query->fetchObject()){
								
								$color = $count % 3;
								
								switch ($color) {
										case 0:
											# code...
											echo '<tr class="success">';
											break;
										case 1:
											# code...
											echo '<tr class="active">';
											break;
										case 2:
											# code...
											echo '<tr class="infor">';
											break;
										default:
											# code...
											break;
								}
							
							// Now change this variables into the branch and shift and year 

							echo '<td>'.$count.'</td>
						          <td>'.$result->bfname.'</td>
						          <td>'.$result->blname.'</td>
						          <td>'.$result->bshift.'</td>
						          <td>'.$result->byear.'</td>
						          <td>'.$result->bmobile.'</td>
						          <td>'.$result->bmoney.'</td>						          
						          <td>
						        	 <form role="form" action="college.php?page_id='.$page_id.'" method="POST">
						                  <div class="form-group">
						                    <input type="hidden" class="form-control" id="bdeleteId" name="bdeleteId" value='.$result->bid.'>
						                  </div>
						                  <div class="form-group">
						                    <input type="hidden" class="form-control" id="formtype" name="formtype" value=5>
						                  </div>
						          ';
						    
						    echo " <button type=\"button\" onclick='updateBranchStudentInfoModal(".$result->bid.",\"".$result->bfname."\",\"".$result->bmname."\",\"".$result->blname."\",\"".$result->bmobile."\",\"".$result->bemail."\",\"".$result->bshift."\",\"".$result->byear."\",\"".$result->bmoney."\")' class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#branchStudentInfo\">Info</button>
						  	     ";
						    echo '	<button type="submit" class="btn btn-danger">Delete</button>
                 					</form>
							        </td>
	        					    </tr>
								 ';
							$count++;
						}		
				?>	   
				</tbody> 
	  		</table>
  		<div>
  		<!-- Table responsive div ends here -->
  		<!-- Center tag starts here -->
  		<center>
	  		<ul class="pagination">
	  			<?php 
	  				if($page_id>1){
                  		echo "<a href='?page_id=".($page_id-1)."' class='button'>PREVIOUS</a>";
                	}
	                if($page_id!=$total){
   	                    echo "<a href='?page_id=".($page_id+1)."' class='button'>NEXT</a>";
	                }

                	echo "<ul class='page'>";

                    for($i=1;$i<=$total;$i++){
                      
                      	if($i==$page_id) { 
                      		echo "<li class='active'>".$i."</li>"; 
                      	}else { 
                      		echo "<a href='?page_id=".$i."'>".$i."</a> "; 
                      	}
                  	}
	  			?>
	 
	  		</ul>
  		</center>
	</div>
	<!-- A row ends here -->

	<!-- We can add following Javascript into a separete js file -->
	<!-- 
		Following is a javascript which is used to display selected 
		users information into the modal 
	-->
	<script>
		
		// This is function which is used to show users information 
		// into the modal's sections 
		function updateBranchStudentInfoModal(bid, bfname , bmname , blname , bmobile, bemail,bshift , byear , bmoney  ) {		
		    document.getElementById("updateBnumber").value = bid;
		    document.getElementById("updateBfname").value = bfname;
		    document.getElementById("updateBmname").value = bmname;
		    document.getElementById("updateBlname").value = blname;
		    document.getElementById("updateBshift").value = bshift;
		    document.getElementById("updateByear").value = byear;
		    document.getElementById("updateBmoney").value = bmoney;
		    document.getElementById("updateBmobile").value = bmobile;
		    document.getElementById("updateBemail").value = bemail;
		}

	</script>
	<!-- Script ends here -->

	<!-- All Modals for entire application -->	
	<?php
		include('modals.php');
	?>
	<!-- Addition of modals ends here  -->

	<!-- College page ends here -->
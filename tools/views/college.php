<?php 
	$start=0;
    $limit=10;
    $page_id = 0;

    if(isset($_GET['page_id'])){
        $page_id=$_GET['page_id'];
        $start=($page_id-1)*$limit;
    }
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
		 	default:
		 		# code...
		 		break;
		 }
     } 
?>
<?php include("views/_main_header.php");?>
<hr>
<div class="row">
	<div class="col-sm-11">
	</div>
	<div class="col-sm-1">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEventStudent">Add</button>
	</div>
</div>
<div class="row">
	<div class="table-responsive">
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
			<?php
				$rowCount = $Polaris->getTotalEntries();
				$total = ceil($rowCount/$limit);
				$query = $Polaris->getSelectedEventStudentData($page_id);
				$count = ($page_id - 1)*10 + 1;
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
					// Variable that we are not using here are 
					// $result->eemail 

					echo '<td>'.$count.'</td>
						        <td>'.$result->ename.'</td>
						        <td>'.$result->emobile.'</td>
						        <td>'.$result->ecost.'</td>
						        <td>

						        	 <form role="form" action="events.php" method="POST">
						                  <div class="form-group">
						                    <input type="hidden" class="form-control" id="edeleteId" name="edeleteId" value='.$result->eid.'>
						                  </div>
						                  <div class="form-group">
						                    <input type="hidden" class="form-control" id="formtype" name="formtype" value=2>
						                  </div>
						                  ';
						               	  echo " <button type=\"button\" onclick='updateEventStudentInfoModal(".$result->eid.",\"".$result->ename."\",\"".$result->emobile."\",\"".$result->eemail."\",\"".$result->ecost."\")' class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#eventStudentInfo\">Info</button>
						  	           			";
						               echo '	
						                 		             
                  							<button type="submit" class="btn btn-danger">Delete</button>
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
  <center>
	  <ul class="pagination">
	  	<?php 
	  	if($page_id>1)
                {
                  echo "<a href='?page_id=".($page_id-1)."' class='button'>PREVIOUS</a>";
                }
                if($page_id!=$total)
                {
                  echo "<a href='?page_id=".($page_id+1)."' class='button'>NEXT</a>";
                }

                echo "<ul class='page'>";

                    for($i=1;$i<=$total;$i++)
                {
                      if($i==$page_id) { echo "<li class='active'>".$i."</li>"; }
                      
                      else { echo "<a href='?page_id=".$i."'>".$i."</a> "; }
                  }
	  	?>
	 
	  </ul>
  </center>
</div>

<script>
	function updateEventStudentInfoModal(id, name , mobile , email , cost) {		
	    document.getElementById("updateEnumber").value = id;
	    document.getElementById("updateEname").value = name;
	    document.getElementById("updateEmobile").value = mobile;
	    document.getElementById("updateEemail").value = email;
	    document.getElementById("updateEcost").value = cost;
	}
	function updatePaginationField(){

	}

</script>
<!-- Modals for events -->
<?php
	include('modals.php');
?>

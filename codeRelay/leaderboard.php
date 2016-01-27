<?php
	require_once("inc/header.inc.php");
	/*send the user to login.php if he is not loggedin*/
	if(!isset($_SESSION['id'])){
		header("Location: login.php");
		exit();
	}
?>
	<div class="container">
		<?php
			//a array to store all the user TOTAL MARKS PERCENTAGE etc
			$leader = array();

			//fetch all the user from the database
			$q = mysqli_query($con, "SELECT * FROM 	`user`");
			while($row = mysqli_fetch_assoc($q)){
				$id = $row['id'];
				$username = $row['username'];
				
				//fetch all the mark with this $id
				$markQ = mysqli_query($con,"SELECT * FROM `test_taken` WHERE user_id='$id'");
				$total = 0;
				$mark_obtain = 0;
				while($r = mysqli_fetch_assoc($markQ)){
					$total += $r['total'];
					$mark_obtain += $r['marks_obtain'];
				}
				//if $total is equal to 0 means user has not taken any test so their is not need to show him in the leaderboard
				if($total != 0){
					//calculate the percentage
					$percentage = ($mark_obtain/$total) * 100;

					//store TOTAL ,MARKS_OBTAIN in leader array
					$leader[$id]['total'] = $total;
					$leader[$id]['marks_obtain'] = $mark_obtain;
					$leader[$id]['percentage'] = $percentage;
					$leader[$id]['username'] = $username;
				}
			}

			//sort the array by percentage
			function sortByPer($a, $b) {
    			return $a['percentage'] + $b['percentage'];
			}

			usort($leader, 'sortByPer');
		?>
		<table class="table table-bordered thumbnail">
			<th>Rank</th>
			<th>Username</th>
			<th>Total Marks</th>
			<th>Marks Obtained</th>
			<th>Percentage</th>
			<tr>
			<?php
				$rank = 1;
				foreach($leader as $val){
					?>
					<td><?php echo $rank; ?></td>
					<td><?php echo $val['username']; ?></td>
					<td><?php echo $val['total']; ?></td>
					<td><?php echo $val['marks_obtain']; ?></td>
					<td><?php echo $val['percentage']; ?></td>
					</tr>
					<?php
					$rank++; //increase the ranks
				}
			?>
		</table>
	</div>
<?php
	require_once("inc/footer.inc.php");
?>
<?php
session_start();
require_once('connect.php');
if (!isset($_SESSION['user_id'])) {
	Redirect('index.php');
} else {
	require_once('header.php');
}
?>
<link href="./assets/dashboard.css" rel="stylesheet">
<ul id="mainNav">
	<h1><span>
			<font color="#5494af">Hospital Bed</font>
			<font color="#c66653">Management System</font>
		</span></h1>
	<div class="navElements">
		<li><a href="dashboard.php" class="btn btn-primary">DASHBOARD</a></li>
		<li><a href="patients.php" class="btn btn-primary">PATIENTS</a></li>
		<li><a href="beds.php" class="btn btn-primary active">BEDS</a></li>
		<li class="logout"><a href="logout.php" class="btn btn-primary">LOGOUT</a></li>
	</div>
</ul>

<div id="containerHolder">
	<div id="container">
		<div id="sidebar">
			<ul class="sideNav">
				<li><a href="beds.php" class="btn btn-outline-success">View All Beds</a></li>
				<li><a href="add-bed.php" class="btn btn-outline-success">Add New Bed</a></li>
				<li><a href="modifybed.php" class="active btn btn-outline-success">Modify Beds</a></li>
				<li><a href="deletebed.php" class="btn btn-outline-success">Delete Beds</a></li>
			</ul>
		</div>
		<h2>Modify Beds</h2>

		<div id="main">
			<?php
			if (isset($_POST['submit'])) {
				$bed_id = $_POST['bed_id'];
				$type = $_POST['type'];
				$ward = $_POST['ward'];

				$update_query = "UPDATE beds SET type = '$type', ward = '$ward' WHERE bed_id = $bed_id";
				$update_result = mysqli_query($server, $update_query);
				if ($update_result) {
					$_SESSION['success_msg'] = "Bed details have been updated successfully!";
					header("Location: modifybed.php");
					exit();
				} else {
					echo "<div class='alert alert-danger'>Failed to update bed details. Please try again.</div>";
				}
			}
			?>
			<form method="post">
				<label for="bed_id">Select Bed to Modify:</label>
				<select name="bed_id" id="bed_id">
					<?php
					$result = mysqli_query($server, "SELECT * FROM beds ORDER BY bed_id ASC");
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<option value='$row[bed_id]'>$row[bed_id] - $row[type] - $row[ward]</option>";
					}
					?>
				</select>
			
				<label for="type">Bed Type:</label>
				<input type="text" name="type" class="in" id="type" required>
				
                <label for="ward">Bed Ward:</label>
				<input type="text" name="ward" class="in" id="ward" required>
				<br /><br />
				<input type="submit" name="submit" value="Update Bed Details" class="btn btn-success">
			</form>
		</div>
	</div>
</div>


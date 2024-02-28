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
				<li><a href="modifybed.php" class=" btn btn-outline-success">Modify Beds</a></li>
				<li><a href="deletebed.php" class="active btn btn-outline-success">Delete Beds</a></li>
			</ul>
		</div>
		<h2>Delete Beds</h2>

		<div id="main">
			<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// Get the bed ID and new type from the form
				// Get the bed ID to delete from the form
$bed_id = mysqli_real_escape_string($server, $_POST['bed_id']);

// Delete the bed from the database
$sql = "DELETE FROM beds WHERE bed_id='$bed_id'";
if (mysqli_query($server, $sql)) {
	// Success message
	$_SESSION['success_msg'] = 'Bed deleted successfully!';
	header('Location: modifybed.php');
	exit;
} else {
	// Error message
	$_SESSION['error_msg'] = 'Failed to delete ' . mysqli_error($server);
}

			}
			?>
			<form method="post">
				<label for="bed_id">Select Bed to Delete:</label>
				<select name="bed_id" id="bed_id">
					<?php
					$result = mysqli_query($server, "SELECT * FROM beds ORDER BY bed_id ASC");
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<option value='$row[bed_id]'>$row[bed_id] - $row[type] - $row[ward]</option>";
					}
					?>
				</select>
				<br /><br />
				<input type="submit" name="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this bed?');" class="btn btn-success">
<?php
		require_once('footer.php');
		?>



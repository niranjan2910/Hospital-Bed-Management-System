<?php
session_start();
require_once('connect.php');
if (!isset($_SESSION['user_id'])) {
	Redirect('index.php');
} else {
	require_once('header.php');
}
?>
<link href="./assets/bed.css" rel="stylesheet">
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
				<li><a href="beds.php" class="active btn btn-outline-success ">View All Beds</a></li>
				<li><a href="add-bed.php" class="btn btn-outline-success">Add New Bed</a></li>
				<li><a href="modifybed.php" class="btn btn-outline-success">Modify Beds</a></li>
				<li><a href="deletebed.php" class="btn btn-outline-success">Delete Beds</a></li>
			</ul>
		</div>
		<h2>View All Beds</h2>

		<div id="main">
			<h3>Available Beds</h3>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td><b>Bed ID</b></td>
					<td><b>Type</b></td>
					<td><b>Ward</b></td>
				</tr>
				<?php
				$result = mysqli_query($server, "SELECT * FROM beds ORDER BY bed_id ASC");
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr class=odd>
                                	<td>$row[bed_id]</td>
                                	<td>$row[type]</td>
                                	<td>$row[ward]</td>
                            		</tr>";
									if (isset($_SESSION['success_msg'])) {
										echo "<div class='alert alert-success'>".$_SESSION['success_msg']."</div>";
										unset($_SESSION['success_msg']);
									}
									
				}
				?>
			</table>
			<br /><br />
		</div>
		<?php
		require_once('footer.php');
		?>
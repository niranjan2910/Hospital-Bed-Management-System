<?php
session_start();
require_once('connect.php');
if (!isset($_SESSION['user_id'])) {
	Redirect('index.php');
} else {
	$error = "";
	$msg = "<br><span class=msg>Bed Added Successfully</span><br><br>";
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
				<li><a href="add-bed.php" class="active btn btn-outline-success">Add New Bed</a></li>
				<li><a href="modifybed.php" class="btn btn-outline-success">Modify Beds</a></li>
				<li><a href="deletebed.php" class="btn btn-outline-success">Delete Beds</a></li>
			</ul>
		</div>
		<h2>Add New Bed</h2>

		<div id="main">
			<form method="post" class="jNice">
				<h3>Registration Form</h3>
				<?php
				if (isset($_POST['save'])) {
					$type = $_POST['type'];
					$ward = $_POST['ward'];

					if ($type == "none") {
						$error = "<br><span class=error>Please select a type</span>";
					} elseif ($ward == "none") {
						$error = "<br><span class=error>Please select a ward</span>";
					} else {
						mysqli_query($server, "INSERT INTO beds (type,ward) VALUES ('$type','$ward')");
						echo $msg;
					}

					if ($error != "") {
						echo $error;
					}
				}
				?>
				<main class="form-signin w-100 m-auto">
					<form>
						<div class="form-floating mt-0">
							<select name="type" style="width:220px; height:50px;">
								<option value="">Type</option>
								<option value="Manual">Manual</option>
								<option value="Bariatric">Bariatric</option>
								<option value="Full-Electric">Full-Electric</option>
								<option value="Semi-Electric">Semi-Electric</option>
								<option value="Low Bed">Low Bed</option>
							</select>
							
						</div>
						<div class="form-floating">
							<select name="ward" style="width:220px; height:50px;">
								<option value="">Ward</option>
								<option value="Postnatal">Postnatal</option>
								<option value="Pregnancy">Pregnancy</option>
								<option value="Critical Care">Critical Care</option>
								<option value="Orthopaedic">Orthopaedic</option>
								<option value="Psychiatric">Psychiatric</option>
								<option value="Accidents And Emergency">Accidents And Emergency</option>
								<option value="Paediatric">Paediatric</option>
							</select>
							
						</div>
						<button class="w-100 btn btn-lg btn-primary mt-3" type="submit" name="save" value>submit</button>
					</form>
				</main>
			</form>
			<br /><br />
		</div>
		<?php
		require_once('footer.php');
		?>
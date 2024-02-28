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
		<li><a href="patients.php" class="btn btn-primary active">PATIENTS</a></li>
		<li><a href="beds.php" class="btn btn-primary">BEDS</a></li>
		<li class="logout"><a href="logout.php" class="btn btn-primary">LOGOUT</a></li>
		<div>
</ul>

<div id="containerHolder">
	<div id="container">
		<div id="sidebar">
			<ul class="sideNav">
				<li><a href="patients.php" class="active btn btn-outline-success">View All Patients</a></li>
				<li><a href="add-patient.php" class="btn btn-outline-success">Add New Patient</a></li>
				<li><a href="assign-bed.php" class="btn btn-outline-success">Assign/Unassign Beds</a></li>
			</ul>
		</div>
		<h2>View All Patients</h2>

		<div id="main">
			<h3>Patient Records</h3>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td><b>Patient ID</b></td>
					<td><b>Patient Name</b></td>
					<td><b>Age</b></td>
					<td><b>Gender</b></td>
					<td><b>Blood Group</b></td>
					<td><b>Status</b></td>
					<td><b>Phone Number</b></td>
					<td><b>Doctor Name</b></td>
					<td><b>Admitted On</b></td>

				</tr>
				<?php
				$result = mysqli_query($server, "SELECT p.*,pb.pat_id,pb.bed_id AS bed FROM patients p,pat_to_bed pb WHERE p.pat_id=pb.pat_id ORDER BY p.pat_id DESC
				
				");
				while ($row = mysqli_fetch_row($result)) {
					$status = "";
					if ($row[9] == "none") {
						$status = "Unassigned";
					} elseif ($row[9] > 0) {
						$status = "Admitted <font color=#c66653>{Bed $row[9]}</font>";
					} else {
						$status = "<font color=#33CC99>Discharged</font";
					}
					$rn = $row['0'];
					if (strlen($rn) == 1)
						$rn = "000" . $rn;
					elseif (strlen($rn) == 2)
						$rn = "00" . $rn;
					elseif (strlen($rn) == 3)
						$rn = "0" . $rn;
					elseif (strlen($rn) > 3)
						$rn = $rn;

					echo "<tr class=odd>
                                	<td text-align: left;>$rn</td>
                                	<td text-align: left;>$row[1]</td>
                                	<td text-align: left;>$row[2]</td>
                                	<td text-align: left;>$row[3]</td>
                                	<td text-align: left;>$row[4]</td>
									<td text-align: left;>$status</td>
							        <td text-align: left;>$row[5]</td>
									<td text-align: left;>$row[6]</td>
									<td text-align: left;>$row[7]</td>
			
                            		</tr>";
				}
				?>
			</table>
			<br /><br />
		</div>
		<?php
		require_once('footer.php');
		?>
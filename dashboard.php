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
		<li><a href="dashboard.php" class="btn btn-primary active">DASHBOARD</a></li>
		<li><a href="patients.php" class="btn btn-primary">PATIENTS</a></li>
		<li><a href="beds.php" class="btn btn-primary">BEDS</a></li>
		<li class="logout"><a href="logout.php" class="btn btn-primary">LOGOUT</a></li>
	</div>
</ul>


<div id="containerHolder">
	<div id="container">
		<div id="sidebar">
			<ul class="sideNav">
				<li>
					<h3>Welcome,
						<?php echo $_SESSION['name']; ?>
					</h3>
				</li>
			</ul>
		</div>
		<h2>Dashboard</h2>
		<h3>Statistics</h3>
		<div id="main">
			<table>
				<?php
				$result = mysqli_query($server, "SELECT COUNT(pat_id) FROM patients");
				$row = mysqli_fetch_row($result);

				$result2 = mysqli_query($server, "SELECT COUNT(bed_id) FROM beds");
				$row2 = mysqli_fetch_row($result2);

				$result3 = mysqli_query($server, "SELECT COUNT(pat_id) FROM pat_to_bed WHERE bed_id>0");
				$row3 = mysqli_fetch_row($result3);

				$result4 = mysqli_query($server, "SELECT COUNT(bed_id) FROM pat_to_bed WHERE bed_id>0");
				$row4 = mysqli_fetch_row($result4);

				$result5 = mysqli_query($server, "SELECT COUNT(pat_id) FROM pat_to_bed WHERE bed_id=0 AND bed_id!='none'");
				$row5 = mysqli_fetch_row($result5);

				$row6[0] = $row2[0] - $row4[0];

				$result7 = mysqli_query($server, "SELECT COUNT(pat_id) FROM pat_to_bed WHERE bed_id='none'");
				$row7 = mysqli_fetch_row($result7);
				echo "<tr>
    							<td class=\"tableH\" align=center valign=middle><b>Patients</b></td>
    							<td class=\"tableH\" align=center valign=middle><b>Beds</b></td>
  							</tr>
  							<tr>
    							<td align=center valign=middle>Total - $row[0]</td>
    							<td align=center valign=middle>Total - $row2[0]</td>
							</tr>
  							<tr>
    							<td align=center valign=middle>Admitted - $row3[0]</td>
    							<td align=center valign=middle>Occupied - $row4[0]</td>
							</tr>
  							<tr>
   		 						<td align=center valign=middle>Discharged - $row5[0]</td>
    							<td align=center valign=middle>Vacant - $row6[0]</td>
							</tr>
  							<tr>
   							  <td align=center valign=middle>Unassigned to bed - $row7[0]</td>
    							<td align=center valign=middle>&nbsp;</td>
							</tr>";
				?>
			</table>
			<br /><br />
		</div>
		<?php
		require_once('footer.php');
		?>
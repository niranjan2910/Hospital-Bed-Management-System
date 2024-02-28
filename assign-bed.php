<?php
session_start();
require_once('connect.php');
if (!isset($_SESSION['user_id'])) {
	Redirect('index.php');
} else {
	$error = "";
	$error2 = "";
	$msg = "<br><span class=msg>Bed Assigned Successfully</span>";
	$msg2 = "<br><span class=msg>Bed Has Been Unssigned Successfully</span>";
	require_once('header.php');
}
?>
<link href="./assets/split.css" rel="stylesheet">

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
	</div>
</ul>
<div id="container">
		<div id="sidebar">
			<ul class="sideNav">
				<li><a href="patients.php" class="btn btn-outline-success">VIew All Patients</a></li>
				<li><a href="add-patient.php" class="btn btn-outline-success">Add New Patient</a></li>
				<li><a href="assign-bed.php" class="btn btn-outline-success active">Assign/Unassign Beds</a></li>
			</ul>
		</div>



		<h2>Assign/Unassign Beds</h2>
		<div id="main">
		
        
		
			<form method="post" class="jNice" name="frm1">
				<h3>Assign Beds</h3>
				<?php
				if (isset($_POST['assign'])) {
					$patient = $_POST['patient'];
					$bed = $_POST['bed'];

					if ($patient == "none") {
						$error = "<br><span class=error>Please select a patient</span>";
					} elseif ($bed == "none") {
						$error = "<br><span class=error>Please select a bed</span>";
					} else {
						$result4 = mysqli_query($server, "SELECT * FROM pat_to_bed WHERE bed_id='$bed'");
						if ($row4 = mysqli_num_rows($result4) > 0) {
							$error = "<br><span class=error>Bed $bed has already been assigned to a patient</span>";
						} else {
							mysqli_query($server, "UPDATE pat_to_bed SET bed_id='$bed' WHERE pat_id='$patient'");
							echo $msg;
						}
					}

					if ($error != "") {
						echo $error;
					}
				}
				?>
				<fieldset class="form-floating">
					<?php
				//<p><label>Patient:</label>
				?>
						<!-- include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- define the select element with an ID of "patient" -->
<select name="patient" id="patient" style="width:220px; height:50px;" >
	<option value="">Patient</option>
	<?php
	$result = mysqli_query($server, "SELECT p.pat_id,p.name,pb.pat_id,pb.bed_id FROM patients P, pat_to_bed pb WHERE p.pat_id=pb.pat_id AND pb.bed_id='none' ORDER BY p.pat_id DESC");
	while ($row = mysqli_fetch_row($result)) {
		$rn = $row['0'];
		if (strlen($rn) == 1)
			$rn = "000" . $rn;
		elseif (strlen($rn) == 2)
			$rn = "00" . $rn;
		elseif (strlen($rn) == 3)
			$rn = "0" . $rn;
		elseif (strlen($rn) > 3)
			$rn = $rn;
		echo "<option value=$row[0]>$rn - $row[1]</option>";
	}
	?>
</select>

<!-- define the search input field -->
<input type="text" id="search" placeholder="Search patient name" style="width:220px; height:50px;" />

<script>
// when the search input field changes
$('#search').on('input', function() {
	// get the search value
	var value = $(this).val().toLowerCase();
	// loop through each option in the select element
	$('#patient option').each(function() {
		// get the text of the option
		var text = $(this).text().toLowerCase();
		// if the search value is found in the option text, show the option, otherwise hide it
		if (text.indexOf(value) !== -1) {
			$(this).show();
		} else {
			$(this).hide();
		}
	});
});
</script>


					</p>
					<p><label>Bed:</label>
						<select name="bed" class="input" style="width: 220px;height=50px;">
							<option value="none">Choose</option>
							<?php
							$result2 = mysqli_query($server, "SELECT * FROM beds ORDER BY bed_id DESC");
							while ($row2 = mysqli_fetch_assoc($result2)) {
								echo "<option value=$row2[bed_id]>Bed $row2[bed_id] - $row2[type]</option>";
							}
							?>
						</select>
					</p>
					<input type="submit" value="Assign Bed" name="assign" style="width: 100px;height=20px" />
				</fieldset>
			</form>
			<form method="post" class="jNice" name="frm2">
				
				
						
						<div id="containerHolder">
	
				<h3>Unassign Beds</h3>
				<?php
				if (isset($_POST['unassign'])) {
					$ptb = trim($_POST['ptb']);

					if ($ptb == "none") {
						$error2 = "<br><span class=error>Please select a relationship</span>";
					} else {
						mysqli_query($server, "UPDATE pat_to_bed SET bed_id=0 WHERE pat_id='$ptb'");
						echo $msg2;
					}

					if ($error2 != "") {
						echo $error2;
					}
				}
				?>
				<fieldset class="form-floating">
<select id="ptb" name="ptb" class="input" style="width: 220px;height=40px;">
  <option value="">Patient</option>
  <?php
  $result3 = mysqli_query($server, "SELECT p.pat_id,p.name,pb.pat_id,pb.bed_id FROM patients P, pat_to_bed pb WHERE p.pat_id=pb.pat_id AND pb.bed_id>0 ORDER BY p.pat_id DESC");
  while ($row3 = mysqli_fetch_row($result3)) {
    $rn = $row3['0'];
    if (strlen($rn) == 1)
      $rn = "000" . $rn;
    elseif (strlen($rn) == 2)
      $rn = "00" . $rn;
    elseif (strlen($rn) == 3)
      $rn = "0" . $rn;
    elseif (strlen($rn) > 3)
      $rn = $rn;
    echo "<option value=$row3[0]>Bed $row3[3] to $rn - $row3[1]</option>";
  }
  ?>
</select>
<input type="text" id="myInput" class="input" onkeyup="filterDropdown()" placeholder="Search Patient Name"  />
<script>
  function filterDropdown() {
    // Declare variables
    var input, filter, select, option, i;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    select = document.getElementById('ptb');
    option = select.getElementsByTagName('option');

    // Loop through all options and hide those that don't match the search query
    for (i = 0; i < option.length; i++) {
      if (option[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
        option[i].style.display = '';
      } else {
        option[i].style.display = 'none';
      }
    }
  }
</script>



					<br></br>
					<input type="submit" value="Unassign Bed" name="unassign" style="width: 105px;height=20px" />
				</fieldset>
			</form>
</div>
<?php
		require_once('footer.php');
		?>
					
		
		
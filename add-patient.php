<?php
session_start();
require_once('connect.php');
if (!isset($_SESSION['user_id'])) {
	Redirect('index.php');
} else {
	$error = "";
	$msg = "<br><span class=msg>Patient Added Successfully</span><br><br>";
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
	</div>
</ul>

<div id="containerHolder">
	<div id="container">
		<div id="sidebar">
			<ul class="sideNav">
				<li><a href="patients.php" class="btn btn-outline-success">View All Patients</a></li>
				<li><a href="add-patient.php" class="active btn btn-outline-success">Add New Patient</a></li>
				<li><a href="assign-bed.php" class="btn btn-outline-success">Assign/Unassign Beds</a></li>
			</ul>
		</div>
		<h2>Add New Patient</h2>

		<div id="main">
			<form method="post" class="jNice">
				<h4>Registration Form</h4>
				<?php
				if (isset($_POST['save'])) {
					$salutation = $_POST['salutation'];
					$name = trim($_POST['name']);
					$age = trim($_POST['age']);
					$sex = $_POST['sex'];
					$bg = trim($_POST['bg']);
					$phone = trim($_POST['phone']);
					$doctor=trim($_POST['doctor']);
					date_default_timezone_set('Asia/Kolkata');
                    $date = date('Y-m-d H:i:s');

					if ($name == "") {
						$error = "<br><span class=error>Please enter a name</span>";
					}elseif (!preg_match ("/^[a-zA-z]*$/", $name) ) {  
							$error = "<br><span class=error>Please enter a valid name</span>";   
					}elseif ($age == "") {
						$error = "<br><span class=error>Please enter the age</span>";
					}elseif ($age < 1) {
						$error = "<br><span class=error>Please enter a value greater than zero for age</span>";
					}elseif ($age > 110) {
						$error = "<br><span class=error>Please enter a valid age</span>";
					}elseif (!is_numeric($age)) {
						$error = "<br><span class=error>Age must be a number</span>";
					} elseif ($sex == "none") {
						$error = "<br><span class=error>Please select the sex</span>";
					} elseif ($bg == "") {
						$error = "<br><span class=error>Please enter a blood group</span>";
					} elseif ($phone == "") {
						$error = "<br><span class=error>Please enter the phone number</span>";
					} elseif (strlen($phone) > 10) {
		                $error = "<br><span class=error>Please enter a valid phone number</span>";
					}elseif ($doctor == "") {
						$error = "<br><span class=error>Please enter a name</span>";
					} elseif ($date == "") {
						$error = "<br><span class=error>Please enter the date</span>";
					}
					else {
                        $doctor = "Dr. " . $doctor;
						$name = $salutation . $name;
						// var_dump($name,$age,$sex,$bg,$phone,$doctor);
						mysqli_query($server, "INSERT INTO patients (name,age,sex,blood_group,phone,doctor,Date) VALUES ('$name','$age','$sex','$bg','$phone','$doctor','$date')");
						$result = mysqli_query($server, "SELECT pat_id FROM patients ORDER BY pat_id DESC LIMIT 0,1");
						$row = mysqli_fetch_array($result);

						mysqli_query($server, "INSERT INTO pat_to_bed (pat_id,bed_id) VALUES ('$row[pat_id]','none')");
						echo $msg;
					}

					if ($error != "") {
						echo $error;
					}
					//if (isset($_POST['dropdown'])) {
					//	$selectedOption = $_POST['dropdown'];
						// do something with the selected option
					//}
					
				}
				?>
				<main class="form-signin w-100 m-auto">
					<form>
						<div class="seperate">
					
<select name="salutation" style="width:100px; height: 50px;">
<option value="">Salutation</option>
  <option value="Mr.">Mr.</option>
  <option value="Mrs.">Mrs.</option>
  <option value="Ms.">Ms.</option>
  <option value="Dr.">Dr.</option>
</select>
							<div class="form-floating mt-0" >
								<input type="text" class="input-box" id="floatingInput" placeholder="Patient Name"
									name="name"  >
								
							</div>
							<div class="form-floating ">
								<input type="number" class="input-box" id="floatingInput" placeholder="Age"
									name="age" style="width:220px;">
								
							</div>
						</div>
						<div class="seperate">
						<div method="POST" >
    
						<select name="sex" style="width:280px; height:50px;" >
  <option value="">Gender</option>
  <option value="Male">Male</option>
  <option value="Female">Female</option>
  <option value="Transgender">Transgender</option>
</select>
			</div>

						
			
				

							<div class="form-floating mt-0">
							<select name="bg" style="width:280px; height:50px;" >
  <option value="">Blood Group</option>
  <option value="O+ve">O+ve</option>
  <option value="O-ve">O-ve</option>
  <option value="A+ve">A+ve</option>
  <option value="A-ve">A-ve</option>
  <option value="B+ve">B+ve</option>
  <option value="B-ve">B-ve</option>
  <option value="AB+ve">AB+ve</option>
  <option value="AB-ve">AB-ve</option>
  
</select>
			</div>
						</div>
						<div class="form-floating mt-0">
							<input type="text" class="inputt" id="floatingInput" placeholder="Phone Number"
								name="phone">
							
						</div>
						
						<div class="form-floating mt-0">
								<input type="text" class="input" id="floatingInput" placeholder="Doctor Name"
									name="doctor">
								
						</div>
						<button class="w-100 btn btn-lg btn-primary mt-3" type="submit" name="save" value="Save">Submit</button>
					</form>
				</main>
			</form>
			<br /><br />
		</div>
		<?php
		require_once('footer.php');
		?>
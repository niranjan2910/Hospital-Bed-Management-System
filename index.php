<?php
require_once('header.php');
require_once('connect.php');
$error = "";
?>
<link href="./assets/sign-in.css" rel="stylesheet">
<div id="containerHolder">
	<div id="container">
		<h1><span>
				<font color="#5494af">Hospital Bed</font>
				<font color="#c66653">Management System</font>
			</span></h1>
		<h2>User Login</h2>
		<h1 class="h3 mb-3 fw-normal">Please sign in</h1>
		<div id="main">
			<form method="post" class="jNice" name="frm1">
				<?php
				if (isset($_POST['save'])) {
					$uname = $_POST['uname'];
					$pword = $_POST['pword'];

					if ($uname == "") {
						$error = "<h5 class=\"error mb-0\">Please enter a username</h5>";
					} elseif ($pword == "") {
						$error = "<h5 class=\"error mb-0\">Please enter the password</h5>";
					} else {
						$result = mysqli_query($server, "SELECT * FROM users WHERE uname='$uname' AND pword='$pword'");
						if (mysqli_num_rows($result) == 0) {
							$error = "<h5 class=\"error mb-0\">Invalid Username/Password</h5>";
						} else {
							$row = mysqli_fetch_array($result);
							session_start();
							$_SESSION['user_id'] = $row['user_id'];
							$_SESSION['name'] = $row['name'];
							Redirect('dashboard.php');
						}
					}
					if ($error != "") {
						echo $error;
					}
				}
				?>
				<main class="form-signin w-100 m-auto">
					<form>
						<div class="form-floating mt-0">
							<input type="text" class="form-control" id="floatingInput" placeholder="name" name="uname">
							<label for="floatingInput">Username</label>
						</div>
						<div class="form-floating">
							<input type="password" class="form-control" id="floatingPassword" placeholder="Password"
								name="pword">
							<label for="floatingPassword">Password</label>
						</div>
						<button class="w-100 btn btn-lg btn-primary mt-3" type="submit" name="save" value="Log In">Sign
							in</button>
					</form>
				</main>
		</div>
		<?php
		require_once('footer.php');
		?>
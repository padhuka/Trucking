<?php

if (!isset($_SESSION))
	session_start();
if (!isset($_SESSION['email_address']))
	header('location:index.php');
else {
	if (isset($_POST['reset'])) {

		include('connection.php');

		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

		$email_address = $_SESSION['email_address'];

		if ($password == $confirm_password) {

			$password = md5($password);

			$sql = "UPDATE user SET password = '$password' WHERE email_address = '$email_address' ";

			$result = mysqli_query($conn, $sql);

			if ($result) {
				echo "
				<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
							echo "<script type='text/javascript'>
							$(document).ready(function(){
								$('#reset_form').hide();
								$('#login_div').hide();
							});
				</script>";
				echo"
				<div class='alert alert-primary' role='alert' style='text-align:center;'>
 Password Reset Successfull. <a href='logout.php'>click here</a> to login. 
</div>";
			}
		} else {
			echo '<script type="text/javascript">';
			echo 'setTimeout(function () { sweetAlert("Oops...","The two passwords does not match!","error");';
			echo '}, 500);</script>';
		}

	}

}
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Email Sending Demo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/css/mdb.min.css" rel="stylesheet">
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- //Custom Theme files -->
	<!--webfonts-->
	<link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
  <!--//webfonts-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.js"></script>
</head>

<body>
<div class="alert alert-primary" id="login_div" role="alert" style="text-align:center;">
  <p>Logged In as <?php echo $_SESSION['username']?></p> 
</div>
			<!-- Default form login -->
<form method="post" action="reset_password.php" id="reset_form" class="text-center border border-light p-5" style="width:400px;height:350px; margin-left:35%;margin-top:5%">

<p class="h4 mb-4">Reset Your Password</p>

<div class="md-form form-sm mb-5">
				  <input type="password" id="modalLRInput13" class="form-control form-control-sm validate" name="password" required>
				  <label data-error="wrong" data-success="right" for="modalLRInput13">Your password</label>
				</div>
  
				<div class="md-form form-sm mb-4">
				  <input type="password" id="modalLRInput14" class="form-control form-control-sm validate" name="confirm_password" required>
				  <label data-error="wrong" data-success="right" for="modalLRInput14">Repeat password</label>
				</div>
  
				<div class="text-center form-sm mt-2">
				  <button class="btn btn-info" type="submit" name="reset">Reset my Password<i class="fa fa-upload ml-1"></i></button>
				</div>
</form>
<!-- Default form login -->
    <!-- js-->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- js-->
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/js/mdb.min.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js">
	</script>
	<!-- //Bootstrap Core JavaScript -->
</body>

</html>
<?php 

if (isset($_POST['register'])) {

	if (!isset($_SESSION))
		session_start();

	include('connection.php');

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
	$email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);	
	

	if ($password == $confirm_password) {
		if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email_address)) {
			if (preg_match("^((?:\+62|62)|0)[2-9]{1}[0-9]+$^", $mobile_number)) {

				$sql_email = "SELECT email_address FROM user WHERE email_address='$email_address'";
				$result_email = mysqli_query($conn, $sql_email);

				$sql_mobile = "SELECT mobile_number FROM user WHERE mobile_number='$mobile_number'";
				$result_mobile = mysqli_query($conn, $sql_mobile);

				if (mysqli_num_rows($result_email) > 0) {
					echo '<script type="text/javascript">';
					echo 'setTimeout(function () { sweetAlert("Oops...","Email Address ' . $email_address . ' is already exists!","error");';
					echo '}, 500);</script>';
				} else if (mysqli_num_rows($result_mobile) > 0) {
					echo '<script type="text/javascript">';
					echo 'setTimeout(function () { sweetAlert("Oops...","Mobile number ' . $mobile_number . ' is already exists!","error");';
					echo '}, 500);</script>';
				} else {
					$activation_code = hash('sha256', mt_rand(0, 1000));
					$hash_password = md5($password);
					//user_id	username	mobile_number	user_type	no_ktp	email_address	fk_jenis_truck	address	domisili	area_operasi
					$usertype = $_POST['pilihans'];
					$no_ktp = $_POST['ktp'];
					$address = $_POST['alamat'];
					$area_operasi = $_POST['areaoperasi'];

					$sql = "INSERT INTO user (username,password,mobile_number,email_address,activation_code,user_type,no_ktp,address,area_operasi) VALUES('$username','$hash_password','$mobile_number','$email_address','$activation_code','$usertype','$no_ktp','$address','$area_operasi')";
					//echo $sql;

					$result = mysqli_query($conn, $sql);

					if (!$result)
						die("Error while updating!!!...") . mysqli_error($conn);
					else {
						$_SESSION['username'] = $username;
						$_SESSION['mobile_number'] = $mobile_number;
						$_SESSION['email_address'] = $email_address;
						$_SESSION['password'] = $password;
						$_SESSION['activation_code'] = $activation_code;

						include('activate_email.php');
					}
				}
			} else {
                    //invalid mobile number error message
				echo '<script type="text/javascript">';
				echo 'setTimeout(function () { sweetAlert("Oops...","Mobile number ' . $mobile_number . ' is invalid!","error");';
				echo '}, 500);</script>';
			}
		} else {
                //email address invalid error messaage
			echo '<script type="text/javascript">';
			echo 'setTimeout(function () { sweetAlert("Oops...","Email address ' . $email_address . ' is invalid!","error");';
			echo '}, 500);</script>';
		}
	} else {
            //password does not match error 
		echo '<script type="text/javascript">';
		echo 'setTimeout(function () { sweetAlert("Oops...","The two passwords does not match!","error");';
		echo '}, 500);</script>';
	}
}

if (isset($_POST['login'])) {

	session_start();

	include('connection.php');
	$email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$hash_password = md5($password);
	$sql = "SELECT * FROM user WHERE email_address = '$email_address' AND password = '$hash_password' ";

	$result = mysqli_query($conn, $sql);
	if (!$result) {
		echo '<script type="text/javascript">';
		echo 'setTimeout(function () { sweetAlert("Warning...","Error while loggin in!..","warning");';
		echo '}, 500);</script>';
	} else {
		$row = mysqli_fetch_array($result);
		$username = $row['username'];
		$usertype = $row['user_type'];
		$userid = $row['user_id'];
		$count = mysqli_num_rows($result);
		if ($count == 1) {
			if ($row['confirm_status'] == 0) {
				echo "checking confirm status...";
				echo '<script type="text/javascript">';
				echo 'setTimeout(function () { sweetAlert("Warning...","Please activate your account first!..","warning");';
				echo '}, 500);</script>';
			} else {
				$_SESSION['sesiuidtruck'] = $username;
				$_SESSION['email_address'] = $email_address;
				$_SESSION['lvl']=$usertype;
				$_SESSION['userid']=$userid;
				/*echo "<div class='alert alert-primary' role='alert' style='text-align:center;'>
	Logged In as " . $username .    "<a href='logout.php'> |  logout </a></div>";
				echo "
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
				echo "<script type='text/javascript'>
				$(document).ready(function(){
					$('#LRButton').hide();
				});
	</script>";*/
				echo "<script type='text/javascript'>window.location.href = 'truck/index.php'</script>";
			}
		} else {
			echo '<script type="text/javascript">';
			echo 'setTimeout(function () { sweetAlert("Oops...","Wrong username or Password!...","error");';
			echo '}, 500);</script>';
		}
	}
}

if (isset($_POST['forgot'])) {

	session_start();

	include('connection.php');

	$email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
	$sql = "SELECT email_address FROM user WHERE email_address = '$email_address' ";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) == 0) {
		echo '<script type="text/javascript">';
		echo 'setTimeout(function () { sweetAlert("Oops...","Email address ' . $email_address . ' does not exists!","error");';
		echo '}, 500);</script>';
	} else {
		require 'phpmailer/PHPMailerAutoload.php';

		$_SESSION['email_address'] = $email_address;

		$sql = "SELECT username FROM user WHERE email_address = '$email_address' ";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);

		$username = $row['username'];

		$_SESSION['username'] = $username;

		$mail = new PHPMailer;

        // $mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'dapras.solo@gmail.com';                 // SMTP username
		$mail->Password = 'yusufahmad1678';                         // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
		$to = $email_address;
		$mail->setFrom('dapras.solo@gmail.com', 'Reset Password');
		$mail->addAddress($to);     // Add a recipient

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Reset Your Account';
		$mail->Body = "
        <br><br>
        <b>Hello," . $username . ",</b><br>
        You recently requested to reset your password for your XYZ account.Click the button below to reset it. <br>
        <br><br>
        
        <button type='button' class='btn btn-secondary'><a href='http://localhost/Email_Sending/reset_password.php'>Reset Password</a></button>

        <br><br>

        If you did not requested to reset your password please ignore this email or reply to let us know.<br><br>
        <pre>Thanks,
        <b>XYZ</b></pre>";

		if (!$mail->send()) {
			echo '<script type="text/javascript">';
			echo 'setTimeout(function () { sweetAlert("Oops..."," Error while sending email.Please check your your internet coonection!","error");';
			echo '}, 500);</script>';
		} else {
			echo '<script type="text/javascript">';
			echo 'setTimeout(function () { sweetAlert("Success","A link have been sent to your email aadress ' . $to . ' Please reset your Password by pressing the link.","success");';
			echo '}, 500);</script>';
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Email Sending Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap font awesome cdn  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- bootstrap css cdn -->
    <link rel="stylesheet" type="text/css" media="screen" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
    <!-- MDB css cdn -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/css/mdb.min.css" rel="stylesheet">
    <!-- sweetalert css cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.css">
</head>
<body>
<!--Modal: Login / Register Form-->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal" role="document">
	  <!--Content-->
	  <div class="modal-content">
  
		<!--Modal cascading tabs-->
		<div class="modal-c-tabs">
  
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
			<li class="nav-item">
			  <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-user mr-1"></i>
				Login</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fa fa-user-plus mr-1"></i>
				Register</a>
			</li>
		  </ul>
  
		  <!-- Tab panels -->
		  <div class="tab-content">
			<!--Panel 7-->
			<div class="tab-pane fade in show active" id="panel7" role="tabpanel">
  				
			  <!--Body-->
			  <form action="ceklogin.php" method="post">
			  <div class="modal-body mb-1">

				<div class="md-form form-sm mb-5">
				  <i class="fa fa-envelope prefix"></i>
				  <input type="email" id="modalLRInput10" class="form-control form-control-sm validate" name="email_address" required>
				  <label data-error="wrong" data-success="right" for="modalLRInput10">Your email</label>
				</div>
  
				<div class="md-form form-sm mb-4">
				  <i class="fa fa-lock prefix"></i>
				  <input type="password" id="modalLRInput11" class="form-control form-control-sm validate" name="password" required>
				  <label data-error="wrong" data-success="right" for="modalLRInput11">Your password</label>
				</div>
				<div class="text-center mt-2">
				  <button class="btn btn-info" type="submit" name="login">Log in <i class="fa fa-sign-in ml-1"></i></button>
				</div>
			  </div>
			</form>
			  <!--Footer-->
			  <div class="modal-footer">
				<div class="options text-center text-md-right mt-1">
				  <p>Forgot <a class="blue-text" id="forgot" data-target="#ForgotPasswordModal" data-toggle="modal">Password?</a></p>
				</div>
				<button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
			  </div>
  
			</div>
			<!--/.Panel 7-->
  
			<!--Panel 8-->
			
			<div class="tab-pane fade" id="panel8" role="tabpanel">
				<form id="my_radio_box">
  				<div class="modal-body" align="center">
			  	 <input type="radio" name="my_options" id="my_options" value="customer" checked="true"> Customer &nbsp;&nbsp;&nbsp;
			  	  <input type="radio" name="my_options" id="my_options" value="partner"> Partners
			  	  
			  	</div>
			  <!--BodyNama
No KTP
No HP
Email
Jenis Truck
Domisili
Area operasi-->
			 </form>
			  <form action="ceklogin.php" method="post">
			  	<input type="hidden" name="pilihans" id="pilihans" value="customer">
			   <div class="modal-body">
				<div class="md-form form-sm mb-5">
					<i class="fa fa-user prefix"></i>
					<input type="text" id="modalLRInput9" class="form-control form-control-sm validate" name="username" required>
					<label data-error="wrong" data-success="right" for="modalLRInput9">User Name</label>
				</div>
				 <div class="md-form form-sm mb-5">
				  <i class="fa fa-lock prefix"></i>
				  <input type="password" id="modalLRInput13" class="form-control form-control-sm validate" name="password" required>
				  <label data-error="wrong" data-success="right" for="modalLRInput13">Password</label>
				</div>
				<div class="md-form form-sm mb-4">
				  <i class="fa fa-lock prefix"></i>
				  <input type="password" id="modalLRInput14" class="form-control form-control-sm validate" name="confirm_password" required>
				  <label data-error="wrong" data-success="right" for="modalLRInput14">Repeat password</label>
				</div>
				
				<div class="md-form form-sm mb-5">
					<i class="fa fa-mobile prefix"></i>
					<input type="text" id="modalLRInput15" class="form-control form-control-sm validate" name="ktp" required>
					<label data-error="wrong" data-success="right" for="modalLRInput15">No KTP</label>
				</div>

				<div class="md-form form-sm mb-5">
					<i class="fa fa-mobile prefix"></i>
					<input type="text" id="mobile_number" class="form-control form-control-sm validate" name="mobile_number" required>
					<label data-error="wrong" data-success="right" for="modalLRInput15">No Telp</label>
				</div>

				<div class="md-form form-sm mb-5">
				  <i class="fa fa-envelope prefix"></i>
				  <input type="email" id="modalLRInput12" class="form-control form-control-sm validate" name="email_address" required>
				  <label data-error="wrong" data-success="right" for="modalLRInput12">Your email</label>
				</div>
  
				<div class="md-form form-sm mb-5">
					<i class="fa fa-mobile prefix"></i>
					<input type="text" id="alamat" class="form-control form-control-sm validate" name="alamat" required>
					<label data-error="wrong" data-success="right" for="modalLRInput15">Alamat</label>
				</div>
  				
				<div class="md-form form-sm mb-5" id="areane">
					<i class="fa fa-mobile prefix"></i>
					<input type="text" id="areaoperasi" class="form-control form-control-sm" name="areaoperasi">
					<label data-error="wrong" data-success="false" for="modalLRInput15">Area Operasi</label>
				</div>
  
				<div class="text-center form-sm mt-2">
				  <button class="btn btn-info" type="submit" name="register">Sign up <i class="fa fa-sign-in ml-1"></i></button>
				</div>
			  </div>
			</form>
			  <!--Footer-->
			  <div class="modal-footer">
				<button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
			  </div>
			</div>
			<!--/.Panel 8-->
		  </div>
  
		</div>
	  </div>
	  <!--/.Content-->
	</div>
  </div>
  <!--Modal: Login / Register Form-->

  <!-- Modal for Forgot Password -->
	<div class="modal fade" id="ForgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><b>Forgot Your Password</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			</div>
			<form action="ceklogin.php" method="post">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fa fa-envelope prefix grey-text"></i>
          <input type="email" id="defaultForm-email" class="form-control validate" required name="email_address">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
				</div>
				<div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default" name="forgot">Send Password <i class="fa fa-sign-in"></i></button>
			</div>
			</form>
      </div>
		</div>
  </div>
</div>

<div class="text-center">
  <a href="" class="btn btn-default btn-rounded my-3" id="LRButton" data-toggle="modal" data-target="#modalLRForm">LogIn/Register</a>
</div>

<!-- jquery cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- mdb js cdn -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/js/mdb.min.js"></script>
<!-- bootstrap js cdn -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<!-- sweetalert js cdn -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.js"></script>
<!-- hide register/login modal and show forgot password modal -->
<script>
	$('#areane').hide();
$(document).ready(function () {
			$('#forgot').click(function(){
				$('#modalLRForm').modal('hide');
				$('ForgotPasswordModal').modal('show');
			});
			$('#my_radio_box').change(function(){
						selected_value = $("input[name='my_options']:checked").val();
						$('#pilihans').val(selected_value);
						if (selected_value=='customer'){
							$('#areane').hide();
						}
						if (selected_value=='partner'){
							$('#areane').show();
						}
			            //alert(selected_value);
			        });

		});
	</script>
</body>
</html>
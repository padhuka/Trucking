<?php

    session_start();
    include('connection.php');
             
	if(isset($_SESSION['email_address']) && isset($_SESSION['activation_code']) ){
	
    $email_address = mysqli_escape_string($conn,$_SESSION['email_address']); // Set email variable
    $activation_code = mysqli_escape_string($conn,$_SESSION['activation_code']); // Set hash variable
                 
    $search = mysqli_query($conn,"SELECT email_address, activation_code, confirm_status FROM user WHERE email_address = 
        '$email_address' AND activation_code = '$activation_code' AND confirm_status ='0' ") or die(mysqli_error($conn)); 
    $match  = mysqli_num_rows($search);
                 
    if($match > 0){
        // We have a match, activate the account
        $sql = "SELECT * FROM user WHERE email_address = '$email_address' ";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        $username = $row['username'];
        mysqli_query($conn,"UPDATE user SET confirm_status='1' WHERE email_address='".$email_address."' AND activation_code='".$activation_code."' AND confirm_status='0'") or die(mysqli_error($conn));
        echo "<div class='alert alert-primary' role='alert' style='text-align:center;'>
	Thank you ". $username." You have Successfully activated Your account <a href='index.php'> Click here </a> to login.</div>";
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<script>
        alert("The URL either invalid or you have already activated your account..!!!");
        window.location.href = "index.php";
        </script>';
    }
}                 
else{
    // Invalid approach
    echo '<script>
        alert("Invalid Approach please use the link that has sent to your email address ..!!!");
        window.location.href = "index.php";
        </script>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.min.js"></script>
</body>
</html>
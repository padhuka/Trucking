<?php

	$conn = mysqli_connect('localhost','root','','truckdb');

	if(!$conn)
		die("Error while connecting...!").mysqli_connect_error($conn);

 ?>
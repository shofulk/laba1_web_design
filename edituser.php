<?php
	session_start();
	require('connect.php');

		if($_POST['submit']){
			$query = "UPDATE users SET name='".$_POST['field-name']."', surname='".$_POST['field-surname']."', email='".$_POST['field-email']."' WHERE email='$email'";
		}
	mysqli_query($conn, $query);
	header('Location: '.$_SESSION['url']);
?>
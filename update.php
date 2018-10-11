<?php
	session_start();
	require('connect.php');

		if($_POST['submit']){
			$query = "UPDATE users SET name='".$_POST['field-name']."', surname='".$_POST['field-surname']."', email='".$_POST['field-email']."', password='".$_POST['field-password']."' WHERE id='".$_POST['id']."'";
		}
		if($_POST['submit_Delete'])
		{
			$query = "DELETE users FROM users WHERE id='".$_POST['id']."'";
		}
	

	mysqli_query($conn, $query);
	header('Location: '.$_SESSION['url']);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	<h1>Login</h1>
	<form method="post" role="form" class="form-horizontal">
			<div class="form-group">
				<label for="field-email" class="control-label col-md-4">E_Mail</label>
				<div class="col-md-5">
					<input class="form-control" type="email" name="field-email"  placeholder="E-Mail" required>
				</div>
			</div>
			<div class="form-group">
				<label for="field-password" class="control-label col-md-3">Пароль</label>
				<div class="col-md-5
				">
					<input class="form-control" type="password" name="field-password"  placeholder="Пароль" required>
				</div>
			</div>
			<button class="btn btn-success" type="submit" name="submit" >Login</button>
		<a href="regit.php">Registration</a>
	</form>
	</div>


	<?php
		session_start();
		require('connect.php');

		if(isset($_POST["field-password"]) && isset($_POST["field-password"])){
			if(($_POST["field-email"] == "admin@admin") and ($_POST["field-password"] =="admin")){
				header('Location: admin.php');
			}else{
			$email = $_POST["field-email"];
			$password = $_POST["field-password"];
			
			$query = "SELECT email, password FROM users WHERE email='$email' and password='$password'";
			$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
			$count = mysqli_num_rows($result);

			if($count == 1){
				$_SESSION['email'] = $email;
			}else{
				$fmsg = "Error";
			}
			if(isset($_SESSION['email'])){
				$email = $_SESSION['email'];
				header('Location: main.php');
			}
		}
	}
	?>

</body>
</html>
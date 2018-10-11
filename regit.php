<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	<h1>Registration</h1>
		<form method="post" role="form">
			
				<div class="form-group">
						<label for="field-name">Имя</label><br>
						<input class="form-control" type="text"  name="field-name" placeholder="Введите имя" required>
				</div>
				<div class="form-group">
						<label for="field-surname">Фамилия</label><br>
						<input class="form-control" type="text" name="field-surname" placeholder="Введите фамилию" required>
				</div>
				<div class="form-group">	
						<label for="field-email">E-Mail</label><br>
						<input class="form-control" type="email" name="field-email" placeholder="Введите E-Mail" required>
				</div>
				<div class="form-group">
						<label for="field-password">Пароль</label><br>		
						<input class="form-control" type="password" name="field-password" placeholder="Введите пароль" required>
				</div>
				<div class="form-group">
						<label for="field-repit-password">Повторный пароль</label><br>		
						<input class="form-control" type="password" name="field-repit-password" placeholder="Повторите пароль" required>
				</div>
						<button class="btn btn-success" type="submit" name="submit">Register</button>

			<a href="login.php">Login</a>
			<a href="notuser.php">No regit</a>
		</form>
	</div>


	<?php
		require('connect.php');

		if(isset($_POST["submit"])){
			$name = $_POST["field-name"];
			$surname = $_POST["field-surname"];
			$email = $_POST["field-email"];
			$password = $_POST["field-password"];
			$repit_password = $_POST["field-repit-password"];

			if($password == $repit_password){
				$query = mysqli_query($conn, "INSERT INTO users (name, surname, email, password) VALUES ('$name', '$surname', '$email', '$password')");
			}else{
				die('Error, check password!!!');
			}
			if($query){
				$smsg = "Successful";
				echo $smsg;
			}else{
				$smsf = "Error!";
				echo $smsf;
			}
		}
	?>

</body>
</html>
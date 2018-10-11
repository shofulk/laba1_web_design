<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	

	<?php
		session_start();
		require('connect.php');

		$email = $_SESSION['email'];
		$_SESSION['url'] = "main.php";

		$query = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $query);

		while($row = mysqli_fetch_array($result)){
			echo "
			<div class=container>
			<h1>Edit</h1>
			<p>Введите в поля данные, которые хотите изменить</p>
			<form method=post action='edituser.php' role=form class=form-horizontal>
				<div class=form-group>
					<label for=field-name class='control-label col-md-3'></label>
					<div class=col-md-5>
					<input class='form-control' type=text  name=field-name placeholder=Имя value='".$row['name']."'>
					</div>
				</div>
				<div class=form-group>
					<label class='control-label col-md-3 'for=field-surname></label>
					<div class=col-md-5>
					<input class=form-control type=text name=field-surname placeholder=Фамилия value='".$row['surname']."'>
					</div>
				</div>
				<div class=form-group>
					<label class=control-label col-md-5 for=field-email></label>
					<div class=col-md-5>
					<input class=form-control type=email name=field-email placeholder=E-Mail value='".$row['email']."'>
					</div>
				</div>
				<div class=form-group>
					<label class=control-label col-md-5></label>
					<div class=col-md-5>
					<input class=form-control type=password name=field-password placeholder=Пароль value='".$row['password']."'>
					</div>
				</div>
				<button class='btn btn-success' type=submit name=submit>Edit</button>
				<input type=hidden name=id value='".$row['id']."'>
				</form>
				</div>";
		}
	?>
</body>
</html>
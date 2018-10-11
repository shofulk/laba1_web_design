<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
		<nav class="navbar navbar-default">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">LABA 1, SHOFUL KIRIL</a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li><a href='edit.php'>Edit</a></li>
					<li><a href='logout.php'>Logout</a></li>
				</ul>
			</div>
		</nav>
	<div class="container">
		<table>
			<tr>
				<th style="padding-right: 30px">Name</th>
				<th style="padding-right: 30px">Surname</th>
				<th style="padding-right: 30px"></th>
			</tr>
	<?php 
		session_start();
		require('connect.php');

		$email = $_SESSION['email'];

		$query = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		while($row = mysqli_fetch_array($result)){
				echo "
				<tr>
					<td> ".$row['name']."</td>
					<td> " . $row['surname']."</td>
					<td><img width=75 height=75 src='".$row['img']."'></td>
				</tr>
			</table>";
			require('file.php');
		}
	?>
	</div>
</body>
</html>
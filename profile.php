<?php
	session_start();
	require_once 'PHP/DB.php';
?>
<html>
<head>

	<title></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<a href="index.php">On main page</a>
	<?php
	$db=new DB();
	$db->connect_DB();
	$id = mysqli_real_escape_string($db->get_connect(),trim($_SESSION['seeID']));
	$result = $db->do_sql("SELECT * FROM users WHERE id='$id'");
	$row=mysqli_fetch_assoc($result);
			echo '<center>
			<div class="cont2" width="300" height="300">
			<p>
				<img width="200" height="100" src="'.$row["img"].'">
			</p>
			<p>
			login
			<input type="text" name="login" value="'.$row["login"].'" readonly>
			</p>
			<div class="fn">
			<p>
			first name
			<input type="text" name="first_name" value="'.$row["fname"].'" readonly>
			</p>
			</div>
			<div class="ln">
			<p>
			last name
			<input type="text" name="last_name" value="'.$row["lname"].'" readonly>
			</p>
			</div>
			<div class="role">
			<p>
			role
			<input type="text" name="role" value="'.$row["role"].'" readonly>
			</p>
			</div>
			</div>
			</center>';
			$db->disconnect_DB();
	
?>
</body>

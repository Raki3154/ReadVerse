<?php
	session_start();
	include "database.php";
	if (isset($_POST["submit"])) 
	{
		$sql = "INSERT INTO student(Name, Pass, Mail, Dep) 
				VALUES ('{$_POST["name"]}', '{$_POST["pass"]}', '{$_POST["mail"]}', '{$_POST["Department"]}')";
		$conn->query($sql);
		$_SESSION['msg'] = "Registered Successfully";
		header("Location: " . $_SERVER['PHP_SELF']);
		exit();
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>ReadVerse</title>
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
	</head>
	<body>
		<div id="container">	
			<div id="header">
				<h1>Read Verse</h1>
			</div>
			<div id="wrapper">
				<h3 id="header">New User Registration</h3>
				<div id="center">
					<?php
						if (isset($_SESSION['msg'])) 
						{
							echo "<p class='success'>{$_SESSION['msg']}</p>";
							unset($_SESSION['msg']);
						}
					?>
					<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
						<label>Student Name</label>
						<input type="text" name="name" required>
						<label>Password</label>
						<input type="password" name="pass" required>
						<label>E-Mail Id</label>
						<input type="email" name="mail" required>
						<label>Department</label>
						<select name="Department" required>
							<option value="Select Your Departmrnt">Select Your Department</option>
							<option value="AIDS">AIDS</option>
							<option value="IT">IT</option>
							<option value="CSE">CSE</option>
							<option value="EEE">EEE</option>
							<option value="ECE">ECE</option>
							<option value="MECH">MECH</option>
							<option value="CIVIL">CIVIL</option>
						</select>
						<button type="submit" name="submit">Register Now</button>
					</form>
				</div>
			</div> 
			<div id="navi">
				<?php include "sidebar.php"; ?>
			</div> 
			<div id="footer">
				<p>Copyright &copy;Rakkesh</p>
			</div>
		</div>
	</body>
</html>
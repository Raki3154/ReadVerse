<?php
	session_start();
	include "database.php";
	if(!isset($_SESSION["AId"])) 
	{
		header("location:alogin.php");
		exit();
	}
	if(isset($_POST["submit"])) 
	{
		$sql = "select * from admin where APass='{$_POST["opass"]}' and AId='{$_SESSION["AId"]}'";
		$res = $conn->query($sql);
		if($res->num_rows > 0) 
		{
			$s = "update admin set APass='{$_POST["npass"]}' where AId=".$_SESSION["AId"];
			$conn->query($s);
			$_SESSION["password_success"] = "Password Changed Successfully";
		} 
		else 
		{
			$_SESSION["password_error"] = "Invalid Password";
		}
		header("Location: " . $_SERVER["PHP_SELF"]);
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
			<h3 id="header">Forgot Your Password ??</h3>
			<div id="center">
				<?php
					if(isset($_SESSION["password_success"])) 
					{
						echo "<p class='success'>{$_SESSION["password_success"]}</p>";
						unset($_SESSION["password_success"]);
					}
					if(isset($_SESSION["password_error"])) 
					{
						echo "<p class='error'>{$_SESSION["password_error"]}</p>";
						unset($_SESSION["password_error"]);
					}
				?>
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
					<label>Old Password</label>
					<input type="password" name="opass" required>
					<label>New Password</label>
					<input type="password" name="npass" required>
					<button type="submit" name="submit">Update Password</button>
				</form>
			</div>
		</div> 
		<div id="navi">
			<?php include "adminside.php"; ?>
		</div> 
		<div id="footer">
			<p>Copyright &copy;Rakkesh</p>
		</div>
		</div>
	</body>
</html>

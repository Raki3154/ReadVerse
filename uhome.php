<?php
	session_start();
	include"database.php";
	if(!isset($_SESSION["Id"]))
	{
		header("location:ulogin.php");
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
			<h3 id="header">Welcome to Readverse, <?php echo$_SESSION["Name"];?></h3>
			<p> 
				We're excited to have you join our reading community! Step into a world where stories inspire, knowledge empowers, and every read opens new possibilities. 
				Whether you're here to explore, learn, or simply unwind—Readverse is your space to do it all. So grab a cup of your favorite drink, and let the journey begin.
			</p>
			<p>
				<h3 id="header">Happy reading, <?php echo$_SESSION["Name"];?>!</h3>
			</p>
			<div id="center">
			</div>
		</div> 
		<div id="navi">
			<?php
				include "userside.php"
			?>
		</div> 
		<div id="footer">
			<p>Copyright &copy;Rakkesh</p>
		</div>
		</div>
	</body>
</html>

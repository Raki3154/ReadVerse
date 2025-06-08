<?php
	session_start();
	include"database.php";
	if(!isset($_SESSION["ID"]))
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
			<h3 id="header">Add Your Comments</h3>
			<div id="center">
			$sql=""
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
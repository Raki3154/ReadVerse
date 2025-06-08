<?php
	session_start();
	include"database.php";
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
			<h3 id="header">New Book Request</h3>
			<div id="center">
			<?php
				if(isset($_POST["submit"]))
				{
					$sql="insert into request(Id,MES,Logs)values({$_SESSION["Id"]},'{$_POST["mess"]}',now())";
					$conn->query($sql);
					echo"<p class='success'>Request Sent Successfully</p>";
				}
			?>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
				<label>Message</label>
				<textarea required name="mess"></textarea>
				<button type="submit" name="submit">Submit</button>
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
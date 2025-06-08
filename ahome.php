<?php
	session_start();
	include"database.php";
	function countRecord($sql, $conn)
	{
		$res=$conn->query($sql);
		return $res->num_rows;
	}
	if(!isset($_SESSION["AId"]))
	{
		header("location:alogin.php");
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
			<h3 id="header">Welcome Admin</h3>
			<div id="center">
				<ul class="record">
					<li> Total Students : <?php echo countRecord("select * from student", $conn);?></li>
					<li> Total Books : <?php echo countRecord("select * from book", $conn);?></li>
					<li> Total Request : <?php echo countRecord("select * from request", $conn);?></li>
					<li> Total Comments : <?php echo countRecord("select * from comment", $conn);?></li>
				</ul>
			</div>
		</div> 
		<div id="navi">
			<?php
				include "adminside.php"
			?>
		</div> 
		<div id="footer">
			<p>Copyright &copy;Rakkesh</p>
		</div>

		</div>
	</body>
</html>

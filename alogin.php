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
			<h3 id="header"> Admin Login </h3>
			<div id="center">
				<?php
					if(isset($_POST["submit"]))
					{
						$sql="SELECT * FROM admin WHERE AName='{$_POST["aname"]}' and APass='{$_POST["apass"]}'";
						$res=$conn->query($sql);
						if($res->num_rows>0)
						{
							$row=$res->fetch_assoc();
							$_SESSION["AId"]=$row["AId"];
							$_SESSION["AName"]=$row["AName"];
							header("location:ahome.php");
						}
						else
						{
							echo "<p class='error'>Invalid User Details</p>";
						}
					}
				?>
					<form action="alogin.php" method="post">
						<label>Name</label>
						<input type="text" name="aname" required>
						<label>Password</label>
						<input type="password" name="apass" required>
						<button type="submit" name="submit">Login Now</button>
					</form>
			</div>
		</div> 
		<div id="navi">
			<?php
				include "sidebar.php"
			?>
		</div> 
		<div id="footer">
			<p>Copyright &copy;Rakkesh</p>
		</div>

		</div>
	</body>
</html>

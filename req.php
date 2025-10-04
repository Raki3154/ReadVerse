<?php
	session_start();
	include "database.php";
	if (isset($_POST["submit"])) 
	{
		$mess = $conn->real_escape_string($_POST["mess"]);
		$id = $_SESSION["Id"];
		$sql = "INSERT INTO request(Id, MES, Logs) VALUES ($id, '$mess', NOW())";
		if ($conn->query($sql)) 
		{
			header("Location: req.php?status=success");
			exit();
		} 
		else 
		{
			$error = "Error submitting request.";
		}
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
				<h3 class="section-header">New Book Request</h3>
				<div id="center">
					<?php
						if (isset($_GET["status"]) && $_GET["status"] === "success") 
						{
							echo "<p class='success'>Request Sent Successfully</p>";
						}
						if (isset($error)) 
						{
							echo "<p class='error'>$error</p>";
						}
					?>
					<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
						<label>Message</label>
						<textarea required name="mess"></textarea>
						<button type="submit" name="submit">Submit</button>
					</form>
				</div>
			</div> 
			<div id="navi">
				<?php include "userside.php"; ?>
			</div> 
			<div id="footer">
				<p>Copyright &copy;Rakkesh</p>
			</div>
		</div>
	</body>
</html>
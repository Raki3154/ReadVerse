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
		$target_dir = "upload/";
		$target_file = $target_dir . basename($_FILES["efile"]["name"]);
		if(move_uploaded_file($_FILES["efile"]["tmp_name"], $target_file))
		{
			$sql = "insert into book(ATitle,Keywords,File) values ('{$_POST["ATitle"]}','{$_POST["keys"]}','{$target_file}')";
			$conn->query($sql);
			$_SESSION['upload_success'] = "Book Uploaded Successfully";
		}
		else
		{
			$_SESSION['upload_error'] = "Error in Upload";
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
			<h3 id="header">Book Uploading</h3>
			<div id="center">
				<?php
					if(isset($_SESSION['upload_success'])) 
					{
						echo "<p class='success'>{$_SESSION['upload_success']}</p>";
						unset($_SESSION['upload_success']);
					}
					if(isset($_SESSION['upload_error'])) 
					{
						echo "<p class='error'>{$_SESSION['upload_error']}</p>";
						unset($_SESSION['upload_error']);
					}
				?>
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
					<label>Book Title</label>
					<input type="text" name="ATitle" required>
					<label>Keywords</label>
					<textarea name="keys" required></textarea>
					<label>Upload File</label>
					<input type="file" name="efile" required>
					<button type="submit" name="submit">Upload Books</button>
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

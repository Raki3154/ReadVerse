<?php
	session_start();
	include "database.php";
	if(!isset($_SESSION["AId"])) 
	{
		header("location:alogin.php");
		exit();
	}
	if (isset($_GET["delete_id"])) 
	{
		$del_id = $_GET["delete_id"];
		$conn->query("DELETE FROM book WHERE BId=$del_id");
		$conn->query("DELETE FROM comment WHERE BId = $del_id");
		header("Location: view_books.php");
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
				<h3 id="header">Book Details</h3>
				<?php
					$sql = "SELECT * FROM book";
					$res = $conn->query($sql);
					if ($res->num_rows > 0) {
						echo "<table>
								<tr>
									<th>S.No</th>
									<th>Book Name</th>
									<th>File</th>
									<th>Delete</th>
								</tr>";
						$i = 0;
						while ($row = $res->fetch_assoc()) {
							$i++;
							echo "<tr>";
							echo "<td>{$i}</td>";
							echo "<td>{$row['ATitle']}</td>";
							echo "<td><a href='{$row['File']}' target='_blank'>View</a></td>";
							echo "<td><a href='{$_SERVER['PHP_SELF']}?delete_id={$row['BId']}' onclick=\"return confirm('Are you sure you want to delete this book?');\">Remove</a></td>";
							echo "</tr>";
						}
						echo "</table>";
					} else {
						echo "<p class='error'>No Book Record Found</p>";
					}
				?>
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

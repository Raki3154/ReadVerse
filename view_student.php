<?php
	session_start();
	include "database.php";
	if(!isset($_SESSION["AId"])) 
	{
		header("location:alogin.php");
		exit();
	}

	if (isset($_GET['delete_id'])) 
	{
		$delete_id = intval($_GET['delete_id']);
		$conn->query("DELETE FROM request WHERE Id = $delete_id");
		$conn->query("DELETE FROM comment WHERE SId = $delete_id");
		$conn->query("DELETE FROM student WHERE Id = $delete_id");
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
				<h3 id="header">Student Details</h3>
				<?php
					$sql = "SELECT * FROM student";
					$res = $conn->query($sql);
					if ($res->num_rows > 0) 
					{
						echo "<table>
							<tr>
								<th>S.No</th>
								<th>Name</th>
								<th>E-Mail</th>
								<th>Department</th>
								<th>Remove</th>
							</tr>";
						$i = 0;
						while ($row = $res->fetch_assoc()) 
						{
							$i++;
							echo "<tr>";
							echo "<td>{$i}</td>";
							echo "<td>{$row['Name']}</td>";
							echo "<td>{$row['Mail']}</td>";
							echo "<td>{$row['Dep']}</td>";
							echo "<td><a href='{$_SERVER['PHP_SELF']}?delete_id={$row['Id']}' onclick=\"return confirm('Are you sure you want to delete this student?');\">Remove</a></td>";
							echo "</tr>";
						}
						echo "</table>";
					} 
					else 
					{
						echo "<p class='error'>No Student Record Found</p>";
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

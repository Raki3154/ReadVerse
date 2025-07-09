<?php
	session_start();
	include "database.php";
	if (!isset($_GET["id"])) 
	{
		die("<p class='error'>Invalid Request: Book ID not provided</p>");
	}
	$bookId = (int) $_GET["id"];
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
				<?php
					$sql = "SELECT * FROM book WHERE BId = $bookId";
					$res = $conn->query($sql);
					if ($res->num_rows > 0) 
					{
						$row = $res->fetch_assoc();
						echo "<table>
						<tr>
							<th>Book Name</th>
							<td>{$row["ATitle"]}</td>
						</tr>
						</table>";
					} 
					else 
					{
						echo "<p class='error'>No Book Found</p>";
					}
				?>
				<div id="center">
					<form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" method="post">
						<label>Comment On It</label>
						<textarea name="mes" required></textarea>
						<button type="submit" name="submit">Add Comment</button>
					</form>
				</div>
				<?php
					if (isset($_POST["submit"])) 
					{
						if (!isset($_SESSION["Id"])) 
						{
							die("<p class='error'>You must be logged in to comment.</p>");
						}
						$studentId = (int) $_SESSION["Id"];
						$comment = $conn->real_escape_string($_POST["mes"]);
						$insertSql = "INSERT INTO comment (BId, SId, Comm, Logs) 
							  VALUES ($bookId, $studentId, '$comment', NOW())";
						if ($conn->query($insertSql)) 
						{
							header("Location: " . $_SERVER['REQUEST_URI']);
							exit();
						} 
						else 
						{
							echo "<p class='error'>Error adding comment: " . $conn->error . "</p>";
						}
					}
					$sql = "SELECT student.Name, comment.Comm, comment.Logs FROM comment INNER JOIN student ON comment.SId = student.Id 
							WHERE comment.BId = $bookId ORDER BY comment.CId DESC";
					$res = $conn->query($sql);
					if ($res->num_rows > 0) 
					{
						while ($row = $res->fetch_assoc()) 
						{
							echo "<p> <strong>{$row["Name"]}:</strong>
								{$row["Comm"]}
								<i>{$row["Logs"]}</i>
							</p>";
						}
					}
					else 
					{
						echo "<p class='error'>No Comments Yet..</p>";
					}
				?>
			</div> 
			<div id="navi">
				<?php include "userside.php"; ?>
			</div> 
			<div id="footer">
				<p>Copyright &copy; Rakkesh</p>
			</div>
		</div>
	</body>
</html>
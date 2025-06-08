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
			<h3 id="header">Search Book</h3>
			<div id="center">
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
				<label>Enter Book Name</label>
				<input type="text" name="name" required>
				<button type="submit" name="submit">Search</button>
			</form>
			</div>
		<?php
			if(isset($_POST["submit"]))
			{
				$sql="select * from book where ATitle like '%{$_POST["name"]}%' or Keywords like '%{$_POST["name"]}%'";
				$res=$conn->query($sql);
				if($res->num_rows>0)
				{
						echo "<table>
							<tr>
								<th>S.No</th>
								<th>Book Name</th>
								<th>File</th>
								<th>Add Comment</th>
							</tr>";
							$i=0;
							while($row=$res->fetch_assoc())
							{
								$i++;
								echo "<tr>";
								echo "<td>{$i}</td>";
								echo "<td>{$row["ATitle"]}</td>";
								echo "<td><a href='{$row["File"]}' target='_blank'>View</a></td>";
								echo "<td><a href='comment.php?id={$row["BId"]}'>Comment</a></td>";
								echo "</tr>";
							}
						echo "</table>";
				}
				else
				{
					echo"<p class='error'>No Book Record Found</p>";
				}
			}
		?>
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
<?php
	session_start();
	unset($_SESSION["AId"]);
	unset($_SESSION["Id"]);
	session_destroy();
	header("location:index.php");
?>
<?php
	session_start();
	session_destroy();
	unset($_POST['username']);
	
	header('Location: ../index.php');

?>
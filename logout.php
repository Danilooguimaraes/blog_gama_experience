<?php
	session_start();
	include('include/connection.php');
	session_destroy();
	header("Location:entrar.php");
?>
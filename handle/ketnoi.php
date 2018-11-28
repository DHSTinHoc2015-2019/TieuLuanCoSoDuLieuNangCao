<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(!isset($_SESSION['servername'])){
		$_SESSION['servername'] = strval($_POST['servername']);
	} else $_SESSION['servername'] = strval($_POST['servername']);

	if(!isset($_SESSION['username'])){
		$_SESSION['username'] = strval($_POST['username']);
	} else $_SESSION['username'] = strval($_POST['username']);

	if(!isset($_SESSION['password'])){
		$_SESSION['password'] = strval($_POST['password']);
	} else $_SESSION['password'] = strval($_POST['password']);

	$conn = new mysqli($_SESSION['servername'], $_SESSION['username'], $_SESSION['password']);
	if ($conn->connect_error) {
		session_unset();
	    header('Location: ../index.php');
	    echo "string";
	} else header('Location: ../trangchu.php');
} else header('Location: ../index.php');
?>
<?php
//session_start();
if(!isset($_SESSION['loggedInUser'])){
	header("Location:login.php?login first");
}
?>
<?php
session_start();
if (!$_SESSION["login"]) {
	header("Location: admin/controller/login.php");
}else{

    header('Location: '.' http://localhost/helmi/admin');
}
?>
<?php
class Config{
    function koneksi(){
        $conn=new mysqli('localhost','root','','db_shop');
		if($conn->connect_error){
			$conn=die("koneksi gagal : ".$conn-> connect_error);
		}
		return $conn;
    }
	function auth(){
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		session_start();
		if(isset($_SESSION['login']['email'])){
			return true;
		}else{
			return false;
		}
	}
	function site_url(){
		return"http://localhost/helmi";
	}
}
?>
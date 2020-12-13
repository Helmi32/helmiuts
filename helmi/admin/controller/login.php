<?php
require "../function.php";
if(isset($_POST['email'])){
    $email=$_POST['email'];$psw=md5($_POST['password']);
    $sql = "SELECT * FROM data_login where password ='$psw' and email ='$email' and status='Y'";
    $user = $conn->query($sql);

    if($user->num_rows > 0){
        $sess=$user->fetch_array();
		session_start();
        $_SESSION['login']['email']=$sess['Email'];
        $_SESSION['login']['id']=$sess['id'];
        header('Location: '.' http://localhost/helmi/admin');
    }else{
        $msg="Email dan Password tidak cocok";
        include_once '../views/v_login.php';
    }
}else{
    include_once '../views/v_login.php';
}
?>
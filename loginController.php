<?php
    session_start();
    require_once('db/dbhelper.php');
    if(isset($_SESSION['account']) && !empty($_SESSION['account'])){
        header("Location: index.php");}
    // }elseif(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    //     $_SESSION['account']['username']=$username;
    //     $_SESSION['account']['password']=$password;
    //     header("Location: index.php");
    // }
    else{
        $username=$_POST['username'];
        $password=$_POST['password'];
        $remember=$_POST['remember'];
        $sql='select * from account where userName ="'.$username.'" and password ="'.$password.'"';
        $account=executeResult($sql);

        if($account == null){
            $_SESSION['err']="Tên đăng nhập hoặc mật khẩu không chính xác";
            header("Location: login.php");
        }else{
            if($remember==true){
                setcookie($username, $password,time() + (86400 * 30), "/");
            }
            $_SESSION['account'];
            foreach($account as $acc){
                $_SESSION['account']['username']=$acc['username'];
                // $_SESSION['account']['password']=$acc['password'];
                $_SESSION['account']['displayName']=$acc['name'];
                $_SESSION['account']['address']=$acc['address'];
                $_SESSION['account']['email']=$acc['email'];
                $_SESSION['account']['phone']=$acc['phone'];
                $_SESSION['account']['role_id']=$acc['role_id'];
            }
            header("Location: index.php");
        }
    }
?>
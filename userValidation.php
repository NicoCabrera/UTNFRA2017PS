<?php
    require 'database/user.php';

    $username = htmlentities(addslashes($_POST["username"]));
    $password = htmlentities(addslashes($_POST["password"]));
    if(User::getUser($username,$password))
    {
        session_start();
        $_SESSION['username'] = $username;
        header("location:welcome");
    }
    else{
        echo "Usuario no econtrado";
    }
    
?>
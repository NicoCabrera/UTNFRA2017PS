<?php
    require 'database/user.php';
    $password = htmlentities(addslashes($_POST["password"]));
    $username = htmlentities(addslashes($_POST["username"]));
    if(User::getUserByUsername($username))
    {
        echo "El usuario ya existe";
    }
    else{

        User::saveUser($username,$password);
        session_start();
        $_SESSION['username'] = $username;

        $_SESSION['users'] = 
        header("location:welcome");
    }
    
?>
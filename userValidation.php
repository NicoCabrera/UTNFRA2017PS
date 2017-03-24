<?php
    require 'database/userDAO.php';

    $username = htmlentities(addslashes($_POST["username"]));
    $password = htmlentities(addslashes($_POST["password"]));
    if(UserDAO::getUser($username,$password))
    {
        echo "Bienvenido " . $username;
    }
    else{
        echo "Usuario no econtrado";
    }
    
?>
<?php
if(isset($_REQUEST['sub_reg'])){
    require("data.php");
    $con = mysqli_connect($host, $user, $pass) or die("Error connect");
    mysqli_select_db($con, $db) or die("Error db");

    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $pass = $_REQUEST["password"];
    

    $request = "INSERT INTO `users`(`id_user`, `name`, `email`, `password`) VALUES ('','".$name."','".$email."','".$pass."');" ;
    mysqli_query($con, $request) or die("Error query reg");
    
    session_start();

    $_SESSION["email"] = $email;
    $_SESSION["password"] = $pass;

    header("Location: todo.php");
}
?>
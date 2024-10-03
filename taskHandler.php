<?php
    require("data.php");
    session_start();
    $con = mysqli_connect($host, $user, $pass);
    mysqli_select_db($con, $db);
    $email = $_SESSION["email"];
    $res = "SELECT * FROM users WHERE email = '".$email."'";
    $id = mysqli_query($con, $res);
    foreach($id as $item){
        $id = $item['id_user'];
    }
    if(isset($_GET['add'])){
        $res = "INSERT INTO `tasks` (`num`, `id_user`, `checked`, `content`) VALUES ('','".$id."', '0','".$_REQUEST['taskText']."')";
        $resultt = mysqli_query($con, $res);
    }
    
    header("Location: todo.php");
?>
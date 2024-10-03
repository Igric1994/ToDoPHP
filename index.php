<?php
require('data.php');
require("funcs.php");
$pass_massage = "";
if(isset($_GET["sign"])){
    require('./html/header.html');
    print getSign($pass_massage);
    require('./html/footer.html');
}
else{
    if(isset($_GET["reg"])){
        require('./html/header.html');
        print getReg();
        require('./html/footer.html');
    }
    else{
        session_start();
        if(isset($_SESSION["sign"])){
            header('Location: todo.php');
        }
        if(isset($_REQUEST['sub_sign'])){//первый раз или уже нажал "войти"
            $con = mysqli_connect($host, $user,$pass) or die("Error connect"); 
            mysqli_select_db($con, $db) or die("Error db");
    
            $email = $_GET["email"];
            $password = $_GET["password"];
    
            $request = "SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'";
    
            $res = mysqli_query($con, $request);
            
            if(mysqli_num_rows($res) == 1){// сошёлся ли логин, пароль
                session_start();
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
                $_SESSION["sign"] = true;
                header('Location: todo.php');
            }
            else{
                $request = "SELECT * FROM users WHERE email = '".$email."';";
                
                $res = mysqli_query($con,$request);
    
                if(mysqli_num_rows($res) == 1){// если не сошёлся, то сообщим
                    $pass_massage = 'Invalid password or email';
                    require('./html/header.html');
                    print getSign($pass_massage);
                    require('./html/footer.html');
                }
                else{//иначе регайся
                    require('./html/header.html');
                    print getReg();
                    require('./html/footer.html');
                }
            }
        }
        else{//иначе входи
            require('./html/header.html');
            print getSign($pass_massage);
            require('./html/footer.html');
        }
    }
}
?>
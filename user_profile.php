<?php
function editPart($email, $password, $name){
    return '<div class="inf_part">
                <label>
                    Name
                </label>
                <input class="inf_field" value="'.$name.'" name="new_name">
            </div>
            <div class="inf_part">
                <label>
                    Email
                </label>
                <input class="inf_field" value="'.$email.'"  name="new_email">
            </div>
            <div class="inf_part">
                <label>
                    Password
                </label>
                <input class="inf_field" value="'.$password.'" name="new_password">
            </div>
            </form>';
}
function basicPart($email, $password, $name){
    return '<div class="inf_part">
                <label>
                    Name
                </label>
                <div class="inf_field"> 
                '.$name.'
                </div>
            </div>
            <div class="inf_part">
                <label>
                    Email
                </label>
                <div class="inf_field"> 
                '.$email.'
                </div>
            </div>
            <div class="inf_part">
                <label>
                    Password
                </label>
                <div class="inf_field"> 
                [hidden]
                </div>
            </div>';
}

session_start();
if(!isset($_SESSION["sign"])){
    $_SESSION = [];
    header("Location: index.php");
}
require('data.php');
$con = mysqli_connect($host, $user,$pass) or die("Error connect"); 
mysqli_select_db($con, $db) or die("Error db");

$email = $_SESSION["email"];
$password = $_SESSION["password"];


$get_name = "SELECT * FROM users WHERE email = '".$email."'";
$answ = mysqli_query($con, $get_name);
foreach($answ as $item){
    $name = $item["name"];
}
//confirm---------------
if(isset($_GET["confirm"])){
    $update_data = "UPDATE users SET name='".$_GET["new_name"]."' , email='".$_GET["new_email"]."' , password='".$_GET["new_password"]."' WHERE email = '".$email."' ";
    mysqli_query($con, $update_data);
    $_SESSION["email"] = $_GET["new_email"];
    header("Location: user_profile.php");
}
//confirm---------------
if(isset($_GET["exit"])){
    session_destroy();
    header("Location: index.php");
}
require("./html/header.html");
?>
<div class="content">
    <div class="profile-wrap">
        <div class="profile_header">
            <p>Personal account</p>
            <?php
            if(!isset($_GET["edit"])){
                print '<form method="GET"><button type="submit" name="edit"><img src="./img/edit.png">Edit</button></form>';
            }
            else{
                print '<form method="GET"><button type="submit" name="confirm"><img src="./img/edit.png">Confirm</button>';
            }
            
            ?>
            
        </div>
        <?php
            if(!isset($_GET["edit"])){
                print basicPart($email, $password, $name);
            }
            else{
                print editPart($email, $password, $name);
            }
        ?>
        <div class="profile_header">
            <form method="GET"><button type="submit" name="exit"><img src="./img/exit.png">Exit</button></form>

        </div>
    </div>
</div>
<?php 
require("./html/footer.html");

?>
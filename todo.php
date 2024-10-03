<?php
    require("data.php");
    require("funcs.php");
    
    session_start();
    if(!isset($_SESSION["sign"])){
        $_SESSION = [];
        header("Location: index.php");
    }
    
    $con = mysqli_connect($host, $user, $pass);
    mysqli_select_db($con, $db);

    $email = $_SESSION["email"];

    $res = "SELECT * FROM users WHERE email = '".$email."'";
    $id = mysqli_query($con, $res);
    foreach($id as $item){
        $id = $item['id_user'];
    }
    $ress = "SELECT * FROM tasks WHERE id_user = '".$id."'";
    $resultt = mysqli_query($con, $ress);
    //Change---------------------------
    $_REQUEST["change_flag"] = false;
    if(isset($_GET["change"])){
        $_REQUEST["change_flag"] = true;
    }
    if(isset($_GET["confirm"])){
        $update = "UPDATE tasks SET content = '".$_GET["content"]."' WHERE num = '".$_GET["num"]."';";
        mysqli_query($con, $update);
        $_REQUEST["change_flag"] = false;
        header("Location: todo.php");
    }

    //Delete---------------------------
    if(isset($_GET['delete'])){
        $num = $_GET['num'];
        $delete = "DELETE FROM tasks WHERE num = '".$num."'";
        mysqli_query($con, $delete);
        header("Location: todo.php");
    }

    //Checked---------------------------
    if(isset($_GET["check"])){
        $what_check = "SELECT checked FROM tasks WHERE num = '".$_GET["num"]."' AND checked = '0'";
        $checked = mysqli_query($con, $what_check);
        
        if(mysqli_num_rows($checked) == 1){
            $checkUpd = "UPDATE tasks SET checked = '1' WHERE num = '".$_GET["num"]."';";
        }
        else{
            $checkUpd = "UPDATE tasks SET checked = '0' WHERE num = '".$_GET["num"]."';";
        }
        mysqli_query($con, $checkUpd);
        header("Location: todo.php");
    }
    require('./html/header.html');
?>
<div class="content">
    <div class="Tasks">
        <div id="enter">
            <form method="GET" action="taskHandler.php">
                <input id="enterText" type="text" name="taskText" value="">
                <input id="add" type="submit" value="Add" name="add">
            </form>
        </div>
        <div id="notDone">
            <?php
                if($_REQUEST["change_flag"]){
                    foreach($resultt as $item){
                        if($item["checked"] == 0){
                            if( $_GET["num"] == $item["num"] ){
                                print getTaskChange($item['content'], $item['num']);
                            }
                            else{
                                print getTask($item['content'], $item['num']);
                            }
                        }
                    }
                }
                else{
                    foreach($resultt as $item){
                        if($item["checked"] == 0){
                            print getTask($item['content'], $item['num']);
                        }
                    }
                }
            ?>
        </div>
        <div id="done">
            <?php
                foreach($resultt as $item){
                    if($item["checked"] == 1){
                        print getTask($item['content'], $item['num']);
                    }
                }
            ?>
        </div>
    </div>
</div>
<?php
    require('./html/footer.html');
?>
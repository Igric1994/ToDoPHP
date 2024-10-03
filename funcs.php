<?php
function getSign($pass_massage){
    return  '<div class="content">
                <div class="reg">
                    <form method="get" >
                        <div id="reg_head"><h1>Sign</h1></div>
                        <div><label>Email</label></div>
                        <div><input name="email" class="regInput" type="email"></div>
                        <div><label>Password</label></div>
                        <div><input name="password" class="regInput" type="password"></div>
                        <label for="sub_sign" style="color: red;">'.$pass_massage.'</label>
                        <div><input class="regInput" type="submit" name="sub_sign" id="sub_sign" value="Войти"></div>
                    </form>
                </div>
            </div>';
}
function getReg(){
    return '<div class="content">
                <div class="reg">
                    <form method="get" action="reg.php">
                        <div id="reg_head"><h1>Registration</h1></div>
                        <div><label>Name</label></div>
                        <div><input name="name" class="regInput" type="text"></div>
                        <div><label>Email</label></div>
                        <div><input name="email" class="regInput" type="email"></div>
                        <div><label>Password</label></div>
                        <div><input name="password" class="regInput" type="password"></div>
                        <div><label>Repeat password</label></div>
                        <div><input name="rep_password" class="regInput" type="password"></div>
                        <div><input class="regInput" type="submit" name="sub_reg" value="Зарегистрироватсья"></div>
                    </form>
                </div>
            </div>';
}
function getTask($content, $num){
    return'<form method="GET">
                <div class="task">
                    <input type="hidden" value="'.$num.'" name="num" >
                    <button type="submit" class="taskCheck" name="check"><img src="./img/галочка.png"></button>
                    <span>'.$content.'</span>
                    <div id="oneOfTask">
                        <input class="buts" type="submit" value="change" name="change">
                        <input class="buts" type="submit" value="delete" name="delete">
                    </div>
                </div>
            </form>';
}
function getTaskChange($content, $num){
    return'<form method="GET">
                <div class="task">
                    <input type="hidden" value="'.$num.'" name="num" >
                    <button type="submit" class="taskCheck" name="check" value="1"><img src="./img/галочка.png"></button>
                    <input id="chArea" type="text" value="'.$content.'" name="content">
                    <div id="oneOfTask">
                        <input class="buts" type="submit" value="confirm" name="confirm">
                        <input class="buts" type="submit" value="delete" name="delete">
                    </div>
                </div>
            </form>';
}
?>
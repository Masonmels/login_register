<?php
 
    header('Content-type:text/html;charset=utf-8');
 
    if($_POST['submit']=="登录"){
        if($_POST['username']=="admin"){
            setcookie('username', $_POST['username'], time()+10086);
            setcookie('password', $_POST['password'], time()+10086);
            header("Location:admin.php");
            die;
        }
        $connect = mysql_connect('localhost', 'root', 'root'); //连接服务器
        if(!$connect)
            die("数据库连接失败！");
        //else
        //    echo "数据库连接成功！";
        mysql_select_db("user_information", $connect); //选择数据库
        $words = "SELECT * FROM register WHERE username='$_POST[username]'";
        $rezult = mysql_query($words);
        $value = mysql_fetch_array($rezult); //将查询结果取为数组
        $name = $value['username'];
        $pass = $value['password'];
        if($name!==$_POST['username']){
            echo "用户不存在，请先注册！";
            echo "<meta http-equiv=\"Refresh\" content=\"3;url=login.php\"/>";
        }
        else{
            if($pass!==$_POST['password']){
                echo "密码错误！";
                echo "<meta http-equiv=\"Refresh\" content=\"3;url=login.php\"/>";
                die;
            }
            setcookie('username', $_POST['username'], time()+10086);
            setcookie('password', $_POST['password'], time()+10086);
            header("Location:user.php");
        }
    }
    else 
        include "./login.html";
    
?>
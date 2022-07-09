<?php
    header('Content-type:text/html;charset=utf-8');
 
    if($_POST['submit']=="注册"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $connect = mysql_connect('localhost', 'root', 'root'); //连接服务器
        if(!$connect)
            die("数据库连接失败！");
        //else
        //    echo "数据库连接成功！";
        mysql_select_db("ccdb", $connect); //选择数据库
        $words = "INSERT INTO register (username, password) VALUES ('$username', '$password')";
        $rezult = mysql_query($words);
        if($rezult){
            echo "注册成功！";
            echo "<meta http-equiv=\"Refresh\" content=\"3;url=login.php\"/>";
        }
        else{
            echo "注册失败！";
            echo "<meta http-equiv=\"Refresh\" content=\"3;url=register.php\"/>";
        }
        mysql_close($connect); //切断连接
    }
    else
        include "./register.html"
 
?>
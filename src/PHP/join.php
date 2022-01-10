<?php
    //MySQL相關資訊
    $db_host = "127.0.0.1";
    $db_user = "root";
    $db_pass = "password";
    $db_select = "Cupid_db";

    //建立資料庫連線物件
    $dsn = "mysql:host=".$db_host.";dbname=".$db_select;

    //建立PDO物件，並放入指定的相關資料
    $pdo = new PDO($dsn, $db_user, $db_pass);

    //---------------------------------------------------
    
    $account = $_POST["account"];
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $password = $_POST["password"];
    $mail = $_POST["mail"];
    $date = $_POST["date"];


    //建立SQL
    $sql = "INSERT INTO member(member_account, member_name, member_password, member_mail, member_date) VALUES ('".$account."', '".$username."', '".$password."', '".$mail."', '".$date."', NOW())";

    //執行
    $pdo->exec($sql);

    header("Location: ../login.html");

?>
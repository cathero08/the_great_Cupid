<?php

    //取得PDO物件
    function getPDO(){

        $db_host = "127.0.0.1";
        $db_user = "root";
        $db_pass = "password";
        $db_select = "Cupid_db";

        //建立資料庫連線物件
        $dsn = "mysql:host=".$db_host.";dbname=".$db_select;

        //建立PDO物件，並放入指定的相關資料
        $pdo = new PDO($dsn, $db_user, $db_pass);

        return $pdo;
        
    }
// --------------------------------------------------------------------------

 
        //建立SQL
        $sql = "SELECT * FROM member where member_email = ?"; 
         
        $member_email = isset($_POST["mail"])?$_POST["mail"]: "";
        $member_password = isset($_POST["password1"])?$_POST["password1"]: "";
    
        //給值
        $statement = getPDO()->prepare($sql);

        $statement->bindValue(1, $member_email);
        // $statement->bindValue(2, $member_password);
        $statement->execute();
        $data = $statement->fetchAll();
    

        //判斷是否有會員資料?
        if(count($data) > 0){
    
            // include("../../Lib/Member.php");        
        
            //將會員資訊寫入session
            // setMemberInfo($username);
            session_start();
            $_SESSION['member_ID'] = $member_email;
    

             //建立SQL
             
            $sql = "UPDATE member SET member_password = ? where member_email = ?"; 
            
            // $member_email = isset($_POST["mail"])?$_POST["mail"]: "";
            // $member_password = isset($_POST["password1"])?$_POST["password1"]: "";
        
            //給值
            $statement = getPDO()->prepare($sql);

            $statement->bindValue(1, $member_password);
            $statement->bindValue(2, $member_email);
            $statement->execute();            
            

            //導回登入頁        
            echo "<script>alert('修改成功！請重新登入！');
            location.href='../login.html';</script>"; 
    
        }
        
        else{
    
            //跳出提示停留在忘記密碼頁
            echo "<script>alert('驗證碼錯誤！');
            location.href='../login_forget.html';</script>"; 
            // echo"<script>location.href = '../login.html';</script>";
            // echo "<script>alert('帳號或密碼錯誤!');</script>"; 
            //header('location:../login.html');
            
        }
        
?>
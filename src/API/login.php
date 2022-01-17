<?php
    // include("./util.php");	


    // $username = $_POST[]
        //建立SQL
    // $username = '';
    // if($username.strpos('@')){
    //     $sql = 'SELECT * FROM member_ID WHERE member_type = 1 and member_email = ? and member_password = ?'
    // }else{
    //     $sql = 'SELECT * FROM member_ID WHERE member_type = 1 and memeber_ID = ? and member_password = ?'
    // }

        //取得PDO物件
        function getPDO(){

            include("./cards_nation.php");
    
            return $pdo;
            
        }

        
        //建立SQL
    $sql = "SELECT * FROM member WHERE member_type = 1 and (member_email = ? or member_account = ?) and member_password = ?"; //member_type 1:一般使用者
        
    $username = isset($_POST["username"])?$_POST["username"]: "";
    $member_password = isset($_POST["password"])?$_POST["password"]: "";

    //給值
    $statement = getPDO()->prepare($sql);
    // $statement->bindValue(1, isset($_POST["username"])?$_POST["username"]: "");
    // $statement->bindValue(2, isset($_POST["username"])?$_POST["username"]: "");
    $statement->bindValue(1, $username);
    $statement->bindValue(2, $username);
    $statement->bindValue(3, $member_password);
    $statement->execute();
    $data = $statement->fetchAll();


    // foreach($data as $index => $row){
    //     $username = $row["username"];
    // }

    //判斷是否有會員資料?
    if(count($data) > 0){

        // include("../../Lib/Member.php");        
    
        //將會員資訊寫入session
        // setMemberInfo($username);
        session_start();
        $_SESSION['member_ID'] = $username;

        //導回產品頁        
        //header('location: ../index.html');
        echo "<script>alert('登入成功!');location.href='../index.html';</script>"; 

    }else{

        //跳出提示停留在登入頁
        echo "<script>alert('帳號或密碼錯誤!');location.href='../login.html';</script>"; 
        // echo"<script>location.href = '../login.html';</script>";
        // echo "<script>alert('帳號或密碼錯誤!');</script>"; 
        //header('location:../login.html');
        
    }


        // setMemberInfo($userId, $userName);
        // //導回產品頁        
        // echo "登入成功";
        
    // }else{
    //     //跳出提示停留在登入頁
    //     echo "帳號或密碼錯誤!"; 
    // }
   
 
?>

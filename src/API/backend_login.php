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
            $db_host = "127.0.0.1";
            $db_user = "root";
            $db_pass = "password";
            $db_select = "Cupid_db";
    


        //     $db_host = "127.0.0.1";
        //     $db_user = "tibamefe_since2021";
        //     $db_pass = "vwRBSb.j&K#E";
        //     $db_select = "tibamefe_tfd104g5";
    
            //建立資料庫連線物件
            $dsn = "mysql:host=".$db_host.";dbname=".$db_select;
    
            //建立PDO物件，並放入指定的相關資料
            $pdo = new PDO($dsn, $db_user, $db_pass);
    
            return $pdo;
            
        }

        
        //建立SQL
    $sql = "SELECT * FROM member WHERE member_type = 'ad' and (member_email = ? or member_account = ?) and member_password = ?"; //管理員身分
    // $sql = "SELECT * FROM member WHERE member_type = '1' and (member_email = ? or member_account = ?) and member_password = ?"; //管理員身分

    
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
        echo "<script>alert('登入成功!');</script>"; 
        header('location: ../backend_member.html');

    }else{

        //跳出提示停留在登入頁
        echo "<script>alert('帳號或密碼錯誤!');</script>"; 
        header('location:../backend_login.html');
        
    }

    // if(count($data) > 0){
    //     setMemberInfo($username);
    //     //導回產品頁        
    //     echo  "登入成功";
        
    // }else{
    //     //跳出提示停留在登入頁
    //     echo "帳號或密碼錯誤!"; 
    // }
   
 
?>
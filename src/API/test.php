<?php
       
$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "password";
$db_select = "pdo";


$dsn = "mysql:host=".$db_host.";dbname=".$db_select;

$pdo = new PDO($dsn, $db_user, $db_pass);

// include("connection.php");

$account = $_POST["member_account"];
$pwd = $_POST["member_password"];


//建立SQL語法
// 1-變數
// $sql = "SELECT * FROM member where Name = '".$account."' and PWD = '".pwd."'";
// $statement = $pdo->query( $sql );


// 2-問號
// $sql = "SELECT * FROM member where Name = ? and PWD = ? ";
    $sql = "SELECT * FROM Cupid_db.member where member_type = 'nu'";
// 3-bindParam
// $sql = "SELECT * FROM member WHERE Name = :name and PWD = :pwd";
// $statement = $pdo->prepare( $sql );
$statement = $pdo->query( $sql );


//執行並查詢，會回傳查詢結果的物件，必須使用fetch、fetchAll...等方式取得資料

// 1-變數
// $statement = $pdo->prepare($sql);
// $statement->bindValue(":name", $account);
// $statement->bindValue(":pwd", $pwd);
// $statement->execute();

// 2-問號    //幾個問號幾個數字
// $statement = $pdo->prepare($sql);
// $statement->bindValue(1, $account);
// $statement->bindValue(2, $pwd);     
// $statement->execute();

// 3-bindParam
$statement->bindParam(":pwd" , $pwd); 
$statement->bindParam(":name" , $account); 
$statement->execute();





//抓出全部且依照順序封裝成一個二維陣列
$data = $statement->fetchAll();

if(count($data) > 0){
    echo "登入成功";

    // session_start();
    // $_SESSION["memberID"] = $account;
    // header("Location: welcome.php");

}else{
    echo "帳號密碼錯誤";
}

//將二維陣列取出顯示其值
// foreach($data as $index => $row){
//     echo $row["Name"];   //欄位名稱
//     echo " / ";
//     echo $row["PWD"];    //欄位名稱
//     echo " / ";
//     echo $row["CreateDate"];    //欄位名稱        
// }
?>
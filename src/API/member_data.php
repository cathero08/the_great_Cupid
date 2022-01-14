<?php
header('Content-Type: application/json; charset=utf-8');
session_start();

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


//如果沒有登入Session值 或是 Session值為空

if (!isset($_SESSION["member_ID"]) || ($_SESSION["member_ID"]=="")) {

    $data['result'] = false;

} else{

//若使用者已經是登入狀態擁有SESSION值，則前往以下網頁

$sql = "SELECT * FROM `member` WHERE `member_email` = ? OR `member_account` = ?"; 
    
//給值
$statement = getPDO()->prepare($sql);
$statement->bindValue(1, $_SESSION["member_ID"]);
$statement->bindValue(2, $_SESSION["member_ID"]);
$statement->execute();
$data = $statement->fetch(PDO::FETCH_ASSOC);
$data['result'] = true;
}

echo json_encode($data);

?>
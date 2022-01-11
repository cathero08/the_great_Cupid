<?php 
// header ('Content-Type: text/html; charset=UTF8');
$cards_info_title = $_POST['tit'];

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

 //建立SQL語法
 $sql = "UPDATE cardhistory SET cardhistory_title = '$cards_info_title' WHERE cardhistory_cardID='2';";
//  echo $sql;

if($cards_info_title!==""){
        
    $statement = $pdo->prepare($sql);
    // $statement-> bindValue(1, $cards_info_title);
    // $statement->bindValue(2, $password);
    $statement->execute();
}

 //抓出全部且依照順序封裝成一個二維陣列





// ?>
<?php 
// header ('Content-Type: text/html; charset=UTF8');
$cards_topicImg = $_POST['topicImg'];
$cards_topicColor = $_POST['topicColor'];
$cards_topicFont = $_POST['topicFont'];

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
 session_start();
 $member_ID = $_SESSION['member_ID'];

 //建立SQL語法
 $sql = 
"UPDATE cardhistory c
    join member m
    on m.member_ID = c.FKmember_ID
    SET cardhistory_templatecolor = '$cards_topicColor' 
    WHERE member_account = '$member_ID';
UPDATE cardhistory c
    join member m
    on m.member_ID = c.FKmember_ID
    SET cardhistory_fontname = '$cards_topicFont' 
    WHERE member_account = '$member_ID';
UPDATE cardhistory c
    join member m
    on m.member_ID = c.FKmember_ID
    SET cardhistory_templatename = '$cards_topicImg' 
    WHERE member_account = '$member_ID'
    
    ";
//  echo $sql;



if($cards_info_title!==""){
        
    $statement = $pdo->prepare($sql);
    // $statement-> bindValue(1, $cards_info_title);
    // $statement->bindValue(2, $password);
    $statement->execute();
}


 //抓出全部且依照順序封裝成一個二維陣列





// ?>
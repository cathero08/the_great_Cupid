<?php 
// header ('Content-Type: text/html; charset=UTF8');
$cards_info_title = $_POST['tit'];
$mansec = $_POST['mansec'];
$manfir = $_POST['manfir'];
// $maneng = $_POST['maneng'];
$womansec = $_POST['womansec'];
$womanfir = $_POST['womanfir'];
// $womaneng = $_POST['womaneng'];
$goodtalk = $_POST['goodtalk'];
// $local = $_POST['local'];
$marrydate = $_POST['marrydate'];
// $marrydateend = $_POST['marrydateend'];
$lovestory = $_POST['lovestory'];


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
 $sql = "UPDATE cardhistory c
            join member m
            on m.member_ID = c.FKmember_ID
            SET cardhistory_title = '$cards_info_title' ,
            cardhistory_mangivenname = '$mansec' ,
            cardhistory_manfirstname = '$manfir' ,
            cardhistory_womangivenname = '$womansec' ,
            cardhistory_womanfirstname = '$womanfir' ,
            cardhistory_greeting = '$goodtalk' ,
            cardhistory_date = '$marrydate' ,
            cardhistory_ourstory = '$lovestory' 
                WHERE member_account='$member_ID'
                    ;";
//  echo $sql;

if($cards_info_title!==""){
        
    $statement = $pdo->prepare($sql);
    // $statement-> bindValue(1, $cards_info_title);
    // $statement->bindValue(2, $password);
    $statement->execute();
}

 //抓出全部且依照順序封裝成一個二維陣列





// ?>
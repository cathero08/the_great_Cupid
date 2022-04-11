<?php 
// header ('Content-Type: text/html; charset=UTF8');
$cards_info_title = $_POST['tit'];
$mansec = $_POST['mansec'];
$manfir = $_POST['manfir'];
$maneng = $_POST['maneng'];
$womansec = $_POST['womansec'];
$womanfir = $_POST['womanfir'];
$womaneng = $_POST['womaneng'];
$goodtalk = $_POST['goodtalk'];
$local = $_POST['local'];
$marrydate = $_POST['marrydate'];
$marrydateend = $_POST['marrydateend'];
$lovestory = $_POST['lovestory'];


//喜帖的部分
//MySQL相關資訊
include("./cards_nation.php");

 //---------------------------------------------------
 session_start();
 $member_ID = $_SESSION['member_ID'];
 //建立SQL語法
 $sql = "UPDATE cardhistory c
            join member m
            on m.member_account = c.cardhistory_templateID
            SET cardhistory_title = '$cards_info_title' ,
            cardhistory_mangivenname = '$mansec' ,
            cardhistory_manfirstname = '$manfir' ,
            cardhistory_manengname = '$maneng' ,
            cardhistory_womangivenname = '$womansec' ,
            cardhistory_womanfirstname = '$womanfir' ,
            cardhistory_womanengname = '$womaneng' ,
            cardhistory_greeting = '$goodtalk' ,
            cardhistory_date = '$marrydate' ,
            cardhistory_dateend = '$marrydateend' ,
            cardhistory_ourstory = '$lovestory' ,
            cardhistory_location = '$local' 
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
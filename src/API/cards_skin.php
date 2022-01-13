<?php 
// header ('Content-Type: text/html; charset=UTF8');
$cards_topicImg = $_POST['topicImg'];
$cards_topicColor = $_POST['topicColor'];
$cards_topicFont = $_POST['topicFont'];

include("./cards_nation.php");

 //---------------------------------------------------
 session_start();
 $member_ID = $_SESSION['member_ID'];

 //建立SQL語法
 $sql = 
"UPDATE cardhistory c
    join member m
    on m.member_account = c.cardhistory_templateID
    SET cardhistory_templatecolor = '$cards_topicColor' 
    WHERE member_account = '$member_ID';
UPDATE cardhistory c
    join member m
    on m.member_account = c.cardhistory_templateID
    SET cardhistory_fontname = '$cards_topicFont' 
    WHERE member_account = '$member_ID';
UPDATE cardhistory c
    join member m
    on m.member_account = c.cardhistory_templateID
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
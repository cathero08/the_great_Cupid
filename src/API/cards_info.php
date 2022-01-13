<?php 
// $search = $_POST['search'];

include("./cards_nation.php");

 //---------------------------------------------------
 session_start();
 $member_ID = $_SESSION['member_ID'];
 //建立SQL語法
 $sql = "SELECT * FROM cardhistory c
            join member m
            on m.member_account = c.cardhistory_templateID
                where member_account = '$member_ID' ";
//  echo $sql;

 //執行並查詢，會回傳查詢結果的物件，必須使用fetch、fetchAll...等方式取得資料
 $statement = $pdo->prepare($sql);
 $statement->execute();

 //抓出全部且依照順序封裝成一個二維陣列
 $data = $statement->fetchAll();

 echo json_encode($data);



// ?>
<?php 

    
include("./cards_nation.php");
// include("./connection.php");

//---------------------------------------------------
// $faqID = isset($_POST["num"]) ? $_POST["num"] : "";
// 建立SQL語法
session_start();
// $sql = "SELECT * FROM Cupid_db.member;";
$sql = "SELECT * FROM  receiver where FKmember_ID =?;";
// 執行並查詢，會回傳查詢結果的物件，必須使用fetch、fetchAll...等方式取得資料
// $statement = $pdo->query($sql);
// 抓出全部且依照順序封裝成一個二維陣列
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $_SESSION['member_ID']);
$statement->execute();

$data = $statement->fetchAll();
echo json_encode($data);

// foreach($data as $index => $row){
//     echo $row["receiver_name"];  
//     echo " / ";
//     echo $row["receiver_address"];    
//     echo " / ";
//     echo $row["receiver_phone"];    	
   
    	
//     echo "<br>";       
// }
?>

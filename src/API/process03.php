<?php 

    
// MySQL相關資訊
$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "password";
$db_select = "PDO";

// 建立資料庫連線物件
$dsn = "mysql:host=".$db_host.";dbname=".$db_select;

// 建立PDO物件，並放入指定的相關資料
$pdo = new PDO($dsn, $db_user, $db_pass);

// include("connection.php");

//---------------------------------------------------
// $faqID = isset($_POST["num"]) ? $_POST["num"] : "";
// 建立SQL語法
// $sql = "SELECT * 
// FROM Cupid_db.order as r
// join Cupid_db.member as m
// on r.FKmember_ID = m.member_ID;";
$sql = "SELECT * 
FROM Cupid_db.v_order_member where member_ID = 1";

// 執行並查詢，會回傳查詢結果的物件，必須使用fetch、fetchAll...等方式取得資料
$statement = $pdo->query($sql);

// 抓出全部且依照順序封裝成一個二維陣列
$data = $statement->fetchAll();
echo json_encode($data);

// 將二維陣列取出顯示其值
// foreach($data as $index => $row){
//     echo $row["order_orderID"];  
//     echo " / ";
//     echo $row["FKmember_ID"];    
//     echo " / ";
//     echo $row["order_date"];    	
//     echo " / ";
//     echo $row["order_totalmoney"]; 
//     echo " / ";
//     echo $row["order_status"];    
//     echo " / ";
//     echo $row["order_productmoney"];    	
//     echo " / ";
//     echo $row["order_productprice"]; 
//     echo " / ";
//     echo $row["order_toaddress"];    
//     echo " / ";
//     echo $row["order_shiptype"];    	
//     echo " / ";
//     echo $row["order_paytype"]; 
//        echo "<br>";       
// }
?>


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
$sql = "SELECT * FROM Cupid_db.commonqa;";

// 執行並查詢，會回傳查詢結果的物件，必須使用fetch、fetchAll...等方式取得資料
$statement = $pdo->query($sql);

// 抓出全部且依照順序封裝成一個二維陣列
$data = $statement->fetchAll();
echo json_encode($data);

//將二維陣列取出顯示其值
// foreach($data as $index => $row){
//     echo $row["qa_ID"];  
//     echo " / ";
//     echo $row["commonqa_catalogue"];    
//     echo " / ";
//     echo $row["commonqa_question"];    	
//        echo " / ";
//     echo $row["commonqa_answer"];    	
//        echo "<br>";       
// }
?>

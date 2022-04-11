<?php 

    
// MySQL相關資訊
include("./cards_nation.php");

// include("connection.php");

//---------------------------------------------------
// $faqID = isset($_POST["num"]) ? $_POST["num"] : "";
// 建立SQL語法
$sql = "SELECT * FROM commonqa;";

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

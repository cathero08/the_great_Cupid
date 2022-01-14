<?php 
// $search = $_POST['search'];

include("./cards_nation.php");

 //---------------------------------------------------

 //建立SQL語法
 $sql = "SELECT * FROM cupidtest  ";
//  echo $sql;

 //執行並查詢，會回傳查詢結果的物件，必須使用fetch、fetchAll...等方式取得資料
 $statement = $pdo->prepare($sql);
 $statement->execute();

 //抓出全部且依照順序封裝成一個二維陣列
 $data = $statement->fetchAll();

 echo json_encode($data);

 //將二維陣列取出顯示其值
//  foreach($data as $index => $row){
     
//      echo  $row["idcu"];   //欄位名稱
//      echo " / ";
//      echo $row["imgurl"];    //欄位名稱
//      echo " / ";
//      echo $row["color"];    //欄位名稱	 
//         echo '<br>';
//  }

// $received_data = json_decode(file_get_contents("php://input")
//        );

//      $data = array();

//      if($received_data -> action == "fetchall"){
//        $sql = "SELECT * FROM cupidtest";
       
//        $statement = $connect -> prepare($sql);
//        $statement -> execute();

//        while($row = $statement -> fetch(PDO::FETCH_ASSOC)){
//               $data[] = $row;
//               }
//        }
//        echo json_encode($data);



// ?>
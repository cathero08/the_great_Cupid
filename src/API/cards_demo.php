<?php 
// $search = $_POST['search'];

 //MySQL相關資訊
 $db_host = "127.0.0.1";
 $db_user = "root";
 $db_pass = "password";
 $db_select = "database";

 //建立資料庫連線物件
 $dsn = "mysql:host=".$db_host.";dbname=".$db_select;

 //建立PDO物件，並放入指定的相關資料
 $pdo = new PDO($dsn, $db_user, $db_pass);

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
<?php

    include("./API/lib/util.php")
    $pdo = Cupid_db();

    //建立SQL語法
//建立SQL語法
$sql = "SELECT * FROM member where member_type = 'nu'";

//執行並查詢，會回傳查詢結果的物件，必須使用fetch、fetchAll...等方式取得資料
$statement = $pdo->query($sql);


//抓出全部且依照順序封裝成一個二維陣列
$data = $statement->fetchAll();

// 回傳$data
echo json_encode($data);
        
// 將二維陣列取出顯示其值
foreach($data as $index => $row){
       echo $row["member_ID"];   //欄位名稱
       echo " / ";
       echo $row["member_account"];    //欄位名稱
       echo " / ";
       echo $row["member_email"];    //欄位名稱	  
       echo " / ";
       echo $row["member_accountstatus"];    //欄位名稱	  
       echo " / ";
       echo $row["member_accountcreatedate"];    //欄位名稱	  

       echo " <br>";
}

    

?>
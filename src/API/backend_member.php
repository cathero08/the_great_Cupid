<?php
    include("./lib/util.php");
    // $pdo = Cupid_db();
    //建立SQL
    
    $sql = "SELECT * FROM member where member_type = 'nu'";
    // $sql = "SELECT * FROM member where member_type = '1'";
    
    // 執行
    $statement = getPDO()->prepare($sql);
    $statement->execute();
    $data = $statement->fetchAll();
    
    // 回傳json
    echo json_encode($data);

// 將二維陣列取出顯示其值
// foreach($data as $index => $row){
//        echo $row["member_ID"];   //欄位名稱
//        echo " / ";
//        echo $row["member_account"];    //欄位名稱
//        echo " / ";
//        echo $row["member_email"];    //欄位名稱	  
//        echo " / ";
//        echo $row["member_accountstatus"];    //欄位名稱	  
//        echo " / ";
//        echo $row["member_accountcreatedate"];    //欄位名稱	  

//        echo " <br>";
// }

    

?>
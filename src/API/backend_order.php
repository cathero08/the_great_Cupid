<?php
    include("./lib/util.php");
    // $pdo = Cupid_db();
    //建立SQL
    try {
        //code...
        $sql = "SELECT member.member_ID, member.member_email, `order`.order_orderID , `order`.order_status, `order`.order_paytype, `order`.order_date FROM member INNER JOIN `order` ON member.member_ID = `order`.FKmember_ID";       
         //$sql = "SELECT ec_orders.*, ec_members.Account FROM ec_orders JOIN ec_members on ec_orders.MID = ec_members.ID ORDER BY ec_orders.ID DESC";
    
        // 執行
        $statement = getPDO()->prepare($sql);
        $statement->execute();
        $data = $statement->fetchAll();
    echo json_encode($data);

    } catch (\Throwable $th) {
        throw $th;
    }
    
 
//     SELECT member.member_ID, member.member_email, 'order.order_orderID' , 'order.order_status', 'order.order_paytype', 'order.order_date'
// FROM member
// INNER JOIN order ON member.member_ID=order.member_ID;
    // 回傳json

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
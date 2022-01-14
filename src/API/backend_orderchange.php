<?php
include("./lib/util.php");
// $pdo = Cupid_db();
$order_ID = $_POST['order_ID'];
//建立SQL
try {
    //code...
    $sql = "SELECT * FROM `ORDER`
    JOIN member ON `ORDER`.FKmember_ID = member.member_ID
    JOIN receiver ON member.member_ID = receiver.FKmember_ID WHERE order_orderID = ?";
     
     //$sql = "SELECT ec_orders.*, ec_members.Account FROM ec_orders JOIN ec_members on ec_orders.MID = ec_members.ID ORDER BY ec_orders.ID DESC";

    // 執行
    $statement = getPDO()->prepare($sql);
    $statement ->bindvalue(1, $order_ID);
    $statement->execute();
    $data = $statement->fetchAll();
echo json_encode($data);

} catch (\Throwable $th) {
    throw $th;
}


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
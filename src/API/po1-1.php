<?php

include("./cards_nation.php");
// include("connection.php");



// var_dump($_SESSION['member_ID']);exit;

// 印出 $_POST 資料
// var_dump($_POST);
$$sql = "INSERT INTO order ( `member_account`, `order_date`, `order_totalmoney`, `order_status`,`order_toaddress`, `order_shiptype`, `order_paytype`, `order_remark`, `order_phone`,  `order_name`) VALUE (?,now(),?,'出貨中',?,?,?,?,?,?)";


// var_dump($_SESSION['member_ID']);exit;

// 印出 $_POST 資料
// var_dump($_POST);
$chkPassPort = (isset($_POST['chkPassPort']) && trim($_POST['chkPassPort'])) ? json_decode($_POST['chkPassPort'], true) : [];
// 印出 $chkPassPort 資料
// var_dump($_POST);
var_dump($chkPassPort);
session_start();

if ($chkPassPort != null && count($chkPassPort) > 0) {
    if ($chkPassPort["member_name"] != null) {
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $_SESSION['member_ID']);
        $statement->bindValue(2, $_POST["total"]);
        $statement->bindValue(3, $chkPassPort["member_address"]);
        $statement->bindValue(4, $_POST["ship"]);
        $statement->bindValue(5, $_POST["pay"]);
        $statement->bindValue(6, $_POST["remark"]);
        $statement->bindValue(7, $chkPassPort["member_phone"]);
        $statement->bindValue(8, $chkPassPort["member_name"]);
        $statement->execute();
    } else if ($chkPassPort["receiver_name"] != null) {
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $_SESSION['member_ID']);
        $statement->bindValue(2, $_POST["total"]);
        $statement->bindValue(3, $chkPassPort["receiver_address"]);
        $statement->bindValue(4, $_POST["ship"]);
        $statement->bindValue(5, $_POST["pay"]);
        $statement->bindValue(6, $_POST["remark"]);
        $statement->bindValue(7, $chkPassPort["receiver_phone"]);
        $statement->bindValue(8, $chkPassPort["receiver_name"]);
        $statement->execute();
    }
} else if ($_POST["new_name"] != null) { // 新增收貨地址
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $_SESSION['member_ID']);
    $statement->bindValue(2, $_POST["total"]);
    $statement->bindValue(3, $_POST["new_add"]);
    $statement->bindValue(4, $_POST["ship"]);
    $statement->bindValue(5, $_POST["pay"]);
    $statement->bindValue(6, $_POST["remark"]);
    $statement->bindValue(7, $_POST["new_phone"]);
    $statement->bindValue(8, $_POST["new_name"]);
    $statement->execute();
}

echo "<script> location.href = '../shopping_process02.html';</script>";

?>
<?php
    // $user = $_POST["user"];

    //資料庫-------------------------------------------


    
    //input your code...
    $keyword = isset($_POST["keyword"]) ? ($_POST["keyword"]) : "";

    include("./lib/util.php");


    $data =[];
    if($keyword != ""){
    $sql = "SELECT * FROM member where member_ID like ? or member_email  like ? or member_account like ?";
    //  echo $sql;

    //執行並查詢，會回傳查詢結果的物件，必須使用fetch、fetchAll...等方式取得資料
    // $statement = $pdo->query($sql);

    $statement = getPDO()->prepare($sql);
    $statement-> bindValue(1, "%".$keyword."%");
    $statement-> bindValue(2, "%".$keyword."%");
    $statement-> bindValue(3, "%".$keyword."%");
    $statement->execute();

    //抓出全部且依照順序封裝成一個二維陣列
    $data = $statement->fetchAll();

    //input your code...

    }
    //input your code...
    sleep(3);

    echo json_encode($data);

        // foreach ($data as $index => $row) {
        //     echo $row["Name"];
        //     echo "<br>";
        // }




    //input your code...
    // if(count($data) > 0){
    //     //將二維陣列取出顯示其值
    //     foreach($data as $index => $row){
    //         echo $row["Name"];   //欄位名稱
    //     }
    // }else{
    //     echo "查無結果!";
    // }
 

?>
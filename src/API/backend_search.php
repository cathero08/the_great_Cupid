<?php

    include("./lib/util.php");
    // $pdo = Cupid_db();
    //建立SQL

    $search = $_POST["search"];

    $sql = "SELECT * FROM member where member_ID or member_account or member_email like ?";
    
    $statement = getPDO()->prepare($sql);
    $statement->bindValue(1, "%".$search."%");
    $statement->execute();
    
    $data = $statement->fetchAll(); 
    echo json_encode($data);  
?>
<?php

$id = $_POST["id"];

  include("./lib/util.php");
  // $pdo = Cupid_db();
  //建立SQL
  
  $sql = "SELECT * FROM member where member_type = 'nu'";
  
  // 執行
  $statement = getPDO()->prepare($sql);
  $statement->execute();
  $data = $statement->fetchAll();
  
  // 回傳json
  echo json_encode($data);

  $sql = "SELECT * FROM member ";
  $statement = $pdo->prepare($sql);
  $statement->bindValue(1, $id);
  $statement->execute();

  $data = $statement->fetch();

  echo json_encode($data);

?>
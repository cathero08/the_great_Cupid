<?php

  // include("./login_sql.php");
  include("./connection.php"); 

  $pdo = getPDO();

  //---------------------------------------------------

  $qa_id = $_POST["qa_id"];
  $f_sort = $_POST["qa_class"];
  $f_question = $_POST["question"];
  $f_answer = $_POST["answer"];


  //建立SQL
  $sql = "UPDATE  Cupid_db.`commonqa`
          SET `commonqa_catalogue` = ?,
          `commonqa_question` = ?,
          `commonqa_answer` = ?
          WHERE qa_ID = ?";


  $statement = $pdo ->prepare($sql);
  //執行
  // $statement->execute();
  $statement = $pdo->prepare($sql);
        $statement->bindValue(1 , $f_sort); 
        $statement->bindValue(2 , $f_question); 
        $statement->bindValue(3 , $f_answer); 
        $statement->bindValue(4 , $qa_id); 
        $statement->execute();

?>
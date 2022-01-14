<?php

      include("./connection.php");
      // $connect = new PDO("mysql:host = localhost; dbname = Cupid_db", "root", "password");

    //  $received_data = json_decode(file_get_contents("php://input")
      //  );

    //  $data = [];

    //  if($received_data -> action == "fetchall"){
      $sql = "SELECT sum(questionnaire_companion + 1)  - sum(questionnaire_food) meat, 
                     sum(questionnaire_food) veg 
                
              FROM questionnaire
              WHERE questionnaire_attend = '是'
              ";

      $statement = $connect -> prepare($sql);
      $statement -> execute();

      $data = $statement -> fetchAll();

      echo json_encode($data);

?>
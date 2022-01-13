<?php

     $connect = new PDO("mysql:host = localhost; dbname = Cupid_db", "root", "password");

    //  $received_data = json_decode(file_get_contents("php://input")
      //  );

    //  $data = [];

    //  if($received_data -> action == "fetchall"){
      $sql = "SELECT
      (SELECT count(questionnaire_relationship)  FROM Cupid_db.questionnaire where questionnaire_relationship = '男方家人') boy_family,
      (SELECT count(questionnaire_relationship)  FROM Cupid_db.questionnaire where questionnaire_relationship = '男方朋友') boy_friend,
      (SELECT count(questionnaire_relationship)  FROM Cupid_db.questionnaire where questionnaire_relationship = '男方同事') boy_colleague,
      (SELECT count(questionnaire_relationship)  FROM Cupid_db.questionnaire where questionnaire_relationship = '女方家人') girl_family,
      (SELECT count(questionnaire_relationship)  FROM Cupid_db.questionnaire where questionnaire_relationship = '女方朋友') girl_friend,
      (SELECT count(questionnaire_relationship)  FROM Cupid_db.questionnaire where questionnaire_relationship = '女方同事') girl_colleague
      ";
    //  $sql = "SELECT sum(素食份數) 素食 FROM cupid_test.question;";
      
      $statement = $connect -> prepare($sql);
      $statement -> execute();
    
      $data = $statement -> fetchAll();

      echo json_encode($data);

?>
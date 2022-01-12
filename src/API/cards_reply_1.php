<?php

     $connect = new PDO("mysql:host = localhost; dbname = Cupid_db", "root", "password");

    //  $received_data = json_decode(file_get_contents("php://input")
      //  );

    //  $data = [];

    //  if($received_data -> action == "fetchall"){
      $sql = "SELECT
      (SELECT count(questionnaire_relationship)  FROM Cupid_db.questionnaire where questionnaire_relationship = 'boy_family') boy_family,
      (SELECT count(questionnaire_relationship)  FROM Cupid_db.questionnaire where questionnaire_relationship = 'boy_friend') boy_friend,
      (SELECT count(questionnaire_relationship)  FROM Cupid_db.questionnaire where questionnaire_relationship = 'boy_colleague') boy_colleague,
      (SELECT count(questionnaire_relationship)  FROM Cupid_db.questionnaire where questionnaire_relationship = 'girl_family') girl_family,
      (SELECT count(questionnaire_relationship)  FROM Cupid_db.questionnaire where questionnaire_relationship = 'girl_friend') girl_friend,
      (SELECT count(questionnaire_relationship)  FROM Cupid_db.questionnaire where questionnaire_relationship = 'girl_colleague') girl_colleague
      ";
    //  $sql = "SELECT sum(素食份數) 素食 FROM cupid_test.question;";
      
      $statement = $connect -> prepare($sql);
      $statement -> execute();
    
      $data = $statement -> fetchAll();

      echo json_encode($data);

?>
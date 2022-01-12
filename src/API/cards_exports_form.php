<?php

    $connect = new PDO("mysql:host = localhost; dbname = Cupid_db", "root", "password");

    $data = json_decode(file_get_contents("php://input"));

    $request = $data-> request;

    if($request == 2){
      $createdate = $data -> questionnaire_createdate;
      $guestname = $data -> questionnaire_guestname;
      $phone = $data -> questionnaire_phone;
      $email = $data -> questionnaire_email;
      $relationship = $data -> questionnaire_relationship;
      $attend = $data -> questionnaire_attend;
      $companion = $data -> questionnaire_companion;
      $food = $data -> questionnaire_food;
      $cards = $data -> questionnaire_cards;
      $address = $data -> questionnaire_address;
      $notes = $data -> questionnaire_notes;
    
      $userData = mysqli_query($con,"SELECT * FROM Cupid_db.questionnaire WHERE questionnaire_guestname='".$guestname."'");
      if(mysqli_num_rows($userData) == 0){
        mysqli_query($con,"INSERT INTO Cupid_db.questionnaire(
          FKmember_ID,
          questionnaire_ID,
          questionnaire_createdate,
          questionnaire_guestname,
          questionnaire_phone,
          questionnaire_email,
          questionnaire_relationship,
          questionnaire_attend,
          questionnaire_companion,
          questionnaire_food,
          questionnaire_cards,
          questionnaire_address,
          questionnaire_notes
        ) 
        VALUES(,,NOW(),'".$guestname."','".$phone."','".$email."','".$relationship."','".$attend."','".$companion."','".$food."','".$cards."','".$address."','".$notes."')");
        echo "送出成功!!";
      }
    
      exit;
    }
    //  $sql = "SELECT sum(素食份數) 素食 FROM cupid_test.question;";

?>
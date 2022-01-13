<?php

    // header ('Content-Type: text/html; charset=UTF8');
    $cards_url = "./img_upload_php/";
    $image1_name = $cards_url.$_POST['image1_name'];
    $image2_name = $cards_url.$_POST['image2_name'];
    $image3_name = $cards_url.$_POST['image3_name'];
    $image4_name = $cards_url.$_POST['image4_name'];
    

    //MySQL相關資訊
    $db_host = "127.0.0.1";
    $db_user = "root";
    $db_pass = "password";
    $db_select = "Cupid_db";

    //建立資料庫連線物件
    $dsn = "mysql:host=".$db_host.";dbname=".$db_select;

    //建立PDO物件，並放入指定的相關資料
    $pdo = new PDO($dsn, $db_user, $db_pass);

    //---------------------------------------------------
    session_start();
    $member_ID = $_SESSION['member_ID'];
    //建立SQL語法
    $sql = "UPDATE cardhistory c
                join member m
                on m.member_ID = c.FKmember_ID
                SET cardhistory_photoupload = '$image1_name',
                    cardhistory_photoupload2 = '$image2_name',
                    cardhistory_photoupload3 = '$image3_name',
                    cardhistory_photoupload4 = '$image4_name'
                    WHERE member_account='$member_ID'
                        ;";
    //  echo $sql;

    if($image1_name!==""){
            
        $statement = $pdo->prepare($sql);
        // $statement-> bindValue(1, $cards_info_title);
        // $statement->bindValue(2, $password);
        $statement->execute();
    }

    //抓出全部且依照順序封裝成一個二維陣列

    // //Web根目錄真實路徑, ex: C:/XAMPP/htdocs
    // $ServerRoot = $_SERVER["DOCUMENT_ROOT"];


    // //取得上傳的檔案資訊(陣列型態)=============================
    // $fileName_arr = $_FILES["file"]["name"];    //檔案名稱含副檔名    
    // // print_r($fileName_arr);
    // $fileTmpName_arr = $_FILES["file"]["tmp_name"]; //Server上的暫存檔路徑含檔名    
    // $fileType_arr = $_FILES["file"]["type"];    //檔案種類        
    // $fileSize_arr = $_FILES["file"]["size"];    //檔案尺寸
    // $error_arr = $_FILES["file"]["error"];  //錯誤代碼
    // //=======================================================

    // //依上傳檔案的數量跑迴圈一一處理
    // for ($i = 0; $i < count($fileName_arr); $i++) {        

    //     //Server上的暫存檔路徑含檔名
    //     $filePath_Temp = $fileTmpName_arr[$i];
        
    //     //檔案最終存放位置
    //     $filePath = $ServerRoot."/CUPID_PROJECT/"."/src/"."/img_upload_php/".$fileName_arr[$i];
    //     // $filePath = $ServerRoot."/CUPID_PROJECT/"."/dist/"."/img_upload_php/".$fileName_arr[$i];

    //     //判斷是否上傳成功
    //     if($error_arr[$i] > 0){
    //         echo "上傳失敗: 錯誤代碼".print_r($error_arr);
    //     }else{
    //         //將暫存檔搬移到正確位置
    //         move_uploaded_file($filePath_Temp, $filePath);

    //         //顯示檔案資訊
    //         // echo "檔案存放位置：".$filePath;
    //         // echo "<br/>";
    //         // echo "類型：".$fileType_arr[$i];
    //         // echo "<br/>";
    //         // echo "大小：".$fileSize_arr[$i];
    //         // echo "<br/>";
    //         // echo "副檔名：".getExtensionName($filePath);
    //         // echo "<br/>";
    //         // echo "<img src='/cupid_project/src/img_upload_php/".$fileName_arr[$i]."'/>";
    //         // echo "<br/><br/>";
    //     }
    // }    

    // //取得檔案副檔名
    // function getExtensionName($filePath){
    //     $path_parts = pathinfo($filePath);
    //     return $path_parts["extension"];
    // }
    
    // header("location:../cards_upload.html");
    // echo "<script type='text/javascript'>alert('上傳成功');</script>";
?>



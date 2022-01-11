<?php
    //Web根目錄真實路徑, ex: C:/XAMPP/htdocs
    $ServerRoot = $_SERVER["DOCUMENT_ROOT"];

    //取得上傳的檔案資訊(陣列型態)=============================
    $fileName_arr = $_FILES["file"]["name"];    //檔案名稱含副檔名    
    $fileTmpName_arr = $_FILES["file"]["tmp_name"]; //Server上的暫存檔路徑含檔名    
    $fileType_arr = $_FILES["file"]["type"];    //檔案種類        
    $fileSize_arr = $_FILES["file"]["size"];    //檔案尺寸
    $error_arr = $_FILES["file"]["error"];  //錯誤代碼
    //=======================================================

    //依上傳檔案的數量跑迴圈一一處理
    for ($i = 0; $i < count($fileName_arr); $i++) {        

        //Server上的暫存檔路徑含檔名
        $filePath_Temp = $fileTmpName_arr[$i];
        
        //檔案最終存放位置
        $filePath = $ServerRoot."/Cupid_project/"."/dist/"."/cards_uploadIMG/".$fileName;

        //判斷是否上傳成功
        if($error_arr[$i] > 0){
            echo "上傳失敗: 錯誤代碼".$error_arr[$i];
        }else{
            //將暫存檔搬移到正確位置
            move_uploaded_file($filePath_Temp, $filePath);

            //顯示檔案資訊
            echo "檔案存放位置：".$filePath;
            echo "<br/>";
            echo "類型：".$fileType_arr[$i];
            echo "<br/>";
            echo "大小：".$fileSize_arr[$i];
            echo "<br/>";
            echo "副檔名：".getExtensionName($filePath);
            echo "<br/>";
            echo "<img src='/FileUpload/".$fileName_arr[$i]."'/>";
            echo "<br/><br/>";
        }
    }    

    //取得檔案副檔名
    function getExtensionName($filePath){
        $path_parts = pathinfo($filePath);
        return $path_parts["extension"];
    }
?>

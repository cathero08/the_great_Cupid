<?php

    //取得PDO物件
    function getPDO(){

        include("./cards_nation.php");

        return $pdo;
        
    }

    //上傳檔案的放置位置(路徑)
    function getFilePath(){        

        //Apache實際的根目錄路徑
        $ServerRoot = $_SERVER["DOCUMENT_ROOT"];

        //Apache根目錄之下的檔案存放路徑
        $filePath = "./Lib/";
        
        return $ServerRoot.$filePath;

    }

?>
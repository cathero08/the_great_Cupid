<?php
    session_start();

    //取得PDO物件
    function getPDO(){

        include("./cards_nation.php");

        return $pdo;
        
    }
// --------------------------------------------------------------------------

    //清空session
    $_SESSION = [];
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();

    echo "<script>alert('登出成功!'); location.href = '../index.html';</script>";  
?>
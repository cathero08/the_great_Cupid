<?php
    include("./API/backend_logout.php");

    //清空session
    clearSession();

    echo "<script>alert('登出成功!'); location.href = '../backend_login.html';</script>";  
?>
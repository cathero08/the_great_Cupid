<?php
    include("./lib/member.php");

    //清空session
    clearSession();
    echo "<script>alert('登出成功!'); location.href = '../Product.html';</script>";  
?>
?>
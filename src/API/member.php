<?php
	include("../../Lib/Member.php");

	//顯示會員資訊
    $str = getMemberName();
	echo $str == "" ? "<a href='Login.html'>會員登入</a>" : "Hello~".$str."&nbsp;&nbsp;&nbsp;<a href='API/Logout.php'>登出</a>";
?>
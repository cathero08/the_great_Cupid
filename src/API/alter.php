<?php 
session_start (); 
$username = $_REQUEST ["username"]; 
$oldpassword = $_REQUEST ["oldpassword"]; 
$newpassword = $_REQUEST ["newpassword"]; 
$con = mysql_connect ( "localhost", "root", "root" ); 
if (! $con) { 
die ( '資料庫連線失敗' . $mysql_error () ); 
} 
mysql_select_db ( "user_info", $con ); 
$dbusername = null; 
$dbpassword = null; 
$result = mysql_query ( "select * from user_info where username ='{$username}' and isdelete =0;" ); 
while ( $row = mysql_fetch_array ( $result ) ) { 
$dbusername = $row ["username"]; 
$dbpassword = $row ["password"]; 
} 
if (is_null ( $dbusername )) { 
?> 
<script type="text/javascript"> 
alert("使用者名稱不存在"); 
window.location.href="alter_password.html"; 
</script>  
<?php 
} 
if ($oldpassword != $dbpassword) { 
?> 
<script type="text/javascript"> 
alert("密碼錯誤"); 
window.location.href="alter_password.html"; 
</script> 
<?php 
} 
mysql_query ( "update user_info set password='{$newpassword}' where username='{$username}'" ) or die ( "存入資料庫失敗" . mysql_error () );//如果上述使用者名稱密碼判定不錯，則update進資料庫中 
mysql_close ( $con ); 
?> 
<script type="text/javascript"> 
alert("密碼修改成功"); 
window.location.href="index.html"; 
</script> 

?> 
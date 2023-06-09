<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_urun = "localhost";
$database_urun = "urun";
$username_urun = "root";
$password_urun = "";
$urun = mysql_pconnect($hostname_urun, $username_urun, $password_urun) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
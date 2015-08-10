<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_lfgdbconnect = "localhost";
$database_lfgdbconnect = "lfgproducts";
$username_lfgdbconnect = "lfgproducts";
$password_lfgdbconnect = "Plokijuh1";
$lfgdbconnect = mysql_pconnect($hostname_lfgdbconnect, $username_lfgdbconnect, $password_lfgdbconnect) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
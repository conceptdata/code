<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_lfgproductsconnect = "localhost";
$database_lfgproductsconnect = "lfgproducts";
$username_lfgproductsconnect = "lfgproducts";
$password_lfgproductsconnect = "Plokijuh1";
$lfgproductsconnect = mysql_pconnect($hostname_lfgproductsconnect, $username_lfgproductsconnect, $password_lfgproductsconnect) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
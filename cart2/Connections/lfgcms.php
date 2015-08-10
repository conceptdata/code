<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_lfgcms = "localhost";
$database_lfgcms = "lfgcms";
$username_lfgcms = "lfgcms";
$password_lfgcms = "Plokijuh1";
$lfgcms = mysql_pconnect($hostname_lfgcms, $username_lfgcms, $password_lfgcms) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
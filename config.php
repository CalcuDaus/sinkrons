<?php
date_default_timezone_set("Asia/Jakarta");

define('host_name', 'localhost');
define('host_user', 'root');
define('host_pass', '');
define('host_data', 'sinkron');

$sql = new mysqli(host_name, host_user, host_pass, host_data);

if( $sql->connect_error )
{
	echo "Koneksi bermasalah";
	exit();
}
<?php

	$connect = mysql_connect("localhost", "root", "");

	$db = mysql_select_db("perusahaan_db", $connect);

	if(mysqli_connect_errno()){
		echo 'error ~_~ '.mysqli_connect_error();
	}else{
		//echo 'success ^_^';
	}

?>
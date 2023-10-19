<?php
	$dbc=mysqli_connect('localhost','root','','pizza_store');
	if(!$dbc)
	{
	    die("Connection failed: " . mysqli_connect_error());
	}else{
	    mysqli_set_charset($dbc,'utf8');
	}
?>

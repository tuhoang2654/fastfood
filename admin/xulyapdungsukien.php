<?php
	require("../includes/connect_db.php");
	include("../includes/check_errors.php");

	$masp=$_POST['masp'];
	$url=$_POST['url'];

	$confirm=$_POST['confirm'];
	if(!isset($confirm)){
		$query_tk="INSERT INTO sanphamkhuyenmai(masp,makm) VALUES('$masp','$url')";
		$result_tk=mysqli_query($dbc,$query_tk);check_errors($result_tk,$query_tk);
	}else{
		$query_tk1="DELETE FROM sanphamkhuyenmai WHERE makm={$url} and masp={$masp}";
		$result_tk1=mysqli_query($dbc,$query_tk1);check_errors($result_tk1,$query_tk1);
	}

	
?>
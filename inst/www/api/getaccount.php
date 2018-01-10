<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/db/connect.php');	
	
	$account = $_POST['account'];
	$password = $_POST['password'];
	$refer = $_POST['refer'];
	
	//判斷是否為空值
	if($account == ''||$password == ''){
		header('Location: http://nkmumis103.ocpu.io/rossmann/www/login.php?refer='. urlencode($_POST['refer']));
	}
	else {
		$demo = new Demo();
		$value = $demo->getData($account);
		if($account==$value){
			header("http://nkmumis103.ocpu.io/rossmann/www/index.html");
		}
		else{
			header("http://nkmumis103.ocpu.io/rossmann/www/login.php");
		}
	}
?>
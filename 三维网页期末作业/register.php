
<?php 
	header("Content-type:text/html;charset=utf-8");
 
   $responseData = array("code" => 0, "message" => "");
   
	$username = $_POST['username'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];

	/*
		链接数据库，
	*/
   if(!$username){
   	$responseData['code'] = 1;
   	$responseData['message'] = "用户名不能为空";
   	echo json_encode($responseData);
   	exit;
   }
   if(!$password){
   	$responseData['code'] = 2;
   	$responseData['message'] = "密码不能为空";
   	echo json_encode($responseData);
   	exit;
   }
   if($password != $repassword){
       $responseData['code'] = 3;
       $responseData["message"] = "两次输入密码不一致";
       //将数据按统一数据返回格式返回
       echo json_encode($responseData);
       exit;
   }
   
   
	$link = mysqli_connect("localhost", "root", "123456");
	mysqli_set_charset($link, "utf8");
	
		
	/*if(!$link){
		$responseData['code'] = 3;
		$responseData['message'] = "数据库连接失败";
		echo json_encode($responseData);
		exit;
	}*/
		
	mysqli_select_db($link, "shop");

			//准备sql语句进行注册
			//$sql1 = "SELECT * FROM login WHERE name='{$username}'";
			$sql2 = "INSERT INTO login(name,password) VALUES('{$username}','{$password}')";
		   
			$res = mysqli_query($link, $sql2);
		
			   if($res){
			   	$responseData['message'] = "注册成功";
			   	$responseData['code'] = 8;
			   	echo json_encode($responseData);
			   }else{
			   	$responseData['code'] = 5;
			   	$responseData['message'] = "注册失败";
			   	echo json_encode($responseData);
			   }
		  
	mysqli_close($link);
	
 ?>
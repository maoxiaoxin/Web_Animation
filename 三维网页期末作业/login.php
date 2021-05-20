
<?php 
	header("Content-type:text/html;charset=utf-8");
	// var_dump($_POST);
	/*
		定义一个统一的返回格式
	*/
 
   $responseData = array("code" => 0, "message" => "");
   
	$username = $_POST['username'];
	$password = $_POST['password'];
	//连接数据库
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
   
	$link = mysqli_connect("localhost", "root", "123456");
	mysqli_set_charset($link, "utf8");
	
		
	if(!$link){
		$responseData['code'] = 3;
		$responseData['message'] = "数据库连接失败";
		echo json_encode($responseData);
		exit;
	}
	
	mysqli_select_db($link, "shop");

	//准备sql语句进行登录
		$sql = "SELECT * FROM login WHERE name='{$username}' ";
		
		$res = mysqli_query($link, $sql);
		
		//[mysql result]
		//取出第一行数据，判断数据是否存在，如果存在返回关联数组，否则返回false
		$row = mysqli_fetch_assoc($res);
		
			if(!$row){
				$responseData['code'] = 4;
				$responseData['message'] = "用户名不存在";
				echo json_encode($responseData);
				exit;
			}
			else{
				$responseData['code'] = 5;
				$responseData['message'] = "登录成功";
				$responseData["username"] = $row['name'];
				echo json_encode($responseData);
			}
		
	mysqli_close($link);
	
 ?>
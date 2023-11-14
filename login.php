<?php session_start();?>
<html>
	<head>
		<title>Login Form with CAPTCHA in PHP</title>
		<style>
			.frm{
				width:300px;
				margin:50px auto;
			}
			.frm input{
				width:100%;
				padding:5px 2px;
			}				
		</style>
	</head>
	<body>
		<br>
		<h1 align='center'>Login Form with CAPTCHA</h1>
		<?php 
		
			$data=[
				"uname"=>"",
				"upass"=>"",
				"err_uname"=>"",
				"err_upass"=>"",
				"err_msg"=>"",
			];
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				
				$data["uname"]=$_POST["uname"];
				$data["upass"]=$_POST["upass"];
				
				if($_SESSION["captcha"]==$_POST["code"]){
					
					#Database Connection
					$con=mysqli_connect("localhost","root","","db_sample");
					
					$uname=mysqli_real_escape_string($con,$_POST["uname"]);
					$upass=mysqli_real_escape_string($con,$_POST["upass"]);
					
					$sql="select * from users where UNAME='{$uname}'";
					$res=$con->query($sql);
					
					if($res->num_rows>0){
						
						$row=$res->fetch_assoc();
						if($row["UPASS"]===$upass){
							
							$_SESSION["login_details"]=$row;
							header("location:home.php");
							
						}else{
							#Set error message for Invalid Password 
							$data["err_upass"]="Invalid Password";
						}
					}else{
						#Set error message for Invalid User Name 
						$data["err_uname"]="Invalid User Name";
					}
				}else{
					#Set error message for Incorrect CAPTCHA 
					$data["err_msg"]="Please Enter Correct CAPTCHA";
				}
			}
		?>
		<form method='post' action='<?php echo $_SERVER["REQUEST_URI"]; ?>' class='frm' autocomplete='off'>
			<p><input type='text' name='uname' required placeholder='Enter User Name' value='<?php echo $data["uname"]; ?>'></p>
			<p style='color:red;'><?php echo $data["err_uname"]; ?></p>
			
			<p><input type='password' name='upass' required placeholder='Enter Password' value='<?php echo $data["upass"]; ?>'></p>
			<p style='color:red;'><?php echo $data["err_upass"]; ?></p>
			
			<p><input type='text' name='code' required placeholder='Enter Captcha'></p>
			<p style='color:red;'><?php echo $data["err_msg"]; ?></p>
			
			<img src="captcha.php">
			
			<p><input type='submit' name='submit' value='Login'></p>
		</form>
	</body>
</html>
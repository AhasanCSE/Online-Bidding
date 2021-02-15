<?php
session_start();

    include("bid/config/db_connection.php");
     $mgs = "";
    if(isset($_POST['submit'])){
       
        $email = trim($_POST['email123']);
        $password = trim($_POST['password']);
        
        $sql = "SELECT * FROM `user_registrations` WHERE USER_EMAIL = '$email' AND `USER_PASSWORD` = '$password' AND STATUS='1'";
             
             
            $result = mysqli_query($con,$sql);
	$data = mysqli_fetch_assoc($result);
	//print_r($data);
		$_SESSION['user'] = $data;
		
		$date= date('Y-m-d H:i:s');
		$_SESSION['login_time'] = $date;
			
		header("location:bid/index.php");
		exit;
	}else{
		
	         $mgs="Wrong Pasword";
	}
 
        
    
    
    // if(isset($_POST['submitreset'])){
    //      $email = trim($_POST['emailreset']);
    //      $subject = "Forget Password";
    //      $to = $email;
         
    //      $message = "
    //       Your email Is: $email
    //       Your Password: 
    //       ";
    //    
    //     mail($to,$subject,$message);
         
    // }
?>

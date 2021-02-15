<?php
include("../config/db_connection.php");
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
$wrong = "";
$sql = "select * from user_registrations where USER_EMAIL='$email' AND USER_PASSWORD='$password'";
echo $sql;
$connect = mysqli_query($con,$sql);
if($connect){
$row = mysqli_fetch_assoc($connect);
$status=$row['STATUS'];
if($status==1){
    if(mysqli_num_rows($connect)==1){
        echo 1;
       
        $_SESSION['user_login']=true;
        $_SESSION['user_info']=$row['USER_REGISTRATION_NO'];
        $_SESSION['user_name']=$row['USER_NAME'];
        $_SESSION['user_email']=$row['USER_EMAIL'];
        $_SESSION['user_phone']=$row['USER_PHONE_NUMBER'];
        
    }else{
        //$wrong = " Wrong Email or password";
    }
}else{
    $email = "Your email is not verified.Please verify your email";
}
}else{
    $_SESSION['wrong'] = "wrong email or password";

}

?>
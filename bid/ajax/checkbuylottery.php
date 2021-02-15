<?php 
session_start();
$user_no = $_SESSION['user']['USER_REGISTRATION_NO'] ;
if(isset($_POST['check'])){
    include( "../config/db_connection.php") ;
    $lotterySetUp = $_POST['lotterySetUp'] ;
    
    $sql="SELECT `USER_REGISTRATION_NO` FROM lottery_buyers WHERE `LOTTERY_SETUP_NO` = '$lotterySetUp' AND `USER_REGISTRATION_NO` = '$user_no'";
    $rowNumber = mysqli_num_rows( mysqli_query( $con , $sql ) ) ;
    if( $rowNumber > 0 )
    {
        echo 0 ;
    }
    else
    {
        echo 1 ;
    }
     
}

if(isset($_POST['save'])){
    include( "../config/db_connection.php") ;
    
    
    $rate = $_POST['rate'] ;
    $lottery_no = $_POST['lottery_no'] ;
    $cur = date( "Y-m-d h:i:s" ) ;
    $sql="INSERT INTO lottery_buyers SET `USER_REGISTRATION_NO` = '$user_no' , `LOTTERY_SETUP_NO` = '$lottery_no', `CREATED_ON` = '$cur'";
    $rowNumber =  mysqli_query( $con , $sql ) ;
    $last_id = mysqli_insert_id( $con ) ;
   if( $rowNumber )
   {
       $query = "INSERT INTO user_master_accounts SET `USER_REGISTRATION_NO` = '$user_no', `TRANSACTION_AMOUNT` = '$rate', `TRANSACTION_TYPE_NO` = '-1', `TRANSACTION_ON` = '$cur', `REF_ACCOUNT_NO` = '$last_id', `REF_ACCOUNT_TITLE` = 'lottery_buyers', `CREATED_ON` = '$cur'";
       mysqli_query( $con , $query ) ;
       echo 1 ;
   }
   else
   {
       echo 0 ;
   }
}

?>
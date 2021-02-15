<?php 
session_start();
     $cur = date( "Y-m-d" ) ;
     $usr_id=$_SESSION['user']['USER_REGISTRATION_NO'];
    
    if( isset ( $_POST['saveBuyShare']) )
    {
      
        include ( "../config/db_connection.php") ;
        
        $id = $_POST['id'] ;
        $lotNumber=$_POST['lotNumber'];
        $TotalShares=$_POST['TotalShares'];
        $totalCost=$_POST['totalCost'];
        $totalBalance = $_POST['totalBalance'] ;
        $datTime = date( "Y-m-d h:i:s" ) ;
        
       
        
        $query = "SELECT `NO_OF_SHARES` FROM share_setups WHERE SHARE_SETUP_NO = '$id'" ;
        // echo $query ;
        $subtract = mysqli_fetch_assoc( mysqli_query( $con , $query ) ) ;
        $final_share_amount = intval ( $subtract['NO_OF_SHARES'] ) - intval( $TotalShares ) ;
        $update_share = "UPDATE share_setups SET `NO_OF_SHARES` = '$final_share_amount'  WHERE SHARE_SETUP_NO = '$id'" ;
        mysqli_query( $con , $update_share ) ;
        // echo $update_share ;
        $sql = "INSERT INTO shares SET `SHARE_SETUP_NO`='$id', `USER_REGISTRATION_NO`='$usr_id', `NO_OF_SHARES`='$TotalShares', 
         `NO_OF_LOT`='$lotNumber',  `TOTAL_VALUE`='$totalCost', `CREATED_ON`='$cur'" ;
      
        $result = mysqli_query( $con , $sql ) ;
        
        $something = "SELECT `TRANSACTION_AMOUNT` FROM `share_user_account` WHERE `USER_REGISTRATION_NO` = '$usr_id' ORDER BY `SHARE_USER_ACCOUNT_NO` DESC LIMIT 1";
        $OneStepBack = mysqli_fetch_assoc( mysqli_query( $con , $something )) ;
        $currentAmount = doubleval( $OneStepBack['TRANSACTION_AMOUNT'] ) - doubleval( $totalCost );
       
         $insertMasterAccount = "UPDATE share_user_account SET `TRANSACTION_AMOUNT` = '$currentAmount', `TRANSACTION_TYPE_NO` = -1, 
        `TRANSACTION_ON` = '$datTime', `REF_ACCOUNT_TITLE` = 'shares', `CREATED_ON` = '$datTime' WHERE `USER_REGISTRATION_NO` = '$usr_id' ORDER BY `SHARE_USER_ACCOUNT_NO` DESC LIMIT 1" ;
        mysqli_query( $con , $insertMasterAccount ) ;
        
        if( $result )
        {
            echo 1 ;
        }
        else
        {
           echo 0 ;
        }
    }
    
     if( isset ( $_POST['check']) )
    {
      
        include ( "../config/db_connection.php") ;
        $regNo=$_SESSION['user']['USER_REGISTRATION_NO'];
        $datTime = date( "Y-m-d " ) ;
        
        $sql="SELECT SUM(`NO_OF_LOT` ) as total FROM `shares` WHERE `USER_REGISTRATION_NO`='$regNo' AND `CREATED_ON`='$datTime' ";
        $result=mysqli_fetch_assoc(mysqli_query($con,$sql));
        
       
        
        
        if( $result )
        {
            echo $result['total'] ;
        }
        else
        {
           echo 0 ;
        }
    }

   

?>
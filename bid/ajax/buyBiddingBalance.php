<?php session_start();?>
<?php
    
    if( isset( $_POST[ 'saveIt' ] ) )
    {
        include( "../config/db_connection.php") ;
        $totalCost = $_POST['totalCost'] ;
        $totalBiddingCost = $_POST['totalBiddingCost'] ;
        $cuurentBalance = $_POST['cuurentBalance'] ;
        $id = $_SESSION['user']['USER_REGISTRATION_NO'] ;
        $final = doubleval( $cuurentBalance ) - doubleval( $totalCost ) ;
        $dateTime = date( "Y-m-d h:i:s" ) ;
        
        $query = "INSERT INTO bid_bidding_user_accounts SET `USER_REGISTRATION_NO` = '$id', `TRANSACTION_AMOUNT` = '$totalBiddingCost', 
         `TRANSACTION_TYPE_NO` = '-1', `TRANSACTION_ON` = '$dateTime', `CREATED_ON` = '$dateTime'";
        
        $result = mysqli_query ( $con , $query ) ;
        if( $result )
        {
            $sql = "update user_master_accounts set TRANSACTION_AMOUNT='$final' where USER_REGISTRATION_NO='$id'";
            if(mysqli_query($con,$sql)){
                echo 1;
            }else{
                echo 0;
            }
        }
        else
        {
            echo 0 ;
        }
    }
    ?>
<?php

    if( isset( $_POST['confirm'] ) )
    {
        include ( "../config/db_connection.php" ) ;
        $answerNo = $_POST['answerNo'] ;
        $questionNo = $_POST['questionNo'] ;
        $ratio = $_POST['ratio'] ;
        
        $query = "SELECT `USER_BIDDING_NO`, `USER_REGISTRATION_NO`, `BID_AMOUNT` FROM bid_user_biddings WHERE `BID_ANSWER_NO` = '$answerNo' AND `BID_QUESTION_NO` = '$questionNo'";
        mysqli_autocommit($con, TRUE);
        $getAnswers_user = mysqli_query( $con , $query ) ;
        
        // get current coin value //
        
            $getCurrent = "SELECT `BIDDING_COIN_RATE` FROM `bidding_coin_rate` WHERE `BIDDING_COIN_NO` = '1'" ;
            $coinValue = mysqli_fetch_assoc( mysqli_query( $con , $getCurrent ) ) ;
            $coinRate = $coinValue['BIDDING_COIN_RATE'] ;
        
        // end current coin value 
        
        foreach( $getAnswers_user as $value )
        {
            $user_no = $value['USER_REGISTRATION_NO'] ;
            $amount = $value['BID_AMOUNT'] ;
            $no = $value['USER_BIDDING_NO'] ;
            
            $final_amount = $ratio * $amount * $coinRate ;
            
            // insert data into master_account_table from bidding
                $dateTime = date("Y-m-d h:i:s");
                $insertData = "UPDATE user_master_accounts SET `TRANSACTION_AMOUNT` = '$final_amount', 
                `TRANSACTION_TYPE_NO` = '1', `TRANSACTION_ON` = '$dateTime', `REF_ACCOUNT_NO` = '$no', `REF_ACCOUNT_TITLE` = 'bid_user_biddings', `CREATED_ON` = '$dateTime' WHERE `USER_REGISTRATION_NO` = '$user_no'" ;
                $result = mysqli_query(  $con , $insertData ) ;
            //end update
            
            // insert data into bid_user_wins table
                
                $insertWins = "INSERT INTO bid_user_wins SET `USER_REGISTRATION_NO` = '$user_no', `BID_QUESTION_NO` = '$questionNo', 
                `BID_ANSWER_NO` = '$answerNo', `BID_AMOUNT` = '$amount', `BID_RATIO` = '$ratio', `WIN_AMOUNT` = '$final_amount', `CREATED_ON` = '$dateTime'";
                $winResult = mysqli_query( $con , $insertWins ) ;
                
            // end insertion
            
        }
        
        // insert data into bid_user_loss_biddings //
        
            $query = "SELECT `USER_BIDDING_NO`,BID_ANSWER_NO, `USER_REGISTRATION_NO`, `BID_AMOUNT` FROM bid_user_biddings WHERE `BID_ANSWER_NO` != '$answerNo' AND `BID_QUESTION_NO` = '$questionNo'";
            $looserList = mysqli_query( $con , $query ) ;
            foreach( $looserList as $value )
            {
                $user_no = $value['USER_REGISTRATION_NO'] ;
                $amount = $value['BID_AMOUNT'] ;
                $answer_no = $value['BID_ANSWER_NO'] ;
                $insertLooser = "INSERT INTO bid_user_loss_biddings SET `USER_REGISTRATION_NO` = '$user_no', `BID_QUESTION_NO` = '$questionNo', `BID_ANSWER_NO` = '$answer_no', `BID_AMOUNT` = '$amount', `CREATED_ON` = '$dateTime'" ;
                $looserResult = mysqli_query( $con , $insertLooser ) ;
            }
        
        // end for looser
        
        mysqli_close($con);
        
        echo 1 ;
    }

?>
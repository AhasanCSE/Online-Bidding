<?php 
session_start( );
date_default_timezone_set("Asia/Dhaka");
    
    function DateCompare( $date1 , $date2 )
    {
        $dateTimestamp1 = strtotime($date1); 
        $dateTimestamp2 = strtotime($date2);

        if( $dateTimestamp1 == $dateTimestamp2  )
        {
            return true ;
        }
        else
        {
            return false ;
        }
    }
    
    function CompareTimes( $start_time, $end_time )
    {
        if( strtotime ( $start_time ) <= time() && time() <= strtotime ( $end_time ) )
        {
            return true ;
        }
        else
        {
            return false ;
        }
    }


if( isset( $_POST['answer_no'] ) ) 
{
        $answer_no = explode ( ",", $_POST[ 'answer_no' ] );
        $set_amount = explode ( ",", $_POST[ 'set_amount' ] ) ;
        $question_no = $_POST[ 'question_no' ] ;
        $user_registration_no = $_SESSION['user']['USER_REGISTRATION_NO'] ;
        include( "../config/db_connection.php") ;
        $cur = date( "Y-m-d" ) ;
        $result = "" ;
        
        $sql = "SELECT `BIDDING_DATE`, `START_TIME`, `END_TIME` FROM `bid_questions` WHERE `BID_QUESTION_NO` = '$question_no'" ;
       
        $answers = mysqli_fetch_assoc( mysqli_query( $con , $sql ) ) ;
        $start_time = $answers['START_TIME'] ;
        $end_time = $answers['END_TIME'] ;
        $date = $answers['BIDDING_DATE'] ;
        $cur_date = date( "Y-m-d" ) ;
        $bidding_balance = $_POST['bidding_balance'] ;
        if( DateCompare( $date, $cur_date ) )
        {
            if( CompareTimes( $start_time, $end_time ) )
            {
                $total = 0 ;
                for( $i = 0 ; $i < count ( $answer_no ) ; $i ++ )
                {
                    $total += $set_amount[$i] ;
                    $query = "INSERT INTO bid_user_biddings SET `USER_REGISTRATION_NO` = '$user_registration_no',`BID_QUESTION_NO` = '$question_no', `BID_ANSWER_NO` = '$answer_no[$i]', 
                    `BID_AMOUNT`= '$set_amount[$i]', `CREATED_BY` = '$user_registration_no', `CREATED_ON` = '$cur'" ;
                    
                    $result = mysqli_query( $con , $query ) ;
                }
                if( $result )
                {
                    $final_balance = $bidding_balance - $total ;
                    $dateTime = date("Y-m-d h:i:s") ;
                    // $update = "UPDATE `user_master_accounts` SET BIDDING_BALANCE = '$final_balance' WHERE `USER_REGISTRATION_NO` = '$user_registration_no'";
                    $update = "UPDATE bid_bidding_user_accounts SET `TRANSACTION_AMOUNT` = '$final_balance', `TRANSACTION_TYPE_NO` = '-1', `TRANSACTION_ON` = '$dateTime', `REF_ACCOUNT_TITLE` = 'bid_user_biddings', `CREATED_ON` = '$dateTime' WHERE `USER_REGISTRATION_NO` = '$user_registration_no' ORDER BY BIDDING_USER_ACCOUNT_NO DESC LIMIT 1";
                    mysqli_query( $con ,$update ) ;
                    echo 1 ;
                }
                else
                {
                    echo 0 ;
                }
            }
            else
            {
                echo 0 ;
            }
        }
        else
        {
            echo 0 ;
        }
}

?>
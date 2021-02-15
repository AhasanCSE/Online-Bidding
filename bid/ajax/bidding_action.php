<?php session_start();?>
<?php
    
    if( isset( $_POST[ 'get_answer' ] ) )
    {
        include( "../config/db_connection.php") ;
        $answer_no = $_POST[ 'answer_no' ];
        $user_no = "1" ;
        $sql = "SELECT `ANSWER_COUNT`,`USER_REGISTRATION_NO` FROM bidding_answers WHERE `ANSWER_NO` = '$answer_no'" ;
        // echo $sql ;
        $result = mysqli_fetch_assoc( mysqli_query( $con , $sql ) ) ;
        $count = $result['ANSWER_COUNT'] + 1 ;
        $registration = $result['USER_REGISTRATION_NO'].",". $user_no ;
    
        
        $update = "UPDATE bidding_answers SET `ANSWER_COUNT` = '$count',`USER_REGISTRATION_NO` = '$registration'  WHERE `ANSWER_NO` = '$answer_no'" ;
        // echo $update ;
        $ans = mysqli_query( $con , $update ) ;
        if( $ans )
        {
            echo 1 ;
        }
        else
        {
            echo 0 ;
        }
    }
    
    if( isset( $_POST['get_answer_name'] ) )
    {
        include( "../config/db_connection.php") ;
        $answer_no = $_POST[ 'answer_no' ];
        $user_no = "1" ;
        $sql = "SELECT ANSWER_TITLE, `ANSWER_COUNT`,`USER_REGISTRATION_NO` FROM bidding_answers WHERE `ANSWER_NO` = '$answer_no'" ;
        
        $result = mysqli_fetch_assoc( mysqli_query( $con , $sql ) ) ;
        $count = intval( $result['ANSWER_COUNT'] ) - 1 ;
        $registration = explode( ",", $result['USER_REGISTRATION_NO'] );
        $new_registration = "";
        
        for( $i = 0 ; $i < count ( $registration ) ; $i ++ )
        {
            if( $user_no == $registration[$i] )
            {
                continue;
            }
            else
            {
                $new_registration.= $registration[$i].",";
            }
        }
        
        $update = "UPDATE bidding_answers SET `ANSWER_COUNT` = '$count',`USER_REGISTRATION_NO` = '$new_registration'  WHERE `ANSWER_NO` = '$answer_no'" ;
        mysqli_query ( $con , $update ) ;
        
        echo $result['ANSWER_TITLE'] ;
        
    }

?>
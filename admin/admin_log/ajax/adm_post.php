<?php

    if( isset( $_POST['save'] ) ) 
    {
        include ( "../config/db_connection.php" ) ;
  
        $post_title = $_POST[ 'title' ] ;
        $date = $_POST[ 'date' ] ;
        $start_time = $_POST[ 'start_time' ] ;
        $end_time = $_POST[ 'end_time' ] ;
        $min_range = $_POST[ 'min_range' ] ;
        $max_range = $_POST[ 'max_range' ] ;
        
        $description = $_POST['description'] ;
        $cur = date("Y-m-d") ;
        
        $ratio =  explode ( ",", $_POST['ratio'] ) ;
        $answers = explode ( ",", $_POST[ 'data' ] ) ;
        
        $query = "INSERT INTO bid_questions SET `BIDDING_TITLE`= '$post_title', `BIDDING_DESCRIPTION` = '$description', `BIDDING_DATE` = '$date', 
        `START_TIME` = '$start_time', `END_TIME`= '$end_time', `MIN_RANGE` = '$min_range', `MAX_RANGE` = '$max_range' ,`CREATED_ON` = '$cur'" ;
        // echo $query ;
        
        $result = mysqli_query( $con , $query ) ;
        $question_no = mysqli_insert_id( $con ) ;
        if( $result )
        {
            for( $i = 0 ; $i < count( $answers ) ; $i ++ )
            {
                $ans = $answers[ $i ] ;
                $ans_ratio = $ratio[ $i ] ;
                
                $sql = "INSERT INTO bid_answers SET `BID_QUESTION_NO` = '$question_no', `ANSWER_TITLE`= '$ans', `BID_RATIO` = '$ans_ratio', `CREATED_ON` = '$cur'" ;
                mysqli_query( $con , $sql ) ;
            }
            
            echo 1 ;
        }
        else
        {
            echo 0 ;
        }
        
    }
    
     if( isset( $_POST['update'] ) ) 
    {
        include ( "../config/db_connection.php" ) ;
  
        $post_title = $_POST[ 'title' ] ;
        $date = $_POST[ 'date' ] ;
        $start_time = $_POST[ 'start_time' ] ;
        $end_time = $_POST[ 'end_time' ] ;
        $min_range = $_POST[ 'min_range' ] ;
        $max_range = $_POST[ 'max_range' ] ;
        
        $description = $_POST['description'] ;
        $cur = date("Y-m-d") ;
        $id=$_POST['id'];
        $ratio =  explode ( ",", $_POST['ratio'] ) ;
        $answers = explode ( ",", $_POST[ 'data' ] ) ;
        
        $query = "UPDATE bid_questions SET `BIDDING_TITLE`= '$post_title', `BIDDING_DESCRIPTION` = '$description', `BIDDING_DATE` = '$date', 
        `START_TIME` = '$start_time', `END_TIME`= '$end_time', `MIN_RANGE` = '$min_range', `MAX_RANGE` = '$max_range' ,`CREATED_ON` = '$cur' WHERE BID_QUESTION_NO='$id'" ;
        // echo $query ;
        
        $result = mysqli_query( $con , $query ) ;
        $question_no = mysqli_insert_id( $con ) ;
        if( $result )
        {
            
            echo 1 ;
        }
        else
        {
            echo 0 ;
        }
        
    }
    
    if( isset( $_POST['id'] ) )
    {
        include ( "../config/db_connection.php" ) ;
        $id = $_POST['id'] ;
        $query = "SELECT `ANSWER_TITLE`, `BID_RATIO` FROM `bid_answers` WHERE `BID_QUESTION_NO` = '$id'" ;
        // echo $query ;
        $data = array() ;
        $ratio = array() ;
        $result = mysqli_query($con , $query ) ;
        foreach( $result as $value )
        {
            array_push( $data, $value['ANSWER_TITLE'] ) ;
            array_push( $ratio, $value['BID_RATIO'] ) ;
        }
        echo json_encode( array( $data , $ratio ) ) ; 
    }
    
    

?>
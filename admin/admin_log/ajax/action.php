<?php 
      
    if( isset ( $_POST['get_answer']) )
    {
      
        include ( "../config/db_connection.php") ;
        
        $query = "SELECT `ANSWER_NO`, `ANSWER_TITLE` FROM bidding_answers " ;
        $result = mysqli_query( $con , $query ) ;
        foreach( $result as $value )
        {
            echo "<option value = '".$value['ANSWER_NO']."'>".$value['ANSWER_TITLE']."</option>" ;
        }
    }

?>
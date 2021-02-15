<?php

    if( isset( $_POST['name'] ) ) 
    {
        include ( "../config/db_connection.php" ) ;
        
        $id=$_POST['id'];
        $sql="SELECT `USER_NAME` FROM `user_registrations` WHERE `USER_ID`='$id'";
        //echo $sql ;
        $result = mysqli_fetch_assoc( mysqli_query($con,$sql) ) ;
        echo $result['USER_NAME'] ;
    }  

?>
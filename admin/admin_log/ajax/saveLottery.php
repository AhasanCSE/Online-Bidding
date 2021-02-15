<?php 
     $cur = date( "Y-m-d" ) ;
     
    if( isset($_POST['TableData'] ) ) 
    {
        include ( "../config/db_connection.php") ;
        $query = "SELECT * FROM `lottery_setups` ORDER BY LOTTERY_SETUP_NO DESC LIMIT 10" ;
         $result = mysqli_query( $con , $query ) ;
        $count = 1 ;
        foreach( $result as $value )
        {
            echo "<tr>" ;
            echo "<td>".$count ++."</td>" ; 
            echo "<td>".$value['NO_OF_LOTTERY']."</td>" ; 
            echo "<td>".$value['LOTTERY_RATE']."</td>" ; 
            echo "<td>".$value['LOTTERY_START_DATE']."</td>" ;
            echo "<td>".$value['LOTTERY_DRAW_DATE']."</td>" ;
            
            echo "<td>";
                                                
            echo "<a class = 'btn btn-success' href='?pagex=adm_lottery_setup&&root=lottery&&editlottery=".$value['LOTTERY_SETUP_NO']."'>Edit</a>" ;
            echo "<a class = 'btn btn-danger' href='?pagex=adm_lottery_setup&&root=lottery&&deleteLottery=".$value['LOTTERY_SETUP_NO']."'>Delete</a>" ;
                                              
            echo "</td>" ;
            echo "</tr>" ;  
        }
    }
     
    if( isset ( $_POST['saveLottery']) )
    {
      
        include ( "../config/db_connection.php") ;
        
        $lottery_number = $_POST['lottery_number'] ;
        $lottery_rate = $_POST['lottery_rate'] ;
         $start_time = $_POST['start_time'] ;
        $lottery_draw_date = $_POST['lottery_draw_date'] ;
        
        
        
        $sql = "INSERT INTO `lottery_setups` SET `NO_OF_LOTTERY` = '$lottery_number', `LOTTERY_RATE`= '$lottery_rate', `LOTTERY_DRAW_DATE`= '$lottery_draw_date',`LOTTERY_START_DATE`='$start_time', 
        `CREATED_ON`= '$cur'" ;
        $result = mysqli_query( $con , $sql ) ;
        if( $result )
        {
            echo 1 ;
        }
        else
        {
           echo 0 ;
        }
    }

    if( isset ( $_POST['updateLottery']) )
    {
      
        include ( "../config/db_connection.php") ;
        
       $lottery_number = $_POST['lottery_number'] ;
        $lottery_rate = $_POST['lottery_rate'] ;
        $start_time = $_POST['start_time'] ;
        $lottery_draw_date = $_POST['lottery_draw_date'] ;
        
        $id_number = $_POST['id_number'] ;
        
        
        $sql = "UPDATE `lottery_setups` SET `NO_OF_LOTTERY` = '$lottery_number', `LOTTERY_RATE`= '$lottery_rate', `LOTTERY_DRAW_DATE`= '$lottery_draw_date' 
        ,`LOTTERY_START_DATE`='$start_time' WHERE LOTTERY_SETUP_NO = '$id_number'" ;
        echo $sql;
        $result = mysqli_query( $con , $sql ) ;
        if( $result )
        {
            echo 1 ;
        }
        else
        {
           echo 0 ;
        }
    }

?>
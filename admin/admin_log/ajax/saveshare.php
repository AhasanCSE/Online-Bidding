<?php 
     $cur = date( "Y-m-d" ) ;
     
    if( isset($_POST['TableData'] ) ) 
    {
        include ( "../config/db_connection.php") ;
        $query = "SELECT * FROM `share_setups` ORDER BY SHARE_SETUP_NO DESC LIMIT 50" ;
         $result = mysqli_query( $con , $query ) ;
        $count = 1 ;
        foreach( $result as $value )
        {
            echo "<tr>" ;
            echo "<td>".$count ++."</td>" ; 
            echo "<td>".$value['NO_OF_SHARES']."</td>" ; 
            echo "<td>".$value['UNIT_RATE']."</td>" ; 
            echo "<td>".$value['NO_OF_LOT']."</td>" ;
            echo "<td>".$value['LOT_RATE']."</td>" ;
            echo "<td>";
                                                
            echo "<a class = 'btn btn-success' href='?pagex=admin_share_setup&&root=shares&&editShare=".$value['SHARE_SETUP_NO']."'>Edit</a>" ;
            echo "<a class = 'btn btn-danger' href='?pagex=admin_share_setup&&root=shares&&deleteShare=".$value['SHARE_SETUP_NO']."'>Delete</a>" ;
                                              
            echo "</td>" ;
            echo "</tr>" ;  
        }
    }
     
    if( isset ( $_POST['saveShare']) )
    {
      
        include ( "../config/db_connection.php") ;
        
        $share_number = $_POST['share_number'] ;
        $unit_rate = $_POST['unit_rate'] ;
        $lot_number = $_POST['lot_number'] ;
        $lot_rate = $_POST['lot_rate'] ;
        
        
        $sql = "INSERT INTO `share_setups` SET `NO_OF_SHARES` = '$share_number', `UNIT_RATE`= '$unit_rate', `NO_OF_LOT`= '$lot_number', 
        `LOT_RATE`= '$lot_rate',`CREATED_ON`= '$cur'" ;
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

    if( isset ( $_POST['updateShare']) )
    {
      
        include ( "../config/db_connection.php") ;
        
        $share_number = $_POST['share_number'] ;
        $unit_rate = $_POST['unit_rate'] ;
        $lot_number = $_POST['lot_number'] ;
        $lot_rate = $_POST['lot_rate'] ;
        $id_number = $_POST['id_number'] ;
      
        
        $sql = "UPDATE `share_setups` SET `NO_OF_SHARES` = '$share_number', `UNIT_RATE`= '$unit_rate', `NO_OF_LOT`= '$lot_number', 
        `LOT_RATE`= '$lot_rate' WHERE SHARE_SETUP_NO = '$id_number'" ;
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
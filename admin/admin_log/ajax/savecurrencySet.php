<?php 
     $cur = date( "Y-m-d" ) ;
     
    if( isset($_POST['TableData'] ) ) 
    {
        include ( "../config/db_connection.php") ;
        $query = "SELECT * FROM `currency_setups` ORDER BY CURRENCY_SETUP_NO DESC LIMIT 50" ;
         $result = mysqli_query( $con , $query ) ;
        $count = 1 ;
        foreach( $result as $value )
        {
           
            echo "<tr>" ;
            echo "<td>".$count ++."</td>" ; 
            echo "<td>".$value['CURRENCY_NAME']."</td>" ; 
            echo "<td>".$value['CURRENCY_RATE']."</td>" ; 
            echo '<td> <img src='.$value["CURRENCY_IMAGE"].' width= "50px" height= "50px"/> </td>' ; 
            echo "<td>".$value['BUY_RATE']."</td>" ;
            echo "<td>".$value['SALE_RATE']."</td>" ;
            echo "<td>";
                                                
            echo "<a class = 'btn btn-success' href='?pagex=currency_setup&&root=currency&&editShare=".$value['CURRENCY_SETUP_NO']."'>Edit</a>" ;
            echo "<a class = 'btn btn-danger' href='?pagex=currency_setup&&root=currency&&deleteShare=".$value['CURRENCY_SETUP_NO']."'>Delete</a>" ;
                                              
            echo "</td>" ;
            echo "</tr>" ;  
        }
    }
     
    if( isset ( $_POST['saveCurrency']) )
    {
      
        include ( "../config/db_connection.php") ;
        
        $currency_name = $_POST['currency_name'] ;
        $currency_rate = $_POST['currency_rate'] ;
        $buy_rate = $_POST['buy_rate'] ;
        $sale_rate = $_POST['sale_rate'] ;
        $currencyImage=$_POST['currencyImage'];
        
        $sql = "INSERT INTO `currency_setups` SET `CURRENCY_NAME` = '$currency_name',`CURRENCY_RATE`= '$currency_rate', `BUY_RATE`= '$buy_rate', 
        `SALE_RATE`= '$sale_rate',`CREATED_ON`= '$cur', CURRENCY_IMAGE='".$currencyImage."'" ;
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
        
        $currency_name = $_POST['currency_name'] ;
        $currency_rate = $_POST['currency_rate'] ;
        $buy_rate = $_POST['buy_rate'] ;
        $sale_rate = $_POST['sale_rate'] ;
        $id_number = $_POST['id_number'] ;
        
        $sql = "UPDATE `currency_setups` SET `CURRENCY_NAME` = '$currency_name', `CURRENCY_RATE`= '$currency_rate', `BUY_RATE`= '$buy_rate', 
        `SALE_RATE`= '$sale_rate' WHERE CURRENCY_SETUP_NO = '$id_number'" ;
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
    
      if( isset ( $_POST['setRate']) )
    {
      
        include ( "../config/db_connection.php") ;
        
        $name = $_POST['name'] ;
        $rate = $_POST['rate'] ;
        $sql = "INSERT INTO bidding_coin_rate SET `BIDDING_COIN_NAME`='$name',`BIDDING_COIN_RATE`='$rate'" ;
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
<?php 
session_start() ;
     $cur = date( "Y-m-d" ) ;
     
     if( isset($_POST['currency_no']) )
     {
         include ( "../config/db_connection.php") ;
         $id = $_POST['currency_no'];
         $sql = "SELECT `SALE_RATE` FROM `currency_setups` WHERE `CURRENCY_SETUP_NO`= '$id'" ;
         $result = mysqli_fetch_assoc( mysqli_query( $con , $sql ) ) ;
         echo $result['SALE_RATE'] ;
     }
     
     if( isset($_POST['TableData'] ) )
     {
         include ( "../config/db_connection.php") ;
         $id = $_SESSION['user']['USER_REGISTRATION_NO'] ;
         
         $sql = "SELECT CURRENCY_NO, currencies.`BUY_RATE`, `NO_OF_CURRENCY`, currencies.`CREATED_ON`,
         currency_setups.CURRENCY_NAME FROM `currencies` LEFT JOIN currency_setups ON currency_setups.CURRENCY_SETUP_NO 
         = currencies.CURRENCY_SETUP_NO WHERE currencies.USER_REGISTRATION_NO ='$id' ORDER BY CURRENCY_NO DESC LIMIT 50";
        
         $count = 1 ;
         $result = mysqli_query( $con , $sql ) ;
         foreach( $result as $value )
         {
            echo "<tr>" ;
            echo "<td>".$count ++."</td>" ; 
            echo "<td>".$value['CURRENCY_NAME']."</td>" ; 
            echo "<td>".$value['BUY_RATE']."</td>" ; 
            echo "<td>".$value['NO_OF_CURRENCY']."</td>" ;
            
            echo "<td>";
                                                
            echo "<a class = 'btn btn-success' href='?pagex=user_currency&&root=currency&&editCurrency=".$value['CURRENCY_NO']."'><i class='fa fa-edit'></i>Edit</a>" ;
            echo "<a class = 'btn btn-danger' href='?pagex=user_currency&&root=currency&&deleteCurrency=".$value['CURRENCY_NO']."'><i class='fa fa-trash-alt'></i>Delete</a>" ;
                                              
            echo "</td>" ;
            echo "</tr>" ;
         }
     }
     
     if( isset ( $_POST['balance']) )
    {
        include ( "../config/db_connection.php") ;
        $user_no = $_SESSION['user']['USER_REGISTRATION_NO'] ;
        $sql = "SELECT `TRANSACTION_AMOUNT` FROM bid_bidding_user_accounts WHERE `USER_REGISTRATION_NO` = '$user_no'" ;
        $result = mysqli_fetch_assoc( mysqli_query( $con , $sql ) ) ;
        
        if( $result )
        {
            echo $result['TRANSACTION_AMOUNT'] ;
        }
        else
        {
           echo 0 ;
        }
    }
     
     
    if( isset ( $_POST['saveCurrency']) )
    {
      
        include ( "../config/db_connection.php") ;
        
        $buy_rate = $_POST['buy_rate'] ;
        $no_of_currency = $_POST['no_of_currency'] ;
        $currency_no = $_POST['currency_no'] ;
        $user_no = $_SESSION['user']['USER_REGISTRATION_NO'] ;
        $totalAmount = $_POST['totalAmount'] ;
        $currentBalance = $_POST['currentBalance'] ;
        
        $sql = "INSERT INTO currencies SET `CURRENCY_SETUP_NO` = '$currency_no', `USER_REGISTRATION_NO` = '$user_no', `BUY_RATE` = '$buy_rate', 
        `NO_OF_CURRENCY` = '$no_of_currency', `CREATED_ON` = '$cur'" ;
        
        $final = $currentBalance - $totalAmount ;
        
        $update_query = "UPDATE bid_bidding_user_accounts SET `TRANSACTION_AMOUNT` = '$final' WHERE `USER_REGISTRATION_NO` = '$user_no'" ;
        mysqli_query( $con , $update_query ) ;
       
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
    
    if( isset ( $_POST['updateCurrency']) )
    {
      
        include ( "../config/db_connection.php") ;
        
        $buy_rate = $_POST['buy_rate'] ;
        $no_of_currency = $_POST['no_of_currency'] ;
        $currency_no = $_POST['currency_no'] ;
        $user_no = $_SESSION['user']['USER_REGISTRATION_NO'] ;
        $id = $_POST['id'] ;
        $sql = "UPDATE currencies SET `CURRENCY_SETUP_NO` = '$currency_no', `USER_REGISTRATION_NO` = '$user_no', `BUY_RATE` = '$buy_rate', 
        `NO_OF_CURRENCY` = '$no_of_currency' WHERE `CURRENCY_NO` = '$id'" ;
       
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
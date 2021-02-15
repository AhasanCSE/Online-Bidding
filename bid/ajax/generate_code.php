<?php 

function GetGenerateCode( $string )
{
    $str = $string ;
    $something = "";
    
    for( $i = 0 ; $i < strlen($str); $i ++ )
    {
      if( $str[$i] == "-"){
          continue ;
        }
      else{
         $something .= $str[$i];
        }
    }
    
    $new_str = substr($something, 2, 6);
    return $new_str ;
}


if( isset ( $_POST['code'] ) )
{
    include ( "../config/db_connection.php" ) ;
    $cur = date( "Y-m-d" ) ;
    $time = time( "h:i:s" ) ;
    $user_no = $_POST['user_no'] ;
    
    $final_code =GetGenerateCode( $cur.$time ).$user_no;
    
    $check = "SELECT REFERAL_CODE FROM user_registrations WHERE USER_REGISTRATION_NO = '$user_no'" ;
    
    $checker = mysqli_fetch_assoc ( mysqli_query( $con , $check )) ;
    if( $checker['REFERAL_CODE'] == "" )
    {

        $update = "UPDATE user_registrations SET REFERAL_CODE = '$final_code' WHERE USER_REGISTRATION_NO = '$user_no'" ;
       
        $result = mysqli_query( $con , $update ) ;
        if( $result )
        {
            echo "<input type= 'text' id = 'copy_it' value = '".$final_code."' readonly style = 'border:0px solid white;'>";
            // echo "<p id = 'copy_it'>".$final_code."</p>" ;
        }
        else
        {
            0 ;
        }
    }
    else
    {
        echo "<input type= 'text' id = 'copy_it' value = '".$checker['REFERAL_CODE']."' readonly style = 'border:0px solid white;'>";
        
    }
    
}


if( isset( $_POST['checkIfExit'] ) )
{
    include ( "../config/db_connection.php" ) ;
    $cur = date( "Y-m-d" ) ;
    $time = time( "h:i:s" ) ;
    $user_no = $_POST['user_no'] ;
    
    $final_code = $cur.$time.$user_no;
    
    $check = "SELECT REFERAL_CODE FROM user_registrations WHERE USER_REGISTRATION_NO = '$user_no'" ;
    
    $checker = mysqli_fetch_assoc ( mysqli_query( $con , $check )) ;
    
    if( $checker['REFERAL_CODE'] == "" )
    {
        echo 1 ;
    }
    else
    {
         echo "<input type= 'text' id = 'copy_it' value = '".$checker['REFERAL_CODE']."' readonly style = 'border:0px solid white;'>";
        
    }
}

?>
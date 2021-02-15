<?php
    
    if ( isset( $_POST['saveall'] ) && $_POST['saveall'] == "saveall" )
    {
    
    $cur = date( "Y-m-d" ) ;

    include("../config/db_connection.php");
    
    
    
    $refcode= $_POST['referenceCode'];
    // $refname= $_POST['referenceName'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $DOB = $_POST['dateOfBirth'];
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // $ref_id = $_POST['ref_id'];
    // $bio = $_POST['bio'];
    $subject = "Verification Code";
    $VERIICATIN_CODE = rand(1000,9999);
    $to = $email;
    $userid = time().$name ;
    
    $code = "" ;
    if( $refcode == ""){
        $refcode="-1";
        
    }
    else
    {
        $get_reference_code = "SELECT USER_REGISTRATION_NO FROM user_registrations WHERE `REFERAL_CODE` = '$refcode'" ;
        $code = mysqli_fetch_assoc( mysqli_query( $con , $get_reference_code  ) ) ;
        $refcode = $code['USER_REGISTRATION_NO'] ;
    }

    
    

    $sql = "INSERT INTO user_registrations SET `USER_NAME` = '$name' , `USER_PHONE_NUMBER`='$phone',`USER_EMAIL` = '$email', `USER_PASSWORD` = '$password', `USER_DOB` = '$DOB', `REFERAL_USER_REGISTRATION_NO` = '$refcode',`REGISTRATION_CODE`='$VERIICATIN_CODE',`CREATED_ON` = '$cur',STATUS=0 ";
   
   
    
    if(mysqli_query($con,$sql)){
        
        $no = mysqli_insert_id ( $con ) ;
        $unique = $cur.time("h:i:s").$no ;
        $query = "UPDATE user_registrations SET USER_ID = '$unique' WHERE USER_REGISTRATION_NO = '$no'" ;
        
        mysqli_query( $con , $query ) ;
        echo 1;
    }else{
        echo 0;
    }
    $message = "
    
            Dear $name
            Thank You for Registrating .
           Your Verification Code Is: $VERIICATIN_CODE
            Please Click The Link to Verify Your Email Address:http://bdabashon.com/bidding/pages_verify.php?email=$email&&code=$VERIICATIN_CODE";
    
          mail($to,$subject,$message);
}
?>







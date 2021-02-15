<?php session_start() ; ?>

<?php
    include ( "config/db_connection.php") ;
    
    $cur = date( "Y-m-d h:i:s" ) ;
    $user_no = $_SESSION['user']['USER_REGISTRATION_NO'] ;
    
    if( isset ( $_POST['submit']) )
    {
        $remark=$_POST['remark'];
        $shareProfit = $_POST['shareProfit'] ;
        $sql = "INSERT INTO share_debitens SET REMARK='$remark',DEBITEN_VALUE='$shareProfit',CREATED_ON='$cur'" ;
        $result = mysqli_query( $con , $sql ) ;
        
        $lastId = mysqli_insert_id( $con ) ;
        
        $sql="SELECT DISTINCT `USER_REGISTRATION_NO` FROM `shares`";
        $res=mysqli_query($con,$sql);
        mysqli_autocommit($con,true);
             
        
        
        if ( intval ( $shareProfit ) < 0 )
        {
            
            foreach($res as $val)
             {
                 $regNumber = $val['USER_REGISTRATION_NO'] ;
                
                
                 // get total Lot Amount
                    
                    $getLot = "SELECT SUM(NO_OF_LOT) as lot FROM shares WHERE `USER_REGISTRATION_NO` = '$regNumber'" ;
                    $number = mysqli_fetch_assoc( mysqli_query( $con , $getLot ) ) ;
                    
                    $final_amount = doubleval( $number['lot'] ) * doubleval( $shareProfit );
                
                // close user_master_account
                
                // // insert user_account_master
                // $plus = ($final_amount * -1 ) ;
                //  $reg_no="INSERT INTO user_master_accounts SET `USER_REGISTRATION_NO` = '$regNumber', `TRANSACTION_AMOUNT` = '$plus', 
                //  `TRANSACTION_TYPE_NO` = -1, `TRANSACTION_ON` = '$cur', `REF_ACCOUNT_NO` ='$lastId' , `REF_ACCOUNT_TITLE` = 'share_debitens', `CREATED_ON` = '$cur'";
                //  mysqli_query( $con , $reg_no ) ;
                // //  end user_account_master
                
               
                
                
                // insert into share_debiten_process
                $getAmount =  $final_amount ;
                $query = "INSERT INTO share_debiten_process SET `USER_REGISTRATION_NO` = '$regNumber', SHARE_DEBITEN_NO = '$lastId', `SHARE_NO` = '4', `DEBITEN_AMOUNT` = '$getAmount', `CREATED_ON` = '$cur'" ;
                mysqli_query( $con , $query ) ;
                
                // end of share_debiten_process
             }
            
        }
        else
        {
           
            foreach($res as $val)
             {
                 $regNumber = $val['USER_REGISTRATION_NO'] ;
                
                
                 // get total Lot Amount
                    
                    $getLot = "SELECT SUM(NO_OF_LOT) as lot FROM shares WHERE `USER_REGISTRATION_NO` = '$regNumber'" ;
                    $number = mysqli_fetch_assoc( mysqli_query( $con , $getLot ) ) ;
                    
                    $final_amount = doubleval( $number['lot'] ) * doubleval( $shareProfit );
                
                // 
                
                // Close user_master_account
                
                // // insert user_account_master
                //  $reg_no="INSERT INTO user_master_accounts SET `USER_REGISTRATION_NO` = '$regNumber', `TRANSACTION_AMOUNT` = '$final_amount', 
                //  `TRANSACTION_TYPE_NO` = 1, `TRANSACTION_ON` = '$cur', `REF_ACCOUNT_NO` ='$lastId' , `REF_ACCOUNT_TITLE` = 'share_debitens', `CREATED_ON` = '$cur'";
                //  mysqli_query( $con , $reg_no ) ;
                // //  end user_account_master
                
               
                
                
                // insert into share_debiten_process
                $query = "INSERT INTO share_debiten_process SET `USER_REGISTRATION_NO` = '$regNumber', SHARE_DEBITEN_NO = '$lastId',`SHARE_NO` = '4', `DEBITEN_AMOUNT` = '$final_amount', `CREATED_ON` = '$cur'" ;
                mysqli_query( $con , $query ) ;
                
                // end of share_debiten_process
                 
             }
             
             mysqli_close( $con ) ;
            
        }
       
        
       
       
        
        if( $result )
        {
            echo Successfull ;
        }
        else
        {
           echo Error ;
        }
    }
?>
<div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Devident  Setup</h5>
                                    <form class="" method="post">
                                        <div class="form-row" >
                                            
                                            <!--<div class="col-md-6">-->
                                            <!--    <div class="position-relative form-group">-->
                                            <!--        <label for="" class="">Select Share</label>-->
                                            <!--       <select class="form-control search" style="width:100%;" id="selectShare" name="selectShare">-->
                                                      
                                            <!--       </select>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                             
                                                       
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="shareProfit" class="">Interest per Share/Lot</label>
                                                    <input name="shareProfit" id="shareProfit" placeholder="" value = "" type="text" class="form-control">
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="shareProfit" class="">Remarks</label>
                                                    <textarea name="remark" id="remark" placeholder=""  type="text" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                        </div>
                                        

                                        
                                    
                                    
                    <input class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg pull-right" style="margin:20px;" name="submit" type="submit" id="submitBtn" value="Submit">
                                    
                                    
                                    </form>
                                </div>
                            </div>
                           
                        </div>
                       
                    </div>
                    
                    
          
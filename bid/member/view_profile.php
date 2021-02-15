<?php
session_start();
    include("config/db_connection.php");
    
    ?>
    <?php 
      $targetpage="http://bdabashon.com/bidding/bid/index.php?pagex=update_profile&&root=member";
    
            $id=$_SESSION['user']['USER_REGISTRATION_NO'];
            $sql="SELECT * FROM `user_registrations` WHERE USER_REGISTRATION_NO=$id";
            $result = mysqli_fetch_array(mysqli_query($con,$sql));
          
  ?>
  <input type = "hidden" id = "user_no" name = "user_no" value = "<?php echo $id ;?>" >
  <div class="row">
      <div class="col-md-3 col-lg-3 col-xl-3"></div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                           
                            <div class="card-shadow-primary profile-responsive card-border mb-3 card">
                                <div class="dropdown-menu-header">
                                    <div class="dropdown-menu-header-inner bg-info">
                                        <div class="menu-header-image " style="background-image: url('https://images.unsplash.com/photo-1516528387618-afa90b13e000?ixlib=rb-1.2.1&auto=format&fit=crop&w=428&h=214&q=60')"></div>
                                        <div class="menu-header-content btn-pane-right">
                                            <div class="avatar-icon-wrapper mr-2 avatar-icon-xl">
                                                <div class="avatar-icon rounded">
                                                    <img src="member/upload/<?=$result['USER_IMAGE']?>" onerror="this.src='member/upload/blank.jpg'" alt="Avatar 5"></div>
                                            </div>
                                            <div><h5 class="menu-header-title"><?= $result['USER_NAME']?></h5></div>
                                            <div class="menu-header-btn-pane">
                                                <div>
                                                    <div role="group" class="btn-group text-center">
                                                        <div class="nav">
                                                            <a href="#tab-example-161" data-toggle="tab" class="active btn btn-success mr-1">Information</a>
                                                            <a href="#tab-example-162" data-toggle="tab" class="btn btn-focus ">Balance</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tab-example-161">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="widget-content">
                                                    <div class="text">
                                                        
                                                        <h6>Email:   <span ><?= $result['USER_EMAIL']?></span></h6>
                                                        <h6>Phone:   <span><?= $result['USER_PHONE_NUMBER']?></span></h6>
                                                        <h6>Dath Of Birth:  <span><?= $result['USER_DOB']?></span></h6>
                                                        <h6>Profession:   <span><?= $result['USER_PROFESSION']?></span></h6>
                                                        <h5>Reference Code:
                                                        <div id = "show_things" style = "display:none;">
                                                                        
                                                        </div>
                                                        </h5>
                                                        
                                                        <h5>Referral Link:  <input type="text" value="" id="myInput" style="display:none"  readonly></h5>
                                                     </div>
                                                </div>
                                            </li>
                                            <li class="p-0 list-group-item">
                                                <div class="grid-menu grid-menu-2col">
                                                    <div class="no-gutters row">
                                                        <div class="col-sm-6">
                                                            <a href="<?=$targetpage.'&&edit='.$result['USER_REGISTRATION_NO']?>" class="btn-icon-vertical btn-square btn-transition btn btn-outline-link ">
                                                            <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link "><i class="metismenu-icon pe-7s-id btn-icon-wrapper btn-icon-lg mb-3"> </i>
                                                            Edit Profile
                                                            </button>
                                                            </a>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link" type="button" id = "generate" style = "display:none;" ><i class="metismenu-icon pe-7s-plugin btn-icon-wrapper btn-icon-lg mb-3"> </i>Get Ref Code</button>
                                                            <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link" type="button" id = "copy_code" style = "display:none;" ><i class="metismenu-icon pe-7s-plugin btn-icon-wrapper btn-icon-lg mb-3"> </i>Get Link</button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                   
                                    <?php
                                        $query="SELECT TRANSACTION_AMOUNT FROM user_master_accounts WHERE `USER_REGISTRATION_NO` = '$id' ";
                                         $resultbid = mysqli_fetch_assoc(mysqli_query($con,$query));
                                         
                                        $another = "SELECT `TRANSACTION_AMOUNT` FROM `bid_bidding_user_accounts` WHERE `USER_REGISTRATION_NO` = '$id' ORDER BY `BIDDING_USER_ACCOUNT_NO` DESC LIMIT 1 ";
                                        $bid_balance = mysqli_fetch_assoc(mysqli_query($con,$another));
                                   ?>
                                   <?php
                                        // $sql="SELECT sum(TRANSACTION_AMOUNT*TRANSACTION_TYPE_NO)as totalshare FROM share_user_account WHERE `USER_REGISTRATION_NO` = '$id' ";
                                        $anotherSQL = "SELECT `TRANSACTION_AMOUNT` FROM `share_user_account` WHERE `USER_REGISTRATION_NO` = '$id' ORDER BY `SHARE_USER_ACCOUNT_NO` DESC LIMIT 1 ";
                                        //$resultshare = mysqli_fetch_array(mysqli_query($con,$sql));
                                        $share_balance = mysqli_fetch_assoc(mysqli_query($con,$anotherSQL));
                                        
                                        
                                        
                                    ?>
                                    
                                    
                                    <div class="tab-pane" id="tab-example-162">
                                        <div class="p-3">
                                            <div class="row">
                                                
                                                <div class="col-md-5">
                                                   <p  style="color:red;">Current Balance:</p>
                                                   
                                                </div>
                                                <div class="col-md-7">
                                                    <p style="color:red;"> <?php if($resultbid['TRANSACTION_AMOUNT']==""){echo 0;} else{ echo $resultbid['TRANSACTION_AMOUNT'];}?></p>
                                                    
                                                </div>
                                                
                                                <!--<div class="row">-->
                                                    <div class="col-md-5">
                                                    <p> Bidding Balance:</p>
                                                    
                                                </div>
                                                <div class="col-md-4">
                                                    
                                                    <p><?php if($bid_balance['TRANSACTION_AMOUNT']==""){echo 0;} else{ echo $bid_balance['TRANSACTION_AMOUNT'];}?></p>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="?pagex=user_buy_bidding_balance&&root=member&&bidbalance=<?=$bid_balance['TRANSACTION_AMOUNT']?>&&main=<?=$resultbid['TRANSACTION_AMOUNT']?>" class="btn btn-success "style="color:white;">Buy Balance</a>
                                                    
                                                </div>
                                                
                                                <div class="col-md-5">
                                                    <p> Share Balance:</p>
                                                </div>
                                                <div class="col-md-4">
                                                     <p><?php if($share_balance['TRANSACTION_AMOUNT']==""){echo 0;} else{ echo $share_balance['TRANSACTION_AMOUNT'];}?></p>
                                                    
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="?pagex=user_buy_share_balance&&root=member&&sharebalance=<?=$share_balance['TRANSACTION_AMOUNT']?>&&main=<?=$resultbid['TRANSACTION_AMOUNT']?>" class="btn btn-success "style="color:white;margin-top:5px;">Buy Balance</a>
                                                </div>
                                                <!--</div>-->
                                                
                                                
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        
                        <div class="col-md-3 col-lg-3 col-xl-3"></div>
                    </div>
                    <input type = "hidden" value = '' id = "copied" >

                    
         
                    
                    
                    
                    
                    
                    
                    
<script>



    function getReferelCode( code , user_no)
    {
        $.ajax( { 
         
             url: "ajax/generate_code.php",
             method : "post",
             data: ({ "code": code , "user_no": user_no }),
             dataType: "html",
             success : function ( Result )
             {
                //  console.log( Result ) ;
                 $("#show_things").show() ;
                 $("#copy_code").show() ;
                 $("#show_things").html( Result ) ;
             }
        }) ;
    }
    
    function checkReferelCode( user_no , checkIfExit )
    {
        $.ajax( {
         
         url: "ajax/generate_code.php",
             method : "post",
             data: ({ "checkIfExit": checkIfExit , "user_no": user_no }),
             dataType: "html",
             success : function ( Result )
             {
                 if( Result == 1 )
                 {
                    $("#generate").show() ;
                    
                 }
                 else
                 {
                     $("#generate").hide() ;
                     $("#show_things").show() ;
                     $("#copy_code").show() ;
                     $("#show_things").html( Result ) ;
                 }
             }
            
        }) ;
    }

    $( document ).ready( function ( ) { 
        
        $("#generate").on( "click" , function( ) { 
            
            var user_no = $("#user_no").val() ;
            $("#generate").hide() ;
            getReferelCode( "code", user_no ) ;
            
        }) ;
        
        $("#copy_code").on( "click" , function( ) { 
  
             
            var referel_code = $("#copy_it").val() ;
            document.getElementById('myInput').value="http://bdabashon.com/bidding/pages_register.php?referel_code=" + referel_code ;
             $("#myInput").show();
              var copyText = document.getElementById("myInput");
              copyText.select();
              copyText.setSelectionRange(0, 99999)
              document.execCommand("copy"); 
              
                // alert("Reference link Copied");
                
                
           
        }) ;
        
        checkReferelCode( $("#user_no").val() , "checkIfExit" ) ;
        
    }); 

</script>
                       
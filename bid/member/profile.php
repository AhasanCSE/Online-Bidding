<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
    body{
  margin-top: auto;
    background-color: #f1f1f1;
  }
  .border{
    border-bottom:1px solid #F1F1F1;
    margin-bottom:10px;
  }
  .main-secction{
    box-shadow: 10px 10px 10px;
  }
  .image-section{
    padding: 0px;
  }
  .image-section img{
    width: 100%;
    height:250px;
    position: relative;
  }
  .user-image{
    position: absolute;
    margin-top:-50px;
  }
  .user-left-part{
    margin: 0px;
  }
  .user-image img{
    width:100px;
    height:100px;
  }
  
  .user-profil-part{
    padding-bottom:30px;
    background-color:#FAFAFA;
  }
  .follow{    
    margin-top:70px;   
  }
  .user-detail-row{
    margin:0px; 
  }
  .user-detail-section2 p{
    font-size:12px;
    padding: 0px;
    margin: 0px;
  }
  .user-detail-section2{
    margin-top:10px;
  }
  .user-detail-section2 span{
    color:#7CBBC3;
    font-size: 20px;
  }
  .user-detail-section2 small{
    font-size:12px;
    color:#D3A86A;
  }
  .profile-right-section{
    padding: 20px 0px 10px 15px;
    background-color: #FFFFFF;  
  }
  .profile-right-section-row{
    margin: 0px;
  }
  .profile-header-section1 h1{
    font-size: 25px;
    margin: 0px;
  }
  .profile-header-section1 h5{
    color: #0062cc;
  }
  .req-btn{
    height:30px;
    font-size:12px;
  }
  .profile-tag{
    padding: 10px;
    border:1px solid #F6F6F6;
  }
  .profile-tag p{
    font-size: 12px;
    color:black;
  }
  .profile-tag i{
    color:#ADADAD;
    font-size: 20px;
  }
  .image-right-part{
    background-color: #FCFCFC;
    margin: 0px;
    padding: 5px;
  }
  .img-main-rightPart{
    background-color: #FCFCFC;
    margin-top: auto;
  }
  .image-right-detail{
    padding: 0px;
  }
  .image-right-detail p{
    font-size: 12px;
  }
  .image-right-detail a:hover{
    text-decoration: none;
  }
  .image-right img{
    width: 100%;
  }
  .image-right-detail-section2{
    margin: 0px;
  }
  .image-right-detail-section2 p{
    color:#38ACDF;
    margin:0px;
  }
  .image-right-detail-section2 span{
    color:#7F7F7F;
  }

  .nav-link{
    font-size: 1.2em;    
  }
  
</style>
<body>
    <?php
    include("config/db_connection.php");
    
    ?>
    <?php session_start();
      $targetpage="http://bdabashon.com/bidding/bid/index.php?pagex=update_profile&&root=member"
    ?>
    
    <div class="container main-secction">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 image-section">
                <img src="https://newsfeed.org/wp-content/uploads/Facebook-enhanced-bidding.jpg">
            </div>
            <?php
            $id=$_SESSION['user']['USER_REGISTRATION_NO'];
                                        $sql="SELECT * FROM `user_registrations` WHERE USER_REGISTRATION_NO=$id";
                                         $result = mysqli_fetch_array(mysqli_query($con,$sql));
                                         
                                     
            ?>
            <input type = "hidden" id = "user_no" name = "user_no" value = "<?php echo $id ;?>" >
            <div class="row user-left-part">
                <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                    <div class="row ">
                        <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                            <img src="member/upload/<?=$result['USER_IMAGE']?>" onerror="this.src='member/upload/blank.jpg'" altr="no image"  class="rounded-circle">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                            
                        </div>
                        
                       
                    </div>
                </div>
                
                <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section">
                    <div class="row profile-right-section-row">
                        <div class="col-md-12 profile-header">
                            <div class="row">
                                <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                    <h1><?= $result['USER_NAME']?></h1>
                                    <!--<h5>Developer</h5>-->
                                    <h5> </h5> 
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 profile-header-section1 text-right pull-rigth">
                                    
                                    <a href="<?=$targetpage.'&&edit='.$result['USER_REGISTRATION_NO']?>" class="btn btn-primary btn-block">Edit Profile</a>
                                </div>  
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                        <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                  <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fas fa-user-circle"></i> Profile View</a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" href="#balance" role="tab" data-toggle="tab"><i class="fas fa-info-circle"></i> Balance Information</a>
                                                </li>                                                
                                              </ul>
                                              
                                              <!-- Tab panes -->
                                              <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade show active" id="profile">
                                                    
                                                    
                                                    
                                                        <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Referral Code: </label>
                                                                </div>
                                                                
                                                                
                                                                <div class="col-md-4">
                                                                    <button type="button" id = "generate" style = "display:none;" class="btn btn-success">Generate Code</button>
                                                                    <div id = "show_things" style = "display:none;">
                                                                        
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                                <div class="col-md-4">
                                                                    <button onclick = "myFunction()" id = "copy_code" class="btn btn-success">Copy Code</button>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Dath Of Birth:</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?= $result['USER_DOB']?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Email:</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?= $result['USER_EMAIL']?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Phone:</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?= $result['USER_PHONE_NUMBER']?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Profesion</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?= $result['USER_PROFESSION']?></p>
                                                                </div>
                                                            </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="balance">
                                                        <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Experience</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>Expert</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Current Balance</label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p>10$</p>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <button class="btn btn-success">Buy Coin </button>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Total Bid</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>230</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Total Win</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>20</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Availability</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>All time</p>
                                                                </div>
                                                            </div>
                                                            
                                                </div>
                                                
                                              </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
     </body>
<script>

function myFunction() {
    var referel_code = $("#copy_it").val() ;
    var copyText = "http://bdabashon.com/bidding/pages_register.php?referel_code=" + referel_code ;
//   alert( copyText ) ;
  
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  alert( copyText ) ;
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}

    function getReferelCode( code , user_no)
    {
        $.ajax( { 
         
             url: "ajax/generate_code.php",
             method : "post",
             data: ({ "code": code , "user_no": user_no }),
             dataType: "html",
             success : function ( Result )
             {
                 console.log( Result ) ;
                 $("#show_things").show() ;
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
                     $("#show_things").html( Result ) ;
                 }
             }
            
        }) ;
    }

    function copyFunction( )
    {
        var referel_code = $("#copy_it").val() ;
        var copyText = "http://bdabashon.com/bidding/pages_register.php?referel_code=" + referel_code ;
        // alert( copyText ) ;
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
         alert("Copied the text: " + copyText.value);
    }

    $( document ).ready( function ( ) { 
        
        $("#generate").on( "click" , function( ) { 
            
            var user_no = $("#user_no").val() ;
            $("#generate").hide() ;
            getReferelCode( "code", user_no ) ;
            
        }) ;
        
        $("#copy_code").on( "click" , function( ) { 
            // copyFunction( ) ;
        }) ;
        
        checkReferelCode( $("#user_no").val() , "checkIfExit" ) ;
        
    }); 

</script>
   
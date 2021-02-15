<link href="bid/main.cba69814a806ecc7945a.css" rel="stylesheet">
<link rel="stylesheet" href="sweetalert2.min.css">
<?php
include("bid/config/db_connection.php");
?>

<?php  

    if(isset($_POST['submit']))
    {
          $email=$_GET['email'];
          
          $a= trim ( $_POST['name'] );
          
          
          $check=0;
                 $SQL = "SELECT REGISTRATION_CODE FROM user_registrations WHERE USER_EMAIL='$email'";
                 
                 
                //  $COUNT = mysqli_query($con,$SQL);
                 $res= mysqli_num_rows ( mysqli_query($con,$SQL) );
                 
                 
                  if( $res > 0 )
                  {
                    $check=1;
                    $sql = "UPDATE user_registrations SET STATUS = '1'  WHERE USER_EMAIL='$email' ";
                    
                    $result = mysqli_query($con,$sql);
                    
                    
                      
                  }
                  else
                  {
                       $check=2;
                      
                  }
                  
        }   
     ?>
     
     
     
     
<div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 no-gutters row">
                  <div class="d-lg-flex d-xs-none col-lg-6">
                        <div class="slider-light">
                            <div class="slick-slider slick-initialized">
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('bid/assets/images/originals/citynights.jpg');"></div>
                                        <div class="slider-content"><h3>Scalable, Modular, Consistent</h3>
                                            <p>Easily exclude the components you don't require. Lightweight, consistent Bootstrap based styles across all elements and components</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    
                    
            <div class="h-100 d-md-flex d-sm-block bg-white justify-content-center align-items-center col-md-6 col-lg-6">
                        <div class="mx-auto app-login-box col-sm-12 col-md-6 col-lg-6">
                            
                            <h4>
                                <div>Welcome,</div>
                                <span>It only takes a <span class="text-success">few seconds</span> to verify your account</span></h4>
                            <div>
                                <form action="" method="post" id="formidreg">
                                     <p>Please Give Your Verification Code.</p>
                                         <p style="color:green;"><?php
                                        if($check==1){
                                            ?>
                                            <div >
                                                <input type="hidden" id="result" value="<?=$check?>" >
                                            </div>
                                            <?php
                                            // echo "Your Email Verification is Successfully Completed";
                                            
                                            
                                        } 
                                        
                                        else if($check==2) {
                                            ?>
                                             <div >
                                                <input type="hidden" id="result" value="<?=$check?>" >
                                            </div><?php
                                            // echo "Invalid Code";
                                        }
                                        ?></p>
                                        <label for="message" id="mgs" class="col-form-label text-success pull-right" style="color:green;"></label>
                                    <div class="form-row">
                                         <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="VerificationCodeId" ><span class="text-danger">*</span>Verification Code </label><lable id="VerificationCodeIdErrMgs" class="pull-right"></lable>
                                            <input name="name" id="VerificationCodeId" placeholder="Verification Code..." type="text"  class="form-control" value="<?=$_GET['code']?>" readonly ></div>
                                        </div>
                                    </div>
                                    
                                    
                                        <div class="ml-auto">
                                            <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg" type ="submit" name="submit" id="btn">Submit</button>
                                        </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                     
                   
                </div>
            </div>
        </div>
</div>
<script type="text/javascript" src="bid/assets/scripts/main.cba69814a806ecc7945a.js"></script>


<script src="admin/admin_log/include/jquery-3.4.1.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    function reload( )
    {
        window.location.href='http://bdabashon.com/bidding/';
    }

    $(document).ready(function(){
        var res = $("#result").val() ;
        // console.log( res );
        if( res == 1 )
        {
            Swal.fire({
              position: 'top-middle',
              icon: 'success',
              title: 'Your Email Verification is Successfully Completed',
              showConfirmButton: false,
              timer: 1500
            })
            setTimeout( reload, 1500 ) ;
            
        }else if( res == 2 )
        {
           Swal.fire({
              position: 'top-middle',
              icon: 'error',
              title: 'Please Give Valid Code',
              showConfirmButton: false,
              timer: 1500
            }) 
        }
    });
</script>

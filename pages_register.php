<?php
 if(isset($_GET['referel_code'])){
        $ref_code = $_GET['referel_code'];
        
    }
    // if(!isset($_GET['referel_code'])){
    //     $ref_code = 0;
    // }
?>

<link href="bid/main.cba69814a806ecc7945a.css" rel="stylesheet">
<link rel="stylesheet" href="sweetalert2.min.css">
<div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 no-gutters row">
                    <div class="h-100 d-md-flex d-sm-block bg-white justify-content-center align-items-center col-md-6 col-lg-6">
                        <div class="mx-auto app-login-box col-sm-12 col-md-12 col-lg-12">
                            <!--<div class="app-logo"></div>-->
                            <h4>
                                <div>Welcome,</div>
                                <span>It only takes a <span class="text-success">few seconds</span> to create your account</span></h4>
                            <div>
                                <form action="" method="post" id="formidreg">
                                     <label for="success" id="successmgsReg" class="col-form-label text-success pull-left" style="color:green;"></label>
                                    
                                    <div class="form-row">
                                         <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="referenceCodeId" id="">Reference Code</label><lable id="referenceCodeIdErrMgs" class="pull-right"></lable>
                                            <input name="text" id="referenceCodeId" placeholder="Reference Code Here.." type="text" class="form-control"  value="<?php echo $ref_code ;?>" <?php if($ref_code){echo "readonly";}?> >    </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="nameId" id=""><span class="text-danger">*</span>Name</label><lable id="nameIdErrMgs" class="pull-right"></lable>
                                            <input name="text" id="nameId" placeholder="Name here..." type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="phoneId" id=""><span class="text-danger">*</span>Phone</label><lable id="phoneIdErrMgs" class="pull-right"></lable>
                                            <input name="text" id="phoneId" placeholder="phone here..." type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="dateOfBirthId" id=""><span class="text-danger">*</span>Date Of Birth</label><lable id="dateOfBirthIdErrMgs" class="pull-right"></lable>
                                            <input name="text" id="dateOfBirthId"  type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="emailId" ><span class="text-danger">*</span> Email</label><lable id="emailIdErrMgs" class="pull-right"></lable>
                                            <input name="email" id="emailId" placeholder="Email here..." type="email" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="userpassId" ><span class="text-danger">*</span> Password</label><lable id="userpassIdErrMgs" class="pull-right"></lable>
                                            <input name="password" id="userpassId" placeholder="Password here..." type="password" class="form-control"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="userpassId1" id="" ><span class="text-danger">*</span>Confirmed Password</label><lable id="userpassIdErrMgs1" class="pull-right"></lable>
                                            <input name="passwordrep" id="userpassId1" placeholder="Confirmed Password here..." type="password" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="mt-3 position-relative form-check">
                                        <!--<input name="check" id="exampleCheck" type="checkbox" class="form-check-input"><label for="exampleCheck" class="form-check-label">Accept our <a href="javascript:void(0);">Terms-->
                                        <!--and Conditions</a>.</label>-->
                                        
                                        </div>
                                    <div class="mt-4 d-flex align-items-center"><h5 class="mb-0">Already have an account? <a href="http://bdabashon.com/bidding/" class="text-primary">Sign in</a></h5>
                                        <div class="ml-auto">
                                            <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg" type ="button" id="submitbtn">Sign Up</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--<div class="d-lg-flex d-xs-none col-lg-6">-->
                    <!--    <div class="slider-light">-->
                    <!--        <div class="slick-slider slick-initialized">-->
                    <!--            <div>-->
                    <!--                <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">-->
                    <!--                    <div class="slide-img-bg" style="background-image: url('bid/assets/images/originals/citynights.jpg');"></div>-->
                    <!--                    <div class="slider-content"><h3>Scalable, Modular, Consistent</h3>-->
                    <!--                        <p>Easily exclude the components you don't require. Lightweight, consistent Bootstrap based styles across all elements and components</p></div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="d-none d-lg-block col-lg-6">
                        <div class="slider-light">
                            <div class="slick-slider">
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-plum-plate" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('bid/assets/images/originals/city.jpg');"></div>
                                        <div class="slider-content"><h3>Perfect Balance</h3>
                                            <p>ArchitectUI is like a dream. Some think it's too good to be true! Extensive collection of unified React Boostrap Components and Elements.</p></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('bid/assets/images/originals/citynights.jpg');"></div>
                                        <div class="slider-content"><h3>Scalable, Modular, Consistent</h3>
                                            <p>Easily exclude the components you don't require. Lightweight, consistent Bootstrap based styles across all elements and components</p></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-sunny-morning" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('bid/assets/images/originals/citydark.jpg');"></div>
                                        <div class="slider-content"><h3>Complex, but lightweight</h3>
                                            <p>We've included a lot of components that cover almost all use cases for any type of application.</p></div>
                                    </div>
                                </div>
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

 function saveAll( saveall, referenceCodeId,nameId,phoneId,dateOfBirthId,emailId,passwordId )
 {
     $.ajax( { 
         
         url: "bid/ajax/insertReg.php" ,
         method : "post" ,
         data : ({ "saveall": saveall, "referenceCode":referenceCodeId,"name":nameId,"phone":phoneId,"dateOfBirth":dateOfBirthId,"email":emailId,"password":passwordId }),
         dataType: "html",
         success : function ( Result )
         {
            //  console.log( Result ) ;
             if ( Result == 1 )
             {
                 

                Swal.fire({
                  position: 'top-middle',
                  icon: 'success',
                  title: 'Your registration is successfull,please verify your email address',
                  showConfirmButton: false,
                  timer: 1500
                })
                //  $("#successmgsReg").text( "Your registration is successfull.We sent a mail in your email for verify your email address.please verify your email address"  ) ;
             }
             else
             {
                 Swal.fire({
                  position: 'top-middle',
                  icon: 'error',
                  title: 'Error Registration',
                  showConfirmButton: false,
                  timer: 1500
                })
                 
                //  $("#successmgsReg").text( "error") ;
             }
         }
         
     }) ;
 }

$(document).ready(function(){
    function isEmail(email) {
          var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          return regex.test(email);
        }
			        
			        $("#emailId").on("change",function(){
			            var email = $(this).val().trim();
			            var email_verify = isEmail(email);
			            if(email_verify==false){
			                    $("#emailId").addClass("is-invalid");
                                $("#emailIdErrMgs").text("Invalid Email!");
                                $("#emailIdErrMgs").show();
                                $("#emailId").focus();
			            }else{
			                $("#emailId").removeClass("is-invalid");
			                $("#emailIdErrMgs").hide();
			            }
			        
			            });
    $("#userpassId1").on("change",function(){
            var USER_CONF_PASSWORD = $(this).val();
            var USER_PASSWORD = $("#userpassId").val();
            if( USER_PASSWORD != USER_CONF_PASSWORD){
                $("#userpassId1").addClass("is-invalid");
                $("#userpassIdErrMgs1").text("Password not Match!");
                $("#userpassIdErrMgs1").show();
                $("#userpassId1").focus();
            }else{
                $("#userpassId1").removeClass("is-invalid");
                $("#userpassIdErrMgs1").hide();
           
            }
        });
    $("#submitbtn").on("click",function(){
         var referenceCodeId = $("#referenceCodeId").val().trim() ;
        //  var referenceNameId =$("#referenceNameId"). val().trim();
            var nameId = $("#nameId").val().trim();
            var phoneId = $("#phoneId").val().trim();
            var dateOfBirthId = $("#dateOfBirthId").val();
            
            var emailId = $("#emailId").val().trim();
            var passwordId = $("#userpassId").val().trim();
            // var confPasswordId = $("#userpassId1").val().trim();
            // console.log( nameId ) ;
            // console.log( phoneId) ;
            // console.log(dateOfBirthId ) ;
            // console.log(emailId ) ;
            // console.log(passwordId ) ;
            // console.log( confPasswordId ) ;
            if(nameId == ""){
                $("#nameId").addClass("is-invalid");
                $("#nameIdErrMgs").text("Required!");
                $("#nameIdErrMgs").show();
                $("#nameId").focus();
                return false;
            }else if($("#nameId").hasClass("is-invalid")){
                return false;
            }else{
                $("#nameId").removeClass("is-invalid");
                $("#nameIdErrMgs").hide();
            }
            if(phoneId == ""){
                $("#phoneId").addClass("is-invalid");
                $("#phoneIdErrMgs").text("Required!");
                $("#phoneIdErrMgs").show();
                $("#phoneId").focus();
                return false;
            }else if($("#phoneId").hasClass("is-invalid")){
                return false;
            }else{
                $("#phoneId").removeClass("is-invalid");
                $("#phoneIdErrMgs").hide();
            }
            if(emailId == ""){
                $("#emailId").addClass("is-invalid");
                $("#emailIdErrMgs").text("Required!");
                $("#emailIdErrMgs").show();
                $("#emailId").focus();
                return false;
            }else if($("#emailId").hasClass("is-invalid")){
                return false;
            }else{
                $("#emailId").removeClass("is-invalid");
                $("#emailIdErrMgs").hide();
            }
            if(passwordId == ""){
                $("#userpassId").addClass("is-invalid");
                $("#userpassIdErrMgs").text("Required!");
                $("#userpassIdErrMgs").show();
                $("#userpassId").focus();
                return false;
            }else if($("#userpassId").hasClass("is-invalid")){
                return false;
            }else{
                 $("#userpassId").removeClass("is-invalid");
                $("#userpassIdErrMgs").hide();
            }
            
            saveAll( "saveall", referenceCodeId,nameId,phoneId,dateOfBirthId,emailId,passwordId  ) ;
            $("#formidreg").each(function(){
              this.reset(); // clear input filed after submission
     });
            // console.log( "here" ) ;
    }) ;
    
    
}) ;


    // $(document).ready(function(){
    //     alert("register");
        
         
			            
			 //            function isPassword(password) {
    //       var regex = /^(?=.*[a-z])[A-Za-z0-9\d=!\-@._*]+$/
    //       return regex.test(password);
    //     }
    //     $("#userpassId").on("change",function(){
    //         var USER_PASSWORD = $(this).val();
    //         var password = isPassword(USER_PASSWORD);
    //         if(password == false){
    //             $("#userpassId").addClass("is-invalid");
    //             $("#userpassIdErrMgs").text("Invalid password!");
    //             $("#userpassIdErrMgs").show();
    //             $("#userpassId").focus();
    //         }else{
    //             $("#userpassId").removeClass("is-invalid");
    //             $("#userpassIdErrMgs").hide();
                
            
           
    //         }
    //     });
        // $("#userpassId1").on("change",function(){
        //     var USER_CONF_PASSWORD = $(this).val();
        //     var USER_PASSWORD = $("#userpassId").val();
        //     if( USER_PASSWORD != USER_CONF_PASSWORD){
        //         $("#userpassId1").addClass("is-invalid");
        //         $("#userpassIdErrMgs1").text("Password not Match!");
        //         $("#userpassIdErrMgs1").show();
        //         $("#userpassId1").focus();
        //     }else{
        //         $("#userpassId1").removeClass("is-invalid");
        //         $("#userpassIdErrMgs1").hide();
           
        //     }
        // });
    //      $("#btn").on("click",function(){
    //         var is_invalid = 0;
    //         $(".is-invalid").each(function(){
    //             is_invalid = 1;
    //         });
            
            
    //         var referenceCodeId = $("#referenceCodeId").val().trim();
    //         // var referenceNameId =$("#referenceNameId"). val().trim();
    //         var nameId = $("#nameId").val().trim();
    //         var phoneId = $("#phoneId").val().trim();
    //         var dateOfBirthId = $("#dateOfBirthId").val();
            
    //         var emailId = $("#emailId").val().trim();
    //         var passwordId = $("#userpassId").val().trim();
    //         var confPasswordId = $("#userpassId1").val().trim();
            
            
    //         if(referenceCodeId == ""){
    //             $("#referenceCodeId").addClass("is-invalid");
    //             $("#referenceCodeIdErrMgs").text("Required!");
    //             $("#referenceCodeIdErrMgs").show();
    //             $("#referenceCodeId").focus();
    //             return false;
    //         }else if($("#referenceCodeId").hasClass("is-invalid")){
    //             return false;
    //         }else{
    //             $("#referenceCodeId").removeClass("is-invalid");
    //             $("#referenceCodeIdErrMgs").hide();
    //         }
    //         // if(referenceNameId == ""){
    //         //     $("#referenceNameId").addClass("is-invalid");
    //         //     $("#referenceNameIdErrMgs").text("Required!");
    //         //     $("#referenceNameIdErrMgs").show();
    //         //     $("#referenceNameId").focus();
    //         //     return false;
    //         // }else if($("#referenceNameId").hasClass("is-invalid")){
    //         //     return false;
    //         // }else{
    //         //     $("#referenceNameId").removeClass("is-invalid");
    //         //     $("#referenceNameIdErrMgs").hide();
    //         // }
            
            // if(nameId == ""){
            //     $("#nameId").addClass("is-invalid");
            //     $("#nameIdErrMgs").text("Required!");
            //     $("#nameIdErrMgs").show();
            //     $("#nameId").focus();
            //     return false;
            // }else if($("#nameId").hasClass("is-invalid")){
            //     return false;
            // }else{
            //     $("#nameId").removeClass("is-invalid");
            //     $("#nameIdErrMgs").hide();
            // }
            // if(phoneId == ""){
            //     $("#phoneId").addClass("is-invalid");
            //     $("#phoneIdErrMgs").text("Required!");
            //     $("#phoneIdErrMgs").show();
            //     $("#phoneId").focus();
            //     return false;
            // }else if($("#phoneId").hasClass("is-invalid")){
            //     return false;
            // }else{
            //     $("#phoneId").removeClass("is-invalid");
            //     $("#phoneIdErrMgs").hide();
            // }
            // if(emailId == ""){
            //     $("#emailId").addClass("is-invalid");
            //     $("#emailIdErrMgs").text("Required!");
            //     $("#emailIdErrMgs").show();
            //     $("#emailId").focus();
            //     return false;
            // }else if($("#emailId").hasClass("is-invalid")){
            //     return false;
            // }else{
            //     $("#emailId").removeClass("is-invalid");
            //     $("#emailIdErrMgs").hide();
            // }
            // if(passwordId == ""){
            //     $("#userpassId").addClass("is-invalid");
            //     $("#userpassIdErrMgs").text("Required!");
            //     $("#userpassIdErrMgs").show();
            //     $("#userpassId").focus();
            //     return false;
            // }else if($("#userpassId").hasClass("is-invalid")){
            //     return false;
            // }else{
            //      $("#userpassId").removeClass("is-invalid");
            //     $("#userpassIdErrMgs").hide();
            // }
            // if(confPasswordId == ""){
            //     $("#userpassId1").addClass("is-invalid");
            //     $("#userpassIdErrMgs1").text("Required!");
            //     $("#userpassIdErrMgs1").show();
            //     $("#userpassId1").focus();
            //     return false;
            // }else if($("#userpassId1").hasClass("is-invalid")){
            //     return false;
            // }else{
            //      $("#userpassId1").removeClass("is-invalid");
            //     $("#userpassIdErrMgs1").hide();
            // }
            
    //         console.log("here") ;
        
    //         // saveAll( referenceCodeId,nameId,phoneId,dateOfBirthId,emailId,passwordId ) ;
    //         // $("#formidreg").each(function(){
    //         //      this.reset(); // clear input filed after submission
    //         // });
           
    
    //     });

    // });
			            
</script>

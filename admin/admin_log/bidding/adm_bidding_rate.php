<?php include('config/db_connection.php'); $msg = ""?>
<link rel="stylesheet" href="sweetalert2.min.css">
<div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
        <!--    <div class="h-100">-->
        <!--        <div class="h-100 no-gutters row">-->
                    <div class="h-100 d-md-flex d-sm-block bg-white justify-content-center align-items-center col-md-12 col-lg-12">
                        <div class="mx-auto app-login-box col-sm-12 col-md-12 col-lg-12">
                            <!--<div class="app-logo"></div>-->
                            <h1 style = "color:green;" id = "success"></h1>
                            <h4>
                                <div>Set</div>
                                <span>Bidding <span class="text-success">Rate</h4>
                            <div>
           
                     
                 
                                <form action="" method="post" id="formidreg">
                                     <label for="success" id="successmgsReg" class="col-form-label text-success pull-left" style="color:green;"></label>
                                     
                                    <div class="form-row">
                                       
                                       
                                <div class="col-md-6">
 
                                            <div class="position-relative form-group col-md-12"><label for="nameId" id=""><span class="text-danger"></span>Bidding Coin Name</label><lable id="nameIdErrMgs" class="pull-right"></lable>
                                            <input name="coin_name" id="coin_name"  type="text" class="form-control custom"  value="">
                                            </div>
                                            
                                 </div> 
                                  <div class="col-md-6">
                                            
                                            <!--<div class="position-relative form-group col-md-12"><label for="dateOfBirthId" id=""><span class="text-danger"></span>Date</label><lable id="dateOfBirthIdErrMgs" class="pull-right"></lable>-->
                                            <!--<input name="min_range" id="min_range"  type="date" class="form-control" value="">-->
                                            <!--</div>-->
                                            
                                            <div class="position-relative form-group col-md-12"><label for="dateOfBirthId" id=""><span class="text-danger"></span>Rate</label><lable id="dateOfBirthIdErrMgs" class="pull-right"></lable>
                                            <input name="rate" id="rate"  type="number" class="form-control custom" value="">
                                            </div>
                                 </div>            

                                   
                                    
                            
                                    
                                      </div>
                                      <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg pull-right" style="margin:20px;" name="submit" type = "button" id="submitbtn">Submit</button>
                                        
                                </form>
                             </div>
                        </div>
                    </div>
                    
                    
            </div>
            </div>
                                
                                

        
        
</div>

<script>

$(document).ready(function(){
    
    function clear()
    {
        $(".custom").val("") ;
    }
    
    function setRate(name,rate)
    {
        $.ajax({
            url: "ajax/savecurrencySet.php",
            method: "post",
            data:({ "setRate":"setRate","name":name,"rate":rate }),
            dataType: "html",
            success: function(result)
            {
                clear() ;
                alert("success");
            }
    
        })
        
        
    }
    
    $("#submitbtn").on("click", function(){
        var name= $("#coin_name").val();
          var rate= $("#rate").val();
          console.log("here") ;
        setRate(name,rate);
    })
    
    
});
    
</script>


		  

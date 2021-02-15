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
                                <div>Transfer</div>
                                <span>Money To The <span class="text-success">User</h4>
                            <div>
           
                     
<?php 
if(isset($_POST['submit'])){
  
    $id=$_POST['user_id'];
    $amount = $_POST['balance'] ;
    $cur = date( "Y-m-d h:i:s" ) ;
    $result = "" ;
    $ref_no=$_SESSION['user']['USER_NO'];
    $ref_name=$_SESSION['user']['USER_NAME'];
   
  
      
        $query = "INSERT INTO user_master_accounts SET `TRANSACTION_AMOUNT` = '$amount' ,TRANSACTION_TYPE_NO='1',TRANSACTION_ON='$cur', `USER_REGISTRATION_NO` = '$id',
        REF_ACCOUNT_NO='$ref_no',REF_ACCOUNT_TITLE='$ref_name'" ;
        $result = mysqli_query( $con , $query ) ;
    
    $msg = $result ? "yes":"no" ;
}
?>                     
                     
                                <form action="" method="post" id="formidreg">
                                     <label for="success" id="successmgsReg" class="col-form-label text-success pull-left" style="color:green;"></label>
                                     
                                    <div class="form-row">
                                       
                                       
                                <div class="col-md-6">
                                             
                                            <div class="position-relative form-group col-md-12">
                                                <label for="referenceCodeId" ><span class="text-danger"></span>User ID</label><lable id="referenceCodeIdErrMgs" class="pull-right"></lable>
                                            <input name="user_id" id="user_id"  type="text"  class="form-control" value="" >
                            
                                            </div>
                                            
                                            <div class="position-relative form-group col-md-12"><label for="nameId" id=""><span class="text-danger"></span>User Name</label><lable id="nameIdErrMgs" class="pull-right"></lable>
                                            <input name="user_name" id="user_name"  type="text" class="form-control"  value="<?=$row['BIDDING_DESCRIPTION']?>">
                                            </div>
                                            
                                 </div> 
                                  <div class="col-md-6">
                                            
                                            <!--<div class="position-relative form-group col-md-12"><label for="dateOfBirthId" id=""><span class="text-danger"></span>Date</label><lable id="dateOfBirthIdErrMgs" class="pull-right"></lable>-->
                                            <!--<input name="min_range" id="min_range"  type="date" class="form-control" value="">-->
                                            <!--</div>-->
                                            
                                            <div class="position-relative form-group col-md-12"><label for="dateOfBirthId" id=""><span class="text-danger"></span>Amount</label><lable id="dateOfBirthIdErrMgs" class="pull-right"></lable>
                                            <input name="balance" id="max_range"  type="number" class="form-control" value="<?=$row['MAX_RANGE']?>">
                                            </div>
                                 </div>            

                                   
                                    
                            
                                    
                                      </div>
                                      <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg pull-right" style="margin:20px;" name="submit" type = "submit" id="submitbtn">Submit</button>
                                        
                                </form>
                             </div>
                        </div>
                    </div>
                    
                    
            </div>
            </div>
                                
                                

<!--<table style="width: 100%;" id="" class="table table-hover table-striped table-bordered">-->
<!--    <thead>-->
<!--        <tr>-->
<!--            <th>Sr. </th>-->
<!--            <th>Transaction No</th>-->
<!--            <th>Payment No</th>-->
<!--            <th>Coin No</th>-->
<!--            <th>Coin Value</th>-->
<!--            <th>Date</th>-->
         
<!--        </tr>-->
<!--    </thead>-->
        
                                
<!--</table>-->
        
        
</div>

<script>

$(document).ready(function(){
    
    function getName(id)
    {
        $.ajax({
            url: "ajax/name.php",
            method: "post",
            data:({ "name":"name","id":id }),
            dataType: "html",
            success: function(result)
            {
                $("#user_name").val(result) ;
            }
    
        })
        
        
    }
    
    $("#user_id").on("change", function(){
        var id= $("#user_id").val();
        getName(id);
    })
    
    
});
    
</script>


		  

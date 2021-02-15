<?php

$result="";
include("config/db_connection.php");
  if(isset($_GET['buyShare'])){
      $id = $_GET['buyShare'];
  }
    $sql="SELECT * FROM `share_setups` WHERE SHARE_SETUP_NO='$id'";
    // $sql="SELECT `SHARE_SETUP_NO` from share_setups ORDER BY `SHARE_SETUP_NO` DESC LIMIT 1";
    
    $result= mysqli_fetch_assoc( mysqli_query( $con , $sql ) ) ;

?>
<?php 
    $user_id = $_SESSION['user']['USER_REGISTRATION_NO'] ;
    // echo $user_id ;
    $query = "SELECT TRANSACTION_AMOUNT FROM share_user_account WHERE `USER_REGISTRATION_NO` = '$user_id' ORDER BY SHARE_USER_ACCOUNT_NO DESC LIMIT 1" ;
    // echo $query
    $getBalance = mysqli_fetch_assoc( mysqli_query( $con , $query ) ) ;
?>

<link rel="stylesheet" href="sweetalert2.min.css">

<input type = "hidden" value = '<?php echo $result['NO_OF_LOT']; ?>'   id = "shares_of_lot">
<input type = "hidden" value = '<?php echo $result['LOT_RATE']; ?>' id = "lot_rate">
<input type = "hidden" value = '<?php echo $_GET['buyShare'] ;?>'   id = "id">
<input type = "hidden" value = '<?php echo $getBalance['TRANSACTION_AMOUNT'] ; ?>'   id = "totalBalance">



<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Buy Share</h5>
                                
                                <!-- details goes here-->
                                
                                <h6 style = "color:red;"> Balance : <?php if($getBalance['TRANSACTION_AMOUNT']==""){echo 0;} else{ echo $getBalance['TRANSACTION_AMOUNT'];}?> </h6>
                                <h6 style = "color:black;"> Available Share : <?php echo $result['NO_OF_SHARES'] ; ?> </h6>
                                <h6 style = "color:black;"> Rate per Share : <?php echo $result['UNIT_RATE'] ; ?> </h6>
                                <h6 style = "color:black;">Shares of a Lot : <?php echo $result['NO_OF_LOT'] ; ?> </h6>
                                
                                
                                 <form class="" method="post">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="numberofShare" class="">No of Shares</label>
                                                    <input name="numberofShare" id="lotNumber" placeholder="" type="text" class="form-control custom">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="numberOfLot" class="">Total Shares</label>
                                                    <input name="numberOfLot" id="totalShares" placeholder="" type="text" class="form-control" readonly value="">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="totalCost" class="">Total Cost</label>
                                                    <input name="totalCost" readonly id="totalCost" placeholder="" type="text" class="form-control custom">
                                                </div>
                                            </div>
      
                                        </div>
                                        
                                        <input type = "button" class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg pull-right" id="conBtn" value = "Confirm">
                                
                                </form>
                                
            </div>
        </div>
                           
    </div>
                       
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 
<script>
    function clear_all() 
    {
       $(".custom").val("") ; 
    }
       function findme(totalLot){
                 
                $.ajax( { 
                    url: "ajax/saveBuyShare.php",
                    method:"post",
                    data: ({ "check":"check" }),
                    dataType:"html",
                    success: function ( Result )
                    {
                        console.log(Result) ;
                       if( (parseInt(Result) + Number(totalLot))>50000 )
                       {
                           alert("Execeded daily Limit") ;
                           $("#lotNumber").val("") ;
                           $("#totalShares").val("");
                           $("#totalCost").val("");
                       }
                    }
                }) ;
            
        }
        
    function saveFunction( id,lotNumber,TotalShares,totalCost , totalBalance) 
            {
                $.ajax( { 
                    url: "ajax/saveBuyShare.php",
                    method:"post",
                    data: ({ "saveBuyShare":"saveBuyShare","id":id,"lotNumber":lotNumber,"TotalShares":TotalShares,"totalCost":totalCost, "totalBalance":totalBalance }),
                    dataType:"html",
                    success: function ( Result )
                    {
                       console.log(Result);
                        Swal.fire({
                              position: 'top-middle',
                              icon: 'success',
                              title: 'Save Successfully',
                              showConfirmButton: false,
                              timer: 1500
                            })
                        
                         clear_all() ;
                    }
                }) ;
            }
    $(document).ready( function( ) { 
        
       $("#conBtn").on("click",function(){
           var id=$("#id").val();
            var lotNumber = $("#lotNumber").val();
            var TotalShares = $("#totalShares").val();
            var totalCost = $("#totalCost").val();
            var totalBalance = $("#totalBalance").val() ;
            saveFunction(id,lotNumber,TotalShares,totalCost, totalBalance );
           
       }) ;
     
        $("#lotNumber").on("keyup", function(){
            var totalLot=$("#lotNumber").val();
            var shareOfLot = $("#shares_of_lot").val() ;
            
            var lot_rate =$("#lot_rate").val() ;
            var totalBalance = $("#totalBalance").val() ;
            
            $("#totalShares").val(totalLot* shareOfLot );
            $("#totalCost").val(totalLot* lot_rate);
            
            if( totalLot* lot_rate > totalBalance )
            {
                alert("Execeded Current Balance") ;
                $("#lotNumber").val("") ;
                $("#totalShares").val("");
                $("#totalCost").val("");
            }
            
            var todays_share=findme(totalLot);
            
            
        });
        
    });
        
      
    
</script>
                                
                                
                                
                                
                                
                                
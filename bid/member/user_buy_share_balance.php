<?php
include("config/db_connection.php");
$sql="SELECT * FROM `share_coin_rate` WHERE `SHARE_COIN_NO`='1'";
$result=mysqli_fetch_assoc(mysqli_query($con,$sql));
?>

<input type = "hidden" value = "<?php echo $_GET['main'];?>" id = "main_balance">
<div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Buy Share Balance</h5>
                                    <form class="">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="numberOfshareBalance" class="custom">Number Of Share Balance</label>
                                                    <input name="numberOfshareBalance" id="numberOfshareBalance"  type="text" class="custom form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="cuurentBalance" class="">Current Balance</label>
                                                    <input name="cuurentBalance" id="cuurentBalance" readonly type="text" value = "<?php echo $_GET['main'];?>" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="shareCoinRate" class="">Rate per Bid Coin</label>
                                                    <input name="shareCoinRate" id="shareCoinRate"  type="text" class="form-control" value="<?=$result['SHARE_COIN_RATE']?>" readonly>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="currentshareBalance" class="">Current Share Balance</label>
                                                    <input name="currentshareBalance" id="currentshareBalance"  type="text" class="form-control"  value="<?=$_GET['sharebalance']?>"readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="totalCost" class="">Total Cost</label>
                                                    <input name="totalCost" readonly id="totalCost"  type="text" class="custom form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="totalshareCost" class="">Total Share Balance</label>
                                                    <input name="totalshareCost" readonly id="totalshareCost" type="text" class="custom form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg pull-right" id="submitBtn" value="Submit">
                                        
                                    </form>
                                </div>
                            </div>
                           
                        </div>
                       
                    </div>
 <script>
 
 function saveBuyDate(saveIt , totalCost, totalshareCost , cuurentBalance )
 {
     $.ajax( { 
         url: "ajax/buyShareBalance.php",
         method : "post",
         data : ({ "saveIt":saveIt , "totalCost": totalCost , "totalshareCost":totalshareCost , "cuurentBalance":cuurentBalance}),
         dataType: "html",
         success: function( Data )
         {
             $(".custom").val("") ;
             alert("Saved") ;
             
         }
     }) ;
 }
 
 $(document).ready(function(){
     $("#numberOfshareBalance").on("change",function(){
         var numOfBidBalance= Number ( $(this).val() );
         var shareCoinRate = Number ( $("#shareCoinRate").val( ) ) ;
         $("#totalCost").val( numOfBidBalance * shareCoinRate ); 
         var main_balance = Number ( $("#main_balance").val( ) ) ;
         if( $("#totalCost").val() > main_balance )
         {
             alert("Exceded Current Balance");
             $(this).val("") ; 
             $(this).focus() ;
             $("#totalCost").val("") ;
         }
         else
         {
             var currentshareBalance = Number ( $("#currentshareBalance").val() ) ||0 ;
             $("#totalshareCost").val( numOfBidBalance + currentshareBalance ) ;
         }
     });
     
     $("#submitBtn").on("click", function( ) { 
          var totalCost = $("#totalCost").val();
          var  totalshareCost = $("#totalshareCost").val();
          var cuurentBalance = $("#cuurentBalance").val() ;
          saveBuyDate("saveIt" , totalCost, totalshareCost , cuurentBalance) ;
         
         
     }) ;
     
 });
                    
                        
</script>
<?php
include("config/db_connection.php");
$sql="SELECT * FROM `bidding_coin_rate` WHERE `BIDDING_COIN_NO`='1'";
$result=mysqli_fetch_assoc(mysqli_query($con,$sql));
?>

<input type = "hidden" value = "<?php echo $_GET['main'];?>" id = "main_balance">
<div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Buy Bidding Balance</h5>
                                    <form class="">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="numberOfBidBalance" class="custom">Number Of Bidding Balance</label>
                                                    <input name="numberOfBidBalance" id="numberOfBidBalance"  type="text" class="custom form-control">
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
                                                    <label for="baiddingCoinRate" class="">Rate per Bid Coin</label>
                                                    <input name="baiddingCoinRate" id="baiddingCoinRate"  type="text" class="form-control" value="<?=$result['BIDDING_COIN_RATE']?>" readonly>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="currentBiddingBalance" class="">Current Bidding Balance</label>
                                                    <input name="currentBiddingBalance" id="currentBiddingBalance"  type="text" class="form-control"  value="<?=$_GET['bidbalance']?>"readonly>
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
                                                    <label for="totalBiddingCost" class="">Total Bidding Balance</label>
                                                    <input name="totalBiddingCost" readonly id="totalBiddingCost" type="text" class="custom form-control">
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
 
 function saveBuyDate(saveIt , totalCost, totalBiddingCost , cuurentBalance )
 {
     $.ajax( { 
         url: "ajax/buyBiddingBalance.php",
         method : "post",
         data : ({ "saveIt":saveIt , "totalCost": totalCost , "totalBiddingCost":totalBiddingCost , "cuurentBalance":cuurentBalance}),
         dataType: "html",
         success: function( Data )
         {
             $(".custom").val("") ;
             alert("Saved") ;
             
         }
     }) ;
 }
 
 $(document).ready(function(){
     $("#numberOfBidBalance").on("change",function(){
         var numOfBidBalance= Number ( $(this).val() );
         var baiddingCoinRate = Number ( $("#baiddingCoinRate").val( ) ) ;
         $("#totalCost").val( numOfBidBalance * baiddingCoinRate ); 
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
             var currentBiddingBalance = Number ( $("#currentBiddingBalance").val() ) ||0 ;
             $("#totalBiddingCost").val( numOfBidBalance + currentBiddingBalance ) ;
         }
     });
     
     $("#submitBtn").on("click", function( ) { 
          var totalCost = $("#totalCost").val();
          var  totalBiddingCost = $("#totalBiddingCost").val();
          var cuurentBalance = $("#cuurentBalance").val() ;
          saveBuyDate("saveIt" , totalCost, totalBiddingCost , cuurentBalance) ;
         
         
     }) ;
     
 });
                    
                        
</script>
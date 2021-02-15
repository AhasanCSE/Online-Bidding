<?php include ( "config/db_connection.php") ;?>
<div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Welcome</h5>
                                     <form action="" method="post" id="formidreg">
                                     
                                <table style="width: 100%;" id="" class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    
                                    <th>Lottery Rate</th>
                                    <th>Lottery Start Date</th>
                                    <th>Lottery Draw Date </th>
                                   
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    date_default_timezone_set("Asia/Dhaka");
                                    $current_date = date("Y-m-d H:i:sa");
                                    $sql = "select * from lottery_setups where STATUS=0 AND LOTTERY_DRAW_DATE>'$current_date'";
                                    $row = mysqli_fetch_assoc(mysqli_query($con,$sql));
                                    ?>
                                    <tr>
                                        
                                        <td><?=$row['LOTTERY_RATE']?></td>
                                        <td><?=$row['LOTTERY_START_DATE']?></td>
                                        <td><?=$row['LOTTERY_DRAW_DATE']?><div id="demo" style="color:red;"></div></td>
                                        <td id="buybtn" style="display:none "><input type = "button" class = "btn btn-success" lottery_no = "<?php echo $row['LOTTERY_SETUP_NO'];?>" rate = "<?=$row['LOTTERY_RATE']?>" Value = "Buy" id = "buyLottery"></td>
                                    </tr>
                                    <input type = "hidden" value = '<?php echo $row['LOTTERY_SETUP_NO'];?>' id = "lotterySetUp">
                                </tbody>
                                
                            </table>
                                     <input type="hidden" id="draw_date" value="<?=$row['LOTTERY_DRAW_DATE']?>">
                                </form>
                                
                                
                                </div>
                            </div>
                           
                        </div>
                       
                    </div>
                    
                    
                    
                    
                    
                    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
function getBuyBtn( value ){
    $.ajax({
        url:"ajax/checkbuylottery.php",
        method:"POST",
        data:({"check":"check", "lotterySetUp" : value }),
        dataType:"html",
        success: function( result)
        {
            if(result==1){
                $("#buybtn").show();
            }
            else{
                $("buybtn").hide();
               
            }
        }
    });
}

function saveLottery( rate, lottery_no ) 
{
    $.ajax( { 
        url:"ajax/checkbuylottery.php",
        method:"POST",
        data:({"save":"save", "rate" : rate, "lottery_no":lottery_no  }),
        dataType:"html",
        success: function( result)
        {
            alert("saved") ;
        }
    }) ;
}
    $(document).ready(function(){
        getBuyBtn($("#lotterySetUp").val() ) ;
        
        $("#buyLottery").on("click" , function( ) { 
            

            var rate = $(this).attr("rate") ;   
            var lottery_no = $(this).attr("lottery_no") ; 
            saveLottery( rate, lottery_no ) ;
            
        }) ;
        
        
        var draw_date = $("#draw_date").val();
var countDownDate = new Date(draw_date).getTime();

var x = setInterval(function() {
  var now = new Date().getTime();
  var distance = countDownDate - now;
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
},1000);
    });
</script>
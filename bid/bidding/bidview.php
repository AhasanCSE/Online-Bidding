<?php session_start( ) ; ?>
<?php include ( "config/db_connection.php") ;?>

<link rel="stylesheet" href="sweetalert2.min.css">

<?php 
    $user_id = $_SESSION['user']['USER_REGISTRATION_NO'] ;
    // echo $user_id ;
    $query = "SELECT `TRANSACTION_AMOUNT` FROM `bid_bidding_user_accounts` WHERE `USER_REGISTRATION_NO` = '$user_id' ORDER BY `BIDDING_USER_ACCOUNT_NO` DESC LIMIT 1 " ;
    // echo $query
    $getBalance = mysqli_fetch_assoc( mysqli_query( $con , $query ) ) ;
?>

<input type = "hidden" value = "<?php echo $getBalance['TRANSACTION_AMOUNT']; ?>" id = "bidding_balance">


<div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="row">
                                <div class="card-body"><h5 class="card-title">View Bid</h5>
                                <div class="card-body"><h5 style="color:red;" class="card-title">Bidding balnace : <?php if($getBalance['TRANSACTION_AMOUNT']==""){echo 0;} else{ echo $getBalance['TRANSACTION_AMOUNT'];}?></h5>
                                </div>
                                    <h4 id = "setTime" style="text-align:center;color:green;"></h4>
                                    <div  class="card-body">
                                        
                                        <?php
                                            $bid_question_no = $_GET['answer_no'] ;
                                            $getQuestionInformation = "SELECT * FROM bid_questions WHERE `BID_QUESTION_NO` = '$bid_question_no'";
                                            $information = mysqli_fetch_assoc( mysqli_query( $con ,$getQuestionInformation ) ) ;
                                        ?>
                                        
                                        <h5 style = "color:red" class="card-title"> <?= $information['BIDDING_TITLE']?> </h5>
                                        <h6 class="card-title"> Min Range:  <?= $information['MIN_RANGE']?> </h6>
                                        <h6 class="card-title"> Max Range:   <?= $information['MAX_RANGE']?> </h6>
                                        <h6 class="card-title">Answers: </h6>
                                    </div>
                                
                                
                                    <?php 
                                        $all_things = "" ;
                                        if( isset( $_GET['answer_no'] ) ) 
                                        {
                                            $id = $_GET['answer_no'] ;
                                            $query = "SELECT * FROM bid_answers WHERE BID_QUESTION_NO = '$id'";
                                            
                                            $result = mysqli_query ( $con , $query ) ;
                                            
                                            $count = 0 ;
                                            $checker = 1 ;
                                            // echo "<table style='width: 100%;' class='table table-hover table-striped table-bordered'><tbody><tr>";
                                            foreach( $result as $value  )
                                            {
                                                $answer_no = $value['BID_ANSWER_NO'];
                                                $ratio = $value['BID_RATIO'] ;
                                                $answer_title = $value['ANSWER_TITLE'];
                                                if ( $checker % 4 == 0 )
                                                {
                                                    ?>
                                                    <div class="col-md-3">
                                                    <?php
                                                    echo "<button type = 'button' style='margin-bottom:5px;'id = 'unique".$answer_no."' answer_no = '$answer_no' ratio = '$ratio' answer_title = '$answer_title' class = 'btn btn-success press'>".$value['ANSWER_TITLE']."<p style = 'color:white;'>".$ratio."</p></button>";
                                                    echo "</div>";
                                                    echo "</div>" ;
                                                    
                                                }
                                                else if( $checker % 4 == 1 )
                                                {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                    <?php
                                                    echo "<button type = 'button' id = 'unique".$answer_no."' answer_no = '$answer_no' ratio = '$ratio' answer_title = '$answer_title' class = 'btn btn-success press'>".$value['ANSWER_TITLE']."<p style = 'color:white;'>".$ratio."</p></button>";
                                                    echo "</div>";
                                                }
                                                else if( $checker % 4 == 2 )
                                                { 
                                                    ?>
                                                    <div class="col-md-3">
                                                    <?php
                                                    echo "<button type = 'button' id = 'unique".$answer_no."' answer_no = '$answer_no' ratio = '$ratio' answer_title = '$answer_title' class = 'btn btn-success press'>".$value['ANSWER_TITLE']."<p style = 'color:white;'>".$ratio."</p></button>";
                                                    echo "</div>";
                                                }
                                                else if( $checker % 4 == 3 )
                                                {
                                                    ?>
                                                    <div class="col-md-3">
                                                    <?php
                                                    echo "<button type = 'button' id = 'unique".$answer_no."' answer_no = '$answer_no' ratio = '$ratio' answer_title = '$answer_title' class = 'btn btn-success press'>".$value['ANSWER_TITLE']."<p style = 'color:white;'>".$ratio."</p></button>";
                                                    echo "</div>";
                                                }
                                                $checker ++ ;
                                            }
                                            // echo "</tr>";
                                            // echo "</tbody></table>";
                                           $getMaxMin = "SELECT START_TIME,END_TIME, MAX_RANGE,MIN_RANGE FROM bid_questions WHERE BID_QUESTION_NO = '$id'" ;
                                           $all_things = mysqli_fetch_assoc( mysqli_query( $con , $getMaxMin ) ) ;
                                        }
                                    ?>
                                    <input type = "hidden" value = '<?php echo $all_things['MAX_RANGE'];?>' id = "max_range">
                                    <input type = "hidden" value = '<?php echo $all_things['MIN_RANGE'];?>' id = "min_range">
                                    <input type = "hidden" value = '<?php echo $all_things['START_TIME'];?>' id = "startTime">
                                    <input type = "hidden" value = '<?php echo $all_things['END_TIME'];?>' id = "endTime">
                                    <input type = "hidden" value = "<?php echo $_GET['answer_no']?>" id = "question_no">
                                    
                                    <div style = "display:none" id = "BidAmount">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="setAmount" id="">Set Amount</label><lable id="referenceCodeIdErrMgs" class="pull-right"></lable>
                                                <input name="text" id="setAmount" placeholder="Amount Here.." type="number" class="form-control">
                                                </div>
                                                
                                                <div class="ml-auto">
                                                    <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg" type ="button" id="AddButton">Add</button>
                                                </div>
                                                
                                            </div>
                                        
                                        </div>    
                                    </div>
                                    
                                <table style='width: 100%;' class='table table-hover table-striped table-bordered'>
                                    <thead>
                                        <th>Answer</th>
                                        <th>Set Amount</th>
                                        <th>Win Amount</th>
                                        <th>Action</th>
                                    </thead>
                                    
                                    <tbody id = "printData">
                                        
                                    </tbody>
                                    
                                    <tfoot>
                                        <tr>
                                            <th>Total</th>
                                            <th id = "totalSetAmount"></th>
                                            <th id = "totalWinAmount"></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    
                                   </table> 
                                   <div>
                                        <button class="btn-wide pull-right btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg" type ="button" id="SaveButton">Save</button>
                                    </div>
                                    
                            </div>
                           
                        </div>
                       
                    </div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
    var current_balance = 0 ;
    var bidding_balance = 0 ;
    var answer_title = [];
    var answer_ratio = [];
    var answer_no = [] ;
    var set_amount = [] ;
    var answer_title1, answer_ratio1, answer_no1 ;
    
    function clearAll( )
    {
        answer_title = [];
        answer_ratio = [];
        answer_no = [];
        set_amount = [] ;
    }
    
    function calculateWin( ratio , amount )
    {
        return ( ratio * amount ) ; 
    }
    
    function printTable(  )
    {
        
        var html = "" ;
        var winAmount = 0 , setAmount = 0 ;
        for( var i = 0 ; i < answer_title.length ; i ++ )
        {
            var total = calculateWin( answer_ratio[ i ], set_amount[i] ) ;
            winAmount += total ;
            setAmount += set_amount[i] ;
            html += "<tr>"; 
            html += "<td>"+answer_title[i]+"</td><td>"+set_amount[i]+"</td><td>"+ total + "</td>";
            html += "<td><button class = 'btn btn-danger delete' row = '"+i+"' answer_no = '"+answer_no[i]+"'> Cancel </button></td>" ;
            html += "</tr>" ;
        }
        $("#printData").html( html ) ;
        $("#totalSetAmount").text( setAmount ) ;
        $("#totalWinAmount").text( winAmount ) ;

    }
     function clearAll(){
        answer_title = [];
        answer_ratio = [];
        answer_no = [];
        set_amount = [] ;
        printTable() ;
        
     }
    function submit(answer_no, set_amount , question_no, bidding_balance )
    {
        $.ajax( { 
         
         url: "ajax/bid_setup.php",
         method : "post",
         data: ({ "answer_no": answer_no.toString(), "set_amount":set_amount.toString() , "question_no":question_no, "bidding_balance":bidding_balance }),
         dataType:"html",
         success: function ( Data )
         {
            if( Data == 1 )
            {
                
                Swal.fire({
                  position: 'top-middle',
                  icon: 'success',
                  title: 'Successfull',
                  showConfirmButton: false,
                  timer: 1500
                })
              clearAll() ;
            }
            else
            {
                Swal.fire({
                  position: 'top-middle',
                  icon: 'error',
                  title: 'error',
                  showConfirmButton: false,
                  timer: 1500
                })
            }
           
         }
            
        }) ;
    }
    
    function countDown()
    {
        var startTime = $("#startTime").val();
        var endTime = $("#endTime").val() ;
        console.log( endTime ) ;
        var gotTime = endTime.split( ":" ) ;
        var countDownDate = new Date() ;
        countDownDate.setHours( parseInt( gotTime[0] ) );
        countDownDate.setMinutes( parseInt( gotTime[1] ) );
        countDownDate.setSeconds( parseInt( gotTime[2] ) ) ;
        
        var now = new Date().getTime();
        
        var x = setInterval(function() {
          var d = new Date() ;
          var now = new Date();
        
          now.setHours( d.getHours() ) ;
          now.setMinutes(d.getMinutes());
          now.setSeconds(d.getSeconds() ) ;
          console.log( now ) ;
          var distance =  countDownDate - now;
        
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
         
          document.getElementById("setTime").innerHTML = days + "d " + hours + "h "
          + minutes + "m " + seconds + "s ";
        
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("setTime").innerHTML = "EXPIRED";
          }
        }, 1000);
        
    }
    
    $(document).ready( function( ) { 
        bidding_balance = Number ( $("#bidding_balance").val( ) ) || 0 ;
        countDown() ;
        
        
        
        $(".press").on( "click" , function( ) {
            
            if( $( this ).hasClass("btn-success") ){
                $("#BidAmount").show() ;
                $(this).removeClass( "btn-success" ) ;
                $(this).addClass( "btn-danger" ) ;
                answer_title1 = $(this).attr( "answer_title" ) ;
                answer_ratio1 = $(this).attr( "ratio" );
                answer_no1 = $(this).attr( "answer_no" );
            }
            else
            {
                if( answer_title.length > 0 )
                {
                    var index = answer_title.indexOf( $(this).attr("answer_title") );
                    console.log( index ) ;
                    if( index >= 0 ){
                        answer_title.splice( index, 1 );
                        answer_ratio.splice( index, 1 );
                        answer_no.splice( index, 1 );
                        set_amount.splice( index, 1 ) ;
                        printTable() ;
                    }
                }
                $("#BidAmount").hide() ;
                $(this).removeClass( "btn-danger" ) ;
                $(this).addClass( "btn-success" ) ;
            }
            
        }) ;
        
        $(document).on ( "click" , ".delete", function( ) { 
            var id = $(this).attr("row") ;
            var this_answer_no = $(this).attr("answer_no") ;
            answer_title.splice(id , 1 ) ;
            answer_ratio.splice(id , 1 ) ;
            answer_no.splice(id , 1 ) ;
            set_amount.splice(id , 1 ) ;
            printTable() ;
            
            $("#unique"+this_answer_no).removeClass("btn-danger") ;
            $("#unique"+this_answer_no).addClass("btn-success") ;
        }) ;
        
        
        $("#AddButton").on( "click" , function( ) { 
            
            var amount = Number ( $("#setAmount").val() );
            var min_range = Number ( $("#min_range").val() ) ;
            var max_range = Number ( $("#max_range").val() ) ;
            if( amount < min_range )
            {
                Swal.fire(
                  'Lower than Minimum Range',
                  'Minimum Range '+ min_range+" Maximum Range "+ max_range,
                  'error'
                )
                $("#setAmount").val("") ;
                $("#setAmount").focus() ;
            }
            else if( amount > max_range )
            {
               Swal.fire(
                  'Higer than Maximum Range',
                  'Minimum Range '+ min_range+" Maximum Range "+ max_range,
                  'error'
                ) 
                $("#setAmount").val("") ;
                $("#setAmount").focus() ;
            }
            else
            {
                if( ( current_balance + amount ) <= bidding_balance ){
                    current_balance += amount ;
                    answer_title.push( answer_title1 );
                    answer_ratio.push( answer_ratio1 );
                    answer_no.push( answer_no1 ) ;
                    set_amount.push( amount ) ;
                    printTable() ;
                }
                else
                {
                    Swal.fire({
                      position: 'top-middle',
                      icon: 'error',
                      title: 'You have not Enough Bidding Balance',
                      showConfirmButton: true,
                      
                    })
                }
            }
            
            $("#BidAmount").hide() ;
            $("#setAmount").val("") ;
        }) ;
        
        $("#SaveButton").on("click",function(){
            var question_no = $("#question_no").val() ;
            submit( answer_no, set_amount , question_no, bidding_balance ) ;
        });
    }) ;
    
    
    
    
</script>
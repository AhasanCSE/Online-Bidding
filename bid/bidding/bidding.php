<?php include ( "config/db_connection.php") ;?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<?php 
    
    function timecompare( $date1 , $date2 )
    {
        $dateTimestamp1 = strtotime($date1); 
        $dateTimestamp2 = strtotime($date2);

        if( $dateTimestamp1 == $dateTimestamp2  )
        {
            return true ;
        }
        else
        {
            return false ;
        }
    }
    
    function CompareTimes( $start_time, $end_time, $times )
    {
        if( strtotime ( $start_time ) <= time() && time() <= strtotime ( $end_time ) )
        {
            return true ;
        }
        else
        {
            return false ;
        }
    }
    
?>



<?php 

    date_default_timezone_set("Asia/Dhaka");
    $times = date("h:i:s a");
    // echo $times;
    $get_all = "" ;
    $date = date("Y-m-d"); 
    
    
    $cur = date( "Y-m-d" ) ;
    
    $get_dates = "SELECT `BIDDING_DATE`,`START_TIME`, `END_TIME` FROM adm_bidding" ;
    $check_time = mysqli_fetch_assoc( mysqli_query( $con , $get_dates ) ) ;

    
    $query = "SELECT * FROM `bid_questions` ORDER BY `BID_QUESTION_NO` DESC" ;
    $get_all = mysqli_query ( $con , $query ) ;
?>




<div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Welcome</h5>
                                     <form action="" method="post" id="formidreg">
                                     
                                <table style="width: 100%;" id="" class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Bidding Tittle</th>
                                    <th>Max Range</th>
                                    <th>Min Range</th>
                                    <th> Start Time </th>
                                    <th>End Time</th>
                                    <th> Bid </th>
                                </tr>
                                </thead>
                                <tbody>
                                    
                         <?php
                            
                            function answer( $index1 , $count )
                            {
                                include ( "config/db_connection.php") ;
                                $sql = "SELECT * FROM bidding_answers WHERE BIDDING_NO = '$index1'" ;
                                $result = mysqli_query( $con , $sql )  ;
                                
                                foreach( $result as $items )
                                {
                                    $index = $items[ 'ANSWER_NO' ] ;
                                    $button = $items[ 'ANSWER_TITLE' ] ;
                                    echo "<input type ='button' row = '$count' id = 'unique".$index."' class = 'btn btn-success custom' name = '$button' bidding_no = '$index1' answer_no = '$index' value = '$button'> " ;
                                }
                            }
                            $count = 1 ;   
                            foreach ( $get_all as $value )
                            {
                                    date_default_timezone_set("Asia/Dhaka");
                                    $times = date("h:i:s a");
                                    $date1 = $value['BIDDING_DATE'] ;
                                    $start_time = $value['START_TIME'] ;
                                    $end_time = $value['END_TIME'] ;
                                
                                
                                if( timecompare( $date1 , $cur ) )
                                {
                                    if( CompareTimes( $start_time, $end_time , $times ))
                                    {
                                            echo "<tr>" ;
                                            echo "<td>".$value['BIDDING_TITLE']."</td>" ;
                                            echo "<td>".$value['MAX_RANGE']."</td>" ;
                                            echo "<td>".$value['MIN_RANGE']."</td>" ;
                                            echo "<td>".$value['START_TIME']."</td>" ;
                                            echo "<td>".$value['END_TIME']."</td>" ;
                                            $bid_no = $value['BID_QUESTION_NO'] ;
                                            echo "<td>";
                                                
                                                echo "<a class = 'btn btn-success' href='?pagex=bidview&&root=bidding&&answer_no=".$bid_no."'>Bid</a>" ;
                                              
                                             $count ++ ;
                                            echo "</td>" ;
                                            echo "</tr>" ;   
                                    }
                                } 
                            }
                                        
                        ?>
                                
                                </tbody>
                                
                            </table>
                                     
                                </form>
                                
                                
                                </div>
                            </div>
                           
                        </div>
                       
                    </div>
<!--<script src = "main.cba69814a806ecc7945a.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
   
    
    
    function updateAnswer( get_answer, answer_no )
    {
        $.ajax( { 
            
            url: "ajax/bidding_action.php",
            method : "post",
            data: ({ "get_answer": get_answer, "answer_no": answer_no }),
            dataType: "html",
            success: function ( Result )
            {
                
                if( Result == 1 )
                {
                     Command: toastr["success"]("Successful")

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
                }
                
            }
            
        });
    }
    
    function getName( get_answer_name, answer_no, btnId )
    {
        $.ajax( { 
            
            url: "ajax/bidding_action.php",
            method : "post",
            data: ({ "get_answer_name": get_answer_name, "answer_no": answer_no }),
            dataType: "html",
            success: function ( Result )
            {
               $("#"+btnId).val(Result) ;
            }
        });
        
       
    }
    
    $( document ).ready( function( ) { 
        
        $(document).on("click", ".custom", function()
        {
           if( $(this).val() == "Cancel" )
                {
                    var bidding_no = $(this).attr("bidding_no") ;
                    var answer_no = $(this).attr("answer_no") ;
                    $(this).removeClass( "btn btn-danger" ) ;
                    $(this).addClass("btn btn-success") ;
                    getName( "get_answer_name", answer_no, $(this).prop("id") ) ;
                }
                else
                {
                    $(this).val("Cancel") ;
                    $(this).removeClass("btn btn-success") ;
                    $(this).addClass( "btn btn-danger" ) ;
                       
                      var bidding_no = $(this).attr("bidding_no") ;
                      var answer_no = $(this).attr("answer_no") ;
                      console.log( answer_no ) ;
                      updateAnswer( "get_answer" , answer_no ) ;
                }
        });
        
    }) ;
    
    
    
</script>
<?php session_start( ) ; ?>
<?php include ( "config/db_connection.php") ;?>
<div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
        <!--    <div class="h-100">-->
        <!--        <div class="h-100 no-gutters row">-->
                    <div class="h-100 d-md-flex d-sm-block bg-white justify-content-center align-items-center col-md-12 col-lg-12">
                        <div class="mx-auto app-login-box col-sm-12 col-md-12 col-lg-12">
                            <!--<div class="app-logo"></div>-->
                            <h1 style = "color:green;" id = "success"></h1>
                            <h4>
                                <div>Welcome to</div>
                                <span>Answer<span class="text-success"> a Bid</h4>
                            <div>
                               <form action="" method="post" id="formidreg">
                                  
                                    <?php 
                                        
                                        if( isset( $_GET['bidding_no'] ) ) 
                                        {
                                            $id = $_GET['bidding_no'] ;
                                            
                                            $getQuestion = "SELECT `BIDDING_TITLE` FROM bid_questions WHERE `BID_QUESTION_NO` = '$id'" ;
                                            $question = mysqli_fetch_assoc( mysqli_query( $con , $getQuestion )) ;
                                            echo "Question: <span><h1 style = 'color:red;'>".$question['BIDDING_TITLE']."</h1></span>";
                                            
                                            $query = "SELECT * FROM bid_answers WHERE BID_QUESTION_NO = '$id'";
                                            
                                            $result = mysqli_query ( $con , $query ) ;
                                            echo "Answers : ";
                                            $count = 0 ;
                                            echo "<table style='width: 100%;' class='table table-hover table-striped table-bordered'><tbody><tr>";
                                            foreach( $result as $value  )
                                            {
                                                $answer_no = $value['BID_ANSWER_NO'];
                                                $ratio = $value['BID_RATIO'] ;
                                                $answer_title = $value['ANSWER_TITLE'];
                                                $question_no = $value['BID_QUESTION_NO'] ;
                                                echo "<td class = 'text-center'><button type = 'button' question_no = '$question_no' id = 'unique".$answer_no."' answer_no = '$answer_no' ratio = '$ratio' answer_title = '$answer_title' class = 'btn btn-success press'>".$value['ANSWER_TITLE']."<p style = 'color:white;'>".$ratio."</p></button></td>";
                                            }
                                            echo "</tr>";
                                            echo "</tbody></table>";
                                            echo "<input type = 'button' class = 'btn-wide pull-right btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg' id = 'confirmBtn' value = 'Confirm' style='margin-bottom:20px;'>" ;
                                        }
                                    ?>
                                
                                </form>
                            </div>
                        </div>
                    </div>
        
        
            </div>
</div>


<script>
    var answerNo = -1 ;
    var questionNo = - 1 ;
    var ratio = - 1 ;
    
    function confirmAnswer( confirm,  answerNo, questionNo, ratio  )
    {
        $.ajax({ 
            url: "ajax/confirmAnswer.php",
            method:"post",
            data: ({ "confirm":confirm,  "answerNo": answerNo, "questionNo":questionNo, "ratio":ratio }),
            dataType: "html",
            success: function( Result )
            {
                alert("Saved") ;
            }
        }) ;
    }
    
    $(document).ready( function ( ) {
        
        $(".press").on("click", function( ) {
            
            $(".press").each( function () {
                if( $(this).hasClass("btn-danger") )
                {
                    $(this).removeClass("btn-danger") ;
                    $(this).addClass("btn-success") ;
                }
            }) ;
            $(this).removeClass("btn-success") ;
            $(this).addClass("btn-danger") ;
            answerNo = $(this).attr("answer_no") ;
            questionNo = $(this).attr("question_no") ;
            ratio = $(this).attr("ratio") ;
        }) ;
        
        $("#confirmBtn").on("click", function( ) { 
            console.log( "answerNo" + answerNo ) ;
            console.log( "questionNo" + questionNo ) ;
            confirmAnswer( "confirm",  answerNo, questionNo , ratio ) ;
            
        }) ;
        
    }) ;
    
</script>

<?php  include("config/db_connection.php") ;?>

<?php
    $all_value = "" ;
    if( isset( $_GET['editlottery'] ) ) 
    {
        $id = $_GET['editlottery'] ;
        $query = "SELECT * FROM `lottery_setups` WHERE `LOTTERY_SETUP_NO`= '$id'" ;
        
        $all_value = mysqli_fetch_assoc( mysqli_query ( $con , $query ) ) ;
        
    }

?>
<?php
    $msg = "" ;
    if( isset( $_GET['deleteLottery'] ) ) 
    {
        $id = $_GET['deleteLottery'] ;
        $query = "DELETE FROM lottery_setups WHERE `LOTTERY_SETUP_NO` = '$id'" ;
        
        $all_value = mysqli_query ( $con , $query ) ;
        
        $msg = $all_value ? "yes":"no" ;
        
    }
?>

<div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Lottery Setup</h5>
                                    <form class="">
                                        <div class="form-row">
                                            
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="numOfLottery" class="">Number of Lottery</label>
                                                    <input name="numOfLottery" id="numOfLottery" placeholder="" type="number" value ="<?php echo $all_value['NO_OF_LOTTERY'];?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="lotteryRate" class="">Lottery Rate</label>
                                                    <input name="lotteryRate" id="lotteryRate" placeholder="" value = "<?php echo $all_value['LOTTERY_RATE'];?>" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="starttime" class="">Lottery Start Date</label>
                                                    <input name="starttime" id="starttime" placeholder="" type="datetime-local" value = "<?php echo $all_value['LOTTERY_START_DATE'];?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="lotteryDrawDate" class="">Lottery Draw Date</label>
                                                    <input name="lotteryDrawDate" id="lotteryDrawDate" placeholder="" type="datetime-local" value = "<?php echo $all_value['LOTTERY_DRAW_DATE'];?>" class="form-control">
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                        
                                        <input type = "hidden" id = "editlottery1" value = "<?php echo $_GET['editlottery'];?>" >
                                        <?php 
                                            if( $_GET['editlottery'] ) 
                                            {?>
                                                <input type = "button" class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg pull-right" id = "updateBtn" value = "Update">
                                               <?php 
                                            }else{?>
                                            <input type = "button" class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg pull-right" id = "savBtn" value = "Save">
                                        <?php } ?>
                                        
                                    
                                    
                                <table style="width: 100%;" id="" class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th> Sl No </th>
                                    <th>Number of Lottery</th>
                                    <th>Lottery  Rate</th>
                                    <th>Lottery Start Date</th>
                                    <th>Lottery Draw Date </th>
                                 
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id = "tableData">
                                    
                                 
                                </tbody>
                                
                            </table>
                                    
                                    
                                    
                                    </form>
                                </div>
                            </div>
                           
                        </div>
                       
                    </div>
                    
                    
                    
        <script>
            
            function clear_all( )
            {
                $("#numOfLottery").val("") ;
                $("#lotteryRate").val("") ;
                $("#lotteryDrawDate").val("") ;
                $("#starttime").val("") ;
               
            }
            
            function updateFunction( updateLottery, lottery_number, lottery_rate, lottery_draw_date,start_time, id_number) 
            {
                $.ajax( { 
                    url: "ajax/saveLottery.php",
                    method:"post",
                    data: ({ "updateLottery":updateLottery, "lottery_number":lottery_number, "lottery_rate": lottery_rate , "lottery_draw_date":lottery_draw_date,"start_time":start_time,"id_number":id_number }),
                    dataType:"html",
                    success: function ( Result )
                    {
                        //console.log(Result);
                         //alert("Update") ;
                        getTableValue( "TableData" ) ;
                        clear_all() ;
                    }
                }) ;
            }
            
            
            function saveFunction( saveLottery, lottery_number, lottery_rate, lottery_draw_date,start_time) 
            {
                $.ajax( { 
                    url: "ajax/saveLottery.php",
                    method:"post",
                    data: ({ "saveLottery":saveLottery, "lottery_number":lottery_number, "lottery_rate": lottery_rate , "lottery_draw_date":lottery_draw_date,"start_time":start_time}),
                    dataType:"html",
                    success: function ( Result )
                    {
                        // alert("Saved") ;
                        getTableValue( "TableData" ) ;
                        clear_all() ;
                    }
                }) ;
            }
            
            function getTableValue( TableData )
            {
                $.ajax( { 
                    url: "ajax/saveLottery.php",
                    method:"post",
                    data: ({"TableData": TableData }),
                    dataType:"html",
                    success: function ( Result )
                    {
                        $("#tableData").html(Result) ;
                    }
                }) ;
            }
            
            function deleteFunction()
            {
                <?php
                    if( $msg == "yes")
                    {?>
                        // alert("Deleted") ;
                        <?php
                    }
                    else if( $msg == "no")
                    {?>
                    //   alert("Error") ;
                       <?php 
                    }
                ?>
            }
            
            $(document).ready( function( ) { 
                
                
                
                
            
                getTableValue( "TableData" ) ;
                
                deleteFunction() ;
                
                $("#updateBtn").on( "click", function( ) { 
                    var lottery_number = $("#numOfLottery").val() ;
                    var lottery_rate = $("#lotteryRate").val() ;
                    var lottery_draw_date = $("#lotteryDrawDate").val() ;
                    var start_time = $("#starttime").val() ;
                    var id_number = $("#editlottery1").val() ;
                  
                    updateFunction( "updateLottery", lottery_number, lottery_rate, lottery_draw_date,start_time,id_number ) ;
                }) ;
                
                $("#savBtn").on( "click", function( ) { 
                    var lottery_number = $("#numOfLottery").val() ;
                    var lottery_rate = $("#lotteryRate").val() ;
                    var lottery_draw_date = $("#lotteryDrawDate").val() ;
                    var start_time = $("#starttime").val() ;
                    
                  
                    saveFunction( "saveLottery", lottery_number, lottery_rate, lottery_draw_date,start_time) ;
                }) ;
                
            }) ;
        </script>
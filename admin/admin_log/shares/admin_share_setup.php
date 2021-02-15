<?php  include("config/db_connection.php") ;?>

<?php
    $all_value = "" ;
    if( isset( $_GET['editShare'] ) ) 
    {
        $id = $_GET['editShare'] ;
        $query = "SELECT * FROM `share_setups` WHERE `SHARE_SETUP_NO`= '$id'" ;
        
        $all_value = mysqli_fetch_assoc( mysqli_query ( $con , $query ) ) ;
        
    }

?>
<?php
    $msg = "" ;
    if( isset( $_GET['deleteShare'] ) ) 
    {
        $id = $_GET['deleteShare'] ;
        $query = "DELETE FROM share_setups WHERE `SHARE_SETUP_NO` = '$id'" ;
        
        $all_value = mysqli_query ( $con , $query ) ;
        
        $msg = $all_value ? "yes":"no" ;
        
    }
?>

<div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Share Setup</h5>
                                    <form class="">
                                        <div class="form-row">
                                            
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="noofShare" class="">No of Shares</label>
                                                    <input name="noofShare" id="noofShare" placeholder="" type="number" value ="<?php echo $all_value['NO_OF_SHARES'];?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="unitRate" class="">Share Rate</label>
                                                    <input name="unitRate" id="unitRate" placeholder="" value = "<?php echo $all_value['UNIT_RATE'];?>" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="noofLot" class="">Shares of a Lot</label>
                                                    <input name="noofLot" id="noofLot" placeholder="" type="number" value = "<?php echo $all_value['NO_OF_LOT'];?>" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="lotRate" class="">Lot Rate</label>
                                                    <input name="lotRate" id="lotRate" placeholder="" value = "<?php echo $all_value['LOT_RATE'];?>" type="text" readonly class="form-control">
                                                </div>
                                            </div>
                                            
                                            
                                            
                                        </div>
                                        
                                        <input type = "hidden" id = "editShareval" value = "<?php echo $_GET['editShare'];?>" >
                                        <?php 
                                            if( $_GET['editShare'] ) 
                                            {?>
                                                <input type = "button" class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg pull-right" id = "updateBtn" value = "Update">
                                               <?php 
                                            }else{?>
                                            <input type = "button" class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg pull-right" id = "saveBtn" value = "Save">
                                        <?php } ?>
                                        
                                    
                                    
                                <table style="width: 100%;" id="" class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th> Sl No </th>
                                    <th>Number of Share</th>
                                    <th>Unit Rate</th>
                                    <th>Shares of Lot </th>
                                    <th>Lot Rate</th>
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
                $("#noofShare").val("") ;
                $("#unitRate").val("") ;
                $("#noofLot").val("") ;
                $("#lotRate").val("") ;
            }
            
            function updateFunction( updateShare, share_number, unit_rate, lot_number, lot_rate, id_number) 
            {
                $.ajax( { 
                    url: "ajax/saveshare.php",
                    method:"post",
                    data: ({ "updateShare":updateShare, "share_number":share_number, "unit_rate": unit_rate , "lot_number":lot_number,"lot_rate":lot_rate, "id_number":id_number }),
                    dataType:"html",
                    success: function ( Result )
                    {
                        alert("Update") ;
                        getTableValue( "TableData" ) ;
                        clear_all() ;
                    }
                }) ;
            }
            
            
            function saveFunction( saveShare, share_number, unit_rate, lot_number,lot_rate ) 
            {
                $.ajax( { 
                    url: "ajax/saveshare.php",
                    method:"post",
                    data: ({ "saveShare":saveShare, "share_number":share_number, "unit_rate": unit_rate , "lot_number":lot_number,"lot_rate":lot_rate}),
                    dataType:"html",
                    success: function ( Result )
                    {
                        alert("Saved") ;
                        getTableValue( "TableData" ) ;
                        clear_all() ;
                    }
                }) ;
            }
            
            function getTableValue( TableData )
            {
                $.ajax( { 
                    url: "ajax/saveshare.php",
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
                        alert("Deleted") ;
                        <?php
                    }
                    else if( $msg == "no")
                    {?>
                       alert("Error") ;
                       <?php 
                    }
                ?>
            }
            
            $(document).ready( function( ) { 
                
                
                
                
             $("#noofLot").on("keyup",function(){
                 var sharesLot=$("#noofLot").val();
                 var shareRate=$("#unitRate").val();
                 $("#lotRate").val(sharesLot*shareRate);
                 
                 
                 
             });
                getTableValue( "TableData" ) ;
                
                deleteFunction() ;
                
                $("#updateBtn").on( "click", function( ) { 
                    var share_number = $("#noofShare").val() ;
                    var unit_rate = $("#unitRate").val() ;
                    var lot_number = $("#noofLot").val() ;
                    var lot_rate = $("#lotRate").val() ;
                    var id_number = $("#editShareval").val() ;
                  
                    updateFunction( "updateShare", share_number, unit_rate, lot_number,lot_rate,id_number ) ;
                }) ;
                
                $("#saveBtn").on( "click", function( ) { 
                    var share_number = $("#noofShare").val() ;
                    var unit_rate = $("#unitRate").val() ;
                    var lot_number = $("#noofLot").val() ;
                    var lot_rate = $("#lotRate").val() ;
                  
                    saveFunction( "saveShare", share_number, unit_rate, lot_number,lot_rate) ;
                }) ;
                
            }) ;
        </script>
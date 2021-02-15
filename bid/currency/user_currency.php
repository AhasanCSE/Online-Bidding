<?php include ( "config/db_connection.php") ;?>

<?php
    $all_value = "" ;
    if( isset( $_GET['editCurrency'] ) )
    {
        $id = $_GET['editCurrency'] ;
        $query = "SELECT * FROM `currencies` LEFT JOIN currency_setups ON currency_setups.CURRENCY_SETUP_NO = currencies.CURRENCY_SETUP_NO WHERE `CURRENCY_NO` = '$id'" ;
        // echo $query ;
        $all_value = mysqli_fetch_assoc( mysqli_query( $con , $query ) ) ;
    }
?>

<?php
$msg = "" ;
    if( isset( $_GET['deleteCurrency'] ) )
    {
        $id = $_GET['deleteCurrency'] ;
        $query = "DELETE FROM `currencies` WHERE `CURRENCY_NO` = '$id'" ;
        $all_value = mysqli_query( $con , $query ) ;
        $msg = $all_value ? "yes": "no";
    }
?>

<div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Currency Setup</h5>
                                <div class="card-body"><h5 style="color:red;" class="card-title">Current balnace : <span id="currentBalancefixed" ></span></h5>
                                
                                    <form class="">
                                     <input name="currentBalance" id="currentBalance" placeholder=""  readonly type="hidden" class="form-control">   
                                        
                                        
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="buyRate" class="">Currency Name</label>
                                                    <select class="form-control search" id = "curreny_no" > 
                                                        
                                                        <?php
                                                            $sql = "SELECT `CURRENCY_SETUP_NO`, `CURRENCY_NAME` FROM `currency_setups`" ;
                                                            $result = mysqli_query( $con , $sql ) ;
                                                            if( $all_value['CURRENCY_SETUP_NO'] != "" )
                                                            {
                                                                echo "<option value='".$all_value['CURRENCY_SETUP_NO']."' >".$all_value['CURRENCY_NAME']."</option>" ;
                                                           
                                                            }
                                                            foreach( $result as $value )
                                                            {
                                                                echo "<option value='".$value['CURRENCY_SETUP_NO']."' >".$value['CURRENCY_NAME']."</option>" ;
                                                            }
                                                        ?>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="buyRate" class="">Buy Rate</label>
                                                    <input name="buyRate" id="buyRate" placeholder=""  readonly type="number" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="noOfCurrency" class="">No Of Currency</label>
                                                    <input name="noOfCurrency" id="noOfCurrency" placeholder="" value = '<?php echo $all_value['NO_OF_CURRENCY']?>' type="number" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="totalAmount" class="">Total Amount</label>
                                                    <input name="totalAmount" id="totalAmount" readonly placeholder="" type="text" class="form-control">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <input type = "hidden" value = "<?php echo $_GET['editCurrency'];?>" id = "editCurrencyId"> 
                                        <?php 
                                            if( $_GET['editCurrency'] ){
                                        ?>
                                            <input type = "button" class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg pull-right" id = "updateBtn" value = "Update">
                                        <?php } else { ?>
                                        <input type = "button" class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg pull-right" id = "saveBtn" value = "Save">
                                        <?php } ?>
                                    
                                    
                                <table style="width: 100%;" id="" class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th> Sl No </th>
                                    <th>Currency Name</th>
                                    <th>Buy Rate</th>
                                    <th>No of Currency</th>
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
                       
                    </div>
                    
                    
                    
<script>
            
            function clear_all( )
            {
                $("#buyRate").val("") ;
                $("#noOfCurrency").val("") ;
                $("#totalAmount").val("") ;
               
            }
            
            function getBuyRate(currency_no)
            {
                $.ajax( { 
                    url: "ajax/savecurrency.php",
                    method:"post",
                    data: ({ "currency_no":currency_no }),
                    dataType:"html",
                    success: function ( Result )
                    {
                        $("#buyRate").val(Result) ;
                        Calculate() ;
                    }
                }) ;
            }
            
            function updateFunction( updateCurrency, buy_rate, no_of_currency, currency_no, id )
            {
                $.ajax( { 
                    url: "ajax/savecurrency.php",
                    method:"post",
                    data: ({ "updateCurrency":updateCurrency, "buy_rate":buy_rate, "no_of_currency": no_of_currency , "currency_no":currency_no, "id": id }),
                    dataType:"html",
                    success: function ( Result )
                    {
                        getTableData("TableData") ;
                        alert("Updated") ;
                        
                        clear_all() ;
                    }
                }) ;
            }
            
            function saveFunction( saveCurrency, buy_rate, no_of_currency , currency_no, totalAmount, currentBalance) 
            {
                $.ajax( { 
                    url: "ajax/savecurrency.php",
                    method:"post",
                    data: ({ "saveCurrency":saveCurrency, "buy_rate":buy_rate, "no_of_currency": no_of_currency , "currency_no":currency_no, "totalAmount":totalAmount, "currentBalance":currentBalance }),
                    dataType:"html",
                    success: function ( Result )
                    {
                        getTableData("TableData") ;
                        alert("Saved") ;
                        
                        clear_all() ;
                        getCurrentBalance("balance") ;
                    }
                }) ;
            }
            
            function getTableData(TableData) 
            {
                $.ajax( { 
                    url: "ajax/savecurrency.php",
                    method:"post",
                    data: ({"TableData":TableData}),
                    dataType:"html",
                    success: function ( Result )
                    {
                        $("#tableData").html(Result) ;
                    }
                }) ;
            }
            
            function deleteFunction( )
            {
                <?php if( $msg == "yes" )
                {?>
                   alert("Deleted") ;
                   <?php
                } else if( $msg == "no") { ?>
                    alert("Error while Deleting") ;
                    <?php } ?>
            }
            
            function Calculate(  )
            {
                var no = Number ( $("#noOfCurrency").val() ) ;
                var currency = Number ( $("#buyRate").val() ) ;
                var amount = no * currency ;
                var currentBalance = Number ( $("#currentBalance").val() ) ;
                if( amount <= currentBalance )
                {
                    $("#totalAmount").val( no * currency ) ;
                }
                else
                {
                    alert("Exceded Current Balance") ;
                    $("#noOfCurrency").val("") ;
                    $("#totalAmount").val("") ;
                }
                
            }
            
            function getCurrentBalance( balance )
            {
                 $.ajax( { 
                    url: "ajax/savecurrency.php",
                    method:"post",
                    data: ({"balance":balance}),
                    dataType:"html",
                    success: function ( Result )
                    {
                        console.log( Result ) ;
                        $("#currentBalance").val( Result ) ;
                        $("#currentBalancefixed").text(Result);
                    }
                }) ;
            }
            
            $(document).ready( function( ) { 
               
                getTableData("TableData") ;
                getBuyRate( $("#curreny_no option:selected").val()  ) ;
                getCurrentBalance("balance") ;
                deleteFunction() ;
                
                $("#noOfCurrency").on("keyup", function( ) {
                    Calculate() ;
                }) ;
                
                $("#curreny_no").on("change", function( ) {
                    var currency_no = $("#curreny_no option:selected").val() ;
                    getBuyRate(currency_no) ;
                }) ;
                
                
                
                $("#updateBtn").on( "click", function( ) { 
                    var buy_rate = $("#buyRate").val() ;
                    var no_of_currency = $("#noOfCurrency").val() ;
                    var currency_no = $("#curreny_no option:selected").val() ;
                    var id = $("#editCurrencyId").val() ;
                    updateFunction( "updateCurrency", buy_rate, no_of_currency, currency_no, id ) ;
                }) ;
             
                $("#saveBtn").on( "click", function( ) { 
                    var buy_rate = $("#buyRate").val() ;
                    var no_of_currency = $("#noOfCurrency").val() ;
                    var currency_no = $("#curreny_no option:selected").val() ;
                    saveFunction( "saveCurrency", buy_rate, no_of_currency, currency_no, $("#totalAmount").val(),  $("#currentBalance").val()  ) ;
                }) ;
                
            }) ;
        </script>
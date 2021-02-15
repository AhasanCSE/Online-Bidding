<?php  include("config/db_connection.php") ;?>

<?php
    $all_value = "" ;
    if( isset( $_GET['editShare'] ) ) 
    {
        $id = $_GET['editShare'] ;
        $query = "SELECT * FROM `currency_setups` WHERE `CURRENCY_SETUP_NO`= '$id'" ;
        
        $all_value = mysqli_fetch_assoc( mysqli_query ( $con , $query ) ) ;
        
    }

?>
<?php
    $msg = "" ;
    if( isset( $_GET['deleteShare'] ) ) 
    {
        $id = $_GET['deleteShare'] ;
        $query = "DELETE FROM currency_setups WHERE `CURRENCY_SETUP_NO` = '$id'" ;
        
        $all_value = mysqli_query ( $con , $query ) ;
        
        $msg = $all_value ? "yes":"no" ;
        
    }
?>
<link rel="stylesheet" href="sweetalert2.min.css">
<div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Currency Setup</h5>
                                    <form class="">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="currencyName" class="">Currency Name</label>
                                                    <input name="currencyName" id="currencyName" placeholder="" type="text" class="form-control" value="<?php echo $all_value['CURRENCY_NAME'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="currencyRate" class="">Currency Rate</label>
                                                    <input name="currencyRate" id="currencyRate" placeholder="" type="text" class="form-control" value="<?php echo $all_value['CURRENCY_RATE'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="buyRate" class="">Buy Rate</label>
                                                    <input name="buyRate" id="buyRate" placeholder="" type="number" class="form-control" value="<?php echo $all_value['BUY_RATE'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="saleRate" class="">Sale Rate</label>
                                                    <input name="saleRate" id="saleRate" placeholder="" type="text" class="form-control" value="<?php echo $all_value['SALE_RATE'];?>">
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="currencyImage" class="">Currency Image</label>
                                                    <input name="currencyImage" id="currencyImage" placeholder="" type="file" class="form-control">
                                                </div>
                                            </div>
                                            
                                            
                                             <div class="col-md-6">
                                            <div id="output"></div>
                                            </div>
                                            
                                            
                                        </div>
                                        
                                       <input type = "hidden" id = "editShareval" value = "<?php echo $_GET['editShare'];?>" >
                                        <?php 
                                            if( $_GET['editShare'] ) 
                                            {?>
                                                <input type = "button" class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg pull-right" id = "updateBtn" value = "Update" style="margin-bottom:10px;">
                                               <?php 
                                            }else{?>
                                            <input type = "button" class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg pull-right" id = "saveBtn" value = "Save" style="margin-bottom:10px;">
                                        <?php } ?>
                                    
                                    
                                    
                                    <table  id="" class="table table-hover table-striped table-bordered" style="width:100%; margin-top:20px;">
                                <thead>
                                <tr>
                                    <th> Sl No </th>
                                    <th>Currency Name</th>
                                     <th>Currency Rate</th>
                                     <th>Currency Image</th>
                                    <th>Buy Rate</th>
                                    <th>Sale Rate</th>
                                    
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id = "tableData" >
                                   
                                 
                                </tbody>
                                
                            </table>
                                    
                                    
                                    
                                    </form>
                                </div>
                            </div>
                           
                        </div>
                       
                    </div>
                    
                    
                    
        
        
        
        
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>      
        <script>
        
        var currencyImage="";
        
        const verifyImage= () =>{
          $("#output").html(
            "<b class='text-center'><img src='assets/images/ajax-loader.gif' alt='' /> In progress...</b>"
          );

  //check whether browser fully supports all File API
  if (window.File && window.FileReader && window.FileList && window.Blob) {
    if (!$("#currencyImage").val()) {
      //check empty input filed
      $("#output").html("Select image !!!!!!");
      return false;
    }

    var fsize = $("#currencyImage")[0].files[0].size; //get file size
    var ftype = $("#currencyImage")[0].files[0].type; // get file type

    //allow only valid image file types
    switch (ftype) {
      case "image/png":
      case "image/gif":
      case "image/jpeg":
      case "image/pjpeg":
        break;
      default:
        $("#output").html("<b>" + ftype + "</b>  Unsupported file type!!");
        return false;
    }

    //Allowed file size is less than 1 MB (1048576)
    if (fsize > 1048576) {
      $("#output").html(
        "Too big Image file! <br />Please reduce the size of your photo using an image editor."
      );
      return false;
    }

    convertTobase64(ftype);
  } else {
    //Output error to older unsupported browsers that doesn't support HTML5 File API
    $("#output").html(
      "Please upgrade your browser, because your current browser lacks some new features we need!!"
    );
    return false;
  }
}


const convertTobase64 = ftype => {
    
    
    
  var fileUpload = $("#currencyImage").get(0);
  var file = fileUpload.files;
  if (file.length > 0) {
    var fileToLoad = file[0];
    var fileReader = new FileReader();
    fileReader.onload = fileLoadedEvent => {
      currencyImage = fileLoadedEvent.target.result; // <--- data: base64
      var image = "<img src=" + currencyImage + ' width= "150px" height= "150px" />';
    $("#output").empty();
    $("#output").html(image);
      
      
    };
    fileReader.readAsDataURL(fileToLoad);
    
  }
}
            
            function clear_all( )
            {
                $("#currencyName").val("") ;
                $("#currencyRate").val("") ;
                $("#buyRate").val("") ;
                $("#saleRate").val("") ;
            }
            
            function updateFunction( updateShare, currency_name, currency_rate, buy_rate, sale_rate, id_number ) 
            {
                $.ajax( { 
                    url: "ajax/savecurrencySet.php",
                    method:"post",
                    data: ({ "updateShare":updateShare, "currency_name":currency_name, "currency_rate": currency_rate , "buy_rate":buy_rate,"sale_rate":sale_rate, "id_number":id_number }),
                    dataType:"html",
                    success: function ( Result )
                    {
                        Swal.fire({
                              position: 'top-middle',
                              icon: 'success',
                              title: 'Update Successfully',
                              showConfirmButton: false,
                              timer: 1500
                            })
                        getTableValue("TableData");
                        clear_all() ;
                    }
                }) ;
            }
            
            
            function saveFunction( saveCurrency,currency_name,currency_rate, buy_rate, sale_rate, currencyImage ) 
            {
                $.ajax( { 
                    url: "ajax/savecurrencySet.php",
                    method:"post",
                    data: ({ "saveCurrency":saveCurrency,"currency_name":currency_name,"currency_rate":currency_rate,"buy_rate":buy_rate,"sale_rate": sale_rate, "currencyImage":currencyImage}),
                    dataType:"html",
                    
                   //  $("#currencyImage").val()=(result);
                    success: function ( Result )
                    {
                        $("#currencyImage").val="";
                        $("#output").empty();
                        
                        Swal.fire({
                              position: 'top-middle',
                              icon: 'success',
                              title: 'Save Successfully',
                              showConfirmButton: false,
                              timer: 1500
                            })
                        
                        getTableValue("TableData");
                        clear_all() ;
                    }
                }) ;
            }
            
            function getTableValue( TableData )
            {
                $.ajax( { 
                    url: "ajax/savecurrencySet.php",
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
                        Swal.fire({
                              position: 'top-middle',
                              icon: 'success',
                              title: 'Deleted Successfully',
                              showConfirmButton: false,
                              timer: 1500
                            })
                        <?php
                    }
                    else if( $msg == "no")
                    {?>
                       Swal.fire({
                              position: 'top-middle',
                              icon: 'error',
                              title: 'Error ',
                              showConfirmButton: false,
                              timer: 1500
                            })
                       <?php 
                    }
                ?>
            }

            $(document).ready( function( ) { 
                
           
                
             
                getTableValue( "TableData" ) ;
                
                deleteFunction() ;
                
                $("#updateBtn").on( "click", function( ) { 
                    var currency_name = $("#currencyName").val() ;
                    var currency_rate = $("#currencyRate").val() ;
                    var buy_rate = $("#buyRate").val() ;
                    var sale_rate = $("#saleRate").val() ;
                    var id_number = $("#editShareval").val() ;
                    updateFunction("updateShare", currency_name, currency_rate, buy_rate,sale_rate,id_number) ;
                }) ;
                $("#currencyImage").on("change", function()
                {
                     verifyImage();
                     var image = "<img src=" + Result + ' width= "250px" height= "250px" />';
                    $("#output").empty();
                    $("#output").append(image);
                });
                
               $("#saveBtn").on( "click", function( ) { 
                     var currency_name = $("#currencyName").val() ;
                        var currency_rate = $("#currencyRate").val() ;
                        var buy_rate = $("#buyRate").val() ;
                        var sale_rate = $("#saleRate").val() ;
                        
                        saveFunction( "saveCurrency",currency_name,currency_rate, buy_rate, sale_rate, currencyImage) ;
                    

                    
                }) ;
                
            }) ;
        </script>
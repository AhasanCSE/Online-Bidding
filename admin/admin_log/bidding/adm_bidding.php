<?php include('config/db_connection.php'); ?>
   <?php 
   $msg="";
   $row="";
   if(isset($_GET['bidding_no']))
   {
       $BID_QUESTION_NO=$_GET['bidding_no'];
       
       $sql="SELECT  bid_questions.BID_QUESTION_NO,`BIDDING_TITLE`,`BIDDING_DESCRIPTION`,`BIDDING_DATE`,`START_TIME`,`END_TIME`,`MIN_RANGE`,`MAX_RANGE`,`BID_ANSWER_NO`,`ANSWER_TITLE`,
       `BID_RATIO` FROM `bid_questions` LEFT JOIN bid_answers ON bid_answers.`BID_QUESTION_NO`=bid_questions.BID_QUESTION_NO WHERE 
        bid_questions.BID_QUESTION_NO='$BID_QUESTION_NO'";
        
        $row=mysqli_fetch_assoc(mysqli_query($con,$sql));
        
       
   }

   ?>

<link rel="stylesheet" href="sweetalert2.min.css">
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
                                <span>Add<span class="text-success"> a new Bid</h4>
                            <div>
                                
                   
                                
                                
                                <form action="" method="post" id="formidreg">
                                     <label for="success" id="successmgsReg" class="col-form-label text-success pull-left" style="color:green;"></label>
                                     
                                    <div class="form-row">
                                       
                                       
                                <div class="col-md-6">
                                             
                                            <div class="position-relative form-group col-md-12">
                                                <label for="referenceCodeId" ><span class="text-danger"></span>Tittle</label><lable id="referenceCodeIdErrMgs" class="pull-right"></lable>
                                            <input name="title" id="title"  type="text"  class="form-control" value="<?=$row['BIDDING_TITLE']?>" >
                                            </div>
                                            
                                            <div class="position-relative form-group col-md-12"><label for="nameId" id=""><span class="text-danger"></span>Description</label><lable id="nameIdErrMgs" class="pull-right"></lable>
                                            <input name="description" id="description"  type="text" class="form-control"  value="<?=$row['BIDDING_DESCRIPTION']?>">
                                            </div>
                                            
                                            
                                            
                                            <div class="position-relative form-group col-md-12"><label for="dateOfBirthId" id=""><span class="text-danger"></span>Minimum Range</label><lable id="dateOfBirthIdErrMgs" class="pull-right"></lable>
                                            <input name="min_range" id="min_range"  type="number" class="form-control" value="<?=$row['MIN_RANGE']?>">
                                            </div>
                                            
                                            <div class="position-relative form-group col-md-12"><label for="dateOfBirthId" id=""><span class="text-danger"></span>Maximum Range</label><lable id="dateOfBirthIdErrMgs" class="pull-right"></lable>
                                            <input name="max_range" id="max_range"  type="number" class="form-control" value="<?=$row['MAX_RANGE']?>">
                                            </div>
                                            
                                </div>
                                        
                                        
                                <div class="col-md-6">
                                            
                                            <div class="position-relative form-group col-md-12"><label for="phoneId" id=""><span class="text-danger"></span>Date</label><lable id="phoneIdErrMgs" class="pull-right"></lable>
                                            <input name="input_date" id="date"  type="date" class="form-control" value="<?=$row['BIDDING_DATE']?>" >
                                            </div>
                                            <div class="position-relative form-group col-md-12"><label for="dateOfBirthId" id="dateOfBirthIdErrMgs"><span class="text-danger">*</span>Start Time</label><lable id="dateOfBirthIdErrMgs" class="pull-right"></lable>
                                            <input name="start_time" id="start_time"  type="time" class="form-control" value="<?=$row['START_TIME']?>">
                                            </div>
                                            <div class="position-relative form-group col-md-12"><label for="emailId" id="emailIdErrMgs"><span class="text-danger">*</span>End Time</label><lable id="emailIdErrMgs" class="pull-right"></lable>
                                            <input name="end_time" id="end_time"  type="time" class="form-control" value="<?=$row['END_TIME']?>">
                                            </div>
                                            
                                  <div class="col-md-12 position-relative row">
                                                
                                            <div class="col-md-5">
                                                 <div class="form-group"><label for="phoneId" id=""><span class="text-danger"></span>Answers</label><lable id="phoneIdErrMgs" class="pull-right"></lable>
                                                <input type="text" name="date" id="answer"   class="form-control" >
                                                <!--<textarea name="date" id="answer"   class="form-control" rows='1'></textarea>-->
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                 <div class=" form-group"><label for="ratioId" id=""><span class="text-danger"></span>Ratio</label><lable id="phoneIdErrMgs" class="pull-right"></lable>
                                                    <input type="text" name="ratio" id="ratio"   class="form-control">
                                                <!--<textarea name="date" id="answer"   class="form-control" rows='1'></textarea>-->
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                 <label for="phoneId" id=""><span class="text-danger"></span>Add</label>
                                   
                                                <button class=" btn btn-success" name="add_ans" type = "button" id="add_answer"><i class="fa fa-plus"></i></button>
                                                
                                            </div>
                                            
                                  </div>
      
                                            
                                    </div>
                                    
                                    </div>
                                    
          <div class="col-md-12  position-relative" id="answers_field">
                                             
                               
         </div>
                                    
                                    <input type = "hidden" id = "answer_hidden_field" name = "all_answer" value = ''>
                                    <input type="hidden" id="up_id" value="<?=$_GET['bidding_no']?>">
                                <?php
                                if(isset($_GET['bidding_no']))
                                {
                                    ?>
                                   
                                    <div class="mt-4 d-flex align-items-center">
                                        <div class="ml-auto">
                                            <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg" name="update" type = "button" id="updatebtn">Update</button>
                                        </div>
                                    </div>
                              
                                <?php
                                    
                                }
                                else
                                {
                                ?>
 
                                    <div class="mt-4 d-flex align-items-center">
                                        <div class="ml-auto">
                                            <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg" name="submit" type = "button" id="submitbtn">Submit</button>
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                                    
                                    
                                </form>
                            </div>
                <!--        </div>-->
                <!--    </div>-->
                 
<?php if(isset($_GET['delete_bidding_no']))
{
    
    $id=$_GET['delete_bidding_no'];
    $sql="UPDATE bid_questions SET IS_DELETED='1' WHERE BID_QUESTION_NO='$id'";
    $delResult=mysqli_query($con,$sql);
        if($delResult)
        {
                $msg="yes";
        }
        else
        {
            $msg="no";
        }
    
    
    $sql="UPDATE `bid_answers` SET IS_DELETED='1' WHERE BID_QUESTION_NO='$id'";
    mysqli_query($con,$sql);
}


?>
   
   
   
<table style="width: 100%; margin-top:20px;" id="" class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th> Title </th>
            <th> Description </th>
            <th>Date</th>
            <th> Start Time </th>
            <th>End Time</th>
            <th> Min Range </th>
            <th> Max Range </th>
            
            <th> Actions </th>
        </tr>
    </thead>
        <tbody>
                  
            <?php
                $sql = "SELECT * FROM bid_questions WHERE IS_DELETED='0' ORDER BY BID_QUESTION_NO DESC";
                $result = mysqli_query ( $con , $sql ) ;
                
                foreach ( $result as $value )
                {
                    echo "<tr>";
                        
                        echo "<td>".$value['BIDDING_TITLE']."</td>" ;
                        echo "<td>".$value['BIDDING_DESCRIPTION']."</td>" ;
                        echo "<td>".$value['BIDDING_DATE']."</td>" ;
                        echo "<td>".$value['START_TIME']."</td>" ;
                        echo "<td>".$value['END_TIME']."</td>" ;
                        echo "<td>".$value['MIN_RANGE']."</td>" ;
                        echo "<td>".$value['MAX_RANGE']."</td>" ;
                        
                    ?>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="index.php?pagex=adm_bidding_answer&&root=bidding&&bidding_no=<?php echo $value['BID_QUESTION_NO']?>" target="_blank" data-toggle="tooltip" title="Answer" class="btn btn-success" data-original-title="Edit">Answer <i class="fa fa-check-circle"></i></a>
                            <a href="index.php?pagex=adm_bidding&&root=bidding&&bidding_no=<?php echo $value['BID_QUESTION_NO']?>" target="_blank" data-toggle="tooltip" title="Edit" class="btn btn-info" data-original-title="Edit">Edit <i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('Are you Sure Want to Delete?');" href="index.php?pagex=adm_bidding&&root=bidding&&delete_bidding_no=<?php echo $value['BID_QUESTION_NO']?>"data-toggle="tooltip" title="Delete" class="btn btn-danger" data-original-title="Delete">Delete<i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                    
                    <?php
                    echo "</tr>" ;
                }
            ?>                  
                            
        </tbody>
                                
</table>


                 </div>
            </div>
        </div>
        
        
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>


function yes()
{
                  Swal.fire({
                  position: 'top-middle',
                  icon: 'success',
                  title: 'Successfully Done',
                  showConfirmButton: false,
                  timer: 1500
                  })
         <?php $msg=""; ?>         
    
}
function no()
{
    
                  Swal.fire({
                  position: 'top-middle',
                  icon: 'error',
                  title: 'Operation failed',
                  showConfirmButton: false,
                  timer: 1500
                  })
                   <?php $msg=""; ?>   
}

    var data=[];
    var ratio = [] ;
    
    function clearAll( )
    {
        $("#title").val("") ;
        $("#description").val("") ;
        $("#max_range").val("") ;
        $("#min_range").val("") ;
        $("#date").val("") ;
        $("#start_time").val("") ;
        $("#end_time").val("") ;
        data = [];
        ratio=[];
        printAnswers(data, ratio) ;
    }
    
    function printAnswers(data , ratio )
    {
        var html="";
        var answers = "" ;
        for(var i=0; i<data.length; i++){
            
       // html+='<div class="col-md-5 position-relative "></br><textarea name="NAI" id="answer"class="form-control" rows="1" disabled>'+data[i]+'</textarea></div> <div class="col-md-5 position-relative "></br><textarea name="NAI" id="answer"  class="form-control" rows="1" disabled>'+ratio[i]+'</textarea></div><div class="col-md-2 position-relative "><button class="btn btn-danger deletebtn" row="'+i+'" name="add_ans" type = "button" id="add_ans"><i class="fa fa-trash "></i></button></div>'
            html+='<div class="row"><div class="col-md-5 position-relative"><input name="NAI" id="answer"class="form-control" rows="1" disabled value="'+data[i]+'"></div><div class="col-md-5 position-relative "><input name="NAI" id="answer"  class="form-control" rows="1" disabled value="'+ratio[i]+'"></div><div class="col-md-2 position-relative"><button class="btn btn-danger deletebtn" row="'+i+'" name="add_ans" type = "button" id="add_ans"><i class="fa fa-trash "></i></button></br></div><div class="col-md-12"></br></div></div>'
              answers += data[i] + ",";    
            
        }
        $("#answers_field").html(html);
    }
    
    function saveFunction( save, title, description, max_range, min_range, date, start_time, end_time, data, ratio )
    {
        $.ajax( { 
            
            url: "ajax/adm_post.php",
            method: "post",
            data: ( { "save":save, "title":title, "description":description, "max_range":max_range , "min_range":min_range, "date":date, 
            "start_time":start_time, "end_time":end_time, "data":data.toString(), "ratio":ratio.toString() }),
            dataType: "html",
            success: function( result )
            {
                if( result == 1 )
                {
                    Swal.fire({
                  position: 'top-middle',
                  icon: 'success',
                  title: 'Saved Successfully',
                  showConfirmButton: false,
                  timer: 1500
                })
                    clearAll() ;
                    // $("#success").text( "Saved Successfully" ) ;
                }
            }
        }) ;
    }
    function updateFunction(update, title, description, max_range, min_range, date, start_time, end_time, data, ratio,id)
    {
        $.ajax({
            url: "ajax/adm_post.php",
            method: "post",
            data:({ "update":update, "title":title, "description":description, "max_range":max_range, "min_range":min_range, "date":date, "start_time":start_time,
            "end_time":end_time, "data":data, "ratio":ratio,"id":id }),
            dataType: "html",
            success: function(result)
            {
               console.log(result);
                if(result[0]==1)
                {
                  yes();
                  
                  
                }
                else
                { 
                    no();
                }
                 clearAll() ;
            }
        });  
    }
    
    function getAllanswer( id )
    {
        $.ajax({ 
            url: "ajax/adm_post.php",
            method:"post",
            data:({"id":id}),
            dataType:"html",
            success: function ( Result )
            {
                var all = JSON.parse( Result );
                for( var i = 0 ; i < all[0].length ; i ++ )
                {
                    data.push(all[0][i]) ;
                    ratio.push( all[1][i] ) ;
                }
                printAnswers( data, ratio ) ;
            }
        }) ;
    }
    
    $( document ).ready( function( ) { 
        
        <?php
      if($msg=="yes"){ 
         ?>
              yes();
        <?php }
     if($msg=="no"){ 
         ?>
              no();
        <?php }
        ?>
        
        
        $("#add_answer").click(function()
        {
            var ratio12 = $("#ratio").val() ;
            $("#ratio").val("") ;
            ratio.push( ratio12 ) ;
            data.push($("#answer").val());
            $("#answer").val("");
            printAnswers(data, ratio );
            
        }) ;

        $("#submitbtn").on( "click", function( ) { 
            
            var title = $("#title").val() ;
            var description = $("#description").val() ;
            var max_range = $("#max_range").val() ;
            var min_range = $("#min_range").val() ;
            var date = $("#date").val() ;
            var start_time = $("#start_time").val() ;
            var end_time = $("#end_time").val() ;
           
            saveFunction( "save", title, description, max_range, min_range, date, start_time, end_time, data, ratio ) ;
        }) ;
        
        if( $("#up_id").val() != "" ) { 
            //console.log("here button") ;
            getAllanswer( $("#up_id").val() ) ;
        }
        
        $("#updatebtn").on( "click", function( ) { 
            
            var title = $("#title").val() ;
            var description = $("#description").val() ;
            var max_range = $("#max_range").val() ;
            var min_range = $("#min_range").val() ;
            var date = $("#date").val() ;
            var start_time = $("#start_time").val() ;
            var end_time = $("#end_time").val() ;
            var id=$("#up_id").val();
            //console.log( "here") ;
            updateFunction( "update", title, description, max_range, min_range, date, start_time, end_time, data, ratio,id ) ;
            
        }) ;
        
    }) ;
    
    $(document).on("click", ".deletebtn", function()
    {
        var id=$(this).attr("row");
        data.splice(id, 1);
        ratio.splice( id , 1 ) ;
        console.log( data ) ;
        console.log( ratio ) ;
        printAnswers(data, ratio);
    });
    			            
</script>

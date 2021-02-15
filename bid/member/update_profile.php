 <?php
    include("config/db_connection.php");
    $tbl_name="user_registrations";
    $user_no = 1;        //$_SESSION['user']['USER_NO'];
    $CURR_TIME = date('Y-m-d :H:i:s'); 
        $mgs = '';
   
  if(isset($_POST['update']))
    {
           
            $name=$_POST['name'];
            $picture=$_FILES["picture"]["name"];
            $phone=$_POST['phone'];
            $address=$_POST['address'];
            $profession=$_POST['profession'];
            $id = $_GET['edit'];
            
            
            
             
          
                if( $picture == "")
                {
                   
                  $sql = "UPDATE $tbl_name SET USER_NAME  ='$name' , USER_PHONE_NUMBER = '$phone' , USER_ADDRESS ='$address',USER_PROFESSION  = '$profession' WHERE USER_REGISTRATION_NO = '$id'"; 
                }
                else
                {
                  $sql = "UPDATE $tbl_name SET USER_NAME  ='$name' , USER_PHONE_NUMBER = '$phone' , USER_IMAGE='$picture',USER_ADDRESS ='$address',USER_PROFESSION  = '$profession' WHERE USER_REGISTRATION_NO = '$id'";
                  move_uploaded_file($_FILES['picture']['tmp_name'],"member/upload/". $picture);
                 
                }
                
                $result = mysqli_query($con,$sql);
                
                // print_r($result);
                
                if($result)
                {
                    echo "Successfull ";
                    //$mgs="success";

                }
                else
                {
                    echo "failed";
                    //$mgs = "fail";
           
                }
    }
          
         
    
?>
<?php

 
  
  $id=$_GET['edit'];
  $sql="SELECT *FROM user_registrations WHERE USER_REGISTRATION_NO='$id'";
 // echo $sql;
  $result=mysqli_fetch_array(mysqli_query($con,$sql));
 // print_r($result) ;
  
?>
<div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Update Profile</h5>
                                    <form method="post" action="" enctype="multipart/form-data">
                                      <div class="form-row">
                                         <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="nameId" id="">Name</label>
                                                <input name="name" id="nameId"  type="text" class="form-control" value="<?=$result['USER_NAME']?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="phoneId" id="">Phone</label>
                                                <input name="phone" id="phoneId"  type="text" class="form-control" value="<?=$result['USER_PHONE_NUMBER']?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="address" id="">Address</label>
                                                <input name="address" id="address"  type="text" class="form-control" value="<?=$result['USER_ADDRESS']?>">
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="" id="Profession">Profession </label>
                                                <input name="profession" id="profession"  type="text" class="form-control" value="<?=$result['USER_PROFESSION']?>">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                
                                                <div class="position-relative form-group"><label for="" id="Picture">Picture </label>
                                                 
                                                   
                                                  <input name="picture" id="picture"  type="file" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                               <img src="member/upload/<?=$result['USER_IMAGE']?>" onerror="this.src='member/upload/blank.jpg'" altr="no image" style= "height:80px; width:100px;"/>
                                                </div>
                                            </div>
                                            
                                           
                                        </div>
                                                <input type="submit" class="mt-2 btn btn-primary" name="update" value="Update" />                    
                                                                   
                                         </form>
         
                                </div>
                            </div>
                           
                        </div>
                       
                    </div>























<!--for form use-->



<!--<div class="tab-content">-->
<!--                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">-->
<!--                            <div class="main-card mb-3 card">-->
<!--                                <div class="card-body"><h5 class="card-title">Update Profile</h5>-->
<!--                                    <form class="">-->
<!--                                        <div class="form-row">-->
<!--                                            <div class="col-md-6">-->
<!--                                                <div class="position-relative form-group">-->
<!--                                                    <label for="exampleEmail11" class="">Email</label>-->
<!--                                                    <input name="email" id="exampleEmail11" placeholder="with a placeholder" type="email" class="form-control">-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col-md-6">-->
<!--                                                <div class="position-relative form-group">-->
<!--                                                    <label for="examplePassword11" class="">Password</label>-->
<!--                                                    <input name="password" id="examplePassword11" placeholder="password placeholder" type="password" class="form-control">-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col-md-6">-->
<!--                                                <div class="position-relative form-group">-->
<!--                                                    <label for="examplePassword11" class="">Password</label>-->
<!--                                                    <input name="password" id="examplePassword11" placeholder="password placeholder" type="password" class="form-control">-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col-md-6">-->
<!--                                                <div class="position-relative form-group">-->
<!--                                                    <label for="examplePassword11" class="">Password</label>-->
<!--                                                    <input name="password" id="examplePassword11" placeholder="password placeholder" type="password" class="form-control">-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col-md-6">-->
<!--                                                <div class="position-relative form-group">-->
<!--                                                    <label for="examplePassword11" class="">Password</label>-->
<!--                                                    <input name="password" id="examplePassword11" placeholder="password placeholder" type="password" class="form-control">-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                        
<!--                                        <input type="button" class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg pull-right" id="saveBtn" value="Save">-->
<!--                                    </form>-->
<!--                                </div>-->
<!--                            </div>-->
                           
<!--                        </div>-->
                       
<!--                    </div>-->
         
         
         
         
         
         
         
         
         
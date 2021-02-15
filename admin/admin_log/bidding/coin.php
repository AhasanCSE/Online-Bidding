<?php include('config/db_connection.php'); ?>


<div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
                  <div class="row"> 
                           <div class="col-md-5"> 
                              <h4><div>Welcome</div> <span>to <span class="text-success">Generate Coin</h4>
                           </div>
                           
                           <div class="col-md-5"> 
                              <h3><div>Current </div> <span>Coin <span class="text-danger">$500</h3>
                           </div>
                    </div>            
                                
                        </br></br>
                            <div>
                                
                                
                                
                                <form action="" method="post" id="formidreg">
                                     <div class="col-md-10">
                                             
                                            <div class="position-relative form-group col-md-5">
                                                <label for="referenceCodeId" ><span class="text-danger"></span>Coin Name</label><lable id="referenceCodeIdErrMgs" class="pull-right"></lable>
                                                 <input name="name" id="title"  type="text"  class="form-control">
                                            </div>
                                            
                                            <div class="position-relative form-group col-md-5">
                                                <label for="referenceCodeId" ><span class="text-danger"></span>Total</label><lable id="referenceCodeIdErrMgs" class="pull-right"></lable>
                                                 <input name="total_coin" id="title"  type="number"  class="form-control">
                                            </div>
                                
                                            
                                       </div>

                                    <div class="mt-4 d-flex align-items-center">
                                        <div class="ml-auto">
                                            <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg" name="submit" type = "submit" id="aubmit">Add Coin</button>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
       
                </div>
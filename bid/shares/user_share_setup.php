<?php  include ( "config/db_connection.php") ;?>

                <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">All Share</h5>
                                    <table  id="" class="table table-hover table-striped table-bordered" style="width:100%; margin-top:20px;">
                                <thead>
                                <tr>
                                    <th> Sl No </th>
                                    <th>NO OF SHARES</th>
                                     <th>UNIT RATE</th>
                                    <th>SHARES OF LOT</th>
                                    <th>LOT RATE</th>
                                    
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id = "tableData" >
                                <?php
                                   include ( "config/db_connection.php") ;
                                    $query = "SELECT * FROM `share_setups` ORDER BY SHARE_SETUP_NO DESC LIMIT 50" ;
                                     $result = mysqli_query( $con , $query ) ;
                                    $count = 1 ;
                                    foreach( $result as $value )
                                    {
                                       
                                        echo "<tr>" ;
                                        echo "<td>".$count ++."</td>" ; 
                                        echo "<td>".$value['NO_OF_SHARES']."</td>" ;
                                         echo "<td>".$value['UNIT_RATE']."</td>" ;
                                        echo "<td>".$value['NO_OF_LOT']."</td>" ; 
                                       
                                        echo "<td>".$value['LOT_RATE']."</td>" ;
                                        echo "<td>";
                                                                            
                                        echo "<a class = 'btn btn-success' href='?pagex=user_buy_share&&root=shares&&buyShare=".$value['SHARE_SETUP_NO']."'>Buy</a>" ;
                                        
                                                                          
                                        echo "</td>" ;
                                        echo "</tr>" ;  
                                    }
                                                    
                                                      ?>       
                                </tbody>
                                
                            </table>
                                </div>
                            </div>
                           
                        </div>
                       
                    </div>
                    
                    



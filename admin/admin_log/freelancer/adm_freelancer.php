<?php include ('config/db_connection.php');?>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

                        
			
					   <div class="col-xs-12">
										
										<div class="table-header">
											<h5>Personal Information</h5>
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
											    <div class="row">
											        <div class="col-md-6">
											            <div class="dataTables_length" id="dynamic-table_length">
											                <label>Display <select name="dynamic-table_length" aria-controls="dynamic-table" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option>
											                </select> records</label>
											            </div>
											       </div>
											                <div class="col-md-6 "  >
											                    <div id="dynamic-table_filter" class="dataTables_filter ">
											                        <label >Search:<input type="text" name="search" id="search" class="form-control input-sm pull-right" placeholder="" aria-controls="dynamic-table"></label>
											                     </div>
											                </div>
											      </div>
											    
											    <table id="dynamic_table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
												<thead>
													<tr role="row"><th class="center sorting_disabled" rowspan="1" colspan="1" aria-label="">S.L</th>
													    <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Name</th>
														<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Email</th>
														<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Phone Number</th>
														<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Profession</th>
														 <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Age</th>
														<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Id Number</th>
													
												<!--	<th class="hidden-480 sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Clicks: activate to sort column ascending">Action</th>  -->
														</tr>
												</thead>

												<tbody>
												    <?php
												    $sql = "SELECT  * FROM personal_documents";
												    $query = mysqli_query($con,$sql);
												    $i=1;
												    foreach($query as $row){
												        echo "<tr>";
												        echo "<td>".$i."</td>";
												        echo "<td>".$row['NAME']."</td>";
	                                                    echo "<td>".$row['EMAIL']."</td>";
												        echo "<td>".$row['PHONE']."</td>";
												        echo "<td>".$row['PROFESSION']."</td>";
                                                        echo "<td>".$row['AGE']."</td>";
                        						        echo "<td>".$row['ID_NUMBER']."</td>";
												       // echo "<td><div class='hidden-sm hidden-xs btn-group'><a class='btn btn-xs btn-info' href='adm_freelancer.php?edit=".$row['PERSONAL_DOCUMENT_NO']."'><i class='ace-icon fa fa-pencil bigger-120'></i></a><a class='btn btn-xs btn-danger' href='adm_freelancer.php?delete=".$row['PERSONAL_DOCUMENT_NO']."'><i class='ace-icon fa fa-trash-o bigger-120'></i></a></div></td>";
												        echo "</tr>";
												        $i++;
												    }
												    ?>
												</tbody>
											</table><div class="row"><div class="col-xs-6"><div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">Showing 1 to 10 of <?php echo $i-1;?></div></div><div class="col-xs-6"><div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate"><ul class="pagination"><li class="paginate_button previous disabled" aria-controls="dynamic-table" tabindex="0" id="dynamic-table_previous"><a href="#">Previous</a></li><li class="paginate_button active" aria-controls="dynamic-table" tabindex="0"><a href="#">1</a></li><li class="paginate_button " aria-controls="dynamic-table" tabindex="0"><a href="#">2</a></li><li class="paginate_button " aria-controls="dynamic-table" tabindex="0"><a href="#">3</a></li><li class="paginate_button next" aria-controls="dynamic-table" tabindex="0" id="dynamic-table_next"><a href="#">Next</a></li></ul></div></div></div></div>
										</div>
									</div>

<script>
    $("#search").on("keyup",function(){
        
        var values=$(this).val();
        
        $("#dynamic_table tr").each(function(){
            
            var id=$(this).find("td").text();
                if(id.indexOf(values)!==0 && id.toLowerCase().indexOf(values.toLowerCase())<=0)
                {
                    $(this).hide();
                }
                else{
                    $(this).show();
                }
            
        });
        
    });
    
</script>

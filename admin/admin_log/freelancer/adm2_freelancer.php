<?php include ('config/db_connection.php');?>

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Company Information</h5>
                <table id = "table_data" class="table table-hover table-striped table-bordered" style = "width:100%;">
	                <thead>
                		<tr>
                			<th>#</th>
                			<th>COMPANY NAME</th>
                			<th>COMPANY'S EMAIL</th>
                			<th>COMPANY's PHONE NO</th>
                			<th>TYPE OF COMPANY</th>
                			<th>PERSON TO CONTACT</th>
                			<th>ADDRESS OF COMPANY</th>
                			<th>COMPANY'S WEB LINK</th>
                			<th>COMPANY'S FACEBOOK LINK</th>
                		</tr>
	                </thead>
	                <tbody id='recordList'>
<?php
        	            $sql = "select * from company_documents ";
        	            $fixed = 1;
        	       
        	            $res = mysqli_query($con, $sql);
                        foreach( $res as $value )
                        {
                            echo "<tr>" ;
                            echo "<td>".$fixed++."</td>";
                            echo "<td>".$value['COMPANY_NAME']."</td>";
                            echo "<td>".$value['COMPANY_EMAIL']."</td>";
                            echo "<td>".$value['COMPANY_PHONE']."</td>";
                            echo "<td>".$value['COMPANY_TYPE']."</td>";
                            echo "<td>".$value['CONTACT_PERSON']."</td>";
                            echo "<td>".$value['COMPANY_ADDRESS']."</td>";
                            echo "<td>".$value['COMPANY_WEB_LINK']."</td>";
                            echo "<td>".$value['COMPANY_FB_LINK']."</td>";
                            ?>
<?php
                            echo "</tr>";
                        }
?>
	                </tbody>
</table>

                                </div>
                            </div>
                           
    </div>
</div>
         
<!--Input in a table-->


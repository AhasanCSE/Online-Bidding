<?php include ('config/db_connection.php');?>

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Personal Information</h5>
                <table id = "table_data" class="table table-hover table-striped table-bordered" style = "width:100%;">
	                <thead>
                		<tr>
                			<th>#</th>
                			<th>Name</th>
                			<th>Email</th>
                			<th>Age</th>
                			<th>Profession</th>
                			<th>Mobile</th>
                			<th>NID/Passport</th>
                		</tr>
	                </thead>
	                <tbody id='recordList'>
<?php
        	            $sql = "select * from personal_documents ";
        	            $fixed = 1;
        	       
        	            $res = mysqli_query($con, $sql);
                        foreach( $res as $value )
                        {
                            echo "<tr>" ;
                            echo "<td>".$fixed++."</td>";
                            echo "<td>".$value['NAME']."</td>";
                            echo "<td>".$value['EMAIL']."</td>";
                            echo "<td>".$value['PHONE']."</td>";
                            echo "<td>".$value['PROFESSION']."</td>";
                            echo "<td>".$value['AGE']."</td>";
                            echo "<td>".$value['ID_NUMBER']."</td>";
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


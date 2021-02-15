<?php session_start() ;?>
<?php include ( "config/db_connection.php") ;?>

<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">My Shares</h5>
				<form>
					<table style="width: 100%;" id="" class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
							    <th>Sl No</th>
								<th>Share Rate</th>
								<th>Total Lot</th>
								<th> Lot Rate </th>
								<th> Total Cost</th>
								
							</tr>
						</thead>
						<tbody>
						    <?php
						        $user = $_SESSION['user']['USER_REGISTRATION_NO'];
						        $query = "SELECT shares.`NO_OF_SHARES`, shares.NO_OF_LOT, shares.`UNIT_RATE`, shares.`LOT_RATE`, shares.`TOTAL_VALUE`FROM shares LEFT JOIN share_setups ON shares.SHARE_SETUP_NO = share_setups.SHARE_SETUP_NO WHERE `USER_REGISTRATION_NO` = '$user' ";
						        
						        $result = mysqli_query( $con , $query ) ;
						        $count = 1 ;
						        foreach( $result as $value )
						        {
						            echo "<tr>" ;
						                    
						                   echo "<td>".$count ++ ."</td>" ;
						                  
						                   echo "<td>".$value['UNIT_RATE']."</td>" ;
						                   echo "<td>".$value['NO_OF_LOT']."</td>" ;
						                   echo "<td>".$value['LOT_RATE']."</td>" ;
						                   echo "<td>".$value['TOTAL_VALUE']."</td>" ;
						                
						            echo "</tr>" ;
						        }
						    
						    ?>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
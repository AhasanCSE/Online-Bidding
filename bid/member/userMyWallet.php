<?php session_start() ;?>
<?php include ( "config/db_connection.php") ;?>

<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">My Wallet</h5>
				<form>
				    <h5 class="card-title" style = "color:red">Current Dividend Balance: <span id = "dividendBalance"></span> </h5>
					<table style="width: 100%;" id="" class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
							    <th>Sl No</th>
							    <th>Date</th>
							    <th>Remarks</th>
								<th>Interest Amount</th>
								<th>Dividend Value </th>
						
							</tr>
						</thead>
						<tbody>
						    <?php 
						        $count = 1 ;
						        $dividendValue = 0 ;
						        $user_no = $_SESSION['user']['USER_REGISTRATION_NO'] ;
						        $query = "SELECT share_debiten_process.`CREATED_ON`,`DEBITEN_AMOUNT`, share_debitens.`DEBITEN_VALUE`, share_debitens.`REMARK` 
						        FROM share_debiten_process LEFT JOIN share_debitens ON share_debitens.SHARE_DEBITEN_NO = 
						        share_debiten_process.SHARE_DEBITEN_NO WHERE `USER_REGISTRATION_NO`= '$user_no' ";
						        
						        $result = mysqli_query( $con , $query ) ;
						        foreach( $result as $value )
						        {
						            echo "<tr>" ;
						            
						                echo "<td>".$count++."</td>" ;
						                echo "<td>".$value['CREATED_ON']."</td>" ;
						                echo "<td>".$value['REMARK']."</td>" ;
						                echo "<td>".$value['DEBITEN_AMOUNT']."</td>" ;
						                echo "<td>".$value['DEBITEN_VALUE']."</td>" ;
						                $dividendValue += $value['DEBITEN_AMOUNT'];
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
<input type = "hidden" value = '<?php echo $dividendValue;?>' id = "value">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
    
    $(document).ready(function( ) { 
        var value = $("#value").val() ;
        $("#dividendBalance").text(value) ;
    }) ;

</script>
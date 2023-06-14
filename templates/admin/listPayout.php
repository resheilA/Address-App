<?php include "templates/include/header.php" ?>
			
			<br>
			<div class="row">
				<div class="col-lg-8">
					  <h1><?php echo convertlang("Main|All Payout|objname"); ?></h1>
				</div>
				<div class="col-lg-4">
					<a href="admin.php?action=newPayout">
						<button class="btn-primary">
							<?php echo convertlang("Main|AddaNew|objname"); ?>
						</button>
					</a>	
				</div>	
			</div>
		
	<?php if ( isset( $results['errorMessage'] ) ) { ?>
			<div class="alert-danger p-3"><?php echo convertlang($results['errorMessage']); ?></div>
	<?php } ?>


	<?php if ( isset( $results['statusMessage'] ) ) { ?>
			<div class="alert-success p-3"><?php echo convertlang($results['statusMessage']); ?></div>
	<?php } ?>
		<div class="table-responsive">
		   <table class="table">
		        <thead>                               
             <tr>
			  <th><?php echo convertlang("Payout|mhead_Payoutrider"); ?></th><th><?php echo convertlang("Payout|mhead_Payoutamt"); ?></th><th><?php echo convertlang("Payout|mhead_Payoutaddedon"); ?></th><th><?php echo convertlang("Payout|mhead_Payoutstatus"); ?></th>
			</tr>
			</thead>
			<tbody>
	<?php foreach ( $results['Payout'] as $Payout ) { 
			echo '
			<tr>
			    <td>'.Riders::getByRidercode( $Payout->payoutrider)->ridername.'</td><td><a href=\'admin.php?action=viewPayout&amp;id='.$Payout->id.'\'>'.$Payout->payoutamt.'</a></td><td><a href=\'admin.php?action=viewPayout&amp;id='.$Payout->id.'\'>'.$Payout->payoutaddedon.'</a></td><td>'.Paymentmode::getById( $Payout->payoutstatus)->paymentmodename.'</td>
			   <td><a href=\'admin.php?action=editPayout&amp;PayoutId='.$Payout->id.'\'"><button class="btn-primary">'.convertlang("Main|Edit").'</button></a></td>
			   <td><a onclick="return confirm(\''.convertlang("Main|Delete Payout|objname").'?\')" href=\'admin.php?action=deletePayout&amp;PayoutId='.$Payout->id.'\'"><button class="btn-danger">'.convertlang("Main|Delete").'</button></a></td>
			</tr>';	
		}	
	?>
			
			</tbody>
		  </table>
		</div>
		  <p><?php echo convertlang("Main|Total")." : "; ?><?php echo $results['totalRows']?> <?php echo convertlang("Payout|objname"); ?> </p>

		  <p><a href="admin.php?action=newPayout"><?php echo convertlang("Main|AddaNew Payout|objname"); ?></a></p>
			
			<?php
					
					if(!isset($_GET['pageno']))
					{
						$_GET['pageno'] = 1;
					}	
					
						$totalpage = ceil($results['totalRows']/20);
						$cpage = $_GET['pageno'] + 1;
						$ppage = $_GET['pageno'] - 1;
						
						if(($ppage >= 1))
						{
							echo '&nbsp <a href="?action=listPayout&pageno='. $ppage .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=listPayout&pageno='.$cpage.'">Next</a>'; 
						}
						
						
						
			?>
				
		<?php include "templates/include/footer.php" ?>
			
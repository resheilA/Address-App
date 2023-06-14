<?php include "templates/include/header.php" ?>
			
			<br>
			<div class="row">
				<div class="col-lg-8">
					  <h1><?php echo convertlang("Main|All Paymentmode|objname"); ?></h1>
				</div>
				<div class="col-lg-4">
					<a href="admin.php?action=newPaymentmode">
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
			  <th><?php echo convertlang("Paymentmode|mhead_Paymentmodename"); ?></th>
			</tr>
			</thead>
			<tbody>
	<?php foreach ( $results['Paymentmode'] as $Paymentmode ) { 
			echo '
			<tr>
			    <td><a href=\'admin.php?action=viewPaymentmode&amp;id='.$Paymentmode->id.'\'>'.$Paymentmode->paymentmodename.'</a></td>
			   <td><a href=\'admin.php?action=editPaymentmode&amp;PaymentmodeId='.$Paymentmode->id.'\'"><button class="btn-primary">'.convertlang("Main|Edit").'</button></a></td>
			   <td><a onclick="return confirm(\''.convertlang("Main|Delete Paymentmode|objname").'?\')" href=\'admin.php?action=deletePaymentmode&amp;PaymentmodeId='.$Paymentmode->id.'\'"><button class="btn-danger">'.convertlang("Main|Delete").'</button></a></td>
			</tr>';	
		}	
	?>
			
			</tbody>
		  </table>
		</div>
		  <p><?php echo convertlang("Main|Total")." : "; ?><?php echo $results['totalRows']?> <?php echo convertlang("Paymentmode|objname"); ?> </p>

		  <p><a href="admin.php?action=newPaymentmode"><?php echo convertlang("Main|AddaNew Paymentmode|objname"); ?></a></p>
			
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
							echo '&nbsp <a href="?action=listPaymentmode&pageno='. $ppage .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=listPaymentmode&pageno='.$cpage.'">Next</a>'; 
						}
						
						
						
			?>
				
		<?php include "templates/include/footer.php" ?>
			
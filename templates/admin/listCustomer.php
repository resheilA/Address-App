<?php include "templates/include/header.php" ?>
			
			<br>
			<div class="row">
				<div class="col-lg-8">
					  <h1><?php echo convertlang("Main|All Customer|objname"); ?></h1>
				</div>
				<div class="col-lg-4">
					<a href="admin.php?action=newCustomer">
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
			  <th><?php echo convertlang("Customer|mhead_Customername"); ?></th><th><?php echo convertlang("Customer|mhead_Customercontactnumber"); ?></th><th><?php echo convertlang("Customer|mhead_Assigned_to"); ?></th>
			</tr>
			</thead>
			<tbody>
	<?php foreach ( $results['Customer'] as $Customer ) { 
			echo '
			<tr>
			    <td><a href=\'admin.php?action=viewCustomer&amp;id='.$Customer->id.'\'>'.$Customer->customername.'</a></td><td><a href=\'admin.php?action=viewCustomer&amp;id='.$Customer->id.'\'>'.$Customer->customercontactnumber.'</a></td><td>'.Riders::getByRidercode( $Customer->assigned_to)->ridername.'</td>
			   <td><a href=\'admin.php?action=editCustomer&amp;CustomerId='.$Customer->id.'\'"><button class="btn-primary">'.convertlang("Main|Edit").'</button></a></td>
			   <td><a onclick="return confirm(\''.convertlang("Main|Delete Customer|objname").'?\')" href=\'admin.php?action=deleteCustomer&amp;CustomerId='.$Customer->id.'\'"><button class="btn-danger">'.convertlang("Main|Delete").'</button></a></td>
			</tr>';	
		}	
	?>
			
			</tbody>
		  </table>
		</div>
		  <p><?php echo convertlang("Main|Total")." : "; ?><?php echo $results['totalRows']?> <?php echo convertlang("Customer|objname"); ?> </p>

		  <p><a href="admin.php?action=newCustomer"><?php echo convertlang("Main|AddaNew Customer|objname"); ?></a></p>
			
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
							echo '&nbsp <a href="?action=listCustomer&pageno='. $ppage .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=listCustomer&pageno='.$cpage.'">Next</a>'; 
						}
						
						
						
			?>
				
		<?php include "templates/include/footer.php" ?>
			
<?php include "templates/include/header.php" ?>
			
			<br>
			<div class="row">
				<div class="col-lg-8">
					  <h1><?php echo convertlang("Main|All Property|objname"); ?></h1>
				</div>
				<div class="col-lg-4">
					<a href="admin.php?action=newProperty">
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
			  <th><?php echo convertlang("Property|mhead_Ownername"); ?></th><th><?php echo convertlang("Property|mhead_Ownercontactnumber"); ?></th><th><?php echo convertlang("Property|mhead_Assigned_to"); ?></th>
			</tr>
			</thead>
			<tbody>
	<?php foreach ( $results['Property'] as $Property ) { 
			echo '
			<tr>
			    <td><a href=\'admin.php?action=viewProperty&amp;id='.$Property->id.'\'>'.$Property->ownername.'</a></td><td><a href=\'admin.php?action=viewProperty&amp;id='.$Property->id.'\'>'.$Property->ownercontactnumber.'</a></td><td>'.Riders::getById( (int)$Property->assigned_to)->ridername.'</td>
			   <td><a href=\'admin.php?action=editProperty&amp;PropertyId='.$Property->id.'\'"><button class="btn-primary">'.convertlang("Main|Edit").'</button></a></td>
			   <td><a onclick="return confirm(\''.convertlang("Main|Delete Property|objname").'?\')" href=\'admin.php?action=deleteProperty&amp;PropertyId='.$Property->id.'\'"><button class="btn-danger">'.convertlang("Main|Delete").'</button></a></td>
			</tr>';	
		}	
	?>
			
			</tbody>
		  </table>
		</div>
		  <p><?php echo convertlang("Main|Total")." : "; ?><?php echo $results['totalRows']?> <?php echo convertlang("Property|objname"); ?> </p>

		  <p><a href="admin.php?action=newProperty"><?php echo convertlang("Main|AddaNew Property|objname"); ?></a></p>
			
			<?php
					
					if(!isset($_GET['pageno']))
					{
						$_GET['pageno'] = 1;
					}	
					
						$totalpage = ceil($results['totalRows']/10);
						$cpage = $_GET['pageno'] + 1;
						$ppage = $_GET['pageno'] - 1;
						
						if(($ppage >= 1))
						{
							echo '&nbsp <a href="?action=listProperty&pageno='. $ppage .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=listProperty&pageno='.$cpage.'">Next</a>'; 
						}
						
						
						
			?>
				
		<?php include "templates/include/footer.php" ?>
			
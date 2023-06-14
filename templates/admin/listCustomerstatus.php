<?php include "templates/include/header.php" ?>
			
			<br>
			<div class="row">
				<div class="col-lg-8">
					  <h1><?php echo convertlang("Main|All Customerstatus|objname"); ?></h1>
				</div>
				<div class="col-lg-4">
					<a href="admin.php?action=newCustomerstatus">
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
			  <th><?php echo convertlang("Customerstatus|mhead_Visitpicture1"); ?></th><th><?php echo convertlang("Customerstatus|mhead_Code"); ?></th>
			</tr>
			</thead>
			<tbody>
	<?php foreach ( $results['Customerstatus'] as $Customerstatus ) { 
			echo '
			<tr>
			    <td><img src="'.$Customerstatus->visitpicture1.'" height="100px"/></img></td><td><a href=\'admin.php?action=viewCustomerstatus&amp;id='.$Customerstatus->id.'\'>'.$Customerstatus->code.'</a></td>
			   <td><a href=\'admin.php?action=editCustomerstatus&amp;CustomerstatusId='.$Customerstatus->id.'\'"><button class="btn-primary">'.convertlang("Main|Edit").'</button></a></td>
			   <td><a onclick="return confirm(\''.convertlang("Main|Delete Customerstatus|objname").'?\')" href=\'admin.php?action=deleteCustomerstatus&amp;CustomerstatusId='.$Customerstatus->id.'\'"><button class="btn-danger">'.convertlang("Main|Delete").'</button></a></td>
			</tr>';	
		}	
	?>
			
			</tbody>
		  </table>
		</div>
		  <p><?php echo convertlang("Main|Total")." : "; ?><?php echo $results['totalRows']?> <?php echo convertlang("Customerstatus|objname"); ?> </p>

		  <p><a href="admin.php?action=newCustomerstatus"><?php echo convertlang("Main|AddaNew Customerstatus|objname"); ?></a></p>
			
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
							echo '&nbsp <a href="?action=listCustomerstatus&pageno='. $ppage .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=listCustomerstatus&pageno='.$cpage.'">Next</a>'; 
						}
						
						
						
			?>
				
		<?php include "templates/include/footer.php" ?>
			
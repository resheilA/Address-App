<?php include "templates/include/header.php" ?>
			
			<br>
			<div class="row">
				<div class="col-lg-8">
					  <h1><?php echo convertlang("Main|All Flag|objname"); ?></h1>
				</div>
				<div class="col-lg-4">
					<a href="admin.php?action=newFlag">
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
			  <th><?php echo convertlang("Flag|mhead_Flagname"); ?></th><th><?php echo convertlang("Flag|mhead_Flagvalue"); ?></th>
			</tr>
			</thead>
			<tbody>
	<?php foreach ( $results['Flag'] as $Flag ) { 
			echo '
			<tr>
			    <td><a href=\'admin.php?action=viewFlag&amp;id='.$Flag->id.'\'>'.$Flag->flagname.'</a></td><td><a href=\'admin.php?action=viewFlag&amp;id='.$Flag->id.'\'>'.$Flag->flagvalue.'</a></td>
			   <td><a href=\'admin.php?action=editFlag&amp;FlagId='.$Flag->id.'\'"><button class="btn-primary">'.convertlang("Main|Edit").'</button></a></td>
			   <td><a onclick="return confirm(\''.convertlang("Main|Delete Flag|objname").'?\')" href=\'admin.php?action=deleteFlag&amp;FlagId='.$Flag->id.'\'"><button class="btn-danger">'.convertlang("Main|Delete").'</button></a></td>
			</tr>';	
		}	
	?>
			
			</tbody>
		  </table>
		</div>
		  <p><?php echo convertlang("Main|Total")." : "; ?><?php echo $results['totalRows']?> <?php echo convertlang("Flag|objname"); ?> </p>

		  <p><a href="admin.php?action=newFlag"><?php echo convertlang("Main|AddaNew Flag|objname"); ?></a></p>
			
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
							echo '&nbsp <a href="?action=listFlag&pageno='. $ppage .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=listFlag&pageno='.$cpage.'">Next</a>'; 
						}
						
						
						
			?>
				
		<?php include "templates/include/footer.php" ?>
			
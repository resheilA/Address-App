<?php include "templates/include/header.php" ?>
			
			<br>
			<div class="row">
				<div class="col-lg-8">
					  <h1><?php echo convertlang("Main|All Company|objname"); ?></h1>
				</div>
				<div class="col-lg-4">
					<a href="admin.php?action=newCompany">
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
			  <th><?php echo convertlang("Company|mhead_Companyname"); ?></th><th><?php echo convertlang("Company|mhead_Companycontact"); ?></th>
			</tr>
			</thead>
			<tbody>
	<?php foreach ( $results['Company'] as $Company ) { 
			echo '
			<tr>
			    <td><a href=\'admin.php?action=viewCompany&amp;id='.$Company->id.'\'>'.$Company->companyname.'</a></td><td><a href=\'admin.php?action=viewCompany&amp;id='.$Company->id.'\'>'.$Company->companycontact.'</a></td>
			   <td><a href=\'admin.php?action=editCompany&amp;CompanyId='.$Company->id.'\'"><button class="btn-primary">'.convertlang("Main|Edit").'</button></a></td>
			   <td><a onclick="return confirm(\''.convertlang("Main|Delete Company|objname").'?\')" href=\'admin.php?action=deleteCompany&amp;CompanyId='.$Company->id.'\'"><button class="btn-danger">'.convertlang("Main|Delete").'</button></a></td>
			</tr>';	
		}	
	?>
			
			</tbody>
		  </table>
		</div>
		  <p><?php echo convertlang("Main|Total")." : "; ?><?php echo $results['totalRows']?> <?php echo convertlang("Company|objname"); ?> </p>

		  <p><a href="admin.php?action=newCompany"><?php echo convertlang("Main|AddaNew Company|objname"); ?></a></p>
			
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
							echo '&nbsp <a href="?action=listCompany&pageno='. $ppage .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=listCompany&pageno='.$cpage.'">Next</a>'; 
						}
						
						
						
			?>
				
		<?php include "templates/include/footer.php" ?>
			
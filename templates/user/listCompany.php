<?php include "templates/include/user_header.php" ?>
			<br>
		  <h1>All <?php echo pluralize($results['totalRows'],"Company"); ?></h1>

	<?php if ( isset( $results['errorMessage'] ) ) { ?>
			<div class="alert-danger p-3"><?php echo $results['errorMessage'] ?></div>
	<?php } ?>


	<?php if ( isset( $results['statusMessage'] ) ) { ?>
			<div class="alert-success p-3"><?php echo $results['statusMessage'] ?></div>
	<?php } ?>

		   <table class="table">
		        <thead>                               
             <tr>
			  <th>Companyname</th><th>Companycontact</th>
			</tr>
			</thead>
			<tbody>
	<?php foreach ( $results['Company'] as $Company ) { 
			echo '
			<tr onclick="location=\'user.php?action=editCompany&amp;CompanyId='.$Company->id.'\'">
			  <td>'.$Company->companyname.'</td><td>'.$Company->companycontact.'</td>
			</tr>';	
		}	
	?>
			
			</tbody>
		  </table>

		  <p><?php echo $results['totalRows']?> <?php echo pluralize($results['totalRows'],"Company"); ?> in total.</p>
			
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
							echo '&nbsp <a href="?action=listCompany&pageno='. $ppage .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=listCompany&pageno='.$cpage.'">Next</a>'; 
						}
						
						
						
			?>
				
		<?php include "templates/include/user_footer.php" ?>
			
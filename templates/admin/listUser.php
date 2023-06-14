<?php include "templates/include/header.php" ?>
			
			<br>
			<div class="row">
				<div class="col-lg-8">
					  <h1><?php echo convertlang("Main|All User|objname"); ?></h1>
				</div>
				<div class="col-lg-4">
					<a href="admin.php?action=newUser">
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
			  <th><?php echo convertlang("User|mhead_Id"); ?></th><th><?php echo convertlang("User|mhead_Fullname"); ?></th><th><?php echo convertlang("User|mhead_Contact"); ?></th><th><?php echo convertlang("User|mhead_Usercompany"); ?></th>
			</tr>
			</thead>
			<tbody>
	<?php foreach ( $results['User'] as $User ) { 
			echo '
			<tr>
			    <td><a href=\'admin.php?action=viewUser&amp;id='.$User->id.'\'>'.$User->id.'</a></td><td><a href=\'admin.php?action=viewUser&amp;id='.$User->id.'\'>'.$User->fullname.'</a></td><td><a href=\'admin.php?action=viewUser&amp;id='.$User->id.'\'>'.$User->contact.'</a></td><td>'.Company::getByCompanycode( $User->usercompany)->companyname.'</td>
			   <td><a href=\'admin.php?action=editUser&amp;UserId='.$User->id.'\'"><button class="btn-primary">'.convertlang("Main|Edit").'</button></a></td>
			   <td><a onclick="return confirm(\''.convertlang("Main|Delete User|objname").'?\')" href=\'admin.php?action=deleteUser&amp;UserId='.$User->id.'\'"><button class="btn-danger">'.convertlang("Main|Delete").'</button></a></td>
			</tr>';	
		}	
	?>
			
			</tbody>
		  </table>
		</div>
		  <p><?php echo convertlang("Main|Total")." : "; ?><?php echo $results['totalRows']?> <?php echo convertlang("User|objname"); ?> </p>

		  <p><a href="admin.php?action=newUser"><?php echo convertlang("Main|AddaNew User|objname"); ?></a></p>
			
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
							echo '&nbsp <a href="?action=listUser&pageno='. $ppage .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=listUser&pageno='.$cpage.'">Next</a>'; 
						}
						
						
						
			?>
				
		<?php include "templates/include/footer.php" ?>
			
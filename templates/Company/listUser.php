<?php include "templates/include/Companyheader.php" ?>
			
			<?php 
			if(!isset($_GET["search"]))
			{
				$_GET["search"] = "";
			}
			?>
			<br>
				
			<h1><?php echo convertlang("Main|All User|objname"); ?></h1>
			
					<a href="Company.php?action=newUser">
						<button class="btn-primary">
							<?php echo convertlang("Main|AddaNew|objname"); ?>
						</button>
					</a>	
				
			<div class="row">		  
			<div class="col-lg-7 mt-2">
				   <form method="get" action="Company.php?">
						<div class="input-group">
							<input type="hidden" name="action" value="searchUser">
							<input class="form-control" type="text" name="search" placeholder="Search using <?php echo convertlang("User|usercode"); ?>, <?php echo convertlang("User|fullname"); ?>, <?php echo convertlang("User|username"); ?>" aria-label="Search for <?php echo convertlang("User|usercode"); ?>, <?php echo convertlang("User|fullname"); ?>, <?php echo convertlang("User|username"); ?>" aria-describedby="btnNavbarSearch" value="<?php echo $_GET["search"]; ?>" />
							<button type="submit" class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
						</div>
					</form>
			</div>	
			<div class="col-lg-5 mt-2">
				   <form method="get" action="Company.php?">
						<div class="input-group">
							<input type="hidden" name="action" value="sortUser">
							<select name="sort" class="form-control">
							 <?php if(isset($_GET["sort"])){echo "<option value='".$_GET['sort']."'>".convertlang("User|".$_GET['sort'])."</option>";} ?>
								<option value='fullname'><?php echo convertlang('User|fullname'); ?></option><option value='contact'><?php echo convertlang('User|contact'); ?></option><option value='username'><?php echo convertlang('User|username'); ?></option><option value='usercompany'><?php echo convertlang('User|usercompany'); ?></option><option value='user_block'><?php echo convertlang('User|user_block'); ?></option>
							</select>
							<select name="order" class="form-control">
							    <?php
								if(isset($_GET["order"])){if($_GET["order"] == "asc"){echo "<option value='asc'>Ascending</option>";}else{echo "<option value='desc'>Descending</option>";}}	
								?>
								<option value="asc">Ascending</option>
								<option value="desc">Descending</option>
							</select>                    
							<button type="submit" class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-sort"></i></button>
						</div>
					</form>
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
			    <td><a href=\'Company.php?action=viewUser&amp;id='.$User->id.'\'>'.$User->id.'</a></td><td><a href=\'Company.php?action=viewUser&amp;id='.$User->id.'\'>'.$User->fullname.'</a></td><td><a href=\'Company.php?action=viewUser&amp;id='.$User->id.'\'>'.$User->contact.'</a></td><td>'.Company::getByCompanycode( $User->usercompany)->companyname.'</td>  
			   <td><a href=\'Company.php?action=editUser&amp;UserId='.$User->id.'\'"><button class="btn-primary">'.convertlang("Main|Edit").'</button></a></td>
			     
			   <td><a onclick="return confirm(\''.convertlang("Main|Delete User|objname").'?\')" href=\'Company.php?action=deleteUser&amp;UserId='.$User->id.'\'"><button class="btn-danger">'.convertlang("Main|Delete").'</button></a></td>'; 
			include("external/modules/listcustombutton/User_listbutton.php"); echo '   
			</tr>';	
		}	
	?>
			
			</tbody>
		  </table>
		</div>
		  <p><?php echo convertlang("Main|Total")." : "; ?><?php echo $results['totalRows']?> <?php echo convertlang("User|objname"); ?> </p>
				
		  <p><a href="Company.php?action=newUser"><?php echo convertlang("Main|AddaNew User|objname"); ?></a></p>
		  
			
			<?php
					
					if(!isset($_GET['pageno']))
					{
						$_GET['pageno'] = 1;
					}	
					
					if(isset($_GET['search']) & $_GET['search'] != "")
					{
						$totalpage = ceil($results['totalRows']/20);
						$cpage = $_GET['pageno'] + 1;
						$ppage = $_GET['pageno'] - 1;
						
						if(($ppage >= 1))
						{
							echo '&nbsp <a href="?action=searchUser&pageno='. $ppage .'&search='. $_GET['search'] .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=searchUser&pageno='.$cpage.'&search='.$_GET["search"].'">Next</a>'; 
						}
					}
					elseif(isset($_GET['sort']) && $_GET['sort'] != "")
					{
						$totalpage = ceil($results['totalRows']/20);
						$cpage = $_GET['pageno'] + 1;
						$ppage = $_GET['pageno'] - 1;
						
						if(($ppage >= 1))
						{
							echo '&nbsp <a href="?action=sortUser&pageno='. $ppage .'&sort='. $_GET['sort'] .'&order='. $_GET['order'] .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=sortUser&pageno='.$cpage.'&sort='.$_GET["sort"].'&order='. $_GET['order'] .'">Next</a>'; 
						}
					}					
					else
					{
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
					}
					
					
						
						
						
			?>
				
		<?php include "templates/include/Companyfooter.php" ?>
			
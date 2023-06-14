<?php include "templates/include/Companyheader.php" ?>
			
			<?php 
			if(!isset($_GET["search"]))
			{
				$_GET["search"] = "";
			}
			?>
			<br>
				
			<h1><?php echo convertlang("Main|All Payout|objname"); ?></h1>
			
					<a href="Company.php?action=newPayout">
						<button class="btn-primary">
							<?php echo convertlang("Main|AddaNew|objname"); ?>
						</button>
					</a>	
				
			<div class="row">		  
			<div class="col-lg-7 mt-2">
				   <form method="get" action="Company.php?">
						<div class="input-group">
							<input type="hidden" name="action" value="searchPayout">
							<input class="form-control" type="text" name="search" placeholder="Search using <?php echo convertlang("Payout|payoutrider"); ?>, <?php echo convertlang("Payout|payoutcompany"); ?>, <?php echo convertlang("Payout|payoutid"); ?>" aria-label="Search for <?php echo convertlang("Payout|payoutrider"); ?>, <?php echo convertlang("Payout|payoutcompany"); ?>, <?php echo convertlang("Payout|payoutid"); ?>" aria-describedby="btnNavbarSearch" value="<?php echo $_GET["search"]; ?>" />
							<button type="submit" class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
						</div>
					</form>
			</div>	
			<div class="col-lg-5 mt-2">
				   <form method="get" action="Company.php?">
						<div class="input-group">
							<input type="hidden" name="action" value="sortPayout">
							<select name="sort" class="form-control">
							 <?php if(isset($_GET["sort"])){echo "<option value='".$_GET['sort']."'>".convertlang("Payout|".$_GET['sort'])."</option>";} ?>
								<option value='payoutrider'><?php echo convertlang('Payout|payoutrider'); ?></option><option value='payoutcompany'><?php echo convertlang('Payout|payoutcompany'); ?></option><option value='payoutamt'><?php echo convertlang('Payout|payoutamt'); ?></option><option value='payoutaddedon'><?php echo convertlang('Payout|payoutaddedon'); ?></option><option value='payoutstatus'><?php echo convertlang('Payout|payoutstatus'); ?></option>
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
			  <th><?php echo convertlang("Payout|mhead_Payoutrider"); ?></th><th><?php echo convertlang("Payout|mhead_Payoutamt"); ?></th><th><?php echo convertlang("Payout|mhead_Payoutaddedon"); ?></th><th><?php echo convertlang("Payout|mhead_Payoutstatus"); ?></th>
			</tr>
			</thead>
			<tbody>
	<?php foreach ( $results['Payout'] as $Payout ) { 
			echo '
			<tr>
			    <td>'.Riders::getByRidercode( $Payout->payoutrider)->ridername.'</td><td><a href=\'Company.php?action=viewPayout&amp;id='.$Payout->id.'\'>'.$Payout->payoutamt.'</a></td><td><a href=\'Company.php?action=viewPayout&amp;id='.$Payout->id.'\'>'.$Payout->payoutaddedon.'</a></td><td>'.Paymentmode::getById( $Payout->payoutstatus)->paymentmodename.'</td>  
			   <td><a onclick="return confirm(\''.convertlang("Main|Delete Payout|objname").'?\')" href=\'Company.php?action=deletePayout&amp;PayoutId='.$Payout->id.'\'"><button class="btn-danger">'.convertlang("Main|Delete").'</button></a></td>'; 
			include("external/modules/listcustombutton/Payout_listbutton.php"); echo '   
			</tr>';	
		}	
	?>
			
			</tbody>
		  </table>
		</div>
		  <p><?php echo convertlang("Main|Total")." : "; ?><?php echo $results['totalRows']?> <?php echo convertlang("Payout|objname"); ?> </p>
				
		  <p><a href="Company.php?action=newPayout"><?php echo convertlang("Main|AddaNew Payout|objname"); ?></a></p>
		  
			
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
							echo '&nbsp <a href="?action=searchPayout&pageno='. $ppage .'&search='. $_GET['search'] .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=searchPayout&pageno='.$cpage.'&search='.$_GET["search"].'">Next</a>'; 
						}
					}
					elseif(isset($_GET['sort']) && $_GET['sort'] != "")
					{
						$totalpage = ceil($results['totalRows']/20);
						$cpage = $_GET['pageno'] + 1;
						$ppage = $_GET['pageno'] - 1;
						
						if(($ppage >= 1))
						{
							echo '&nbsp <a href="?action=sortPayout&pageno='. $ppage .'&sort='. $_GET['sort'] .'&order='. $_GET['order'] .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=sortPayout&pageno='.$cpage.'&sort='.$_GET["sort"].'&order='. $_GET['order'] .'">Next</a>'; 
						}
					}					
					else
					{
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
					}
					
					
						
						
						
			?>
				
		<?php include "templates/include/Companyfooter.php" ?>
			
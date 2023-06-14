<?php include "templates/include/Ridersheader.php" ?>
			
			<?php 
			if(!isset($_GET["search"]))
			{
				$_GET["search"] = "";
			}
			?>
			<br>
				
			<h1><?php echo convertlang("Main|All Campaign|objname"); ?></h1>
			
			<div class="row">		  
			<div class="col-lg-7 mt-2">
				   <form method="get" action="Riders.php?">
						<div class="input-group">
							<input type="hidden" name="action" value="searchCampaign">
							<input class="form-control" type="text" name="search" placeholder="Search using " aria-label="Search for " aria-describedby="btnNavbarSearch" value="<?php echo $_GET["search"]; ?>" />
							<button type="submit" class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
						</div>
					</form>
			</div>	
			<div class="col-lg-5 mt-2">
				   <form method="get" action="Riders.php?">
						<div class="input-group">
							<input type="hidden" name="action" value="sortCampaign">
							<select name="sort" class="form-control">
							 <?php if(isset($_GET["sort"])){echo "<option value='".$_GET['sort']."'>".convertlang("Campaign|".$_GET['sort'])."</option>";} ?>
								<option value='payoutrider'><?php echo convertlang('Campaign|payoutrider'); ?></option><option value='payoutcompany'><?php echo convertlang('Campaign|payoutcompany'); ?></option><option value='payoutamt'><?php echo convertlang('Campaign|payoutamt'); ?></option><option value='payoutaddedon'><?php echo convertlang('Campaign|payoutaddedon'); ?></option><option value='payoutstatus'><?php echo convertlang('Campaign|payoutstatus'); ?></option>
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
			  <th><?php echo convertlang("Campaign|mhead_Payoutrider"); ?></th><th><?php echo convertlang("Campaign|mhead_Payoutamt"); ?></th><th><?php echo convertlang("Campaign|mhead_Payoutaddedon"); ?></th><th><?php echo convertlang("Campaign|mhead_Payoutstatus"); ?></th>
			</tr>
			</thead>
			<tbody>
	<?php foreach ( $results['Campaign'] as $Campaign ) { 
			echo '
			<tr>
			    <td>'.Riders::getByRidercode( $Campaign->payoutrider)->ridername.'</td><td><a href=\'Riders.php?action=viewCampaign&amp;id='.$Campaign->id.'\'>'.$Campaign->payoutamt.'</a></td><td><a href=\'Riders.php?action=viewCampaign&amp;id='.$Campaign->id.'\'>'.$Campaign->payoutaddedon.'</a></td><td>'.Paymentmode::getById( $Campaign->payoutstatus)->paymentmodename.'</td>   
			</tr>';	
		}	
	?>
			
			</tbody>
		  </table>
		</div>
		  <p><?php echo convertlang("Main|Total")." : "; ?><?php echo $results['totalRows']?> <?php echo convertlang("Campaign|objname"); ?> </p>
			
			<?php
					
					if(!isset($_GET['pageno']))
					{
						$_GET['pageno'] = 1;
					}	
					
					if(isset($_GET['search']) & $_GET['search'] != "")
					{
						$totalpage = ceil($results['totalRows']/10);
						$cpage = $_GET['pageno'] + 1;
						$ppage = $_GET['pageno'] - 1;
						
						if(($ppage >= 1))
						{
							echo '&nbsp <a href="?action=searchCampaign&pageno='. $ppage .'&search='. $_GET['search'] .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=searchCampaign&pageno='.$cpage.'&search='.$_GET["search"].'">Next</a>'; 
						}
					}
					elseif(isset($_GET['sort']) && $_GET['sort'] != "")
					{
						$totalpage = ceil($results['totalRows']/10);
						$cpage = $_GET['pageno'] + 1;
						$ppage = $_GET['pageno'] - 1;
						
						if(($ppage >= 1))
						{
							echo '&nbsp <a href="?action=sortCampaign&pageno='. $ppage .'&sort='. $_GET['sort'] .'&order='. $_GET['order'] .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=sortCampaign&pageno='.$cpage.'&sort='.$_GET["sort"].'&order='. $_GET['order'] .'">Next</a>'; 
						}
					}					
					else
					{
						$totalpage = ceil($results['totalRows']/10);
						$cpage = $_GET['pageno'] + 1;
						$ppage = $_GET['pageno'] - 1;
						
						if(($ppage >= 1))
						{
							echo '&nbsp <a href="?action=listCampaign&pageno='. $ppage .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=listCampaign&pageno='.$cpage.'">Next</a>'; 
						}
					}
					
					
						
						
						
			?>
				
		<?php include "templates/include/Ridersfooter.php" ?>
			
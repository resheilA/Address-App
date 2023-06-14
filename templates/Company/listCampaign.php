<?php include "templates/include/Companyheader.php" ?>
			
			<?php 
			if(!isset($_GET["search"]))
			{
				$_GET["search"] = "";
			}
			?>
			<br>
				
			<h1><?php echo convertlang("Main|All Campaign|objname"); ?></h1>
			
					<a href="Company.php?action=newCampaign">
						<button class="btn-primary">
							<?php echo convertlang("Main|AddaNew|objname"); ?>
						</button>
					</a>	
				
			<div class="row">		  
			<div class="col-lg-7 mt-2">
				   <form method="get" action="Company.php?">
						<div class="input-group">
							<input type="hidden" name="action" value="searchCampaign">
							<input class="form-control" type="text" name="search" placeholder="Search using <?php echo convertlang("Campaign|campaignname"); ?>, <?php echo convertlang("Campaign|id"); ?>" aria-label="Search for <?php echo convertlang("Campaign|campaignname"); ?>, <?php echo convertlang("Campaign|id"); ?>" aria-describedby="btnNavbarSearch" value="<?php echo $_GET["search"]; ?>" />
							<button type="submit" class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
						</div>
					</form>
			</div>	
			<div class="col-lg-5 mt-2">
				   <form method="get" action="Company.php?">
						<div class="input-group">
							<input type="hidden" name="action" value="sortCampaign">
							<select name="sort" class="form-control">
							 <?php if(isset($_GET["sort"])){echo "<option value='".$_GET['sort']."'>".convertlang("Campaign|".$_GET['sort'])."</option>";} ?>
								<option value='campaignname'><?php echo convertlang('Campaign|campaignname'); ?></option><option value='campaigncompany'><?php echo convertlang('Campaign|campaigncompany'); ?></option>
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
			  <th><?php echo convertlang("Campaign|mhead_Campaignname"); ?></th>
			</tr>
			</thead>
			<tbody>
	<?php foreach ( $results['Campaign'] as $Campaign ) { 
			echo '
			<tr>
			    <td><a href=\'Company.php?action=viewCampaign&amp;id='.$Campaign->id.'\'>'.$Campaign->campaignname.'</a></td>  
			   <td><a href=\'Company.php?action=editCampaign&amp;CampaignId='.$Campaign->id.'\'"><button class="btn-primary">'.convertlang("Main|Edit").'</button></a></td>
			   '; 
			include("external/modules/listcustombutton/Campaign_listbutton.php"); echo '   
			</tr>';	
		}	
	?>
			
			</tbody>
		  </table>
		</div>
		  <p><?php echo convertlang("Main|Total")." : "; ?><?php echo $results['totalRows']?> <?php echo convertlang("Campaign|objname"); ?> </p>
				
		  <p><a href="Company.php?action=newCampaign"><?php echo convertlang("Main|AddaNew Campaign|objname"); ?></a></p>
		  
			
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
							echo '&nbsp <a href="?action=searchCampaign&pageno='. $ppage .'&search='. $_GET['search'] .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=searchCampaign&pageno='.$cpage.'&search='.$_GET["search"].'">Next</a>'; 
						}
					}
					elseif(isset($_GET['sort']) && $_GET['sort'] != "")
					{
						$totalpage = ceil($results['totalRows']/20);
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
						$totalpage = ceil($results['totalRows']/20);
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
				
		<?php include "templates/include/Companyfooter.php" ?>
			
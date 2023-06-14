<?php include "templates/include/Companyheader.php" ?>
			
			<?php 
			if(!isset($_GET["search"]))
			{
				$_GET["search"] = "";
			}
			?>
			<br>
				
			<h1><?php echo convertlang("Main|All Riders|objname"); ?></h1>
			
					<a href="Company.php?action=newRiders">
						<button class="btn-primary">
							<?php echo convertlang("Main|AddaNew|objname"); ?>
						</button>
					</a>	
				
			<div class="row">		  
			<div class="col-lg-7 mt-2">
				   <form method="get" action="Company.php?">
						<div class="input-group">
							<input type="hidden" name="action" value="searchRiders">
							<input class="form-control" type="text" name="search" placeholder="Search using <?php echo convertlang("Riders|ridercontactnumber"); ?>, <?php echo convertlang("Riders|ridername"); ?>, <?php echo convertlang("Riders|ridercode"); ?>" aria-label="Search for <?php echo convertlang("Riders|ridercontactnumber"); ?>, <?php echo convertlang("Riders|ridername"); ?>, <?php echo convertlang("Riders|ridercode"); ?>" aria-describedby="btnNavbarSearch" value="<?php echo $_GET["search"]; ?>" />
							<button type="submit" class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
						</div>
					</form>
			</div>	
			<div class="col-lg-5 mt-2">
				   <form method="get" action="Company.php?">
						<div class="input-group">
							<input type="hidden" name="action" value="sortRiders">
							<select name="sort" class="form-control">
							 <?php if(isset($_GET["sort"])){echo "<option value='".$_GET['sort']."'>".convertlang("Riders|".$_GET['sort'])."</option>";} ?>
								<option value='ridername'><?php echo convertlang('Riders|ridername'); ?></option><option value='rideraddress'><?php echo convertlang('Riders|rideraddress'); ?></option><option value='ridercontactnumber'><?php echo convertlang('Riders|ridercontactnumber'); ?></option><option value='ridercompany'><?php echo convertlang('Riders|ridercompany'); ?></option><option value='riderage'><?php echo convertlang('Riders|riderage'); ?></option><option value='bankaccno'><?php echo convertlang('Riders|bankaccno'); ?></option><option value='bankifsc'><?php echo convertlang('Riders|bankifsc'); ?></option><option value='rider_block'><?php echo convertlang('Riders|rider_block'); ?></option>
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
			  <th><?php echo convertlang("Riders|mhead_Ridername"); ?></th><th><?php echo convertlang("Riders|mhead_Ridercontactnumber"); ?></th><th><?php echo convertlang("Riders|mhead_Ridercompany"); ?></th>
			</tr>
			</thead>
			<tbody>
	<?php foreach ( $results['Riders'] as $Riders ) { 
			echo '
			<tr>
			    <td><a href=\'Company.php?action=viewRiders&amp;id='.$Riders->id.'\'>'.$Riders->ridername.'</a></td><td><a href=\'Company.php?action=viewRiders&amp;id='.$Riders->id.'\'>'.$Riders->ridercontactnumber.'</a></td><td>'.Company::getByCompanycode( $Riders->ridercompany)->companyname.'</td>  
			   <td><a href=\'Company.php?action=editRiders&amp;RidersId='.$Riders->id.'\'"><button class="btn-primary">'.convertlang("Main|Edit").'</button></a></td>
			   '; 
			include("external/modules/listcustombutton/Riders_listbutton.php"); echo '   
			</tr>';	
		}	
	?>
			
			</tbody>
		  </table>
		</div>
		  <p><?php echo convertlang("Main|Total")." : "; ?><?php echo $results['totalRows']?> <?php echo convertlang("Riders|objname"); ?> </p>
				
		  <p><a href="Company.php?action=newRiders"><?php echo convertlang("Main|AddaNew Riders|objname"); ?></a></p>
		  
			
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
							echo '&nbsp <a href="?action=searchRiders&pageno='. $ppage .'&search='. $_GET['search'] .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=searchRiders&pageno='.$cpage.'&search='.$_GET["search"].'">Next</a>'; 
						}
					}
					elseif(isset($_GET['sort']) && $_GET['sort'] != "")
					{
						$totalpage = ceil($results['totalRows']/20);
						$cpage = $_GET['pageno'] + 1;
						$ppage = $_GET['pageno'] - 1;
						
						if(($ppage >= 1))
						{
							echo '&nbsp <a href="?action=sortRiders&pageno='. $ppage .'&sort='. $_GET['sort'] .'&order='. $_GET['order'] .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=sortRiders&pageno='.$cpage.'&sort='.$_GET["sort"].'&order='. $_GET['order'] .'">Next</a>'; 
						}
					}					
					else
					{
						$totalpage = ceil($results['totalRows']/20);
						$cpage = $_GET['pageno'] + 1;
						$ppage = $_GET['pageno'] - 1;
						
						if(($ppage >= 1))
						{
							echo '&nbsp <a href="?action=listRiders&pageno='. $ppage .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=listRiders&pageno='.$cpage.'">Next</a>'; 
						}
					}
					
					
						
						
						
			?>
				
		<?php include "templates/include/Companyfooter.php" ?>
			
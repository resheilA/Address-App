<?php include "templates/include/Ridersheader.php" ?>
			
			<?php 
			if(!isset($_GET["search"]))
			{
				$_GET["search"] = "";
			}
			?>
			<br>
				
			<h1><?php echo convertlang("Main|All Customer|objname"); ?></h1>
			
			<div class="row">		  
			<div class="col-lg-7 mt-2">
				   <form method="get" action="Riders.php?">
						<div class="input-group">
							<input type="hidden" name="action" value="searchCustomer">
							<input class="form-control" type="text" name="search" placeholder="Search using <?php echo convertlang("Customer|cuscode"); ?>, <?php echo convertlang("Customer|customeremail"); ?>" aria-label="Search for <?php echo convertlang("Customer|cuscode"); ?>, <?php echo convertlang("Customer|customeremail"); ?>" aria-describedby="btnNavbarSearch" value="<?php echo $_GET["search"]; ?>" />
							<button type="submit" class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
						</div>
					</form>
			</div>	
			<div class="col-lg-5 mt-2">
				   <form method="get" action="Riders.php?">
						<div class="input-group">
							<input type="hidden" name="action" value="sortCustomer">
							<select name="sort" class="form-control">
							 <?php if(isset($_GET["sort"])){echo "<option value='".$_GET['sort']."'>".convertlang("Customer|".$_GET['sort'])."</option>";} ?>
								<option value='customername'><?php echo convertlang('Customer|customername'); ?></option><option value='customercontactnumber'><?php echo convertlang('Customer|customercontactnumber'); ?></option><option value='customeremail'><?php echo convertlang('Customer|customeremail'); ?></option><option value='cyc'><?php echo convertlang('Customer|cyc'); ?></option><option value='pos'><?php echo convertlang('Customer|pos'); ?></option><option value='tpd'><?php echo convertlang('Customer|tpd'); ?></option><option value='tad'><?php echo convertlang('Customer|tad'); ?></option><option value='cuscost'><?php echo convertlang('Customer|cuscost'); ?></option><option value='cushomepincode'><?php echo convertlang('Customer|cushomepincode'); ?></option><option value='cushomelangitude'><?php echo convertlang('Customer|cushomelangitude'); ?></option><option value='cushomelongitude'><?php echo convertlang('Customer|cushomelongitude'); ?></option><option value='cusofficepincode'><?php echo convertlang('Customer|cusofficepincode'); ?></option><option value='cusofficelangitude'><?php echo convertlang('Customer|cusofficelangitude'); ?></option><option value='cusofficelongitude'><?php echo convertlang('Customer|cusofficelongitude'); ?></option><option value='cusarea'><?php echo convertlang('Customer|cusarea'); ?></option><option value='assigned_to'><?php echo convertlang('Customer|assigned_to'); ?></option><option value='customer_block'><?php echo convertlang('Customer|customer_block'); ?></option><option value='assigned_company'><?php echo convertlang('Customer|assigned_company'); ?></option><option value='customercampaign'><?php echo convertlang('Customer|customercampaign'); ?></option>
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
			  <th><?php echo convertlang("Customer|mhead_Customername"); ?></th><th><?php echo convertlang("Customer|mhead_Customercontactnumber"); ?></th><th><?php echo convertlang("Customer|mhead_Assigned_to"); ?></th>
			</tr>
			</thead>
			<tbody>
	<?php foreach ( $results['Customer'] as $Customer ) { 
			echo '
			<tr>
			    <td><a href=\'Riders.php?action=viewCustomer&amp;id='.$Customer->id.'\'>'.$Customer->customername.'</a></td><td><a href=\'Riders.php?action=viewCustomer&amp;id='.$Customer->id.'\'>'.$Customer->customercontactnumber.'</a></td><td>'.Riders::getByRidercode( $Customer->assigned_to)->ridername.'</td>'; 
			include("external/modules/listcustombutton/Customer_listbutton.php"); echo '   
			</tr>';	
		}	
	?>
			
			</tbody>
		  </table>
		</div>
		  <p><?php echo convertlang("Main|Total")." : "; ?><?php echo $results['totalRows']?> <?php echo convertlang("Customer|objname"); ?> </p>
			
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
							echo '&nbsp <a href="?action=searchCustomer&pageno='. $ppage .'&search='. $_GET['search'] .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=searchCustomer&pageno='.$cpage.'&search='.$_GET["search"].'">Next</a>'; 
						}
					}
					elseif(isset($_GET['sort']) && $_GET['sort'] != "")
					{
						$totalpage = ceil($results['totalRows']/20);
						$cpage = $_GET['pageno'] + 1;
						$ppage = $_GET['pageno'] - 1;
						
						if(($ppage >= 1))
						{
							echo '&nbsp <a href="?action=sortCustomer&pageno='. $ppage .'&sort='. $_GET['sort'] .'&order='. $_GET['order'] .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=sortCustomer&pageno='.$cpage.'&sort='.$_GET["sort"].'&order='. $_GET['order'] .'">Next</a>'; 
						}
					}					
					else
					{
						$totalpage = ceil($results['totalRows']/20);
						$cpage = $_GET['pageno'] + 1;
						$ppage = $_GET['pageno'] - 1;
						
						if(($ppage >= 1))
						{
							echo '&nbsp <a href="?action=listCustomer&pageno='. $ppage .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=listCustomer&pageno='.$cpage.'">Next</a>'; 
						}
					}
					
					
						
						
						
			?>
				
		<?php include "templates/include/Ridersfooter.php" ?>
			
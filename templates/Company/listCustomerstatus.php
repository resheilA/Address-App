<?php include "templates/include/Companyheader.php" ?>
			
			<?php 
			if(!isset($_GET["search"]))
			{
				$_GET["search"] = "";
			}
			?>
			<br>
				
			<h1><?php echo convertlang("Main|All Customerstatus|objname"); ?></h1>
			
					<a href="Company.php?action=newCustomerstatus">
						<button class="btn-primary">
							<?php echo convertlang("Main|AddaNew|objname"); ?>
						</button>
					</a>	
				
			<div class="row">		  
			<div class="col-lg-7 mt-2">
				   <form method="get" action="Company.php?">
						<div class="input-group">
							<input type="hidden" name="action" value="searchCustomerstatus">
							<input class="form-control" type="text" name="search" placeholder="Search using <?php echo convertlang("Customerstatus|customer"); ?>, <?php echo convertlang("Customerstatus|cusstatecode"); ?>" aria-label="Search for <?php echo convertlang("Customerstatus|customer"); ?>, <?php echo convertlang("Customerstatus|cusstatecode"); ?>" aria-describedby="btnNavbarSearch" value="<?php echo $_GET["search"]; ?>" />
							<button type="submit" class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
						</div>
					</form>
			</div>	
			<div class="col-lg-5 mt-2">
				   <form method="get" action="Company.php?">
						<div class="input-group">
							<input type="hidden" name="action" value="sortCustomerstatus">
							<select name="sort" class="form-control">
							 <?php if(isset($_GET["sort"])){echo "<option value='".$_GET['sort']."'>".convertlang("Customerstatus|".$_GET['sort'])."</option>";} ?>
								<option value='collectedamount'><?php echo convertlang('Customerstatus|collectedamount'); ?></option><option value='code'><?php echo convertlang('Customerstatus|code'); ?></option><option value='customer'><?php echo convertlang('Customerstatus|customer'); ?></option>
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
			  <th><?php echo convertlang("Customerstatus|mhead_Visitpicture1"); ?></th><th><?php echo convertlang("Customerstatus|mhead_Code"); ?></th>
			</tr>
			</thead>
			<tbody>
	<?php foreach ( $results['Customerstatus'] as $Customerstatus ) { 
			echo '
			<tr>
			    <td><img src="'.$Customerstatus->visitpicture1.'" height="100px"/></img></td><td><a href=\'Company.php?action=viewCustomerstatus&amp;id='.$Customerstatus->id.'\'>'.$Customerstatus->code.'</a></td>  
			   <td><a href=\'Company.php?action=editCustomerstatus&amp;CustomerstatusId='.$Customerstatus->id.'\'"><button class="btn-primary">'.convertlang("Main|Edit").'</button></a></td>
			     
			   <td><a onclick="return confirm(\''.convertlang("Main|Delete Customerstatus|objname").'?\')" href=\'Company.php?action=deleteCustomerstatus&amp;CustomerstatusId='.$Customerstatus->id.'\'"><button class="btn-danger">'.convertlang("Main|Delete").'</button></a></td>'; 
			include("external/modules/listcustombutton/Customerstatus_listbutton.php"); echo '   
			</tr>';	
		}	
	?>
			
			</tbody>
		  </table>
		</div>
		  <p><?php echo convertlang("Main|Total")." : "; ?><?php echo $results['totalRows']?> <?php echo convertlang("Customerstatus|objname"); ?> </p>
				
		  <p><a href="Company.php?action=newCustomerstatus"><?php echo convertlang("Main|AddaNew Customerstatus|objname"); ?></a></p>
		  
			
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
							echo '&nbsp <a href="?action=searchCustomerstatus&pageno='. $ppage .'&search='. $_GET['search'] .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=searchCustomerstatus&pageno='.$cpage.'&search='.$_GET["search"].'">Next</a>'; 
						}
					}
					elseif(isset($_GET['sort']) && $_GET['sort'] != "")
					{
						$totalpage = ceil($results['totalRows']/20);
						$cpage = $_GET['pageno'] + 1;
						$ppage = $_GET['pageno'] - 1;
						
						if(($ppage >= 1))
						{
							echo '&nbsp <a href="?action=sortCustomerstatus&pageno='. $ppage .'&sort='. $_GET['sort'] .'&order='. $_GET['order'] .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=sortCustomerstatus&pageno='.$cpage.'&sort='.$_GET["sort"].'&order='. $_GET['order'] .'">Next</a>'; 
						}
					}					
					else
					{
						$totalpage = ceil($results['totalRows']/20);
						$cpage = $_GET['pageno'] + 1;
						$ppage = $_GET['pageno'] - 1;
						
						if(($ppage >= 1))
						{
							echo '&nbsp <a href="?action=listCustomerstatus&pageno='. $ppage .'">Back</a>'; 
						}
						
						if(($cpage <= $totalpage))
						{
							echo '<a href="?action=listCustomerstatus&pageno='.$cpage.'">Next</a>'; 
						}
					}
					
					
						
						
						
			?>
				
		<?php include "templates/include/Companyfooter.php" ?>
			
<?php include "templates/include/user_header.php" ?>
					
					<br><br>
					  <h1><?php echo $results['pageTitle']?></h1>

					  <form action="user.php?action=<?php echo $results['formAction']?>" enctype="multipart/form-data" method="post">
						<input type="hidden" name="CompanyId" value="<?php echo $results['Company']->id ?>"/>

				<?php if ( isset( $results['errorMessage'] ) ) { ?>
						<div class="alert-danger"><?php echo $results['errorMessage'] ?></div>
				<?php } ?>

						
							
				<input type="hidden" class="form-control" name="id" value="<?php echo $results['Company']->id ?>"/>
				</br>
				<label for="companyname"><?php echo convertlang('Company|companyname'); ?></label>
				<input type="text" class="form-control" name="companyname" id="companyname" placeholder="<?php echo convertlang('Company|companyname'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Company']->companyname )?>" />
				</br>
				<label for="gstno"><?php echo convertlang('Company|gstno'); ?></label>
				<input type="text" class="form-control" name="gstno" id="gstno" placeholder="<?php echo convertlang('Company|gstno'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Company']->gstno )?>" />
				</br>
				<label for="companycontact"><?php echo convertlang('Company|companycontact'); ?></label>
				<input type="number" class="form-control" name="companycontact" id="companycontact" placeholder="<?php echo convertlang('Company|companycontact'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Company']->companycontact )?>" />
				</br>
				<label for="companyaddress">Companyaddress</label>
				<textarea name="companyaddress" class="form-control" id="companyaddress" style="height: 5em;"  placeholder="<?php echo convertlang('Company|companyaddress'); ?>"><?php echo htmlspecialchars(  $results['Company']->companyaddress )?></textarea>
				
				<?php 
					if(isset($results['Company']->logo) && $results['Company']->logo != "")
					{
					 echo "</br><img src='".htmlspecialchars( $results['Company']->logo )."' height='100' />"; 
					 echo "<Br><span onclick=\"$('#logo').val('');\">Remove image</span>";
					} 
					else 
					{
					 echo '<br><label for="logo">';
					 ?>
					 <?php echo convertlang('Company|logo'); ?>
					 <?php echo '</label>';
					}
				?>
				<Br>
				<input type="file" class="form-control" name="logo" />
				<input type="hidden" class="form-control" name="logo" id="logo" placeholder="<?php echo convertlang('Company|logo'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Company']->logo )?>" />
					
				<input type="hidden" class="form-control" name="uni_code" value="<?php if($results['Company']->uni_code == ""){echo randomstr(15);}else{echo $results['Company']->uni_code;} ?>"/>
				</br>
				<label for="adminusername"><?php echo convertlang('Company|adminusername'); ?></label>
				<input type="text" class="form-control" name="adminusername" id="adminusername" placeholder="<?php echo convertlang('Company|adminusername'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Company']->adminusername )?>" />
				</br>
				<label for="adminpassword"><?php echo convertlang('Company|adminpassword'); ?></label>
				<input type="password" list="adminpassword_suggestions" onkeyup="ajaxcomplete('ajaxlist_Company_adminpassword', 'adminpassword')" class="form-control" name="adminpassword" id="adminpassword" placeholder="<?php echo convertlang('Company|adminpassword'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Company']->adminpassword )?>" />
				<datalist id="adminpassword_suggestions">
				</datalist>
				
						
					<br>
						<div class="buttons">
						  <input type="submit" name="saveChanges" value="Save Changes" />
						  <input type="submit" formnovalidate name="cancel" value="Cancel" />
						</div>

					  </form>
					
				<?php if ( $results['Company']->id ) { ?>
					  <p><a href="user.php?action=deleteCompany&amp;CompanyId=<?php echo $results['Company']->id ?>" onclick="return confirm('Delete This Company?')">Delete This Company</a></p>
				<?php } ?> 		
				<?php include "templates/include/user_footer.php" ?>
			
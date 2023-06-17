<?php include "templates/include/header.php" ?>
					
					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>

				<?php if ( isset( $results['errorMessage'] ) ) { ?>
						<div class="alert-danger"><?php echo $results['errorMessage'] ?></div>
				<?php } ?>


					  <form action="admin.php?action=<?php echo $results['formAction']?>" enctype="multipart/form-data" method="post">
						<input type="hidden" name="CompanyId" value="<?php echo $results['Company']->id ?>"/>
		
				
							
				<input type="hidden" class="form-control" name="id" id="id" value="<?php echo $results['Company']->id ?>"/>
				</br>
				<label for="companyname"><?php echo convertlang('Company|companyname'); ?></label>
				<input type="text" class="form-control" name="companyname" id="companyname" placeholder="<?php echo convertlang('Company|companyname'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Company']->companyname )?>" />
				</br>
				<label for="companycontact"><?php echo convertlang('Company|companycontact'); ?></label>
				<input type="number" class="form-control" name="companycontact" id="companycontact" placeholder="<?php echo convertlang('Company|companycontact'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Company']->companycontact )?>" />
				</br>
				<label for="companyaddress"><?php echo convertlang('Company|companyaddress'); ?></label>
				<textarea name="companyaddress" class="form-control" id="companyaddress" style="height: 5em;"  placeholder="<?php echo convertlang('Company|companyaddress'); ?>"><?php echo htmlspecialchars(  $results['Company']->companyaddress )?></textarea>
				</br>
				<label for="gstno"><?php echo convertlang('Company|gstno'); ?></label>
				<input type="text" class="form-control" name="gstno" id="gstno" placeholder="<?php echo convertlang('Company|gstno'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Company']->gstno )?>" />
				
				<?php 
					if(isset($results['Company']->logo) && $results['Company']->logo != "")
					{
					  echo '<br><label for="logo">';
					 ?>
					 <?php echo convertlang('Company|logo'); ?>
					 <?php echo '</label>';
					 
					 
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
				<input type="hidden" class="form-control" id="logo" name="logo" placeholder="<?php echo convertlang('Company|logo'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Company']->logo )?>" />
				
				<?php 
					if(isset($results['Company']->companypan) && $results['Company']->companypan != "")
					{
					  echo '<br><label for="companypan">';
					 ?>
					 <?php echo convertlang('Company|companypan'); ?>
					 <?php echo '</label>';
					 
					 
					 echo "</br><img src='".htmlspecialchars( $results['Company']->companypan )."' height='100' />"; 
					 echo "<Br><span onclick=\"$('#companypan').val('');\">Remove image</span>";
					} 
					else 
					{
					 echo '<br><label for="companypan">';
					 ?>
					 <?php echo convertlang('Company|companypan'); ?>
					 <?php echo '</label>';
					}
				?>
				<Br>
				<input type="file" class="form-control" name="companypan" />
				<input type="hidden" class="form-control" id="companypan" name="companypan" placeholder="<?php echo convertlang('Company|companypan'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Company']->companypan )?>" />
				
				<?php 
					if(isset($results['Company']->companycoi) && $results['Company']->companycoi != "")
					{
					  echo '<br><label for="companycoi">';
					 ?>
					 <?php echo convertlang('Company|companycoi'); ?>
					 <?php echo '</label>';
					 
					 
					 echo "</br><img src='".htmlspecialchars( $results['Company']->companycoi )."' height='100' />"; 
					 echo "<Br><span onclick=\"$('#companycoi').val('');\">Remove image</span>";
					} 
					else 
					{
					 echo '<br><label for="companycoi">';
					 ?>
					 <?php echo convertlang('Company|companycoi'); ?>
					 <?php echo '</label>';
					}
				?>
				<Br>
				<input type="file" class="form-control" name="companycoi" />
				<input type="hidden" class="form-control" id="companycoi" name="companycoi" placeholder="<?php echo convertlang('Company|companycoi'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Company']->companycoi )?>" />
				
				<?php 
					if(isset($results['Company']->companygst) && $results['Company']->companygst != "")
					{
					  echo '<br><label for="companygst">';
					 ?>
					 <?php echo convertlang('Company|companygst'); ?>
					 <?php echo '</label>';
					 
					 
					 echo "</br><img src='".htmlspecialchars( $results['Company']->companygst )."' height='100' />"; 
					 echo "<Br><span onclick=\"$('#companygst').val('');\">Remove image</span>";
					} 
					else 
					{
					 echo '<br><label for="companygst">';
					 ?>
					 <?php echo convertlang('Company|companygst'); ?>
					 <?php echo '</label>';
					}
				?>
				<Br>
				<input type="file" class="form-control" name="companygst" />
				<input type="hidden" class="form-control" id="companygst" name="companygst" placeholder="<?php echo convertlang('Company|companygst'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Company']->companygst )?>" />
				
				<?php 
					if(isset($results['Company']->companydirectordoc) && $results['Company']->companydirectordoc != "")
					{
					  echo '<br><label for="companydirectordoc">';
					 ?>
					 <?php echo convertlang('Company|companydirectordoc'); ?>
					 <?php echo '</label>';
					 
					 
					 echo "</br><img src='".htmlspecialchars( $results['Company']->companydirectordoc )."' height='100' />"; 
					 echo "<Br><span onclick=\"$('#companydirectordoc').val('');\">Remove image</span>";
					} 
					else 
					{
					 echo '<br><label for="companydirectordoc">';
					 ?>
					 <?php echo convertlang('Company|companydirectordoc'); ?>
					 <?php echo '</label>';
					}
				?>
				<Br>
				<input type="file" class="form-control" name="companydirectordoc" />
				<input type="hidden" class="form-control" id="companydirectordoc" name="companydirectordoc" placeholder="<?php echo convertlang('Company|companydirectordoc'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Company']->companydirectordoc )?>" />
					
				<input type="hidden" class="form-control" name="companycode" id="companycode" value="<?php if($results['Company']->companycode == ""){echo randomstr(15);}else{echo $results['Company']->companycode;} ?>"/>
				</br>
				<label for="adminusername"><?php echo convertlang('Company|adminusername'); ?></label>
				<input type="text" class="form-control" name="adminusername" id="adminusername" placeholder="<?php echo convertlang('Company|adminusername'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Company']->adminusername )?>" />
				</br>
				<label for="adminpassword"><?php echo convertlang('Company|adminpassword'); ?></label>
				<input type="password" list="adminpassword_suggestions" onkeyup="ajaxcomplete('ajaxlist_Company_adminpassword', 'adminpassword')" class="form-control" name="adminpassword" id="adminpassword" placeholder="<?php echo convertlang('Company|adminpassword'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Company']->adminpassword )?>" />
				<datalist id="adminpassword_suggestions">
				</datalist>
				</br>
				<label for="cashfreeapikey"><?php echo convertlang('Company|cashfreeapikey'); ?></label>
				<input type="text" class="form-control" name="cashfreeapikey" id="cashfreeapikey" placeholder="<?php echo convertlang('Company|cashfreeapikey'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Company']->cashfreeapikey )?>" />
				</br>
				<label for="cashfreeapipass"><?php echo convertlang('Company|cashfreeapipass'); ?></label>
				<input type="text" class="form-control" name="cashfreeapipass" id="cashfreeapipass" placeholder="<?php echo convertlang('Company|cashfreeapipass'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Company']->cashfreeapipass )?>" />
					
				<input type="hidden" class="form-control" name="companyaddedon" id="companyaddedon" value="<?php echo $results['Company']->companyaddedon ?>"/>
				</br>
				<label for="company_block"><?php echo convertlang('Company|company_block'); ?></label>
				<select name="company_block" class="form-control" id="company_block" placeholder="<?php echo convertlang('Company|company_block'); ?>">
				<?php 
					if($results['Company']->company_block != null)
					{
						echo '<option value="'.Flag::getByFlagvalue( $results['Company']->company_block)->flagvalue.'">'.Flag::getByFlagvalue( $results['Company']->company_block)->flagname.'</option>';
					}
						
						foreach($data_Flag["results"] as $company_block_option)
						{	
						echo '<option value="'.$company_block_option->flagvalue.'">'.$company_block_option->flagname.'</option>';	
						}
				?>	
				</select>
				
						
					<br>
						<div class="buttons">
						  <input type="submit" name="saveChanges" value="Save" />
						</div>

					  </form>
				<?php if ( $results['Company']->id ) { ?>
				<p><a href="admin.php?action=deleteCompany&amp;CompanyId=<?php echo $results['Company']->id ?>" onclick="return confirm('Delete This Company?')"><?php echo convertlang("Main|Delete Company|objname"); ?></a></p>
				<?php } ?>
				<?php include "templates/include/footer.php" ?>
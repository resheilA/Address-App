<?php include "templates/include/Companyheader.php" ?>
					
					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>

				<?php if ( isset( $results['errorMessage'] ) ) { ?>
						<div class="alert-danger"><?php echo $results['errorMessage'] ?></div>
				<?php } ?>


					  <form action="Company.php?action=<?php echo $results['formAction']?>" enctype="multipart/form-data" method="post">
						<input type="hidden" name="CustomerId" value="<?php echo $results['Customer']->id ?>"/>
		
				
							
				<input type="hidden" id="id" class="form-control" name="id" value="<?php echo $results['Customer']->id ?>"/>
				</br>
				<label for="customername"><?php echo convertlang('Customer|customername'); ?></label>
				<input type="text" class="form-control" name="customername" id="customername" placeholder="<?php echo convertlang('Customer|customername'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customer']->customername )?>" />
				</br>
				<label for="customercontactnumber"><?php echo convertlang('Customer|customercontactnumber'); ?></label>
				<input type="number" class="form-control" name="customercontactnumber" id="customercontactnumber" placeholder="<?php echo convertlang('Customer|customercontactnumber'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customer']->customercontactnumber )?>" />
				</br>
				<label for="customeremail"><?php echo convertlang('Customer|customeremail'); ?></label>
				<input type="text" class="form-control" name="customeremail" id="customeremail" placeholder="<?php echo convertlang('Customer|customeremail'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customer']->customeremail )?>" />
				</br>
				<label for="cyc"><?php echo convertlang('Customer|cyc'); ?></label>
				<input type="text" class="form-control" name="cyc" id="cyc" placeholder="<?php echo convertlang('Customer|cyc'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customer']->cyc )?>" />
				</br>
				<label for="pos"><?php echo convertlang('Customer|pos'); ?></label>
				<input type="text" class="form-control" name="pos" id="pos" placeholder="<?php echo convertlang('Customer|pos'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customer']->pos )?>" />
				</br>
				<label for="tpd"><?php echo convertlang('Customer|tpd'); ?></label>
				<input type="text" class="form-control" name="tpd" id="tpd" placeholder="<?php echo convertlang('Customer|tpd'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customer']->tpd )?>" />
				</br>
				<label for="tad"><?php echo convertlang('Customer|tad'); ?></label>
				<input type="text" class="form-control" name="tad" id="tad" placeholder="<?php echo convertlang('Customer|tad'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customer']->tad )?>" />
				</br>
				<label for="cuscost"><?php echo convertlang('Customer|cuscost'); ?></label>
				<input type="text" class="form-control" name="cuscost" id="cuscost" placeholder="<?php echo convertlang('Customer|cuscost'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customer']->cuscost )?>" />
				</br>
				<label for="cushomeaddress"><?php echo convertlang('Customer|cushomeaddress'); ?></label>
				<textarea name="cushomeaddress" class="form-control" id="cushomeaddress" style="height: 5em;"  placeholder="<?php echo convertlang('Customer|cushomeaddress'); ?>"><?php echo htmlspecialchars(  $results['Customer']->cushomeaddress )?></textarea>
				</br>
				<label for="cushomepincode"><?php echo convertlang('Customer|cushomepincode'); ?></label>
				<input type="number" class="form-control" name="cushomepincode" id="cushomepincode" placeholder="<?php echo convertlang('Customer|cushomepincode'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customer']->cushomepincode )?>" />
				</br>
				<label for="cushomelangitude"><?php echo convertlang('Customer|cushomelangitude'); ?></label>
				<input type="text" class="form-control" name="cushomelangitude" id="cushomelangitude" placeholder="<?php echo convertlang('Customer|cushomelangitude'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customer']->cushomelangitude )?>" />
				</br>
				<label for="cushomelongitude"><?php echo convertlang('Customer|cushomelongitude'); ?></label>
				<input type="text" class="form-control" name="cushomelongitude" id="cushomelongitude" placeholder="<?php echo convertlang('Customer|cushomelongitude'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customer']->cushomelongitude )?>" />
				</br>
				<label for="cusofficeaddress"><?php echo convertlang('Customer|cusofficeaddress'); ?></label>
				<textarea name="cusofficeaddress" class="form-control" id="cusofficeaddress" style="height: 5em;"  placeholder="<?php echo convertlang('Customer|cusofficeaddress'); ?>"><?php echo htmlspecialchars(  $results['Customer']->cusofficeaddress )?></textarea>
				</br>
				<label for="cusofficepincode"><?php echo convertlang('Customer|cusofficepincode'); ?></label>
				<input type="number" class="form-control" name="cusofficepincode" id="cusofficepincode" placeholder="<?php echo convertlang('Customer|cusofficepincode'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customer']->cusofficepincode )?>" />
				</br>
				<label for="cusofficelangitude"><?php echo convertlang('Customer|cusofficelangitude'); ?></label>
				<input type="text" class="form-control" name="cusofficelangitude" id="cusofficelangitude" placeholder="<?php echo convertlang('Customer|cusofficelangitude'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customer']->cusofficelangitude )?>" />
				</br>
				<label for="cusofficelongitude"><?php echo convertlang('Customer|cusofficelongitude'); ?></label>
				<input type="text" class="form-control" name="cusofficelongitude" id="cusofficelongitude" placeholder="<?php echo convertlang('Customer|cusofficelongitude'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customer']->cusofficelongitude )?>" />
				</br>
				<label for="cusarea"><?php echo convertlang('Customer|cusarea'); ?></label>
				<input type="text" class="form-control" name="cusarea" id="cusarea" placeholder="<?php echo convertlang('Customer|cusarea'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customer']->cusarea )?>" />
				</br>
				<label for="customernote"><?php echo convertlang('Customer|customernote'); ?></label>
				<textarea name="customernote" class="form-control" id="customernote" style="height: 5em;"  placeholder="<?php echo convertlang('Customer|customernote'); ?>"><?php echo htmlspecialchars(  $results['Customer']->customernote )?></textarea>
					
				<input type="hidden" class="form-control" id="cuscode" name="cuscode" value="<?php if($results['Customer']->cuscode == ""){echo randomstr(15);}else{echo $results['Customer']->cuscode;} ?>"/>
				</br>
				<label for="assigned_to"><?php echo convertlang('Customer|assigned_to'); ?></label>
				<select name="assigned_to" class="form-control" id="assigned_to" placeholder="<?php echo convertlang('Customer|assigned_to'); ?>">
				<?php 
					if($results['Customer']->assigned_to != null)
					{
						echo '<option value="'.Riders::getByRidercode( $results['Customer']->assigned_to)->ridercode.'">'.Riders::getByRidercode( $results['Customer']->assigned_to)->ridername.'</option>';
					}
						
						foreach($data_Riders["results"] as $assigned_to_option)
						{	
						echo '<option value="'.$assigned_to_option->ridercode.'">'.$assigned_to_option->ridername.'</option>';	
						}
				?>	
				</select>
				</br>
				<label for="customer_block"><?php echo convertlang('Customer|customer_block'); ?></label>
				<select name="customer_block" class="form-control" id="customer_block" placeholder="<?php echo convertlang('Customer|customer_block'); ?>">
				<?php 
					if($results['Customer']->customer_block != null)
					{
						echo '<option value="'.Flag::getByFlagvalue( $results['Customer']->customer_block)->flagvalue.'">'.Flag::getByFlagvalue( $results['Customer']->customer_block)->flagname.'</option>';
					}
						
						foreach($data_Flag["results"] as $customer_block_option)
						{	
						echo '<option value="'.$customer_block_option->flagvalue.'">'.$customer_block_option->flagname.'</option>';	
						}
				?>	
				</select>
				<?php $results['Customer']->assigned_company = $_SESSION["companycode"]; ?>	
				<input type="hidden" id="assigned_company" class="form-control" name="assigned_company" value="<?php echo $results['Customer']->assigned_company ?>"/>
				</br>
				<label for="customercampaign"><?php echo convertlang('Customer|customercampaign'); ?></label>
				<select name="customercampaign" class="form-control" id="customercampaign" placeholder="<?php echo convertlang('Customer|customercampaign'); ?>">
				<?php 
					if($results['Customer']->customercampaign != null)
					{
						echo '<option value="'.Campaign::getById( $results['Customer']->customercampaign)->id.'">'.Campaign::getById( $results['Customer']->customercampaign)->campaignname.'</option>';
					}
						
						foreach($data_Campaign["results"] as $customercampaign_option)
						{	
						echo '<option value="'.$customercampaign_option->id.'">'.$customercampaign_option->campaignname.'</option>';	
						}
				?>	
				</select>
					
				<input type="hidden" id="customeraddedon" class="form-control" name="customeraddedon" value="<?php echo $results['Customer']->customeraddedon ?>"/>
				
						
					<br>
						<div class="buttons">
						  <input type="submit" name="saveChanges" value="Save" />
						</div>

					  </form>
				<?php if ( $results['Customer']->id ) { ?>
				<p><a href="Company.php?action=deleteCustomer&amp;CustomerId=<?php echo $results['Customer']->id ?>" onclick="return confirm('Delete This Customer?')"></p>
				<?php } ?>
				<?php include "templates/include/footer.php" ?>
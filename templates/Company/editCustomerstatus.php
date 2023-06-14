<?php include "templates/include/Companyheader.php" ?>
					
					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>

				<?php if ( isset( $results['errorMessage'] ) ) { ?>
						<div class="alert-danger"><?php echo $results['errorMessage'] ?></div>
				<?php } ?>


					  <form action="Company.php?action=<?php echo $results['formAction']?>" enctype="multipart/form-data" method="post">
						<input type="hidden" name="CustomerstatusId" value="<?php echo $results['Customerstatus']->id ?>"/>
		
				
							
				<input type="hidden" id="id" class="form-control" name="id" value="<?php echo $results['Customerstatus']->id ?>"/>
					
				<input type="hidden" id="latitude" class="form-control" name="latitude" value="<?php echo $results['Customerstatus']->latitude ?>"/>
					
				<input type="hidden" id="longitude" class="form-control" name="longitude" value="<?php echo $results['Customerstatus']->longitude ?>"/>
				
				<?php 
					if(isset($results['Customerstatus']->visitpicture1) && $results['Customerstatus']->visitpicture1 != "")
					{
					  echo '<br><label for="visitpicture1">';
					 ?>
					 <?php echo convertlang('Customerstatus|visitpicture1'); ?>
					 <?php echo '</label>';
					 
					 
					 echo "</br><img src='".htmlspecialchars( $results['Customerstatus']->visitpicture1 )."' height='100' />"; 
					 echo "<Br><span onclick=\"$('#visitpicture1').val('');\">Remove image</span>";
					} 
					else 
					{
					 echo '<br><label for="visitpicture1">';
					 ?>
					 <?php echo convertlang('Customerstatus|visitpicture1'); ?>
					 <?php echo '</label>';
					}
				?>
				<Br>
				<input type="file" class="text-control" name="visitpicture1" />
				<input type="hidden" class="text-control" name="visitpicture1" id="visitpicture1" placeholder="<?php echo convertlang('Customerstatus|visitpicture1'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customerstatus']->visitpicture1 )?>" />
				
				<?php 
					if(isset($results['Customerstatus']->visitpicture2) && $results['Customerstatus']->visitpicture2 != "")
					{
					  echo '<br><label for="visitpicture2">';
					 ?>
					 <?php echo convertlang('Customerstatus|visitpicture2'); ?>
					 <?php echo '</label>';
					 
					 
					 echo "</br><img src='".htmlspecialchars( $results['Customerstatus']->visitpicture2 )."' height='100' />"; 
					 echo "<Br><span onclick=\"$('#visitpicture2').val('');\">Remove image</span>";
					} 
					else 
					{
					 echo '<br><label for="visitpicture2">';
					 ?>
					 <?php echo convertlang('Customerstatus|visitpicture2'); ?>
					 <?php echo '</label>';
					}
				?>
				<Br>
				<input type="file" class="form-control" name="visitpicture2" />
				<input type="hidden" class="form-control" name="visitpicture2" id="visitpicture2" placeholder="<?php echo convertlang('Customerstatus|visitpicture2'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customerstatus']->visitpicture2 )?>" />
				
				<?php 
					if(isset($results['Customerstatus']->visitpicture3) && $results['Customerstatus']->visitpicture3 != "")
					{
					  echo '<br><label for="visitpicture3">';
					 ?>
					 <?php echo convertlang('Customerstatus|visitpicture3'); ?>
					 <?php echo '</label>';
					 
					 
					 echo "</br><img src='".htmlspecialchars( $results['Customerstatus']->visitpicture3 )."' height='100' />"; 
					 echo "<Br><span onclick=\"$('#visitpicture3').val('');\">Remove image</span>";
					} 
					else 
					{
					 echo '<br><label for="visitpicture3">';
					 ?>
					 <?php echo convertlang('Customerstatus|visitpicture3'); ?>
					 <?php echo '</label>';
					}
				?>
				<Br>
				<input type="file" class="form-control" name="visitpicture3" />
				<input type="hidden" class="form-control" name="visitpicture3" id="visitpicture3" placeholder="<?php echo convertlang('Customerstatus|visitpicture3'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customerstatus']->visitpicture3 )?>" />
				</br>
				<label for="collectedamount"><?php echo convertlang('Customerstatus|collectedamount'); ?></label>
				<input type="number" class="form-control" name="collectedamount" id="collectedamount" placeholder="<?php echo convertlang('Customerstatus|collectedamount'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customerstatus']->collectedamount )?>" />
				</br>
				<label for="code"><?php echo convertlang('Customerstatus|code'); ?></label>
				<input type="text" class="form-control" name="code" id="code" placeholder="<?php echo convertlang('Customerstatus|code'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Customerstatus']->code )?>" />
				</br>
				<label for="remarks"><?php echo convertlang('Customerstatus|remarks'); ?></label>
				<textarea name="remarks" class="form-control" id="remarks" style="height: 5em;"  placeholder="<?php echo convertlang('Customerstatus|remarks'); ?>"><?php echo htmlspecialchars(  $results['Customerstatus']->remarks )?></textarea>
				</br>
				<label for="customer"><?php echo convertlang('Customerstatus|customer'); ?></label>
				<select name="customer" class="form-control" id="customer" placeholder="<?php echo convertlang('Customerstatus|customer'); ?>">
				<?php 
					if($results['Customerstatus']->customer != null)
					{
						echo '<option value="'.Customer::getById( $results['Customerstatus']->customer)->id.'">'.Customer::getById( $results['Customerstatus']->customer)->customername.'</option>';
					}
						
						foreach($data_Customer["results"] as $customer_option)
						{	
						echo '<option value="'.$customer_option->id.'">'.$customer_option->customername.'</option>';	
						}
				?>	
				</select>
				<?php $results['Customerstatus']->statuscompany = $_SESSION["companycode"]; ?>	
				<input type="hidden" id="statuscompany" class="form-control" name="statuscompany" value="<?php echo $results['Customerstatus']->statuscompany ?>"/>
					
				<input type="hidden" id="statusrider" class="form-control" name="statusrider" value="<?php echo $results['Customerstatus']->statusrider ?>"/>
					
				<input type="hidden" class="form-control" id="cusstatecode" name="cusstatecode" value="<?php if($results['Customerstatus']->cusstatecode == ""){echo randomstr(15);}else{echo $results['Customerstatus']->cusstatecode;} ?>"/>
				
						
					<br>
						<div class="buttons">
						  <input type="submit" name="saveChanges" value="Save" />
						</div>

					  </form>
				<?php if ( $results['Customerstatus']->id ) { ?>
				<p><a href="Company.php?action=deleteCustomerstatus&amp;CustomerstatusId=<?php echo $results['Customerstatus']->id ?>" onclick="return confirm('Delete This Customerstatus?')"></p>
				<?php } ?>
				<?php include "templates/include/footer.php" ?>
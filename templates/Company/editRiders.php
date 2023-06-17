<?php include "templates/include/Companyheader.php" ?>
					
					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>

				<?php if ( isset( $results['errorMessage'] ) ) { ?>
						<div class="alert-danger"><?php echo $results['errorMessage'] ?></div>
				<?php } ?>


					  <form action="Company.php?action=<?php echo $results['formAction']?>" enctype="multipart/form-data" method="post">
						<input type="hidden" name="RidersId" value="<?php echo $results['Riders']->id ?>"/>
		
				
							
				<input type="hidden" id="id" class="form-control" name="id" value="<?php echo $results['Riders']->id ?>"/>
				</br>
				<label for="ridername"><?php echo convertlang('Riders|ridername'); ?></label>
				<input type="text" class="form-control" name="ridername" id="ridername" placeholder="<?php echo convertlang('Riders|ridername'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Riders']->ridername )?>" />
				</br>
				<label for="rideraddress"><?php echo convertlang('Riders|rideraddress'); ?></label>
				<input type="text" class="form-control" name="rideraddress" id="rideraddress" placeholder="<?php echo convertlang('Riders|rideraddress'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Riders']->rideraddress )?>" />
				</br>
				<label for="ridercontactnumber"><?php echo convertlang('Riders|ridercontactnumber'); ?></label>
				<input type="number" class="form-control" name="ridercontactnumber" id="ridercontactnumber" placeholder="<?php echo convertlang('Riders|ridercontactnumber'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Riders']->ridercontactnumber )?>" />
				<?php $results['Riders']->ridercompany = $_SESSION["companycode"]; ?>	
				<input type="hidden" id="ridercompany" class="form-control" name="ridercompany" value="<?php echo $results['Riders']->ridercompany ?>"/>
				</br>
				<label for="riderage"><?php echo convertlang('Riders|riderage'); ?></label>
				<input type="date" class="form-control" name="riderage" id="riderage" placeholder="<?php echo convertlang('Riders|riderage'); ?>" value="<?php echo htmlspecialchars( $results['Riders']->riderage )?>" />
				
				<?php 
					if(isset($results['Riders']->riderprofilepic) && $results['Riders']->riderprofilepic != "")
					{
					  echo '<br><label for="riderprofilepic">';
					 ?>
					 <?php echo convertlang('Riders|riderprofilepic'); ?>
					 <?php echo '</label>';
					 
					 
					 echo "</br><img src='".htmlspecialchars( $results['Riders']->riderprofilepic )."' height='100' />"; 
					 echo "<Br><span onclick=\"$('#riderprofilepic').val('');\">Remove image</span>";
					} 
					else 
					{
					 echo '<br><label for="riderprofilepic">';
					 ?>
					 <?php echo convertlang('Riders|riderprofilepic'); ?>
					 <?php echo '</label>';
					}
				?>
				<Br>
				<input type="file" class="form-control" name="riderprofilepic" />
				<input type="hidden" class="form-control" name="riderprofilepic" id="riderprofilepic" placeholder="<?php echo convertlang('Riders|riderprofilepic'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Riders']->riderprofilepic )?>" />
				
				<?php 
					if(isset($results['Riders']->rideraadharcard) && $results['Riders']->rideraadharcard != "")
					{
					  echo '<br><label for="rideraadharcard">';
					 ?>
					 <?php echo convertlang('Riders|rideraadharcard'); ?>
					 <?php echo '</label>';
					 
					 
					 echo "</br><img src='".htmlspecialchars( $results['Riders']->rideraadharcard )."' height='100' />"; 
					 echo "<Br><span onclick=\"$('#rideraadharcard').val('');\">Remove image</span>";
					} 
					else 
					{
					 echo '<br><label for="rideraadharcard">';
					 ?>
					 <?php echo convertlang('Riders|rideraadharcard'); ?>
					 <?php echo '</label>';
					}
				?>
				<Br>
				<input type="file" class="form-control" name="rideraadharcard" />
				<input type="hidden" class="form-control" name="rideraadharcard" id="rideraadharcard" placeholder="<?php echo convertlang('Riders|rideraadharcard'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Riders']->rideraadharcard )?>" />
				
				<?php 
					if(isset($results['Riders']->riderpancard) && $results['Riders']->riderpancard != "")
					{
					  echo '<br><label for="riderpancard">';
					 ?>
					 <?php echo convertlang('Riders|riderpancard'); ?>
					 <?php echo '</label>';
					 
					 
					 echo "</br><img src='".htmlspecialchars( $results['Riders']->riderpancard )."' height='100' />"; 
					 echo "<Br><span onclick=\"$('#riderpancard').val('');\">Remove image</span>";
					} 
					else 
					{
					 echo '<br><label for="riderpancard">';
					 ?>
					 <?php echo convertlang('Riders|riderpancard'); ?>
					 <?php echo '</label>';
					}
				?>
				<Br>
				<input type="file" class="form-control" name="riderpancard" />
				<input type="hidden" class="form-control" name="riderpancard" id="riderpancard" placeholder="<?php echo convertlang('Riders|riderpancard'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Riders']->riderpancard )?>" />
				
				<?php 
					if(isset($results['Riders']->riderresidence) && $results['Riders']->riderresidence != "")
					{
					  echo '<br><label for="riderresidence">';
					 ?>
					 <?php echo convertlang('Riders|riderresidence'); ?>
					 <?php echo '</label>';
					 
					 
					 echo "</br><img src='".htmlspecialchars( $results['Riders']->riderresidence )."' height='100' />"; 
					 echo "<Br><span onclick=\"$('#riderresidence').val('');\">Remove image</span>";
					} 
					else 
					{
					 echo '<br><label for="riderresidence">';
					 ?>
					 <?php echo convertlang('Riders|riderresidence'); ?>
					 <?php echo '</label>';
					}
				?>
				<Br>
				<input type="file" class="form-control" name="riderresidence" />
				<input type="hidden" class="form-control" name="riderresidence" id="riderresidence" placeholder="<?php echo convertlang('Riders|riderresidence'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Riders']->riderresidence )?>" />
				
				<?php 
					if(isset($results['Riders']->riderdra) && $results['Riders']->riderdra != "")
					{
					  echo '<br><label for="riderdra">';
					 ?>
					 <?php echo convertlang('Riders|riderdra'); ?>
					 <?php echo '</label>';
					 
					 
					 echo "</br><img src='".htmlspecialchars( $results['Riders']->riderdra )."' height='100' />"; 
					 echo "<Br><span onclick=\"$('#riderdra').val('');\">Remove image</span>";
					} 
					else 
					{
					 echo '<br><label for="riderdra">';
					 ?>
					 <?php echo convertlang('Riders|riderdra'); ?>
					 <?php echo '</label>';
					}
				?>
				<Br>
				<input type="file" class="form-control" name="riderdra" />
				<input type="hidden" class="form-control" name="riderdra" id="riderdra" placeholder="<?php echo convertlang('Riders|riderdra'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Riders']->riderdra )?>" />
				
				<?php 
					if(isset($results['Riders']->riderpcc) && $results['Riders']->riderpcc != "")
					{
					  echo '<br><label for="riderpcc">';
					 ?>
					 <?php echo convertlang('Riders|riderpcc'); ?>
					 <?php echo '</label>';
					 
					 
					 echo "</br><img src='".htmlspecialchars( $results['Riders']->riderpcc )."' height='100' />"; 
					 echo "<Br><span onclick=\"$('#riderpcc').val('');\">Remove image</span>";
					} 
					else 
					{
					 echo '<br><label for="riderpcc">';
					 ?>
					 <?php echo convertlang('Riders|riderpcc'); ?>
					 <?php echo '</label>';
					}
				?>
				<Br>
				<input type="file" class="form-control" name="riderpcc" />
				<input type="hidden" class="form-control" name="riderpcc" id="riderpcc" placeholder="<?php echo convertlang('Riders|riderpcc'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Riders']->riderpcc )?>" />
				</br>
				<label for="bankaccno"><?php echo convertlang('Riders|bankaccno'); ?></label>
				<input type="text" class="form-control" name="bankaccno" id="bankaccno" placeholder="<?php echo convertlang('Riders|bankaccno'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Riders']->bankaccno )?>" />
				</br>
				<label for="bankifsc"><?php echo convertlang('Riders|bankifsc'); ?></label>
				<input type="text" class="form-control" name="bankifsc" id="bankifsc" placeholder="<?php echo convertlang('Riders|bankifsc'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Riders']->bankifsc )?>" />
					
				<input type="hidden" class="form-control" id="riderbeneid" name="riderbeneid" value="<?php if($results['Riders']->riderbeneid == ""){echo randomstr(15);}else{echo $results['Riders']->riderbeneid;} ?>"/>
					
				<input type="hidden" class="form-control" id="ridercode" name="ridercode" value="<?php if($results['Riders']->ridercode == ""){echo randomstr(15);}else{echo $results['Riders']->ridercode;} ?>"/>
				</br>
				<label for="password"><?php echo convertlang('Riders|password'); ?></label>
				<input type="password" list="password_suggestions" onkeyup="ajaxcomplete('ajaxlist_Riders_password', 'password')" class="form-control" name="password" id="password" placeholder="<?php echo convertlang('Riders|password'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Riders']->password )?>" />
				<datalist id="password_suggestions">
				</datalist>
				</br>
				<label for="rider_block"><?php echo convertlang('Riders|rider_block'); ?></label>
				<select name="rider_block" class="form-control" id="rider_block" placeholder="<?php echo convertlang('Riders|rider_block'); ?>">
				<?php 
					if($results['Riders']->rider_block != null)
					{
						echo '<option value="'.Flag::getByFlagvalue( $results['Riders']->rider_block)->flagvalue.'">'.Flag::getByFlagvalue( $results['Riders']->rider_block)->flagname.'</option>';
					}
						
						foreach($data_Flag["results"] as $rider_block_option)
						{	
						echo '<option value="'.$rider_block_option->flagvalue.'">'.$rider_block_option->flagname.'</option>';	
						}
				?>	
				</select>
					
				<input type="hidden" id="rideraddedon" class="form-control" name="rideraddedon" value="<?php echo $results['Riders']->rideraddedon ?>"/>
				
						
					<br>
						<div class="buttons">
						  <input type="submit" name="saveChanges" value="Save" />
						</div>

					  </form>
				<?php if ( $results['Riders']->id ) { ?>
				<p><a href="Company.php?action=deleteRiders&amp;RidersId=<?php echo $results['Riders']->id ?>" onclick="return confirm('Delete This Riders?')"></p>
				<?php } ?>
				<?php include "templates/include/footer.php" ?>
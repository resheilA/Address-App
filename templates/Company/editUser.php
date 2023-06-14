<?php include "templates/include/Companyheader.php" ?>
					
					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>

				<?php if ( isset( $results['errorMessage'] ) ) { ?>
						<div class="alert-danger"><?php echo $results['errorMessage'] ?></div>
				<?php } ?>


					  <form action="Company.php?action=<?php echo $results['formAction']?>" enctype="multipart/form-data" method="post">
						<input type="hidden" name="UserId" value="<?php echo $results['User']->id ?>"/>
		
				
							
				<input type="hidden" id="id" class="form-control" name="id" value="<?php echo $results['User']->id ?>"/>
					
				<input type="hidden" class="form-control" id="usercode" name="usercode" value="<?php if($results['User']->usercode == ""){echo randomstr(15);}else{echo $results['User']->usercode;} ?>"/>
				</br>
				<label for="fullname"><?php echo convertlang('User|fullname'); ?></label>
				<input type="text" class="form-control" name="fullname" id="fullname" placeholder="<?php echo convertlang('User|fullname'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['User']->fullname )?>" />
				</br>
				<label for="contact"><?php echo convertlang('User|contact'); ?></label>
				<input type="number" class="form-control" name="contact" id="contact" placeholder="<?php echo convertlang('User|contact'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['User']->contact )?>" />
				</br>
				<label for="username"><?php echo convertlang('User|username'); ?></label>
				<input type="text" class="form-control" name="username" id="username" placeholder="<?php echo convertlang('User|username'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['User']->username )?>" />
				</br>
				<label for="userpassword"><?php echo convertlang('User|userpassword'); ?></label>
				<input type="password" list="userpassword_suggestions" onkeyup="ajaxcomplete('ajaxlist_User_userpassword', 'userpassword')" class="form-control" name="userpassword" id="userpassword" placeholder="<?php echo convertlang('User|userpassword'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['User']->userpassword )?>" />
				<datalist id="userpassword_suggestions">
				</datalist>
				<?php $results['User']->usercompany = $_SESSION["companycode"]; ?>	
				<input type="hidden" id="usercompany" class="form-control" name="usercompany" value="<?php echo $results['User']->usercompany ?>"/>
				</br>
				<label for="user_block"><?php echo convertlang('User|user_block'); ?></label>
				<select name="user_block" class="form-control" id="user_block" placeholder="<?php echo convertlang('User|user_block'); ?>">
				<?php 
					if($results['User']->user_block != null)
					{
						echo '<option value="'.Flag::getByFlagvalue( $results['User']->user_block)->flagvalue.'">'.Flag::getByFlagvalue( $results['User']->user_block)->flagname.'</option>';
					}
						
						foreach($data_Flag["results"] as $user_block_option)
						{	
						echo '<option value="'.$user_block_option->flagvalue.'">'.$user_block_option->flagname.'</option>';	
						}
				?>	
				</select>
				
						
					<br>
						<div class="buttons">
						  <input type="submit" name="saveChanges" value="Save" />
						</div>

					  </form>
				<?php if ( $results['User']->id ) { ?>
				<p><a href="Company.php?action=deleteUser&amp;UserId=<?php echo $results['User']->id ?>" onclick="return confirm('Delete This User?')"></p>
				<?php } ?>
				<?php include "templates/include/footer.php" ?>
<?php include "templates/include/header.php" ?>
					
					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>

				<?php if ( isset( $results['errorMessage'] ) ) { ?>
						<div class="alert-danger"><?php echo $results['errorMessage'] ?></div>
				<?php } ?>


					  <form action="admin.php?action=<?php echo $results['formAction']?>" enctype="multipart/form-data" method="post">
						<input type="hidden" name="FlagId" value="<?php echo $results['Flag']->id ?>"/>
		
				
							
				<input type="hidden" class="form-control" name="id" id="id" value="<?php echo $results['Flag']->id ?>"/>
				</br>
				<label for="flagname"><?php echo convertlang('Flag|flagname'); ?></label>
				<input type="text" class="form-control" name="flagname" id="flagname" placeholder="<?php echo convertlang('Flag|flagname'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Flag']->flagname )?>" />
				</br>
				<label for="flagvalue"><?php echo convertlang('Flag|flagvalue'); ?></label>
				<input type="number" class="form-control" name="flagvalue" id="flagvalue" placeholder="<?php echo convertlang('Flag|flagvalue'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Flag']->flagvalue )?>" />
				
						
					<br>
						<div class="buttons">
						  <input type="submit" name="saveChanges" value="Save" />
						</div>

					  </form>
				<?php if ( $results['Flag']->id ) { ?>
				<p><a href="admin.php?action=deleteFlag&amp;FlagId=<?php echo $results['Flag']->id ?>" onclick="return confirm('Delete This Flag?')"><?php echo convertlang("Main|Delete Flag|objname"); ?></a></p>
				<?php } ?>
				<?php include "templates/include/footer.php" ?>
<?php include "templates/include/header.php" ?>
					
					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>

				<?php if ( isset( $results['errorMessage'] ) ) { ?>
						<div class="alert-danger"><?php echo $results['errorMessage'] ?></div>
				<?php } ?>


					  <form action="admin.php?action=<?php echo $results['formAction']?>" enctype="multipart/form-data" method="post">
						<input type="hidden" name="PaymentmodeId" value="<?php echo $results['Paymentmode']->id ?>"/>
		
				
							
				<input type="hidden" class="form-control" name="id" id="id" value="<?php echo $results['Paymentmode']->id ?>"/>
				</br>
				<label for="paymentmodename"><?php echo convertlang('Paymentmode|paymentmodename'); ?></label>
				<input type="text" class="form-control" name="paymentmodename" id="paymentmodename" placeholder="<?php echo convertlang('Paymentmode|paymentmodename'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Paymentmode']->paymentmodename )?>" />
				
						
					<br>
						<div class="buttons">
						  <input type="submit" name="saveChanges" value="Save" />
						</div>

					  </form>
				<?php if ( $results['Paymentmode']->id ) { ?>
				<p><a href="admin.php?action=deletePaymentmode&amp;PaymentmodeId=<?php echo $results['Paymentmode']->id ?>" onclick="return confirm('Delete This Paymentmode?')"><?php echo convertlang("Main|Delete Paymentmode|objname"); ?></a></p>
				<?php } ?>
				<?php include "templates/include/footer.php" ?>
<?php include "templates/include/Ridersheader.php" ?>
						<br><br>
						  <h1><?php echo convertlang($results['pageTitle']); ?></h1>
						 <?php 
		if(isset($errorarray))
		{
			foreach($errorarray as $err)
			{
				echo '<div class="alert alert-danger" role="alert">'.$err.'</div>';
			}
		}
		
		?>
		<?php echo '<div class="alert alert-info" role="info">'.$uploadstr.'</div>'; ?><?php include "templates/include/footer.php" ?>
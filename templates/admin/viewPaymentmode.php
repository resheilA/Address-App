
<?php include "templates/include/header.php" ?>

					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>
					   <?php 
					   echo 
					   "<a href='admin.php?action=editPaymentmode&PaymentmodeId=".$results["Paymentmode"]->id."'><button class='btn-primary'>".convertlang("Main|Edit")."</button></a>
					   ";
					   ?>
					   
					     <?php 
					   echo 
					   "<a href='admin.php?action=deletePaymentmode&PaymentmodeId=".$results["Paymentmode"]->id."'><button class='btn-danger'  onclick='return confirm(\"".convertlang("Main|Delete Paymentmode|objname")." ?\")'>".convertlang("Main|Delete")."</button></a>
					   ";
					   ?>
			<hr>
			<table class="table">
				<tbody>
      			
					<tr>
						<td><?php echo convertlang("Paymentmode|id"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Paymentmode']->id ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Paymentmode|paymentmodename"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Paymentmode']->paymentmodename ); ?></td>
					</tr>	
			
	  </tbody>
			</table>
      <p><a href="admin.php?action=listPaymentmode">Return to Homepage</a></p>

<?php include "templates/include/footer.php" ?>
	
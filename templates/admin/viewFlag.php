
<?php include "templates/include/header.php" ?>

					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>
					   <?php 
					   echo 
					   "<a href='admin.php?action=editFlag&FlagId=".$results["Flag"]->id."'><button class='btn-primary'>".convertlang("Main|Edit")."</button></a>
					   ";
					   ?>
					   
					     <?php 
					   echo 
					   "<a href='admin.php?action=deleteFlag&FlagId=".$results["Flag"]->id."'><button class='btn-danger'  onclick='return confirm(\"".convertlang("Main|Delete Flag|objname")." ?\")'>".convertlang("Main|Delete")."</button></a>
					   ";
					   ?>
			<hr>
			<table class="table">
				<tbody>
      			
					<tr>
						<td><?php echo convertlang("Flag|id"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Flag']->id ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Flag|flagname"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Flag']->flagname ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Flag|flagvalue"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Flag']->flagvalue ); ?></td>
					</tr>	
			
	  </tbody>
			</table>
      <p><a href="admin.php?action=listFlag">Return to Homepage</a></p>

<?php include "templates/include/footer.php" ?>
	
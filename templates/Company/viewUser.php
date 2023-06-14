
<?php include "templates/include/Companyheader.php" ?>

					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>
					
					   <?php 
					   echo 
					   "<a href='Company.php?action=editUser&UserId=".$results["User"]->id."'><button class='btn-primary'>".convertlang("Main|Edit")."</button></a>
					   ";
					   ?>
										
					     <?php 
					   echo 
					   "<a href='Company.php?action=deleteUser&UserId=".$results["User"]->id."'><button class='btn-danger'  onclick='return confirm(\"".convertlang("Main|Delete User|objname")." ?\")'>".convertlang("Main|Delete")."</button></a>
					   ";
					   ?>
						
			<hr>
			<table class="table">
				<tbody>
      			
					<tr>
						<td><?php echo convertlang("User|id"); ?></td> 
						<td><?php echo htmlspecialchars( $results['User']->id ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("User|usercode"); ?></td> 
						<td><?php echo htmlspecialchars( $results['User']->usercode ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("User|fullname"); ?></td> 
						<td><?php echo htmlspecialchars( $results['User']->fullname ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("User|contact"); ?></td> 
						<td><?php echo htmlspecialchars( $results['User']->contact ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("User|username"); ?></td> 
						<td><?php echo htmlspecialchars( $results['User']->username ); ?></td>
					</tr>	
			<?php $results['User']->userpassword= "*******"; ?>			
					<tr>
						<td><?php echo convertlang("User|userpassword"); ?></td> 
						<td><?php echo htmlspecialchars( $results['User']->userpassword ); ?></td>
					</tr>	
			<tr>
				<td><?php echo convertlang("User|usercompany"); ?></td> 
				<td><?php echo Company::getByCompanycode( $results["User"]->usercompany)->companyname; ?></td>
				</tr><tr>
				<td><?php echo convertlang("User|user_block"); ?></td> 
				<td><?php echo Flag::getByFlagvalue( $results["User"]->user_block)->flagname; ?></td>
				</tr>
	  </tbody>
			</table>
      <p><a href="Company.php?action=listUser">Return to Homepage</a></p>

<?php include "templates/include/footer.php" ?>
	
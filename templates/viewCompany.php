
<?php include "templates/include/user_header.php" ?>

      <p style="width: 75%;"><?php echo htmlspecialchars( $results['Company']->id ); ?></h1><p style="width: 75%;"><?php echo htmlspecialchars( $results['Company']->companyname ); ?></h1><p style="width: 75%;"><?php echo htmlspecialchars( $results['Company']->gstno ); ?></h1><p style="width: 75%;"><?php echo htmlspecialchars( $results['Company']->companycontact ); ?></h1><p style="width: 75%;"><?php echo htmlspecialchars( $results['Company']->companyaddress ); ?></h1><p style="width: 75%;"><?php echo htmlspecialchars( $results['Company']->logo ); ?></h1><p style="width: 75%;"><?php echo htmlspecialchars( $results['Company']->uni_code ); ?></h1><p style="width: 75%;"><?php echo htmlspecialchars( $results['Company']->adminusername ); ?></h1><p style="width: 75%;"><?php echo htmlspecialchars( $results['Company']->adminpassword ); ?></h1>
      <p><a href="./">Return to Homepage</a></p>

<?php include "templates/include/user_footer.php" ?>
	

				function signup() {
					  // User has not posted the article edit form yet: display the form
					$data_Company = Company::getListall();$data_Flag = Flag::getListall();
					$results['Riders'] = new Riders;
					  
					  if ( isset( $_POST["saveChanges"] ) ) {
						
					
					
					include_once("external/validations.php");
					$checkvalidation = checkvalidation();
					
					// User has posted the Riders edit form: save the new Riders
					$Riders = new Riders;
					$Riders->storeFormValues( $_POST );
					
					include("external/class/beforeupdate_Riders.php");
					
					if($checkvalidation == true)
					{
						$Riders->saveimage($_FILES);
						$Riders->insert();
						include("external/class/afterinsert_Riders.php");
						header( "Location: Riders.php?action=listRiders&status=changesSaved" );
					}
					else
					{
						$results["errorMessage"] = '<p class="p-2">Error: Please check the information entered.</p>';
						$results["Riders"] = $Riders;						
						require( TEMPLATE_PATH . "/Riders/Riderssignup.php" );
					}												
						
				  } 
				  elseif ( isset( $_GET["error"] ) ) {
					if ( $_GET["error"] == "duplicate" ) $results["errorMessage"] = "Error: Riders already exist in system.";
				  }
				  else
				  {
					$results['formAction'] = "signup";
					require( TEMPLATE_PATH . "/Riders/Riderssignup.php" );
				  }
				}
				
			function editRiders() {
					
				 $results = array();
				 $results['pageTitle'] = 'Main|Edit Riders|objname';
				 $results['formAction'] = "editRiders";

				  if ( isset( $_POST['saveChanges'] ) ) {

					// User has posted the article edit form: save the article changes
					
					
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
					
					if ( !$Riders = Riders::getById( (int)$_POST['RidersId'] ) ) {
					  header( "Location: Riders.php?error=RidersNotFound" );
					  return;
					}

					$Riders->storeFormValues( $_POST );
					
					include('external/class/beforeupdate_Riders.php');
					
					if($checkvalidation == true)
					{
					$Riders->saveimage($_FILES);					
					$Riders->update();
					include('external/class/afterupdate_Riders.php');
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Riders'] = $Riders;						
						require( TEMPLATE_PATH . "/Riders/editRiders.php" );
					}		
					
					header( "Location: Riders.php?action=listRiders&status=changesSaved" );	
					die();
					
				  } elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Riders list
					header( "Location: Riders.php" );
				  } else {
					
					// User has not posted the Riders edit form yet: display the form
					$data_Company = Company::getListall();$data_Flag = Flag::getListall();
					$results['Riders'] = Riders::getByRidercode( $_SESSION['ridercode'] );					
					}
					
					require( TEMPLATE_PATH . "/Riders/editRiders.php" );
				  }

			?>
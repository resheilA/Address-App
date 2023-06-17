
<?php

require( "config.php" );
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";
$_SESSION["domainid"] = 1;
if ( $action != "login" && $action != "logout" && !$username ) {
  login();
  exit;
}

switch ( $action ) {
  case 'login':
    login();
    break;
  case 'logout':
    logout();
  case 'dashboard':
    dashboard();
    break;
  
			  case 'newCompany':
				newCompany();
				break;
			  case 'editCompany':
				editCompany();
				break;
			  case 'deleteCompany':
				deleteCompany();
				break;
			  case 'listCompany':
				listCompany();
				break;	
			  case 'viewCompany':
				viewCompany();
				break;		
			
			  case 'newRiders':
				newRiders();
				break;
			  case 'editRiders':
				editRiders();
				break;
			  case 'deleteRiders':
				deleteRiders();
				break;
			  case 'listRiders':
				listRiders();
				break;	
			  case 'viewRiders':
				viewRiders();
				break;		
			
			  case 'newCustomer':
				newCustomer();
				break;
			  case 'editCustomer':
				editCustomer();
				break;
			  case 'deleteCustomer':
				deleteCustomer();
				break;
			  case 'listCustomer':
				listCustomer();
				break;	
			  case 'viewCustomer':
				viewCustomer();
				break;		
			
			  case 'newCustomerstatus':
				newCustomerstatus();
				break;
			  case 'editCustomerstatus':
				editCustomerstatus();
				break;
			  case 'deleteCustomerstatus':
				deleteCustomerstatus();
				break;
			  case 'listCustomerstatus':
				listCustomerstatus();
				break;	
			  case 'viewCustomerstatus':
				viewCustomerstatus();
				break;		
			
			  case 'newPayout':
				newPayout();
				break;
			  case 'editPayout':
				editPayout();
				break;
			  case 'deletePayout':
				deletePayout();
				break;
			  case 'listPayout':
				listPayout();
				break;	
			  case 'viewPayout':
				viewPayout();
				break;		
			
			  case 'newFlag':
				newFlag();
				break;
			  case 'editFlag':
				editFlag();
				break;
			  case 'deleteFlag':
				deleteFlag();
				break;
			  case 'listFlag':
				listFlag();
				break;	
			  case 'viewFlag':
				viewFlag();
				break;		
			
			  case 'newPaymentmode':
				newPaymentmode();
				break;
			  case 'editPaymentmode':
				editPaymentmode();
				break;
			  case 'deletePaymentmode':
				deletePaymentmode();
				break;
			  case 'listPaymentmode':
				listPaymentmode();
				break;	
			  case 'viewPaymentmode':
				viewPaymentmode();
				break;		
			
			  case 'newCampaign':
				newCampaign();
				break;
			  case 'editCampaign':
				editCampaign();
				break;
			  case 'deleteCampaign':
				deleteCampaign();
				break;
			  case 'listCampaign':
				listCampaign();
				break;	
			  case 'viewCampaign':
				viewCampaign();
				break;		
			
     default:
    dashboard();
}



function dashboard() {
	
	  $results = array();
	  $results['pageTitle'] = "Main|dashboard";			
	  
	 require( TEMPLATE_PATH . "/admin/dashboard.php" );
}


function login() {

  $results = array();
  $results['pageTitle'] = "Admin Login";

  if ( isset( $_POST['login'] ) ) {

    // User has posted the login form: attempt to log the user in

    if ( $_POST['username'] == ADMIN_USERNAME && $_POST['password'] == ADMIN_PASSWORD ) {

      // Login successful: Create a session and redirect to the admin homepage
      $_SESSION['username'] = ADMIN_USERNAME;
      header( "Location: admin.php?action=dashboard" );

    } else {

      // Login failed: display an error message to the user
      $results['errorMessage'] = "Incorrect username or password. Please try again.";
      require( TEMPLATE_PATH . "/admin/loginForm.php" );
    }

  } else {

    // User has not posted the login form yet: display the form
    require( TEMPLATE_PATH . "/admin/loginForm.php" );
  }

}


function logout() {
  unset( $_SESSION['username'] );
  header( "Location: admin.php" );
}

function pluralize($quantity, $singular, $plural=null) {
    if($quantity==1 || !strlen($singular)) return $singular;
    if($plural!==null) return $plural;

    $last_letter = strtolower($singular[strlen($singular)-1]);
    switch($last_letter) {
        case 'y':
            return substr($singular,0,-1).'ies';
        case 's':
            return $singular.'es';
        default:
            return $singular.'s';
    }
}

function randomstr($bytes = 8)
{
$bytes = random_bytes($bytes);
return(bin2hex($bytes));
}

 
				function viewCompany() {
				  $results = array();
				  $results['Company'] = Company::getById( (int)$_GET["id"] );
				  $results['pageTitle'] = 'Company|objname Main|Details';			
				  require( TEMPLATE_PATH . "/admin/viewCompany.php" );
				 
				} 
				function viewRiders() {
				  $results = array();
				  $results['Riders'] = Riders::getById( (int)$_GET["id"] );
				  $results['pageTitle'] = 'Riders|objname Main|Details';			
				  require( TEMPLATE_PATH . "/admin/viewRiders.php" );
				 
				} 
				function viewCustomer() {
				  $results = array();
				  $results['Customer'] = Customer::getById( (int)$_GET["id"] );
				  $results['pageTitle'] = 'Customer|objname Main|Details';			
				  require( TEMPLATE_PATH . "/admin/viewCustomer.php" );
				 
				} 
				function viewCustomerstatus() {
				  $results = array();
				  $results['Customerstatus'] = Customerstatus::getById( (int)$_GET["id"] );
				  $results['pageTitle'] = 'Customerstatus|objname Main|Details';			
				  require( TEMPLATE_PATH . "/admin/viewCustomerstatus.php" );
				 
				} 
				function viewPayout() {
				  $results = array();
				  $results['Payout'] = Payout::getById( (int)$_GET["id"] );
				  $results['pageTitle'] = 'Payout|objname Main|Details';			
				  require( TEMPLATE_PATH . "/admin/viewPayout.php" );
				 
				} 
				function viewFlag() {
				  $results = array();
				  $results['Flag'] = Flag::getById( (int)$_GET["id"] );
				  $results['pageTitle'] = 'Flag|objname Main|Details';			
				  require( TEMPLATE_PATH . "/admin/viewFlag.php" );
				 
				} 
				function viewPaymentmode() {
				  $results = array();
				  $results['Paymentmode'] = Paymentmode::getById( (int)$_GET["id"] );
				  $results['pageTitle'] = 'Paymentmode|objname Main|Details';			
				  require( TEMPLATE_PATH . "/admin/viewPaymentmode.php" );
				 
				} 
				function viewCampaign() {
				  $results = array();
				  $results['Campaign'] = Campaign::getById( (int)$_GET["id"] );
				  $results['pageTitle'] = 'Campaign|objname Main|Details';			
				  require( TEMPLATE_PATH . "/admin/viewCampaign.php" );
				 
				}

				
				function newCompany() {

				  $results = array();
				  $results['pageTitle'] = 'Main|New Company|objname';				  
				  $results['formAction'] = "newCompany";
				 		
				  if ( isset( $_POST['saveChanges'] ) ) {
						
					
					
					include('external/class/beforeinsert_Company.php');
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
									
					// User has posted the Company edit form: save the new Company
					$Company = new Company;
					$Company->storeFormValues( $_POST );
					
					
					
					if($checkvalidation == true)
					{
						$Company->saveimage($_FILES);
						$Company->insert();
						include('external/class/afterinsert_Company.php');
						header( "Location: admin.php?action=listCompany&status=changesSaved" );
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/admin/editCompany.php" );
					}												
						
				  } 
				  elseif ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Error: Company already exist in system.";
				  }
				  elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Company list
					header( "Location: admin.php" );
				  } else {
							
					// User has not posted the article edit form yet: display the form
					$data_Flag = Flag::getListall();
					$results['Company'] = new Company;
					include('external/classedit/beforeloadingedit_Company.php');
					require( TEMPLATE_PATH . "/admin/editCompany.php" );
				  }

				}
				
				
				function newRiders() {

				  $results = array();
				  $results['pageTitle'] = 'Main|New Riders|objname';				  
				  $results['formAction'] = "newRiders";
				 		
				  if ( isset( $_POST['saveChanges'] ) ) {
						
					
					
					include('external/class/beforeinsert_Riders.php');
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
									
					// User has posted the Riders edit form: save the new Riders
					$Riders = new Riders;
					$Riders->storeFormValues( $_POST );
					
					
					
					if($checkvalidation == true)
					{
						$Riders->saveimage($_FILES);
						$Riders->insert();
						include('external/class/afterinsert_Riders.php');
						header( "Location: admin.php?action=listRiders&status=changesSaved" );
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/admin/editRiders.php" );
					}												
						
				  } 
				  elseif ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Error: Riders already exist in system.";
				  }
				  elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Riders list
					header( "Location: admin.php" );
				  } else {
							
					// User has not posted the article edit form yet: display the form
					$data_Company = Company::getListall();$data_Flag = Flag::getListall();
					$results['Riders'] = new Riders;
					include('external/classedit/beforeloadingedit_Riders.php');
					require( TEMPLATE_PATH . "/admin/editRiders.php" );
				  }

				}
				
				
				function newCustomer() {

				  $results = array();
				  $results['pageTitle'] = 'Main|New Customer|objname';				  
				  $results['formAction'] = "newCustomer";
				 		
				  if ( isset( $_POST['saveChanges'] ) ) {
						
					
					
					include('external/class/beforeinsert_Customer.php');
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
									
					// User has posted the Customer edit form: save the new Customer
					$Customer = new Customer;
					$Customer->storeFormValues( $_POST );
					
					
					
					if($checkvalidation == true)
					{
						$Customer->saveimage($_FILES);
						$Customer->insert();
						include('external/class/afterinsert_Customer.php');
						header( "Location: admin.php?action=listCustomer&status=changesSaved" );
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/admin/editCustomer.php" );
					}												
						
				  } 
				  elseif ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Error: Customer already exist in system.";
				  }
				  elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Customer list
					header( "Location: admin.php" );
				  } else {
							
					// User has not posted the article edit form yet: display the form
					$data_Riders = Riders::getListall();$data_Flag = Flag::getListall();$data_Company = Company::getListall();$data_Campaign = Campaign::getListall();
					$results['Customer'] = new Customer;
					include('external/classedit/beforeloadingedit_Customer.php');
					require( TEMPLATE_PATH . "/admin/editCustomer.php" );
				  }

				}
				
				
				function newCustomerstatus() {

				  $results = array();
				  $results['pageTitle'] = 'Main|New Customerstatus|objname';				  
				  $results['formAction'] = "newCustomerstatus";
				 		
				  if ( isset( $_POST['saveChanges'] ) ) {
						
					
					
					include('external/class/beforeinsert_Customerstatus.php');
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
									
					// User has posted the Customerstatus edit form: save the new Customerstatus
					$Customerstatus = new Customerstatus;
					$Customerstatus->storeFormValues( $_POST );
					
					
					
					if($checkvalidation == true)
					{
						$Customerstatus->saveimage($_FILES);
						$Customerstatus->insert();
						include('external/class/afterinsert_Customerstatus.php');
						header( "Location: admin.php?action=listCustomerstatus&status=changesSaved" );
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/admin/editCustomerstatus.php" );
					}												
						
				  } 
				  elseif ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Error: Customerstatus already exist in system.";
				  }
				  elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Customerstatus list
					header( "Location: admin.php" );
				  } else {
							
					// User has not posted the article edit form yet: display the form
					$data_Customer = Customer::getListall();
					$results['Customerstatus'] = new Customerstatus;
					include('external/classedit/beforeloadingedit_Customerstatus.php');
					require( TEMPLATE_PATH . "/admin/editCustomerstatus.php" );
				  }

				}
				
				
				function newPayout() {

				  $results = array();
				  $results['pageTitle'] = 'Main|New Payout|objname';				  
				  $results['formAction'] = "newPayout";
				 		
				  if ( isset( $_POST['saveChanges'] ) ) {
						
					
					
					include('external/class/beforeinsert_Payout.php');
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
									
					// User has posted the Payout edit form: save the new Payout
					$Payout = new Payout;
					$Payout->storeFormValues( $_POST );
					
					
					
					if($checkvalidation == true)
					{
						$Payout->saveimage($_FILES);
						$Payout->insert();
						include('external/class/afterinsert_Payout.php');
						header( "Location: admin.php?action=listPayout&status=changesSaved" );
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/admin/editPayout.php" );
					}												
						
				  } 
				  elseif ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Error: Payout already exist in system.";
				  }
				  elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Payout list
					header( "Location: admin.php" );
				  } else {
							
					// User has not posted the article edit form yet: display the form
					$data_Riders = Riders::getListall();$data_Company = Company::getListall();$data_Paymentmode = Paymentmode::getListall();
					$results['Payout'] = new Payout;
					include('external/classedit/beforeloadingedit_Payout.php');
					require( TEMPLATE_PATH . "/admin/editPayout.php" );
				  }

				}
				
				
				function newFlag() {

				  $results = array();
				  $results['pageTitle'] = 'Main|New Flag|objname';				  
				  $results['formAction'] = "newFlag";
				 		
				  if ( isset( $_POST['saveChanges'] ) ) {
						
					
					
					include('external/class/beforeinsert_Flag.php');
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
									
					// User has posted the Flag edit form: save the new Flag
					$Flag = new Flag;
					$Flag->storeFormValues( $_POST );
					
					
					
					if($checkvalidation == true)
					{
						$Flag->saveimage($_FILES);
						$Flag->insert();
						include('external/class/afterinsert_Flag.php');
						header( "Location: admin.php?action=listFlag&status=changesSaved" );
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/admin/editFlag.php" );
					}												
						
				  } 
				  elseif ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Error: Flag already exist in system.";
				  }
				  elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Flag list
					header( "Location: admin.php" );
				  } else {
							
					// User has not posted the article edit form yet: display the form
					
					$results['Flag'] = new Flag;
					include('external/classedit/beforeloadingedit_Flag.php');
					require( TEMPLATE_PATH . "/admin/editFlag.php" );
				  }

				}
				
				
				function newPaymentmode() {

				  $results = array();
				  $results['pageTitle'] = 'Main|New Paymentmode|objname';				  
				  $results['formAction'] = "newPaymentmode";
				 		
				  if ( isset( $_POST['saveChanges'] ) ) {
						
					
					
					include('external/class/beforeinsert_Paymentmode.php');
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
									
					// User has posted the Paymentmode edit form: save the new Paymentmode
					$Paymentmode = new Paymentmode;
					$Paymentmode->storeFormValues( $_POST );
					
					
					
					if($checkvalidation == true)
					{
						$Paymentmode->saveimage($_FILES);
						$Paymentmode->insert();
						include('external/class/afterinsert_Paymentmode.php');
						header( "Location: admin.php?action=listPaymentmode&status=changesSaved" );
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/admin/editPaymentmode.php" );
					}												
						
				  } 
				  elseif ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Error: Paymentmode already exist in system.";
				  }
				  elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Paymentmode list
					header( "Location: admin.php" );
				  } else {
							
					// User has not posted the article edit form yet: display the form
					
					$results['Paymentmode'] = new Paymentmode;
					include('external/classedit/beforeloadingedit_Paymentmode.php');
					require( TEMPLATE_PATH . "/admin/editPaymentmode.php" );
				  }

				}
				
				
				function newCampaign() {

				  $results = array();
				  $results['pageTitle'] = 'Main|New Campaign|objname';				  
				  $results['formAction'] = "newCampaign";
				 		
				  if ( isset( $_POST['saveChanges'] ) ) {
						
					
					
					include('external/class/beforeinsert_Campaign.php');
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
									
					// User has posted the Campaign edit form: save the new Campaign
					$Campaign = new Campaign;
					$Campaign->storeFormValues( $_POST );
					
					
					
					if($checkvalidation == true)
					{
						$Campaign->saveimage($_FILES);
						$Campaign->insert();
						include('external/class/afterinsert_Campaign.php');
						header( "Location: admin.php?action=listCampaign&status=changesSaved" );
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/admin/editCampaign.php" );
					}												
						
				  } 
				  elseif ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Error: Campaign already exist in system.";
				  }
				  elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Campaign list
					header( "Location: admin.php" );
				  } else {
							
					// User has not posted the article edit form yet: display the form
					$data_Company = Company::getListall();
					$results['Campaign'] = new Campaign;
					include('external/classedit/beforeloadingedit_Campaign.php');
					require( TEMPLATE_PATH . "/admin/editCampaign.php" );
				  }

				}
				

			function editCompany() {
					
				 $results = array();
				 $results['pageTitle'] = 'Main|Edit Company|objname';
				 $results['formAction'] = "editCompany";

				  if ( isset( $_POST['saveChanges'] ) ) {

					// User has posted the article edit form: save the article changes
					
					
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
					
					if ( !$Company = Company::getById( (int)$_POST['CompanyId'] ) ) {
					  header( "Location: admin.php?error=CompanyNotFound" );
					  return;
					}
					
					include('external/class/beforeupdate_Company.php');
										
					$Company->storeFormValues( $_POST );
					
					if($checkvalidation == true)
					{
					$Company->saveimage($_FILES);					
					$Company->update();
					include('external/class/afterupdate_Company.php');
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/admin/editCompany.php" );
					}		
					
					if (strpos('Company', 'setting') !== false) 
					{
					$objn = str_replace('setting', '', $_GET['action']);
					$objn = str_replace('edit', '', $objn);
					header( "Location: admin.php?action=list".ucfirst($objn)."&status=changesSaved" );
					}
					else
					{
					header( "Location: admin.php?action=listCompany&status=changesSaved" );	
					}
					
				  } elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Company list
					header( "Location: admin.php" );
				  } else {
					
					if(isset($_GET['session']) && $_GET['session'] == 'active')
					{
					// User has not posted the Company edit form yet: display the form
					$data_Flag = Flag::getListall();
					$results['Company'] = Company::getByDomain( (int)$_SESSION["domainid"] );						
					}
					else
					{
					// User has not posted the Company edit form yet: display the form
					$data_Flag = Flag::getListall();
					$results['Company'] = Company::getById( (int)$_GET['CompanyId'] );
					}
					include('external/classedit/beforeloadingedit_Company.php');
					require( TEMPLATE_PATH . "/admin/editCompany.php" );
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
					  header( "Location: admin.php?error=RidersNotFound" );
					  return;
					}
					
					include('external/class/beforeupdate_Riders.php');
										
					$Riders->storeFormValues( $_POST );
					
					if($checkvalidation == true)
					{
					$Riders->saveimage($_FILES);					
					$Riders->update();
					include('external/class/afterupdate_Riders.php');
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/admin/editRiders.php" );
					}		
					
					if (strpos('Riders', 'setting') !== false) 
					{
					$objn = str_replace('setting', '', $_GET['action']);
					$objn = str_replace('edit', '', $objn);
					header( "Location: admin.php?action=list".ucfirst($objn)."&status=changesSaved" );
					}
					else
					{
					header( "Location: admin.php?action=listRiders&status=changesSaved" );	
					}
					
				  } elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Riders list
					header( "Location: admin.php" );
				  } else {
					
					if(isset($_GET['session']) && $_GET['session'] == 'active')
					{
					// User has not posted the Riders edit form yet: display the form
					$data_Company = Company::getListall();$data_Flag = Flag::getListall();
					$results['Riders'] = Riders::getByDomain( (int)$_SESSION["domainid"] );						
					}
					else
					{
					// User has not posted the Riders edit form yet: display the form
					$data_Company = Company::getListall();$data_Flag = Flag::getListall();
					$results['Riders'] = Riders::getById( (int)$_GET['RidersId'] );
					}
					include('external/classedit/beforeloadingedit_Riders.php');
					require( TEMPLATE_PATH . "/admin/editRiders.php" );
				  }

				}
			
			function editCustomer() {
					
				 $results = array();
				 $results['pageTitle'] = 'Main|Edit Customer|objname';
				 $results['formAction'] = "editCustomer";

				  if ( isset( $_POST['saveChanges'] ) ) {

					// User has posted the article edit form: save the article changes
					
					
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
					
					if ( !$Customer = Customer::getById( (int)$_POST['CustomerId'] ) ) {
					  header( "Location: admin.php?error=CustomerNotFound" );
					  return;
					}
					
					include('external/class/beforeupdate_Customer.php');
										
					$Customer->storeFormValues( $_POST );
					
					if($checkvalidation == true)
					{
					$Customer->saveimage($_FILES);					
					$Customer->update();
					include('external/class/afterupdate_Customer.php');
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/admin/editCustomer.php" );
					}		
					
					if (strpos('Customer', 'setting') !== false) 
					{
					$objn = str_replace('setting', '', $_GET['action']);
					$objn = str_replace('edit', '', $objn);
					header( "Location: admin.php?action=list".ucfirst($objn)."&status=changesSaved" );
					}
					else
					{
					header( "Location: admin.php?action=listCustomer&status=changesSaved" );	
					}
					
				  } elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Customer list
					header( "Location: admin.php" );
				  } else {
					
					if(isset($_GET['session']) && $_GET['session'] == 'active')
					{
					// User has not posted the Customer edit form yet: display the form
					$data_Riders = Riders::getListall();$data_Flag = Flag::getListall();$data_Company = Company::getListall();$data_Campaign = Campaign::getListall();
					$results['Customer'] = Customer::getByDomain( (int)$_SESSION["domainid"] );						
					}
					else
					{
					// User has not posted the Customer edit form yet: display the form
					$data_Riders = Riders::getListall();$data_Flag = Flag::getListall();$data_Company = Company::getListall();$data_Campaign = Campaign::getListall();
					$results['Customer'] = Customer::getById( (int)$_GET['CustomerId'] );
					}
					include('external/classedit/beforeloadingedit_Customer.php');
					require( TEMPLATE_PATH . "/admin/editCustomer.php" );
				  }

				}
			
			function editCustomerstatus() {
					
				 $results = array();
				 $results['pageTitle'] = 'Main|Edit Customerstatus|objname';
				 $results['formAction'] = "editCustomerstatus";

				  if ( isset( $_POST['saveChanges'] ) ) {

					// User has posted the article edit form: save the article changes
					
					
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
					
					if ( !$Customerstatus = Customerstatus::getById( (int)$_POST['CustomerstatusId'] ) ) {
					  header( "Location: admin.php?error=CustomerstatusNotFound" );
					  return;
					}
					
					include('external/class/beforeupdate_Customerstatus.php');
										
					$Customerstatus->storeFormValues( $_POST );
					
					if($checkvalidation == true)
					{
					$Customerstatus->saveimage($_FILES);					
					$Customerstatus->update();
					include('external/class/afterupdate_Customerstatus.php');
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/admin/editCustomerstatus.php" );
					}		
					
					if (strpos('Customerstatus', 'setting') !== false) 
					{
					$objn = str_replace('setting', '', $_GET['action']);
					$objn = str_replace('edit', '', $objn);
					header( "Location: admin.php?action=list".ucfirst($objn)."&status=changesSaved" );
					}
					else
					{
					header( "Location: admin.php?action=listCustomerstatus&status=changesSaved" );	
					}
					
				  } elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Customerstatus list
					header( "Location: admin.php" );
				  } else {
					
					if(isset($_GET['session']) && $_GET['session'] == 'active')
					{
					// User has not posted the Customerstatus edit form yet: display the form
					$data_Customer = Customer::getListall();
					$results['Customerstatus'] = Customerstatus::getByDomain( (int)$_SESSION["domainid"] );						
					}
					else
					{
					// User has not posted the Customerstatus edit form yet: display the form
					$data_Customer = Customer::getListall();
					$results['Customerstatus'] = Customerstatus::getById( (int)$_GET['CustomerstatusId'] );
					}
					include('external/classedit/beforeloadingedit_Customerstatus.php');
					require( TEMPLATE_PATH . "/admin/editCustomerstatus.php" );
				  }

				}
			
			function editPayout() {
					
				 $results = array();
				 $results['pageTitle'] = 'Main|Edit Payout|objname';
				 $results['formAction'] = "editPayout";

				  if ( isset( $_POST['saveChanges'] ) ) {

					// User has posted the article edit form: save the article changes
					
					
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
					
					if ( !$Payout = Payout::getById( (int)$_POST['PayoutId'] ) ) {
					  header( "Location: admin.php?error=PayoutNotFound" );
					  return;
					}
					
					include('external/class/beforeupdate_Payout.php');
										
					$Payout->storeFormValues( $_POST );
					
					if($checkvalidation == true)
					{
					$Payout->saveimage($_FILES);					
					$Payout->update();
					include('external/class/afterupdate_Payout.php');
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/admin/editPayout.php" );
					}		
					
					if (strpos('Payout', 'setting') !== false) 
					{
					$objn = str_replace('setting', '', $_GET['action']);
					$objn = str_replace('edit', '', $objn);
					header( "Location: admin.php?action=list".ucfirst($objn)."&status=changesSaved" );
					}
					else
					{
					header( "Location: admin.php?action=listPayout&status=changesSaved" );	
					}
					
				  } elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Payout list
					header( "Location: admin.php" );
				  } else {
					
					if(isset($_GET['session']) && $_GET['session'] == 'active')
					{
					// User has not posted the Payout edit form yet: display the form
					$data_Riders = Riders::getListall();$data_Company = Company::getListall();$data_Paymentmode = Paymentmode::getListall();
					$results['Payout'] = Payout::getByDomain( (int)$_SESSION["domainid"] );						
					}
					else
					{
					// User has not posted the Payout edit form yet: display the form
					$data_Riders = Riders::getListall();$data_Company = Company::getListall();$data_Paymentmode = Paymentmode::getListall();
					$results['Payout'] = Payout::getById( (int)$_GET['PayoutId'] );
					}
					include('external/classedit/beforeloadingedit_Payout.php');
					require( TEMPLATE_PATH . "/admin/editPayout.php" );
				  }

				}
			
			function editFlag() {
					
				 $results = array();
				 $results['pageTitle'] = 'Main|Edit Flag|objname';
				 $results['formAction'] = "editFlag";

				  if ( isset( $_POST['saveChanges'] ) ) {

					// User has posted the article edit form: save the article changes
					
					
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
					
					if ( !$Flag = Flag::getById( (int)$_POST['FlagId'] ) ) {
					  header( "Location: admin.php?error=FlagNotFound" );
					  return;
					}
					
					include('external/class/beforeupdate_Flag.php');
										
					$Flag->storeFormValues( $_POST );
					
					if($checkvalidation == true)
					{
					$Flag->saveimage($_FILES);					
					$Flag->update();
					include('external/class/afterupdate_Flag.php');
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/admin/editFlag.php" );
					}		
					
					if (strpos('Flag', 'setting') !== false) 
					{
					$objn = str_replace('setting', '', $_GET['action']);
					$objn = str_replace('edit', '', $objn);
					header( "Location: admin.php?action=list".ucfirst($objn)."&status=changesSaved" );
					}
					else
					{
					header( "Location: admin.php?action=listFlag&status=changesSaved" );	
					}
					
				  } elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Flag list
					header( "Location: admin.php" );
				  } else {
					
					if(isset($_GET['session']) && $_GET['session'] == 'active')
					{
					// User has not posted the Flag edit form yet: display the form
					
					$results['Flag'] = Flag::getByDomain( (int)$_SESSION["domainid"] );						
					}
					else
					{
					// User has not posted the Flag edit form yet: display the form
					
					$results['Flag'] = Flag::getById( (int)$_GET['FlagId'] );
					}
					include('external/classedit/beforeloadingedit_Flag.php');
					require( TEMPLATE_PATH . "/admin/editFlag.php" );
				  }

				}
			
			function editPaymentmode() {
					
				 $results = array();
				 $results['pageTitle'] = 'Main|Edit Paymentmode|objname';
				 $results['formAction'] = "editPaymentmode";

				  if ( isset( $_POST['saveChanges'] ) ) {

					// User has posted the article edit form: save the article changes
					
					
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
					
					if ( !$Paymentmode = Paymentmode::getById( (int)$_POST['PaymentmodeId'] ) ) {
					  header( "Location: admin.php?error=PaymentmodeNotFound" );
					  return;
					}
					
					include('external/class/beforeupdate_Paymentmode.php');
										
					$Paymentmode->storeFormValues( $_POST );
					
					if($checkvalidation == true)
					{
					$Paymentmode->saveimage($_FILES);					
					$Paymentmode->update();
					include('external/class/afterupdate_Paymentmode.php');
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/admin/editPaymentmode.php" );
					}		
					
					if (strpos('Paymentmode', 'setting') !== false) 
					{
					$objn = str_replace('setting', '', $_GET['action']);
					$objn = str_replace('edit', '', $objn);
					header( "Location: admin.php?action=list".ucfirst($objn)."&status=changesSaved" );
					}
					else
					{
					header( "Location: admin.php?action=listPaymentmode&status=changesSaved" );	
					}
					
				  } elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Paymentmode list
					header( "Location: admin.php" );
				  } else {
					
					if(isset($_GET['session']) && $_GET['session'] == 'active')
					{
					// User has not posted the Paymentmode edit form yet: display the form
					
					$results['Paymentmode'] = Paymentmode::getByDomain( (int)$_SESSION["domainid"] );						
					}
					else
					{
					// User has not posted the Paymentmode edit form yet: display the form
					
					$results['Paymentmode'] = Paymentmode::getById( (int)$_GET['PaymentmodeId'] );
					}
					include('external/classedit/beforeloadingedit_Paymentmode.php');
					require( TEMPLATE_PATH . "/admin/editPaymentmode.php" );
				  }

				}
			
			function editCampaign() {
					
				 $results = array();
				 $results['pageTitle'] = 'Main|Edit Campaign|objname';
				 $results['formAction'] = "editCampaign";

				  if ( isset( $_POST['saveChanges'] ) ) {

					// User has posted the article edit form: save the article changes
					
					
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
					
					if ( !$Campaign = Campaign::getById( (int)$_POST['CampaignId'] ) ) {
					  header( "Location: admin.php?error=CampaignNotFound" );
					  return;
					}
					
					include('external/class/beforeupdate_Campaign.php');
										
					$Campaign->storeFormValues( $_POST );
					
					if($checkvalidation == true)
					{
					$Campaign->saveimage($_FILES);					
					$Campaign->update();
					include('external/class/afterupdate_Campaign.php');
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/admin/editCampaign.php" );
					}		
					
					if (strpos('Campaign', 'setting') !== false) 
					{
					$objn = str_replace('setting', '', $_GET['action']);
					$objn = str_replace('edit', '', $objn);
					header( "Location: admin.php?action=list".ucfirst($objn)."&status=changesSaved" );
					}
					else
					{
					header( "Location: admin.php?action=listCampaign&status=changesSaved" );	
					}
					
				  } elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Campaign list
					header( "Location: admin.php" );
				  } else {
					
					if(isset($_GET['session']) && $_GET['session'] == 'active')
					{
					// User has not posted the Campaign edit form yet: display the form
					$data_Company = Company::getListall();
					$results['Campaign'] = Campaign::getByDomain( (int)$_SESSION["domainid"] );						
					}
					else
					{
					// User has not posted the Campaign edit form yet: display the form
					$data_Company = Company::getListall();
					$results['Campaign'] = Campaign::getById( (int)$_GET['CampaignId'] );
					}
					include('external/classedit/beforeloadingedit_Campaign.php');
					require( TEMPLATE_PATH . "/admin/editCampaign.php" );
				  }

				}
			

			function deleteCompany() {

				  if ( !$Company = Company::getById( (int)$_GET['CompanyId'] ) ) {
					header( "Location: admin.php?error=CompanyNotFound" );
					return;
				  }

				  $Company->delete();
				  header( "Location: admin.php?action=listCompany&status=CompanyDeleted" );
				}
			
			function deleteRiders() {

				  if ( !$Riders = Riders::getById( (int)$_GET['RidersId'] ) ) {
					header( "Location: admin.php?error=RidersNotFound" );
					return;
				  }

				  $Riders->delete();
				  header( "Location: admin.php?action=listRiders&status=RidersDeleted" );
				}
			
			function deleteCustomer() {

				  if ( !$Customer = Customer::getById( (int)$_GET['CustomerId'] ) ) {
					header( "Location: admin.php?error=CustomerNotFound" );
					return;
				  }

				  $Customer->delete();
				  header( "Location: admin.php?action=listCustomer&status=CustomerDeleted" );
				}
			
			function deleteCustomerstatus() {

				  if ( !$Customerstatus = Customerstatus::getById( (int)$_GET['CustomerstatusId'] ) ) {
					header( "Location: admin.php?error=CustomerstatusNotFound" );
					return;
				  }

				  $Customerstatus->delete();
				  header( "Location: admin.php?action=listCustomerstatus&status=CustomerstatusDeleted" );
				}
			
			function deletePayout() {

				  if ( !$Payout = Payout::getById( (int)$_GET['PayoutId'] ) ) {
					header( "Location: admin.php?error=PayoutNotFound" );
					return;
				  }

				  $Payout->delete();
				  header( "Location: admin.php?action=listPayout&status=PayoutDeleted" );
				}
			
			function deleteFlag() {

				  if ( !$Flag = Flag::getById( (int)$_GET['FlagId'] ) ) {
					header( "Location: admin.php?error=FlagNotFound" );
					return;
				  }

				  $Flag->delete();
				  header( "Location: admin.php?action=listFlag&status=FlagDeleted" );
				}
			
			function deletePaymentmode() {

				  if ( !$Paymentmode = Paymentmode::getById( (int)$_GET['PaymentmodeId'] ) ) {
					header( "Location: admin.php?error=PaymentmodeNotFound" );
					return;
				  }

				  $Paymentmode->delete();
				  header( "Location: admin.php?action=listPaymentmode&status=PaymentmodeDeleted" );
				}
			
			function deleteCampaign() {

				  if ( !$Campaign = Campaign::getById( (int)$_GET['CampaignId'] ) ) {
					header( "Location: admin.php?error=CampaignNotFound" );
					return;
				  }

				  $Campaign->delete();
				  header( "Location: admin.php?action=listCampaign&status=CampaignDeleted" );
				}
			

				function listCompany() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Company::getList($_GET['pageno']);
				  $results['Company'] = $data['results'];
				  $results['totalRows'] = $data['totalRows'];
				  $results['pageTitle'] = "Main|All Company|objname";

				  if ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == "articleNotFound" ) $results['errorMessage'] = "Company|objname Main|notfound";
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Company|objname Main|errorexist";
				  }

				  if ( isset( $_GET['status'] ) ) {
					if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Main|notifysuccess";
					if ( $_GET['status'] == "articleDeleted" ) $results['statusMessage'] = "Company|objname Main|Deleted";
				  }

				  require( TEMPLATE_PATH . "/admin/listCompany.php" );
				}
			
				function listRiders() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Riders::getList($_GET['pageno']);
				  $results['Riders'] = $data['results'];
				  $results['totalRows'] = $data['totalRows'];
				  $results['pageTitle'] = "Main|All Riders|objname";

				  if ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == "articleNotFound" ) $results['errorMessage'] = "Riders|objname Main|notfound";
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Riders|objname Main|errorexist";
				  }

				  if ( isset( $_GET['status'] ) ) {
					if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Main|notifysuccess";
					if ( $_GET['status'] == "articleDeleted" ) $results['statusMessage'] = "Riders|objname Main|Deleted";
				  }

				  require( TEMPLATE_PATH . "/admin/listRiders.php" );
				}
			
				function listCustomer() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Customer::getList($_GET['pageno']);
				  $results['Customer'] = $data['results'];
				  $results['totalRows'] = $data['totalRows'];
				  $results['pageTitle'] = "Main|All Customer|objname";

				  if ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == "articleNotFound" ) $results['errorMessage'] = "Customer|objname Main|notfound";
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Customer|objname Main|errorexist";
				  }

				  if ( isset( $_GET['status'] ) ) {
					if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Main|notifysuccess";
					if ( $_GET['status'] == "articleDeleted" ) $results['statusMessage'] = "Customer|objname Main|Deleted";
				  }

				  require( TEMPLATE_PATH . "/admin/listCustomer.php" );
				}
			
				function listCustomerstatus() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Customerstatus::getList($_GET['pageno']);
				  $results['Customerstatus'] = $data['results'];
				  $results['totalRows'] = $data['totalRows'];
				  $results['pageTitle'] = "Main|All Customerstatus|objname";

				  if ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == "articleNotFound" ) $results['errorMessage'] = "Customerstatus|objname Main|notfound";
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Customerstatus|objname Main|errorexist";
				  }

				  if ( isset( $_GET['status'] ) ) {
					if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Main|notifysuccess";
					if ( $_GET['status'] == "articleDeleted" ) $results['statusMessage'] = "Customerstatus|objname Main|Deleted";
				  }

				  require( TEMPLATE_PATH . "/admin/listCustomerstatus.php" );
				}
			
				function listPayout() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Payout::getList($_GET['pageno']);
				  $results['Payout'] = $data['results'];
				  $results['totalRows'] = $data['totalRows'];
				  $results['pageTitle'] = "Main|All Payout|objname";

				  if ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == "articleNotFound" ) $results['errorMessage'] = "Payout|objname Main|notfound";
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Payout|objname Main|errorexist";
				  }

				  if ( isset( $_GET['status'] ) ) {
					if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Main|notifysuccess";
					if ( $_GET['status'] == "articleDeleted" ) $results['statusMessage'] = "Payout|objname Main|Deleted";
				  }

				  require( TEMPLATE_PATH . "/admin/listPayout.php" );
				}
			
				function listFlag() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Flag::getList($_GET['pageno']);
				  $results['Flag'] = $data['results'];
				  $results['totalRows'] = $data['totalRows'];
				  $results['pageTitle'] = "Main|All Flag|objname";

				  if ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == "articleNotFound" ) $results['errorMessage'] = "Flag|objname Main|notfound";
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Flag|objname Main|errorexist";
				  }

				  if ( isset( $_GET['status'] ) ) {
					if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Main|notifysuccess";
					if ( $_GET['status'] == "articleDeleted" ) $results['statusMessage'] = "Flag|objname Main|Deleted";
				  }

				  require( TEMPLATE_PATH . "/admin/listFlag.php" );
				}
			
				function listPaymentmode() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Paymentmode::getList($_GET['pageno']);
				  $results['Paymentmode'] = $data['results'];
				  $results['totalRows'] = $data['totalRows'];
				  $results['pageTitle'] = "Main|All Paymentmode|objname";

				  if ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == "articleNotFound" ) $results['errorMessage'] = "Paymentmode|objname Main|notfound";
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Paymentmode|objname Main|errorexist";
				  }

				  if ( isset( $_GET['status'] ) ) {
					if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Main|notifysuccess";
					if ( $_GET['status'] == "articleDeleted" ) $results['statusMessage'] = "Paymentmode|objname Main|Deleted";
				  }

				  require( TEMPLATE_PATH . "/admin/listPaymentmode.php" );
				}
			
				function listCampaign() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Campaign::getList($_GET['pageno']);
				  $results['Campaign'] = $data['results'];
				  $results['totalRows'] = $data['totalRows'];
				  $results['pageTitle'] = "Main|All Campaign|objname";

				  if ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == "articleNotFound" ) $results['errorMessage'] = "Campaign|objname Main|notfound";
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Campaign|objname Main|errorexist";
				  }

				  if ( isset( $_GET['status'] ) ) {
					if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Main|notifysuccess";
					if ( $_GET['status'] == "articleDeleted" ) $results['statusMessage'] = "Campaign|objname Main|Deleted";
				  }

				  require( TEMPLATE_PATH . "/admin/listCampaign.php" );
				}
			


?>


<?php
ob_start();
require( "config.php" );
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$username = isset( $_SESSION['companycode'] ) ? $_SESSION['companycode'] : "";


if(isset($_SESSION['companycode']))
{
	$actual_link = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	recordlog($_SESSION['companycode'], $actual_link, $_SESSION['companycode']);
}

if ( $action != "login" && $action != "signup" && $action != "logout" && !$username ) {
  login();
  exit;
}


include_once("external/modules/beforeload/beforeloading_Company.php");

switch ( $action ) {
  case 'dashboard':
    dashboard();
    break;
  case 'login':
    login();
    break;
  case 'signup':
    signup();
    break;	
  case 'editCompany':
	editCompany();
	break;
  case 'logout':
    logout();
    break;
  
				  case 'newRiders':
					newRiders();
					break;	
				  case 'editRiders':
					editRiders();
					break;
					
				  case 'searchRiders':
					searchRiders();
					break;	
				  case 'sortRiders':
					sortRiders();
					break;		
				  case 'listRiders':
					listRiders();
					break;	
				  case 'viewRiders':
					viewRiders();
					break;
				  case 'downloadRiders':
					downloadRiders();
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
					
				  case 'bulkuploadCustomer':
					bulkuploadCustomer();
					break;
					
				  case 'searchCustomer':
					searchCustomer();
					break;	
				  case 'sortCustomer':
					sortCustomer();
					break;		
				  case 'listCustomer':
					listCustomer();
					break;	
				  case 'viewCustomer':
					viewCustomer();
					break;
				  case 'downloadCustomer':
					downloadCustomer();
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
					
				  case 'searchCustomerstatus':
					searchCustomerstatus();
					break;	
				  case 'sortCustomerstatus':
					sortCustomerstatus();
					break;		
				  case 'listCustomerstatus':
					listCustomerstatus();
					break;	
				  case 'viewCustomerstatus':
					viewCustomerstatus();
					break;
				  case 'downloadCustomerstatus':
					downloadCustomerstatus();
					break;	
				
				  case 'newPayout':
					newPayout();
					break;	
				  case 'deletePayout':
					deletePayout();
					break;
					
				  case 'bulkuploadPayout':
					bulkuploadPayout();
					break;
					
				  case 'searchPayout':
					searchPayout();
					break;	
				  case 'sortPayout':
					sortPayout();
					break;		
				  case 'listPayout':
					listPayout();
					break;	
				  case 'viewPayout':
					viewPayout();
					break;
				  case 'downloadPayout':
					downloadPayout();
					break;	
				
				  case 'newCampaign':
					newCampaign();
					break;	
				  case 'editCampaign':
					editCampaign();
					break;
					
				  case 'searchCampaign':
					searchCampaign();
					break;	
				  case 'sortCampaign':
					sortCampaign();
					break;		
				  case 'listCampaign':
					listCampaign();
					break;	
				  case 'viewCampaign':
					viewCampaign();
					break;
				  case 'downloadCampaign':
					downloadCampaign();
					break;	
				
   default:
    dashboard();
}


function dashboard() {
	
	  $results = array();
	  $results['pageTitle'] = "Company|objname Main|dashboard";			
	  if(isset($_GET["error"]) && $_GET["error"] != "duplicate")
{
	$results['errorMessage'] =  "User Already Registered With Us. You can Sign In.";
}
	 require( TEMPLATE_PATH . "/Company/Companydashboard.php" );
}

function login() {

  $results = array();
  $results['pageTitle'] = "Company|objname Main|login";			

  if ( isset( $_POST['login'] ) ) {

	$results = Company::checkauth( $_POST['adminusername'], $_POST['adminpassword']);
    // User has posted the login form: attempt to log the user in
	
	if ( $results["totalRows"] > 0 ) {		
		   // Login successful: Create a session and redirect to the Company homepage
		  $_SESSION["companycode"] = $results["results"][0]->companycode;
		  $_SESSION["companyname"] = $results["results"][0]->companyname;
		  
		  header( "Location: Company.php?action=dashboard" );
	} else {

      // Login failed: display an error message to the user
      $results['errorMessage'] = "Incorrect username or password. Please try again.";
	  if(isset($_GET["error"]) && $_GET["error"] != "duplicate")
		{
			$results['errorMessage'] =  "User Already Registered With Us. You can Sign In.";
		}
      require( TEMPLATE_PATH . "/Company/Companylogin.php" );
	 }

  } else {

    // User has not posted the login form yet: display the form
    require( TEMPLATE_PATH . "/Company/Companylogin.php" );
  }

}


function logout() {
  session_unset();
  header( "Location: Company.php?action=login" );
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
$prefix = "TGES"; 	
$today = date("dmy");
$hour = date("H");
$timestamp = time();
$bytes = $prefix.$timestamp.substr(bin2hex(random_bytes($bytes)),0,4);
return($bytes);
}

 
				function viewRiders() {
				  $results = array();
				  $results['Riders'] = Riders::getById( (int)$_GET["id"] );
				  $results['pageTitle'] = 'Riders|objname Main|Details';	
					
				   if($results['Riders'] -> ridercompany != $_SESSION['companycode']){
							header( "Location: Company.php?error=RidersNotFound" );
							return;
					}
					
				  require( TEMPLATE_PATH . "/Company/viewRiders.php" );
				 
				} 
				function viewCustomer() {
				  $results = array();
				  $results['Customer'] = Customer::getById( (int)$_GET["id"] );
				  $results['pageTitle'] = 'Customer|objname Main|Details';	
					
				   if($results['Customer'] -> assigned_company != $_SESSION['companycode']){
							header( "Location: Company.php?error=CustomerNotFound" );
							return;
					}
					
				  require( TEMPLATE_PATH . "/Company/viewCustomer.php" );
				 
				} 
				function viewCustomerstatus() {
				  $results = array();
				  $results['Customerstatus'] = Customerstatus::getById( (int)$_GET["id"] );
				  $results['pageTitle'] = 'Customerstatus|objname Main|Details';	
					
				   if($results['Customerstatus'] -> statuscompany != $_SESSION['companycode']){
							header( "Location: Company.php?error=CustomerstatusNotFound" );
							return;
					}
					
				  require( TEMPLATE_PATH . "/Company/viewCustomerstatus.php" );
				 
				} 
				function viewPayout() {
				  $results = array();
				  $results['Payout'] = Payout::getById( (int)$_GET["id"] );
				  $results['pageTitle'] = 'Payout|objname Main|Details';	
					
				   if($results['Payout'] -> payoutcompany != $_SESSION['companycode']){
							header( "Location: Company.php?error=PayoutNotFound" );
							return;
					}
					
				  require( TEMPLATE_PATH . "/Company/viewPayout.php" );
				 
				} 
				function viewCampaign() {
				  $results = array();
				  $results['Campaign'] = Campaign::getById( (int)$_GET["id"] );
				  $results['pageTitle'] = 'Campaign|objname Main|Details';	
					
				   if($results['Campaign'] -> campaigncompany != $_SESSION['companycode']){
							header( "Location: Company.php?error=CampaignNotFound" );
							return;
					}
					
				  require( TEMPLATE_PATH . "/Company/viewCampaign.php" );
				 
				}
 
				function bulkuploadCustomer() {
				
				
				  $results = array();
				  $results['pageTitle'] = 'Main|Upload Customer|objname';				  
				  if($_SERVER['REQUEST_METHOD'] == 'POST')
				  { 
												
						$folder = "uploads/";

						$path = $folder . basename( $_FILES['file']['name']); 

						if(move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
						//	echo "The file ".  basename( $_FILES['file']['name']). " has been uploaded";
						} else{
							//echo "There was an error uploading the file, please try again!";
						}
							
						include("external/modules/uploads/bulkupload_Customer.php");	
						

				  }
				  else
				  {
					  $uploadstr = 
						"<form enctype='multipart/form-data' action='Company.php?action=bulkuploadCustomer' method='POST'>
						Choose a file to upload: <input name='file' type='file' /><br />
						<input type='submit' value='Upload File' />
						</form>";
				  }
				  require( TEMPLATE_PATH . "/Company/bulkuploadCustomer.php" );
				 
				} 
				function bulkuploadPayout() {
				
				
				  $results = array();
				  $results['pageTitle'] = 'Main|Upload Payout|objname';				  
				  if($_SERVER['REQUEST_METHOD'] == 'POST')
				  { 
												
						$folder = "uploads/";

						$path = $folder . basename( $_FILES['file']['name']); 

						if(move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
						//	echo "The file ".  basename( $_FILES['file']['name']). " has been uploaded";
						} else{
							//echo "There was an error uploading the file, please try again!";
						}
							
						include("external/modules/uploads/bulkupload_Payout.php");	
						

				  }
				  else
				  {
					  $uploadstr = 
						"<form enctype='multipart/form-data' action='Company.php?action=bulkuploadPayout' method='POST'>
						Choose a file to upload: <input name='file' type='file' /><br />
						<input type='submit' value='Upload File' />
						</form>";
				  }
				  require( TEMPLATE_PATH . "/Company/bulkuploadPayout.php" );
				 
				}
 
				function downloadRiders() {
				
				
				  $results = array();
				  $results['pageTitle'] = 'Main|Download Riders|objname';				  
				  if($_SERVER['REQUEST_METHOD'] == 'POST')
				  {
					  $todate = $_POST["dateto"];
					  $fromdate =  $_POST["datefrom"];
					  unset($_POST["dateto"]);unset($_POST["datefrom"]);
						
					  $dwnldstr = implode(',',array_filter($_POST));
					  $postarr = array_map('ucfirst', $_POST);
					  					  
					  $dataforcsv = Riders::getListbyjoinCompany($_SESSION['companycode'],$dwnldstr,' JOIN Company ON Riders.ridercompany = Company.companycode JOIN Flag ON Riders.rider_block = Flag.flagvalue', $fromdate, $todate);
					  	  
					  header( 'Content-Type: application/csv' );
                      header( 'Content-Disposition: attachment; filename="' . time() . '.csv";' );                     
					  ob_end_clean();
    
					  $fp = fopen('php://output', 'w');
					  $rowhead = $postarr;
					  fputcsv($fp, $rowhead);  
	
																
					  foreach($dataforcsv["results"] as $csvrowdata)
					  {
						 $csvrowdata_numless = array_filter($csvrowdata, 'is_int', ARRAY_FILTER_USE_KEY);						
						fputcsv($fp, $csvrowdata_numless);    
					  }
						
					  fclose($fp);
					  ob_flush();exit();
				  }
				  require( TEMPLATE_PATH . "/Company/downloadRiders.php" );
				 
				} 
				function downloadCustomer() {
				
				
				  $results = array();
				  $results['pageTitle'] = 'Main|Download Customer|objname';				  
				  if($_SERVER['REQUEST_METHOD'] == 'POST')
				  {
					  $todate = $_POST["dateto"];
					  $fromdate =  $_POST["datefrom"];
					  unset($_POST["dateto"]);unset($_POST["datefrom"]);
						
					  $dwnldstr = implode(',',array_filter($_POST));
					  $postarr = array_map('ucfirst', $_POST);
					  					  
					  $dataforcsv = Customer::getListbyjoinCompany($_SESSION['companycode'],$dwnldstr,' JOIN Riders ON Customer.assigned_to = Riders.ridercode JOIN Flag ON Customer.customer_block = Flag.flagvalue JOIN Company ON Customer.assigned_company = Company.companycode JOIN Campaign ON Customer.customercampaign = Campaign.id', $fromdate, $todate);
					  	  
					  header( 'Content-Type: application/csv' );
                      header( 'Content-Disposition: attachment; filename="' . time() . '.csv";' );                     
					  ob_end_clean();
    
					  $fp = fopen('php://output', 'w');
					  $rowhead = $postarr;
					  fputcsv($fp, $rowhead);  
	
																
					  foreach($dataforcsv["results"] as $csvrowdata)
					  {
						 $csvrowdata_numless = array_filter($csvrowdata, 'is_int', ARRAY_FILTER_USE_KEY);						
						fputcsv($fp, $csvrowdata_numless);    
					  }
						
					  fclose($fp);
					  ob_flush();exit();
				  }
				  require( TEMPLATE_PATH . "/Company/downloadCustomer.php" );
				 
				} 
				function downloadCustomerstatus() {
				
				
				  $results = array();
				  $results['pageTitle'] = 'Main|Download Customerstatus|objname';				  
				  if($_SERVER['REQUEST_METHOD'] == 'POST')
				  {
					  $todate = $_POST["dateto"];
					  $fromdate =  $_POST["datefrom"];
					  unset($_POST["dateto"]);unset($_POST["datefrom"]);
						
					  $dwnldstr = implode(',',array_filter($_POST));
					  $postarr = array_map('ucfirst', $_POST);
					  					  
					  $dataforcsv = Customerstatus::getListbyjoinCompany($_SESSION['companycode'],$dwnldstr,' JOIN Customer ON Customerstatus.customer = Customer.id JOIN Company ON Customerstatus.statuscompany = Company.companycode JOIN Riders ON Customerstatus.statusrider = Riders.ridercode', $fromdate, $todate);
					  	  
					  header( 'Content-Type: application/csv' );
                      header( 'Content-Disposition: attachment; filename="' . time() . '.csv";' );                     
					  ob_end_clean();
    
					  $fp = fopen('php://output', 'w');
					  $rowhead = $postarr;
					  fputcsv($fp, $rowhead);  
	
																
					  foreach($dataforcsv["results"] as $csvrowdata)
					  {
						 $csvrowdata_numless = array_filter($csvrowdata, 'is_int', ARRAY_FILTER_USE_KEY);						
						fputcsv($fp, $csvrowdata_numless);    
					  }
						
					  fclose($fp);
					  ob_flush();exit();
				  }
				  require( TEMPLATE_PATH . "/Company/downloadCustomerstatus.php" );
				 
				} 
				function downloadPayout() {
				
				
				  $results = array();
				  $results['pageTitle'] = 'Main|Download Payout|objname';				  
				  if($_SERVER['REQUEST_METHOD'] == 'POST')
				  {
					  $todate = $_POST["dateto"];
					  $fromdate =  $_POST["datefrom"];
					  unset($_POST["dateto"]);unset($_POST["datefrom"]);
						
					  $dwnldstr = implode(',',array_filter($_POST));
					  $postarr = array_map('ucfirst', $_POST);
					  					  
					  $dataforcsv = Payout::getListbyjoinCompany($_SESSION['companycode'],$dwnldstr,' JOIN Riders ON Payout.payoutrider = Riders.ridercode JOIN Company ON Payout.payoutcompany = Company.companycode JOIN Paymentmode ON Payout.payoutstatus = Paymentmode.id', $fromdate, $todate);
					  	  
					  header( 'Content-Type: application/csv' );
                      header( 'Content-Disposition: attachment; filename="' . time() . '.csv";' );                     
					  ob_end_clean();
    
					  $fp = fopen('php://output', 'w');
					  $rowhead = $postarr;
					  fputcsv($fp, $rowhead);  
	
																
					  foreach($dataforcsv["results"] as $csvrowdata)
					  {
						 $csvrowdata_numless = array_filter($csvrowdata, 'is_int', ARRAY_FILTER_USE_KEY);						
						fputcsv($fp, $csvrowdata_numless);    
					  }
						
					  fclose($fp);
					  ob_flush();exit();
				  }
				  require( TEMPLATE_PATH . "/Company/downloadPayout.php" );
				 
				} 
				function downloadCampaign() {
				
				
				  $results = array();
				  $results['pageTitle'] = 'Main|Download Campaign|objname';				  
				  if($_SERVER['REQUEST_METHOD'] == 'POST')
				  {
					  $todate = $_POST["dateto"];
					  $fromdate =  $_POST["datefrom"];
					  unset($_POST["dateto"]);unset($_POST["datefrom"]);
						
					  $dwnldstr = implode(',',array_filter($_POST));
					  $postarr = array_map('ucfirst', $_POST);
					  					  
					  $dataforcsv = Campaign::getListbyjoinCompany($_SESSION['companycode'],$dwnldstr,' JOIN Company ON Campaign.campaigncompany = Company.companycode', $fromdate, $todate);
					  	  
					  header( 'Content-Type: application/csv' );
                      header( 'Content-Disposition: attachment; filename="' . time() . '.csv";' );                     
					  ob_end_clean();
    
					  $fp = fopen('php://output', 'w');
					  $rowhead = $postarr;
					  fputcsv($fp, $rowhead);  
	
																
					  foreach($dataforcsv["results"] as $csvrowdata)
					  {
						 $csvrowdata_numless = array_filter($csvrowdata, 'is_int', ARRAY_FILTER_USE_KEY);						
						fputcsv($fp, $csvrowdata_numless);    
					  }
						
					  fclose($fp);
					  ob_flush();exit();
				  }
				  require( TEMPLATE_PATH . "/Company/downloadCampaign.php" );
				 
				}

				
				function newRiders() {

				  $results = array();
				  $results['pageTitle'] = 'Main|New Riders|objname';				  
				  $results['formAction'] = "newRiders";
				 		
				  if ( isset( $_POST['saveChanges'] ) ) {
						
					
					
					include('external/class/Company_beforeinsert_Riders.php');
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
					
					
					// User has posted the Riders edit form: save the new Riders
					$Riders = new Riders;
					$Riders->storeFormValues( $_POST );
					
					if($checkvalidation == true)
					{
						$Riders->saveimage($_FILES);
						$Riders->insert();
						include('external/class/Company_afterinsert_Riders.php');
						header( "Location: Company.php?action=listRiders&status=changesSaved" );
						die();
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/Company/editRiders.php" );
					}												
						
				  } 
				  elseif ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Error: Riders already exist in system.";
				  }
				  elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Riders list
					header( "Location: Company.php" );
				  } else {
							
					// User has not posted the article edit form yet: display the form
					$data_Company = Company::getListall();$data_Flag = Flag::getListall();
					$results['Riders'] = new Riders;
					include('external/classedit/beforeloadingedit_Riders.php');
					require( TEMPLATE_PATH . "/Company/editRiders.php" );
				  }

				}
				
				
				function newCustomer() {

				  $results = array();
				  $results['pageTitle'] = 'Main|New Customer|objname';				  
				  $results['formAction'] = "newCustomer";
				 		
				  if ( isset( $_POST['saveChanges'] ) ) {
						
					
					
					include('external/class/Company_beforeinsert_Customer.php');
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
					
					
					// User has posted the Customer edit form: save the new Customer
					$Customer = new Customer;
					$Customer->storeFormValues( $_POST );
					
					if($checkvalidation == true)
					{
						$Customer->saveimage($_FILES);
						$Customer->insert();
						include('external/class/Company_afterinsert_Customer.php');
						header( "Location: Company.php?action=listCustomer&status=changesSaved" );
						die();
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/Company/editCustomer.php" );
					}												
						
				  } 
				  elseif ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Error: Customer already exist in system.";
				  }
				  elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Customer list
					header( "Location: Company.php" );
				  } else {
							
					// User has not posted the article edit form yet: display the form
					$data_Riders = Riders::getListallByIdCompany($_SESSION['companycode']);$data_Flag = Flag::getListall();$data_Company = Company::getListall();$data_Campaign = Campaign::getListallByIdCompany($_SESSION['companycode']);
					$results['Customer'] = new Customer;
					include('external/classedit/beforeloadingedit_Customer.php');
					require( TEMPLATE_PATH . "/Company/editCustomer.php" );
				  }

				}
				
				
				function newCustomerstatus() {

				  $results = array();
				  $results['pageTitle'] = 'Main|New Customerstatus|objname';				  
				  $results['formAction'] = "newCustomerstatus";
				 		
				  if ( isset( $_POST['saveChanges'] ) ) {
						
					
					
					include('external/class/Company_beforeinsert_Customerstatus.php');
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
					
					
					// User has posted the Customerstatus edit form: save the new Customerstatus
					$Customerstatus = new Customerstatus;
					$Customerstatus->storeFormValues( $_POST );
					
					if($checkvalidation == true)
					{
						$Customerstatus->saveimage($_FILES);
						$Customerstatus->insert();
						include('external/class/Company_afterinsert_Customerstatus.php');
						header( "Location: Company.php?action=listCustomerstatus&status=changesSaved" );
						die();
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/Company/editCustomerstatus.php" );
					}												
						
				  } 
				  elseif ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Error: Customerstatus already exist in system.";
				  }
				  elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Customerstatus list
					header( "Location: Company.php" );
				  } else {
							
					// User has not posted the article edit form yet: display the form
					$data_Customer = Customer::getListallByIdCompany($_SESSION['companycode']);
					$results['Customerstatus'] = new Customerstatus;
					include('external/classedit/beforeloadingedit_Customerstatus.php');
					require( TEMPLATE_PATH . "/Company/editCustomerstatus.php" );
				  }

				}
				
				
				function newPayout() {

				  $results = array();
				  $results['pageTitle'] = 'Main|New Payout|objname';				  
				  $results['formAction'] = "newPayout";
				 		
				  if ( isset( $_POST['saveChanges'] ) ) {
						
					
					
					include('external/class/Company_beforeinsert_Payout.php');
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
					
					
					// User has posted the Payout edit form: save the new Payout
					$Payout = new Payout;
					$Payout->storeFormValues( $_POST );
					
					if($checkvalidation == true)
					{
						$Payout->saveimage($_FILES);
						$Payout->insert();
						include('external/class/Company_afterinsert_Payout.php');
						header( "Location: Company.php?action=listPayout&status=changesSaved" );
						die();
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/Company/editPayout.php" );
					}												
						
				  } 
				  elseif ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Error: Payout already exist in system.";
				  }
				  elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Payout list
					header( "Location: Company.php" );
				  } else {
							
					// User has not posted the article edit form yet: display the form
					$data_Riders = Riders::getListallByIdCompany($_SESSION['companycode']);$data_Company = Company::getListall();$data_Paymentmode = Paymentmode::getListall();
					$results['Payout'] = new Payout;
					include('external/classedit/beforeloadingedit_Payout.php');
					require( TEMPLATE_PATH . "/Company/editPayout.php" );
				  }

				}
				
				
				function newCampaign() {

				  $results = array();
				  $results['pageTitle'] = 'Main|New Campaign|objname';				  
				  $results['formAction'] = "newCampaign";
				 		
				  if ( isset( $_POST['saveChanges'] ) ) {
						
					
					
					include('external/class/Company_beforeinsert_Campaign.php');
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
					
					
					// User has posted the Campaign edit form: save the new Campaign
					$Campaign = new Campaign;
					$Campaign->storeFormValues( $_POST );
					
					if($checkvalidation == true)
					{
						$Campaign->saveimage($_FILES);
						$Campaign->insert();
						include('external/class/Company_afterinsert_Campaign.php');
						header( "Location: Company.php?action=listCampaign&status=changesSaved" );
						die();
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/Company/editCampaign.php" );
					}												
						
				  } 
				  elseif ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Error: Campaign already exist in system.";
				  }
				  elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Campaign list
					header( "Location: Company.php" );
				  } else {
							
					// User has not posted the article edit form yet: display the form
					$data_Company = Company::getListall();
					$results['Campaign'] = new Campaign;
					include('external/classedit/beforeloadingedit_Campaign.php');
					require( TEMPLATE_PATH . "/Company/editCampaign.php" );
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
					  header( "Location: Company.php?error=RidersNotFound" );
					  return;
					}
					
					include('external/class/Company_beforeupdate_Riders.php');
					
					$Riders->storeFormValues( $_POST );
					
					
					if($checkvalidation == true)
					{
					$Riders->saveimage($_FILES);					
					$Riders->update();
					include('external/class/Company_afterupdate_Riders.php');
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/Company/editRiders.php" );
					}		
					
					if (strpos('Riders', 'setting') !== false) 
					{
					$objn = str_replace('setting', '', $_GET['action']);
					$objn = str_replace('edit', '', $objn);
					header( "Location: Company.php?action=list".ucfirst($objn)."&status=changesSaved" );
					die();
					}
					else
					{
					header( "Location: Company.php?action=listRiders&status=changesSaved" );	
					die();
					}
					
				  } elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Riders list
					header( "Location: Company.php" );
				  } else {
					
					// User has not posted the Riders edit form yet: display the form
					$data_Company = Company::getListall();$data_Flag = Flag::getListall();
					$results['Riders'] = Riders::getById( (int)$_GET['RidersId'] );					
					
					if($results['Riders'] -> ridercompany != $_SESSION['companycode']){
							header( "Location: Company.php?error=RidersNotFound" );
							return;
					}
				  }
					include('external/classedit/beforeloadingedit_Riders.php');
					require( TEMPLATE_PATH . "/Company/editRiders.php" );
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
					  header( "Location: Company.php?error=CustomerNotFound" );
					  return;
					}
					
					include('external/class/Company_beforeupdate_Customer.php');
					
					$Customer->storeFormValues( $_POST );
					
					
					if($checkvalidation == true)
					{
					$Customer->saveimage($_FILES);					
					$Customer->update();
					include('external/class/Company_afterupdate_Customer.php');
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/Company/editCustomer.php" );
					}		
					
					if (strpos('Customer', 'setting') !== false) 
					{
					$objn = str_replace('setting', '', $_GET['action']);
					$objn = str_replace('edit', '', $objn);
					header( "Location: Company.php?action=list".ucfirst($objn)."&status=changesSaved" );
					die();
					}
					else
					{
					header( "Location: Company.php?action=listCustomer&status=changesSaved" );	
					die();
					}
					
				  } elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Customer list
					header( "Location: Company.php" );
				  } else {
					
					// User has not posted the Customer edit form yet: display the form
					$data_Riders = Riders::getListallByIdCompany($_SESSION['companycode']);$data_Flag = Flag::getListall();$data_Company = Company::getListall();$data_Campaign = Campaign::getListallByIdCompany($_SESSION['companycode']);
					$results['Customer'] = Customer::getById( (int)$_GET['CustomerId'] );					
					
					if($results['Customer'] -> assigned_company != $_SESSION['companycode']){
							header( "Location: Company.php?error=CustomerNotFound" );
							return;
					}
				  }
					include('external/classedit/beforeloadingedit_Customer.php');
					require( TEMPLATE_PATH . "/Company/editCustomer.php" );
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
					  header( "Location: Company.php?error=CustomerstatusNotFound" );
					  return;
					}
					
					include('external/class/Company_beforeupdate_Customerstatus.php');
					
					$Customerstatus->storeFormValues( $_POST );
					
					
					if($checkvalidation == true)
					{
					$Customerstatus->saveimage($_FILES);					
					$Customerstatus->update();
					include('external/class/Company_afterupdate_Customerstatus.php');
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/Company/editCustomerstatus.php" );
					}		
					
					if (strpos('Customerstatus', 'setting') !== false) 
					{
					$objn = str_replace('setting', '', $_GET['action']);
					$objn = str_replace('edit', '', $objn);
					header( "Location: Company.php?action=list".ucfirst($objn)."&status=changesSaved" );
					die();
					}
					else
					{
					header( "Location: Company.php?action=listCustomerstatus&status=changesSaved" );	
					die();
					}
					
				  } elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Customerstatus list
					header( "Location: Company.php" );
				  } else {
					
					// User has not posted the Customerstatus edit form yet: display the form
					$data_Customer = Customer::getListallByIdCompany($_SESSION['companycode']);
					$results['Customerstatus'] = Customerstatus::getById( (int)$_GET['CustomerstatusId'] );					
					
					if($results['Customerstatus'] -> statuscompany != $_SESSION['companycode']){
							header( "Location: Company.php?error=CustomerstatusNotFound" );
							return;
					}
				  }
					include('external/classedit/beforeloadingedit_Customerstatus.php');
					require( TEMPLATE_PATH . "/Company/editCustomerstatus.php" );
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
					  header( "Location: Company.php?error=CampaignNotFound" );
					  return;
					}
					
					include('external/class/Company_beforeupdate_Campaign.php');
					
					$Campaign->storeFormValues( $_POST );
					
					
					if($checkvalidation == true)
					{
					$Campaign->saveimage($_FILES);					
					$Campaign->update();
					include('external/class/Company_afterupdate_Campaign.php');
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/Company/editCampaign.php" );
					}		
					
					if (strpos('Campaign', 'setting') !== false) 
					{
					$objn = str_replace('setting', '', $_GET['action']);
					$objn = str_replace('edit', '', $objn);
					header( "Location: Company.php?action=list".ucfirst($objn)."&status=changesSaved" );
					die();
					}
					else
					{
					header( "Location: Company.php?action=listCampaign&status=changesSaved" );	
					die();
					}
					
				  } elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Campaign list
					header( "Location: Company.php" );
				  } else {
					
					// User has not posted the Campaign edit form yet: display the form
					$data_Company = Company::getListall();
					$results['Campaign'] = Campaign::getById( (int)$_GET['CampaignId'] );					
					
					if($results['Campaign'] -> campaigncompany != $_SESSION['companycode']){
							header( "Location: Company.php?error=CampaignNotFound" );
							return;
					}
				  }
					include('external/classedit/beforeloadingedit_Campaign.php');
					require( TEMPLATE_PATH . "/Company/editCampaign.php" );
				  }

			

			function deleteCustomer() {

				  if ( !$Customer = Customer::getById( (int)$_GET['CustomerId'] ) ) {
					header( "Location: Company.php?error=CustomerNotFound" );
					return;
				  }

				  $Customer->delete();
				  header( "Location: Company.php?action=listCustomer&status=CustomerDeleted" );
				}
			
			function deleteCustomerstatus() {

				  if ( !$Customerstatus = Customerstatus::getById( (int)$_GET['CustomerstatusId'] ) ) {
					header( "Location: Company.php?error=CustomerstatusNotFound" );
					return;
				  }

				  $Customerstatus->delete();
				  header( "Location: Company.php?action=listCustomerstatus&status=CustomerstatusDeleted" );
				}
			
			function deletePayout() {

				  if ( !$Payout = Payout::getById( (int)$_GET['PayoutId'] ) ) {
					header( "Location: Company.php?error=PayoutNotFound" );
					return;
				  }

				  $Payout->delete();
				  header( "Location: Company.php?action=listPayout&status=PayoutDeleted" );
				}
			

				function listRiders() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Riders::getListByIdCompany($_GET['pageno'], $_SESSION['companycode']);
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

				  require( TEMPLATE_PATH . "/Company/listRiders.php" );
				}
			
				function listCustomer() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Customer::getListByIdCompany($_GET['pageno'], $_SESSION['companycode']);
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

				  require( TEMPLATE_PATH . "/Company/listCustomer.php" );
				}
			
				function listCustomerstatus() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Customerstatus::getListByIdCompany($_GET['pageno'], $_SESSION['companycode']);
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

				  require( TEMPLATE_PATH . "/Company/listCustomerstatus.php" );
				}
			
				function listPayout() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Payout::getListByIdCompany($_GET['pageno'], $_SESSION['companycode']);
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

				  require( TEMPLATE_PATH . "/Company/listPayout.php" );
				}
			
				function listCampaign() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Campaign::getListByIdCompany($_GET['pageno'], $_SESSION['companycode']);
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

				  require( TEMPLATE_PATH . "/Company/listCampaign.php" );
				}
			

				function searchRiders() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Riders::getSearchByIdCompany($_GET['pageno'], $_SESSION['companycode'], $_GET['search']);
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

				  require( TEMPLATE_PATH . "/Company/listRiders.php" );
				}								
				
			
				function searchCustomer() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Customer::getSearchByIdCompany($_GET['pageno'], $_SESSION['companycode'], $_GET['search']);
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

				  require( TEMPLATE_PATH . "/Company/listCustomer.php" );
				}								
				
			
				function searchCustomerstatus() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Customerstatus::getSearchByIdCompany($_GET['pageno'], $_SESSION['companycode'], $_GET['search']);
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

				  require( TEMPLATE_PATH . "/Company/listCustomerstatus.php" );
				}								
				
			
				function searchPayout() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Payout::getSearchByIdCompany($_GET['pageno'], $_SESSION['companycode'], $_GET['search']);
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

				  require( TEMPLATE_PATH . "/Company/listPayout.php" );
				}								
				
			
				function searchCampaign() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Campaign::getSearchByIdCompany($_GET['pageno'], $_SESSION['companycode'], $_GET['search']);
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

				  require( TEMPLATE_PATH . "/Company/listCampaign.php" );
				}								
				
			

				function sortRiders() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Riders::getSortByIdCompany($_GET['pageno'], $_SESSION['companycode'], $_GET['sort'], $_GET['order']);
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

				  require( TEMPLATE_PATH . "/Company/listRiders.php" );
				}
				
				function sortCustomer() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Customer::getSortByIdCompany($_GET['pageno'], $_SESSION['companycode'], $_GET['sort'], $_GET['order']);
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

				  require( TEMPLATE_PATH . "/Company/listCustomer.php" );
				}
				
				function sortCustomerstatus() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Customerstatus::getSortByIdCompany($_GET['pageno'], $_SESSION['companycode'], $_GET['sort'], $_GET['order']);
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

				  require( TEMPLATE_PATH . "/Company/listCustomerstatus.php" );
				}
				
				function sortPayout() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Payout::getSortByIdCompany($_GET['pageno'], $_SESSION['companycode'], $_GET['sort'], $_GET['order']);
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

				  require( TEMPLATE_PATH . "/Company/listPayout.php" );
				}
				
				function sortCampaign() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Campaign::getSortByIdCompany($_GET['pageno'], $_SESSION['companycode'], $_GET['sort'], $_GET['order']);
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

				  require( TEMPLATE_PATH . "/Company/listCampaign.php" );
				}
				

				function signup() {
					  // User has not posted the article edit form yet: display the form
					$data_Flag = Flag::getListall();
					$results['Company'] = new Company;
					  
					  if ( isset( $_POST["saveChanges"] ) ) {
						
					
					
					include_once("external/validations.php");
					$checkvalidation = checkvalidation();
					
					// User has posted the Company edit form: save the new Company
					$Company = new Company;
					$Company->storeFormValues( $_POST );
					
					include("external/class/beforeupdate_Company.php");
					
					if($checkvalidation == true)
					{
						$Company->saveimage($_FILES);
						$Company->insert();
						include("external/class/afterinsert_Company.php");
						header( "Location: Company.php?action=listCompany&status=changesSaved" );
					}
					else
					{
						$results["errorMessage"] = '<p class="p-2">Error: Please check the information entered.</p>';
						$results["Company"] = $Company;						
						require( TEMPLATE_PATH . "/Company/Companysignup.php" );
					}												
						
				  } 
				  elseif ( isset( $_GET["error"] ) ) {
					if ( $_GET["error"] == "duplicate" ) $results["errorMessage"] = "Error: Company already exist in system.";
				  }
				  else
				  {
					$results['formAction'] = "signup";
					require( TEMPLATE_PATH . "/Company/Companysignup.php" );
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
					  header( "Location: Company.php?error=CompanyNotFound" );
					  return;
					}

					$Company->storeFormValues( $_POST );
					
					include('external/class/beforeupdate_Company.php');
					
					if($checkvalidation == true)
					{
					$Company->saveimage($_FILES);					
					$Company->update();
					include('external/class/afterupdate_Company.php');
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Company'] = $Company;						
						require( TEMPLATE_PATH . "/Company/editCompany.php" );
					}		
					
					header( "Location: Company.php?action=listCompany&status=changesSaved" );	
					die();
					
				  } elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Company list
					header( "Location: Company.php" );
				  } else {
					
					// User has not posted the Company edit form yet: display the form
					$data_Flag = Flag::getListall();
					$results['Company'] = Company::getByCompanycode( $_SESSION['companycode'] );					
					}
					
					require( TEMPLATE_PATH . "/Company/editCompany.php" );
				  }

			?>
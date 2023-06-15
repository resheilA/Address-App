
<?php
ob_start();
require( "config.php" );
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$username = isset( $_SESSION['ridercode'] ) ? $_SESSION['ridercode'] : "";


if(isset($_SESSION['ridercode']))
{
	$actual_link = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	recordlog($_SESSION['ridercode'], $actual_link, $_SESSION['ridercode']);
}

if ( $action != "login" && $action != "signup" && $action != "logout" && !$username ) {
  login();
  exit;
}

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
  case 'editRiders':
	editRiders();
	break;
  case 'logout':
    logout();
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
				
   default:
    dashboard();
}


function dashboard() {
	
	  $results = array();
	  $results['pageTitle'] = "Riders|objname Main|dashboard";			
	  
	 require( TEMPLATE_PATH . "/Riders/Ridersdashboard.php" );
}

function login() {

  $results = array();
  $results['pageTitle'] = "Riders|objname Main|login";			

  if ( isset( $_POST['login'] ) ) {

	$results = Riders::checkauth( $_POST['ridercontactnumber'], $_POST['password']);
    // User has posted the login form: attempt to log the user in
	
	if ( $results["totalRows"] > 0 ) {		
		   // Login successful: Create a session and redirect to the Riders homepage
		  $_SESSION["ridercode"] = $results["results"][0]->ridercode;
		  $_SESSION["ridername"] = $results["results"][0]->ridername;
		  
		  header( "Location: Riders.php?action=dashboard" );
	} else {

      // Login failed: display an error message to the user
      $results['errorMessage'] = "Incorrect username or password. Please try again.";
      require( TEMPLATE_PATH . "/Riders/Riderslogin.php" );
	 }

  } else {

    // User has not posted the login form yet: display the form
    require( TEMPLATE_PATH . "/Riders/Riderslogin.php" );
  }

}


function logout() {
  session_unset();
  header( "Location: Riders.php?action=login" );
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

 
				function viewCustomer() {
				  $results = array();
				  $results['Customer'] = Customer::getById( (int)$_GET["id"] );
				  $results['pageTitle'] = 'Customer|objname Main|Details';	
					
				   if($results['Customer'] -> assigned_to != $_SESSION['ridercode']){
							header( "Location: Riders.php?error=CustomerNotFound" );
							return;
					}
					
				  require( TEMPLATE_PATH . "/Riders/viewCustomer.php" );
				 
				} 
				function viewCustomerstatus() {
				  $results = array();
				  $results['Customerstatus'] = Customerstatus::getById( (int)$_GET["id"] );
				  $results['pageTitle'] = 'Customerstatus|objname Main|Details';	
					
				   if($results['Customerstatus'] -> statusrider != $_SESSION['ridercode']){
							header( "Location: Riders.php?error=CustomerstatusNotFound" );
							return;
					}
					
				  require( TEMPLATE_PATH . "/Riders/viewCustomerstatus.php" );
				 
				} 
				function viewPayout() {
				  $results = array();
				  $results['Payout'] = Payout::getById( (int)$_GET["id"] );
				  $results['pageTitle'] = 'Payout|objname Main|Details';	
					
				   if($results['Payout'] -> payoutrider != $_SESSION['ridercode']){
							header( "Location: Riders.php?error=PayoutNotFound" );
							return;
					}
					
				  require( TEMPLATE_PATH . "/Riders/viewPayout.php" );
				 
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
					  					  
					  $dataforcsv = Customer::getListbyjoinRiders($_SESSION['ridercode'],$dwnldstr,' JOIN Riders ON Customer.assigned_to = Riders.ridercode JOIN Flag ON Customer.customer_block = Flag.flagvalue JOIN Company ON Customer.assigned_company = Company.companycode JOIN Campaign ON Customer.customercampaign = Campaign.id', $fromdate, $todate);
					  	  
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
				  require( TEMPLATE_PATH . "/Riders/downloadCustomer.php" );
				 
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
					  					  
					  $dataforcsv = Customerstatus::getListbyjoinRiders($_SESSION['ridercode'],$dwnldstr,' JOIN Customer ON Customerstatus.customer = Customer.id JOIN Company ON Customerstatus.statuscompany = Company.companycode JOIN Riders ON Customerstatus.statusrider = Riders.ridercode', $fromdate, $todate);
					  	  
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
				  require( TEMPLATE_PATH . "/Riders/downloadCustomerstatus.php" );
				 
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
					  					  
					  $dataforcsv = Payout::getListbyjoinRiders($_SESSION['ridercode'],$dwnldstr,' JOIN Riders ON Payout.payoutrider = Riders.ridercode JOIN Company ON Payout.payoutcompany = Company.companycode JOIN Paymentmode ON Payout.payoutstatus = Paymentmode.id', $fromdate, $todate);
					  	  
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
				  require( TEMPLATE_PATH . "/Riders/downloadPayout.php" );
				 
				}

				
				function newCustomerstatus() {

				  $results = array();
				  $results['pageTitle'] = 'Main|New Customerstatus|objname';				  
				  $results['formAction'] = "newCustomerstatus";
				 		
				  if ( isset( $_POST['saveChanges'] ) ) {
						
					
					
					include('external/class/Riders_beforeinsert_Customerstatus.php');
					
					include_once('external/validations.php');
					$checkvalidation = checkvalidation();
					
					
					// User has posted the Customerstatus edit form: save the new Customerstatus
					$Customerstatus = new Customerstatus;
					$Customerstatus->storeFormValues( $_POST );
					
					if($checkvalidation == true)
					{
						$Customerstatus->saveimage($_FILES);
						$Customerstatus->insert();
						include('external/class/Riders_afterinsert_Customerstatus.php');
						header( "Location: Riders.php?action=listCustomerstatus&status=changesSaved" );
						die();
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/Riders/editCustomerstatus.php" );
					}												
						
				  } 
				  elseif ( isset( $_GET['error'] ) ) {
					if ( $_GET['error'] == 'duplicate' ) $results['errorMessage'] = "Error: Customerstatus already exist in system.";
				  }
				  elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Customerstatus list
					header( "Location: Riders.php" );
				  } else {
							
					// User has not posted the article edit form yet: display the form
					$data_Customer = Customer::getListallByIdRiders($_SESSION['ridercode']);
					$results['Customerstatus'] = new Customerstatus;
					include('external/classedit/beforeloadingedit_Customerstatus.php');
					require( TEMPLATE_PATH . "/Riders/editCustomerstatus.php" );
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
					  header( "Location: Riders.php?error=CustomerstatusNotFound" );
					  return;
					}
					
					include('external/class/Riders_beforeupdate_Customerstatus.php');
					
					$Customerstatus->storeFormValues( $_POST );
					
					
					if($checkvalidation == true)
					{
					$Customerstatus->saveimage($_FILES);					
					$Customerstatus->update();
					include('external/class/Riders_afterupdate_Customerstatus.php');
					}
					else
					{
						$results['errorMessage'] = "<p class='p-2'>Error: Please check the information entered.</p>";
						$results['Customer'] = $Customer;						
						require( TEMPLATE_PATH . "/Riders/editCustomerstatus.php" );
					}		
					
					if (strpos('Customerstatus', 'setting') !== false) 
					{
					$objn = str_replace('setting', '', $_GET['action']);
					$objn = str_replace('edit', '', $objn);
					header( "Location: Riders.php?action=list".ucfirst($objn)."&status=changesSaved" );
					die();
					}
					else
					{
					header( "Location: Riders.php?action=listCustomerstatus&status=changesSaved" );	
					die();
					}
					
				  } elseif ( isset( $_POST['cancel'] ) ) {

					// User has cancelled their edits: return to the Customerstatus list
					header( "Location: Riders.php" );
				  } else {
					
					// User has not posted the Customerstatus edit form yet: display the form
					$data_Customer = Customer::getListallByIdRiders($_SESSION['ridercode']);
					$results['Customerstatus'] = Customerstatus::getById( (int)$_GET['CustomerstatusId'] );					
					
					if($results['Customerstatus'] -> statusrider != $_SESSION['ridercode']){
							header( "Location: Riders.php?error=CustomerstatusNotFound" );
							return;
					}
				  }
					include('external/classedit/beforeloadingedit_Customerstatus.php');
					require( TEMPLATE_PATH . "/Riders/editCustomerstatus.php" );
				  }

			


				function listCustomer() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Customer::getListByIdRiders($_GET['pageno'], $_SESSION['ridercode']);
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

				  require( TEMPLATE_PATH . "/Riders/listCustomer.php" );
				}
			
				function listCustomerstatus() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Customerstatus::getListByIdRiders($_GET['pageno'], $_SESSION['ridercode']);
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

				  require( TEMPLATE_PATH . "/Riders/listCustomerstatus.php" );
				}
			
				function listPayout() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Payout::getListByIdRiders($_GET['pageno'], $_SESSION['ridercode']);
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

				  require( TEMPLATE_PATH . "/Riders/listPayout.php" );
				}
			

				function searchCustomer() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Customer::getSearchByIdRiders($_GET['pageno'], $_SESSION['ridercode'], $_GET['search']);
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

				  require( TEMPLATE_PATH . "/Riders/listCustomer.php" );
				}								
				
			
				function searchCustomerstatus() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Customerstatus::getSearchByIdRiders($_GET['pageno'], $_SESSION['ridercode'], $_GET['search']);
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

				  require( TEMPLATE_PATH . "/Riders/listCustomerstatus.php" );
				}								
				
			
				function searchPayout() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Payout::getSearchByIdRiders($_GET['pageno'], $_SESSION['ridercode'], $_GET['search']);
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

				  require( TEMPLATE_PATH . "/Riders/listPayout.php" );
				}								
				
			

				function sortCustomer() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Customer::getSortByIdRiders($_GET['pageno'], $_SESSION['ridercode'], $_GET['sort'], $_GET['order']);
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

				  require( TEMPLATE_PATH . "/Riders/listCustomer.php" );
				}
				
				function sortCustomerstatus() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Customerstatus::getSortByIdRiders($_GET['pageno'], $_SESSION['ridercode'], $_GET['sort'], $_GET['order']);
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

				  require( TEMPLATE_PATH . "/Riders/listCustomerstatus.php" );
				}
				
				function sortPayout() {
				  $results = array();
				  
				  if(!isset($_GET["pageno"]))
				  {
					 $_GET["pageno"] = 1;
				  }
				  
				  
				  $data = Payout::getSortByIdRiders($_GET['pageno'], $_SESSION['ridercode'], $_GET['sort'], $_GET['order']);
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

				  require( TEMPLATE_PATH . "/Riders/listPayout.php" );
				}
				

				function signup() {
					  // User has not posted the article edit form yet: display the form
					$data_Company = Company::getListall();$data_Company = Company::getListall();$data_Flag = Flag::getListall();
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
					$data_Company = Company::getListall();$data_Company = Company::getListall();$data_Flag = Flag::getListall();
					$results['Riders'] = Riders::getByRidercode( $_SESSION['ridercode'] );					
					}
					
					require( TEMPLATE_PATH . "/Riders/editRiders.php" );
				  }

			?>
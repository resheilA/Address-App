
<?php 
require( "config.php" );
$action = isset( $_GET['page'] ) ? $_GET['page'] : "";
$domainname = isset( $_GET['domainname'] ) ? $_GET['domainname'] : "";

$temp = "travel";

require( TEMPLATE_PATH . "/". $temp ."/head.php" );
require( TEMPLATE_PATH . "/". $temp ."/navbar.php" );


switch ( $action ) {
  
			  case 'Company':
				viewCompany();
				break;
			  case 'Riders':
				viewRiders();
				break;
			  case 'Customer':
				viewCustomer();
				break;
			  case 'Customerstatus':
				viewCustomerstatus();
				break;
			  case 'Payout':
				viewPayout();
				break;
			  case 'Flag':
				viewFlag();
				break;
			  case 'Paymentmode':
				viewPaymentmode();
				break;
			  case 'Campaign':
				viewCampaign();
				break;
  default:
    viewProduct();
}
 
	function viewCompany() {
	  $results = array();
	  $results['Company'] = Company::getByDomain( (int)$_GET["domainname"] );
	  $results['pageTitle'] = "Company";
	  echo '<pre>';
	  var_dump($results);
	  echo '</pre>';
	 // require( TEMPLATE_PATH . "/viewArticle.php" );
	} 
	function viewRiders() {
	  $results = array();
	  $results['Riders'] = Riders::getByDomain( (int)$_GET["domainname"] );
	  $results['pageTitle'] = "Riders";
	  echo '<pre>';
	  var_dump($results);
	  echo '</pre>';
	 // require( TEMPLATE_PATH . "/viewArticle.php" );
	} 
	function viewCustomer() {
	  $results = array();
	  $results['Customer'] = Customer::getByDomain( (int)$_GET["domainname"] );
	  $results['pageTitle'] = "Customer";
	  echo '<pre>';
	  var_dump($results);
	  echo '</pre>';
	 // require( TEMPLATE_PATH . "/viewArticle.php" );
	} 
	function viewCustomerstatus() {
	  $results = array();
	  $results['Customerstatus'] = Customerstatus::getByDomain( (int)$_GET["domainname"] );
	  $results['pageTitle'] = "Customerstatus";
	  echo '<pre>';
	  var_dump($results);
	  echo '</pre>';
	 // require( TEMPLATE_PATH . "/viewArticle.php" );
	} 
	function viewPayout() {
	  $results = array();
	  $results['Payout'] = Payout::getByDomain( (int)$_GET["domainname"] );
	  $results['pageTitle'] = "Payout";
	  echo '<pre>';
	  var_dump($results);
	  echo '</pre>';
	 // require( TEMPLATE_PATH . "/viewArticle.php" );
	} 
	function viewFlag() {
	  $results = array();
	  $results['Flag'] = Flag::getByDomain( (int)$_GET["domainname"] );
	  $results['pageTitle'] = "Flag";
	  echo '<pre>';
	  var_dump($results);
	  echo '</pre>';
	 // require( TEMPLATE_PATH . "/viewArticle.php" );
	} 
	function viewPaymentmode() {
	  $results = array();
	  $results['Paymentmode'] = Paymentmode::getByDomain( (int)$_GET["domainname"] );
	  $results['pageTitle'] = "Paymentmode";
	  echo '<pre>';
	  var_dump($results);
	  echo '</pre>';
	 // require( TEMPLATE_PATH . "/viewArticle.php" );
	} 
	function viewCampaign() {
	  $results = array();
	  $results['Campaign'] = Campaign::getByDomain( (int)$_GET["domainname"] );
	  $results['pageTitle'] = "Campaign";
	  echo '<pre>';
	  var_dump($results);
	  echo '</pre>';
	 // require( TEMPLATE_PATH . "/viewArticle.php" );
	}

	require( TEMPLATE_PATH . "/". $temp ."/foot.php" );

?>
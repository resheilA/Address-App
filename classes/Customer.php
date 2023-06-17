
		<?php 
		
		class Customer
		{
			
		
		public $id = null;			
				
		public $customername = null;			
				
		public $customercontactnumber = null;			
				
		public $customeremail = null;			
				
		public $cyc = null;			
				
		public $pos = null;			
				
		public $tpd = null;			
				
		public $tad = null;			
				
		public $cuscost = null;			
				
		public $cushomeaddress = null;			
				
		public $cushomepincode = null;			
				
		public $cushomelangitude = null;			
				
		public $cushomelongitude = null;			
				
		public $cusofficeaddress = null;			
				
		public $cusofficepincode = null;			
				
		public $cusofficelangitude = null;			
				
		public $cusofficelongitude = null;			
				
		public $cusarea = null;			
				
		public $customernote = null;			
				
		public $cuscode = null;			
				
			public $ridername = null;	
			
		public $assigned_to = null;			
				
			public $flagname = null;	
			
		public $customer_block = null;			
				
			public $companyname = null;	
			
		public $assigned_company = null;			
				
			public $campaignname = null;	
			
		public $customercampaign = null;			
				
		public $customeraddedon = null;			
					
			
		 public function __construct( $data=array() ) {	
		
		if ( isset( $data['id'] ) ) $this->id = $data['id'];
		if ( isset( $data['customername'] ) ) $this->customername = $data['customername'];
		if ( isset( $data['customercontactnumber'] ) ) $this->customercontactnumber = $data['customercontactnumber'];
		if ( isset( $data['customeremail'] ) ) $this->customeremail = $data['customeremail'];
		if ( isset( $data['cyc'] ) ) $this->cyc = $data['cyc'];
		if ( isset( $data['pos'] ) ) $this->pos = $data['pos'];
		if ( isset( $data['tpd'] ) ) $this->tpd = $data['tpd'];
		if ( isset( $data['tad'] ) ) $this->tad = $data['tad'];
		if ( isset( $data['cuscost'] ) ) $this->cuscost = $data['cuscost'];
		if ( isset( $data['cushomeaddress'] ) ) $this->cushomeaddress = $data['cushomeaddress'];
		if ( isset( $data['cushomepincode'] ) ) $this->cushomepincode = $data['cushomepincode'];
		if ( isset( $data['cushomelangitude'] ) ) $this->cushomelangitude = $data['cushomelangitude'];
		if ( isset( $data['cushomelongitude'] ) ) $this->cushomelongitude = $data['cushomelongitude'];
		if ( isset( $data['cusofficeaddress'] ) ) $this->cusofficeaddress = $data['cusofficeaddress'];
		if ( isset( $data['cusofficepincode'] ) ) $this->cusofficepincode = $data['cusofficepincode'];
		if ( isset( $data['cusofficelangitude'] ) ) $this->cusofficelangitude = $data['cusofficelangitude'];
		if ( isset( $data['cusofficelongitude'] ) ) $this->cusofficelongitude = $data['cusofficelongitude'];
		if ( isset( $data['cusarea'] ) ) $this->cusarea = $data['cusarea'];
		if ( isset( $data['customernote'] ) ) $this->customernote = $data['customernote'];
		if ( isset( $data['cuscode'] ) ) $this->cuscode = $data['cuscode'];
			if ( isset( $data['ridername'] ) ) $this->ridername = $data['ridername'];
		if ( isset( $data['assigned_to'] ) ) $this->assigned_to = $data['assigned_to'];
			if ( isset( $data['flagname'] ) ) $this->flagname = $data['flagname'];
		if ( isset( $data['customer_block'] ) ) $this->customer_block = $data['customer_block'];
			if ( isset( $data['companyname'] ) ) $this->companyname = $data['companyname'];
		if ( isset( $data['assigned_company'] ) ) $this->assigned_company = $data['assigned_company'];
			if ( isset( $data['campaignname'] ) ) $this->campaignname = $data['campaignname'];
		if ( isset( $data['customercampaign'] ) ) $this->customercampaign = $data['customercampaign'];
		if ( isset( $data['customeraddedon'] ) ) $this->customeraddedon = $data['customeraddedon'];	
		 }
		
		 public function storeFormValues ( $params ) {
		 $this->__construct( $params );
		 }
		
		
		public function insert() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "INSERT INTO Customer ( id,customername,customercontactnumber,customeremail,cyc,pos,tpd,tad,cuscost,cushomeaddress,cushomepincode,cushomelangitude,cushomelongitude,cusofficeaddress,cusofficepincode,cusofficelangitude,cusofficelongitude,cusarea,customernote,cuscode,assigned_to,customer_block,assigned_company,customercampaign,customeraddedon ) VALUES ( :id, :customername, :customercontactnumber, :customeremail, :cyc, :pos, :tpd, :tad, :cuscost, :cushomeaddress, :cushomepincode, :cushomelangitude, :cushomelongitude, :cusofficeaddress, :cusofficepincode, :cusofficelangitude, :cusofficelongitude, :cusarea, :customernote, :cuscode, :assigned_to, :customer_block, :assigned_company, :customercampaign, :customeraddedon )";
			$st = $conn->prepare ( $sql );
					
		$st->bindValue( "id", $this->id, PDO::PARAM_STR );
		$st->bindValue( "customername", $this->customername, PDO::PARAM_STR );
		$st->bindValue( "customercontactnumber", $this->customercontactnumber, PDO::PARAM_STR );
		$st->bindValue( "customeremail", $this->customeremail, PDO::PARAM_STR );
		$st->bindValue( "cyc", $this->cyc, PDO::PARAM_STR );
		$st->bindValue( "pos", $this->pos, PDO::PARAM_STR );
		$st->bindValue( "tpd", $this->tpd, PDO::PARAM_STR );
		$st->bindValue( "tad", $this->tad, PDO::PARAM_STR );
		$st->bindValue( "cuscost", $this->cuscost, PDO::PARAM_STR );
		$st->bindValue( "cushomeaddress", $this->cushomeaddress, PDO::PARAM_STR );
		$st->bindValue( "cushomepincode", $this->cushomepincode, PDO::PARAM_STR );
		$st->bindValue( "cushomelangitude", $this->cushomelangitude, PDO::PARAM_STR );
		$st->bindValue( "cushomelongitude", $this->cushomelongitude, PDO::PARAM_STR );
		$st->bindValue( "cusofficeaddress", $this->cusofficeaddress, PDO::PARAM_STR );
		$st->bindValue( "cusofficepincode", $this->cusofficepincode, PDO::PARAM_STR );
		$st->bindValue( "cusofficelangitude", $this->cusofficelangitude, PDO::PARAM_STR );
		$st->bindValue( "cusofficelongitude", $this->cusofficelongitude, PDO::PARAM_STR );
		$st->bindValue( "cusarea", $this->cusarea, PDO::PARAM_STR );
		$st->bindValue( "customernote", $this->customernote, PDO::PARAM_STR );
		$st->bindValue( "cuscode", $this->cuscode, PDO::PARAM_STR );
		$st->bindValue( "assigned_to", $this->assigned_to, PDO::PARAM_STR );
		$st->bindValue( "customer_block", $this->customer_block, PDO::PARAM_STR );
		$st->bindValue( "assigned_company", $this->assigned_company, PDO::PARAM_STR );
		$st->bindValue( "customercampaign", $this->customercampaign, PDO::PARAM_STR );
		$st->bindValue( "customeraddedon", $this->customeraddedon, PDO::PARAM_STR );
			$st->execute();
			$conn = null;
		  }
				
		
		public function update() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "UPDATE Customer SET id=:id, customername=:customername, customercontactnumber=:customercontactnumber, customeremail=:customeremail, cyc=:cyc, pos=:pos, tpd=:tpd, tad=:tad, cuscost=:cuscost, cushomeaddress=:cushomeaddress, cushomepincode=:cushomepincode, cushomelangitude=:cushomelangitude, cushomelongitude=:cushomelongitude, cusofficeaddress=:cusofficeaddress, cusofficepincode=:cusofficepincode, cusofficelangitude=:cusofficelangitude, cusofficelongitude=:cusofficelongitude, cusarea=:cusarea, customernote=:customernote, cuscode=:cuscode, assigned_to=:assigned_to, customer_block=:customer_block, assigned_company=:assigned_company, customercampaign=:customercampaign, customeraddedon=:customeraddedon WHERE id = :id";
			$st = $conn->prepare ( $sql );
					
		$st->bindValue( "id", $this->id, PDO::PARAM_STR );
		$st->bindValue( "customername", $this->customername, PDO::PARAM_STR );
		$st->bindValue( "customercontactnumber", $this->customercontactnumber, PDO::PARAM_STR );
		$st->bindValue( "customeremail", $this->customeremail, PDO::PARAM_STR );
		$st->bindValue( "cyc", $this->cyc, PDO::PARAM_STR );
		$st->bindValue( "pos", $this->pos, PDO::PARAM_STR );
		$st->bindValue( "tpd", $this->tpd, PDO::PARAM_STR );
		$st->bindValue( "tad", $this->tad, PDO::PARAM_STR );
		$st->bindValue( "cuscost", $this->cuscost, PDO::PARAM_STR );
		$st->bindValue( "cushomeaddress", $this->cushomeaddress, PDO::PARAM_STR );
		$st->bindValue( "cushomepincode", $this->cushomepincode, PDO::PARAM_STR );
		$st->bindValue( "cushomelangitude", $this->cushomelangitude, PDO::PARAM_STR );
		$st->bindValue( "cushomelongitude", $this->cushomelongitude, PDO::PARAM_STR );
		$st->bindValue( "cusofficeaddress", $this->cusofficeaddress, PDO::PARAM_STR );
		$st->bindValue( "cusofficepincode", $this->cusofficepincode, PDO::PARAM_STR );
		$st->bindValue( "cusofficelangitude", $this->cusofficelangitude, PDO::PARAM_STR );
		$st->bindValue( "cusofficelongitude", $this->cusofficelongitude, PDO::PARAM_STR );
		$st->bindValue( "cusarea", $this->cusarea, PDO::PARAM_STR );
		$st->bindValue( "customernote", $this->customernote, PDO::PARAM_STR );
		$st->bindValue( "cuscode", $this->cuscode, PDO::PARAM_STR );
		$st->bindValue( "assigned_to", $this->assigned_to, PDO::PARAM_STR );
		$st->bindValue( "customer_block", $this->customer_block, PDO::PARAM_STR );
		$st->bindValue( "assigned_company", $this->assigned_company, PDO::PARAM_STR );
		$st->bindValue( "customercampaign", $this->customercampaign, PDO::PARAM_STR );
		$st->bindValue( "customeraddedon", $this->customeraddedon, PDO::PARAM_STR );
			$st->execute();
			$conn = null;
		}
		
		
		public function delete() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$st = $conn->prepare ( "DELETE FROM Customer WHERE id = :id LIMIT 1" );
			$st->bindValue( ":id", $this->id, PDO::PARAM_INT );
			$st->execute();
			$conn = null;
		}
		
		
		public static function getList( $pageno=1  ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customer
					LIMIT 10 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*10), PDO::PARAM_INT );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customer = new Customer( $row );
			  $list[] = $customer;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListall() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customer";

			$st = $conn->prepare( $sql );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customer = new Customer( $row );
			  $list[] = $customer;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListalljoindomain($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customer  JOIN Riders ON Customer.assigned_to = Riders.ridercode JOIN Flag ON Customer.customer_block = Flag.flagvalue JOIN Company ON Customer.assigned_company = Company.companycode JOIN Campaign ON Customer.customercampaign = Campaign.id WHERE domainname = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customer = new Customer( $row );
			  $list[] = $customer;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListalljoin($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customer  JOIN Riders ON Customer.assigned_to = Riders.ridercode JOIN Flag ON Customer.customer_block = Flag.flagvalue JOIN Company ON Customer.assigned_company = Company.companycode JOIN Campaign ON Customer.customercampaign = Campaign.id WHERE customer.id = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customer = new Customer( $row );
			  $list[] = $customer;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
	    public static function getById( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT * FROM Customer WHERE id = :id ";
			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$row = $st->fetch();
			$conn = null;
			if ( $row ) return new Customer( $row );
		}
		
			public static function getByCuscode( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT * FROM Customer WHERE cuscode = :id ";
			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->execute();
			$row = $st->fetch();
			$conn = null;
			if ( $row ) return new Customer( $row );
			}
			
			
		public static function getByDomainname($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customer WHERE domainname = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customer = new Customer( $row );
			  $list[] = $customer;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public function saveimage($images) {
				$target_dir = TARGET_DIR."/Customer/";
				foreach($images as $mainimage=>$singleimage)
				{
					if($singleimage["name"] != "")
					{	
					$images["fileToUpload"] = $singleimage;
					$target_file_name = $target_dir . basename($images["fileToUpload"]["name"]);
					$uploadOk = 1;
					$imageFileType = strtolower(pathinfo($target_file_name,PATHINFO_EXTENSION));
					$target_file = $target_dir . rand(10000000,9999999999).".".$imageFileType;
					
					if($_POST[$mainimage] != null)
					{
						unlink($_POST[$mainimage]);
					}
					
					// Check if image file is a actual image or fake image
					if(isset($_POST["submit"])) {
					  $check = getimagesize($images["fileToUpload"]["tmp_name"]);
					  if($check !== false) {
						echo "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					  } else {
						echo "File is not an image.";
						$uploadOk = 0;
					  }
					}

					// Check if file already exists
					if (file_exists($target_file)) {
					  echo "Sorry, file already exists.";
					  $uploadOk = 0;
					}

					// Check file size
					if ($images["fileToUpload"]["size"] > 500000) {
						  $info = getimagesize($images["fileToUpload"]["tmp_name"]);
            
                        if ($info['mime'] == 'image/jpeg') 
						{
                            $image = imagecreatefromjpeg($images["fileToUpload"]["tmp_name"]);
						}
                        elseif ($info['mime'] == 'image/gif') 
						{
                            $image = imagecreatefromgif($images["fileToUpload"]["tmp_name"]);
						}
                        elseif ($info['mime'] == 'image/png') 
						{
                            $image = imagecreatefrompng($images["fileToUpload"]["tmp_name"]);
						}
						else
						{
							break;
						}
						
                        imagejpeg($image, $target_file, 75);
					        
					  echo "Sorry, your file is too large.";
					  $uploadOk = 0;
					}

					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
					  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					  $uploadOk = 0;
					}

					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
					  echo "Sorry, your file was not uploaded.";
					// if everything is ok, try to upload file
					} else {
					  if (move_uploaded_file($images["fileToUpload"]["tmp_name"], $target_file)) {
						echo "The file ". htmlspecialchars( basename( $images["fileToUpload"]["name"])). " has been uploaded.";
					  } else {
						echo "Sorry, there was an error uploading your file.";
					  }
					}
					
					$targetval = $mainimage;
					$this->$targetval = $target_file;
					}
				}	
			}
			

		
		
		
	public static function getListByIdCompany( $pageno=1, $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customer WHERE assigned_company = :id 
					LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customer = new Customer( $row );
			  $list[] = $customer;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getListallByIdCompany( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customer WHERE assigned_company = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customer = new Customer( $row );
			  $list[] = $customer;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getSearchByIdCompany( $pageno=1, $id, $search ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customer WHERE assigned_company = :id 
					 AND cuscode LIKE :search OR customeremail LIKE :search OR customername LIKE :search OR customercontactnumber LIKE :search LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->bindValue( ":search", '%'.$search.'%', PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customer = new Customer( $row );
			  $list[] = $customer;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getSortByIdCompany( $pageno=1, $id, $sort, $order  ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customer WHERE assigned_company = :id 
					 ORDER BY ".$sort." ".$order." LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customer = new Customer( $row );
			  $list[] = $customer;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	
	public static function getListbyjoinCompany($id, $varstr, $joinstr, $from, $to) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS ".$varstr." FROM Customer ".$joinstr." WHERE assigned_company  = :id AND customeraddedon BETWEEN :from AND :to";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->bindValue( ":from", $from, PDO::PARAM_STR );
			$st->bindValue( ":to", $to, PDO::PARAM_STR );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {			  
			  $list[] = $row;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
	}		
		
	
	public static function getListByIdRiders( $pageno=1, $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customer WHERE assigned_to = :id 
					LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customer = new Customer( $row );
			  $list[] = $customer;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getListallByIdRiders( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customer WHERE assigned_to = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customer = new Customer( $row );
			  $list[] = $customer;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getSearchByIdRiders( $pageno=1, $id, $search ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customer WHERE assigned_to = :id 
					 AND cuscode LIKE :search OR customeremail LIKE :search LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->bindValue( ":search", '%'.$search.'%', PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customer = new Customer( $row );
			  $list[] = $customer;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getSortByIdRiders( $pageno=1, $id, $sort, $order  ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customer WHERE assigned_to = :id 
					 ORDER BY ".$sort." ".$order." LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customer = new Customer( $row );
			  $list[] = $customer;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	
	public static function getListbyjoinRiders($id, $varstr, $joinstr, $from, $to) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS ".$varstr." FROM Customer ".$joinstr." WHERE assigned_to  = :id AND customeraddedon BETWEEN :from AND :to";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->bindValue( ":from", $from, PDO::PARAM_STR );
			$st->bindValue( ":to", $to, PDO::PARAM_STR );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {			  
			  $list[] = $row;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
	}		
		
	/* REPLACE THIS TEXT */	
		
	
		 
		}
		
		
		?>
		
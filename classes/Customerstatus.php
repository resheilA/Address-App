
		<?php 
		
		class Customerstatus
		{
			
		
		public $id = null;			
				
		public $latitude = null;			
				
		public $longitude = null;			
				
		public $visitpicture1 = null;			
				
		public $visitpicture2 = null;			
				
		public $visitpicture3 = null;			
				
		public $collectedamount = null;			
				
		public $code = null;			
				
		public $remarks = null;			
				
			public $customername = null;	
			
		public $customer = null;			
				
			public $companyname = null;	
			
		public $statuscompany = null;			
				
			public $ridername = null;	
			
		public $statusrider = null;			
				
		public $cusstatecode = null;			
					
			
		 public function __construct( $data=array() ) {	
		
		if ( isset( $data['id'] ) ) $this->id = $data['id'];
		if ( isset( $data['latitude'] ) ) $this->latitude = $data['latitude'];
		if ( isset( $data['longitude'] ) ) $this->longitude = $data['longitude'];
		if ( isset( $data['visitpicture1'] ) ) $this->visitpicture1 = $data['visitpicture1'];
		if ( isset( $data['visitpicture2'] ) ) $this->visitpicture2 = $data['visitpicture2'];
		if ( isset( $data['visitpicture3'] ) ) $this->visitpicture3 = $data['visitpicture3'];
		if ( isset( $data['collectedamount'] ) ) $this->collectedamount = $data['collectedamount'];
		if ( isset( $data['code'] ) ) $this->code = $data['code'];
		if ( isset( $data['remarks'] ) ) $this->remarks = $data['remarks'];
			if ( isset( $data['customername'] ) ) $this->customername = $data['customername'];
		if ( isset( $data['customer'] ) ) $this->customer = $data['customer'];
			if ( isset( $data['companyname'] ) ) $this->companyname = $data['companyname'];
		if ( isset( $data['statuscompany'] ) ) $this->statuscompany = $data['statuscompany'];
			if ( isset( $data['ridername'] ) ) $this->ridername = $data['ridername'];
		if ( isset( $data['statusrider'] ) ) $this->statusrider = $data['statusrider'];
		if ( isset( $data['cusstatecode'] ) ) $this->cusstatecode = $data['cusstatecode'];	
		 }
		
		 public function storeFormValues ( $params ) {
		 $this->__construct( $params );
		 }
		
		
		public function insert() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "INSERT INTO Customerstatus ( id,latitude,longitude,visitpicture1,visitpicture2,visitpicture3,collectedamount,code,remarks,customer,statuscompany,statusrider,cusstatecode ) VALUES ( :id, :latitude, :longitude, :visitpicture1, :visitpicture2, :visitpicture3, :collectedamount, :code, :remarks, :customer, :statuscompany, :statusrider, :cusstatecode )";
			$st = $conn->prepare ( $sql );
					
		$st->bindValue( "id", $this->id, PDO::PARAM_STR );
		$st->bindValue( "latitude", $this->latitude, PDO::PARAM_STR );
		$st->bindValue( "longitude", $this->longitude, PDO::PARAM_STR );
		$st->bindValue( "visitpicture1", $this->visitpicture1, PDO::PARAM_STR );
		$st->bindValue( "visitpicture2", $this->visitpicture2, PDO::PARAM_STR );
		$st->bindValue( "visitpicture3", $this->visitpicture3, PDO::PARAM_STR );
		$st->bindValue( "collectedamount", $this->collectedamount, PDO::PARAM_STR );
		$st->bindValue( "code", $this->code, PDO::PARAM_STR );
		$st->bindValue( "remarks", $this->remarks, PDO::PARAM_STR );
		$st->bindValue( "customer", $this->customer, PDO::PARAM_STR );
		$st->bindValue( "statuscompany", $this->statuscompany, PDO::PARAM_STR );
		$st->bindValue( "statusrider", $this->statusrider, PDO::PARAM_STR );
		$st->bindValue( "cusstatecode", $this->cusstatecode, PDO::PARAM_STR );
			$st->execute();
			$conn = null;
		  }
				
		
		public function update() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "UPDATE Customerstatus SET id=:id, latitude=:latitude, longitude=:longitude, visitpicture1=:visitpicture1, visitpicture2=:visitpicture2, visitpicture3=:visitpicture3, collectedamount=:collectedamount, code=:code, remarks=:remarks, customer=:customer, statuscompany=:statuscompany, statusrider=:statusrider, cusstatecode=:cusstatecode WHERE id = :id";
			$st = $conn->prepare ( $sql );
					
		$st->bindValue( "id", $this->id, PDO::PARAM_STR );
		$st->bindValue( "latitude", $this->latitude, PDO::PARAM_STR );
		$st->bindValue( "longitude", $this->longitude, PDO::PARAM_STR );
		$st->bindValue( "visitpicture1", $this->visitpicture1, PDO::PARAM_STR );
		$st->bindValue( "visitpicture2", $this->visitpicture2, PDO::PARAM_STR );
		$st->bindValue( "visitpicture3", $this->visitpicture3, PDO::PARAM_STR );
		$st->bindValue( "collectedamount", $this->collectedamount, PDO::PARAM_STR );
		$st->bindValue( "code", $this->code, PDO::PARAM_STR );
		$st->bindValue( "remarks", $this->remarks, PDO::PARAM_STR );
		$st->bindValue( "customer", $this->customer, PDO::PARAM_STR );
		$st->bindValue( "statuscompany", $this->statuscompany, PDO::PARAM_STR );
		$st->bindValue( "statusrider", $this->statusrider, PDO::PARAM_STR );
		$st->bindValue( "cusstatecode", $this->cusstatecode, PDO::PARAM_STR );
			$st->execute();
			$conn = null;
		}
		
		
		public function delete() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$st = $conn->prepare ( "DELETE FROM Customerstatus WHERE id = :id LIMIT 1" );
			$st->bindValue( ":id", $this->id, PDO::PARAM_INT );
			$st->execute();
			$conn = null;
		}
		
		
		public static function getList( $pageno=1  ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customerstatus
					LIMIT 10 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*10), PDO::PARAM_INT );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customerstatus = new Customerstatus( $row );
			  $list[] = $customerstatus;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListall() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customerstatus";

			$st = $conn->prepare( $sql );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customerstatus = new Customerstatus( $row );
			  $list[] = $customerstatus;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListalljoindomain($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customerstatus  JOIN Customer ON Customerstatus.customer = Customer.id JOIN Company ON Customerstatus.statuscompany = Company.companycode JOIN Riders ON Customerstatus.statusrider = Riders.ridercode WHERE domainname = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customerstatus = new Customerstatus( $row );
			  $list[] = $customerstatus;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListalljoin($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customerstatus  JOIN Customer ON Customerstatus.customer = Customer.id JOIN Company ON Customerstatus.statuscompany = Company.companycode JOIN Riders ON Customerstatus.statusrider = Riders.ridercode WHERE customerstatus.id = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customerstatus = new Customerstatus( $row );
			  $list[] = $customerstatus;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
	    public static function getById( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT * FROM Customerstatus WHERE id = :id ";
			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$row = $st->fetch();
			$conn = null;
			if ( $row ) return new Customerstatus( $row );
		}
		
			public static function getByCusstatecode( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT * FROM Customerstatus WHERE cusstatecode = :id ";
			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->execute();
			$row = $st->fetch();
			$conn = null;
			if ( $row ) return new Customerstatus( $row );
			}
			
			
		public static function getByDomainname($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customerstatus WHERE domainname = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customerstatus = new Customerstatus( $row );
			  $list[] = $customerstatus;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public function saveimage($images) {
				$target_dir = TARGET_DIR."/Customerstatus/";
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
                            $image = imagecreatefromjpeg($images["fileToUpload"]["tmp_name"]);
            
                        elseif ($info['mime'] == 'image/gif') 
                            $image = imagecreatefromgif($images["fileToUpload"]["tmp_name"]);
            
                        elseif ($info['mime'] == 'image/png') 
                            $image = imagecreatefrompng($images["fileToUpload"]["tmp_name"]);
            
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
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customerstatus WHERE statuscompany = :id 
					LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customerstatus = new Customerstatus( $row );
			  $list[] = $customerstatus;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getListallByIdCompany( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customerstatus WHERE statuscompany = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customerstatus = new Customerstatus( $row );
			  $list[] = $customerstatus;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getSearchByIdCompany( $pageno=1, $id, $search ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customerstatus WHERE statuscompany = :id 
					 AND customer LIKE :search OR cusstatecode LIKE :search LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->bindValue( ":search", '%'.$search.'%', PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customerstatus = new Customerstatus( $row );
			  $list[] = $customerstatus;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getSortByIdCompany( $pageno=1, $id, $sort, $order  ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customerstatus WHERE statuscompany = :id 
					 ORDER BY ".$sort." ".$order." LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customerstatus = new Customerstatus( $row );
			  $list[] = $customerstatus;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	
	public static function getListbyjoinCompany($id, $varstr, $joinstr, $from, $to) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS ".$varstr." FROM Customerstatus ".$joinstr." WHERE statuscompany  = :id AND customerstatusaddedon BETWEEN :from AND :to";

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
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customerstatus WHERE statusrider = :id 
					LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customerstatus = new Customerstatus( $row );
			  $list[] = $customerstatus;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getListallByIdRiders( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customerstatus WHERE statusrider = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customerstatus = new Customerstatus( $row );
			  $list[] = $customerstatus;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getSearchByIdRiders( $pageno=1, $id, $search ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customerstatus WHERE statusrider = :id 
					 AND customer LIKE :search OR cusstatecode LIKE :search LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->bindValue( ":search", '%'.$search.'%', PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customerstatus = new Customerstatus( $row );
			  $list[] = $customerstatus;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getSortByIdRiders( $pageno=1, $id, $sort, $order  ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Customerstatus WHERE statusrider = :id 
					 ORDER BY ".$sort." ".$order." LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $customerstatus = new Customerstatus( $row );
			  $list[] = $customerstatus;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	
	public static function getListbyjoinRiders($id, $varstr, $joinstr, $from, $to) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS ".$varstr." FROM Customerstatus ".$joinstr." WHERE statusrider  = :id AND customerstatusaddedon BETWEEN :from AND :to";

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
		
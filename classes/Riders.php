
		<?php 
		
		class Riders
		{
			
		
		public $id = null;			
				
		public $ridername = null;			
				
		public $rideraddress = null;			
				
		public $ridercontactnumber = null;			
				
			public $companyname = null;	
			
		public $ridercompany = null;			
				
		public $riderage = null;			
				
		public $riderprofilepic = null;			
				
		public $rideraadharcard = null;			
				
		public $riderpancard = null;			
				
		public $riderresidence = null;			
				
		public $riderdra = null;			
				
		public $riderpcc = null;			
				
		public $bankaccno = null;			
				
		public $bankifsc = null;			
				
		public $riderbeneid = null;			
				
		public $ridercode = null;			
				
		public $password = null;			
				
			public $flagname = null;	
			
		public $rider_block = null;			
				
		public $rideraddedon = null;			
					
			
		 public function __construct( $data=array() ) {	
		
		if ( isset( $data['id'] ) ) $this->id = $data['id'];
		if ( isset( $data['ridername'] ) ) $this->ridername = $data['ridername'];
		if ( isset( $data['rideraddress'] ) ) $this->rideraddress = $data['rideraddress'];
		if ( isset( $data['ridercontactnumber'] ) ) $this->ridercontactnumber = $data['ridercontactnumber'];
			if ( isset( $data['companyname'] ) ) $this->companyname = $data['companyname'];
		if ( isset( $data['ridercompany'] ) ) $this->ridercompany = $data['ridercompany'];
		if ( isset( $data['riderage'] ) ) $this->riderage = $data['riderage'];
		if ( isset( $data['riderprofilepic'] ) ) $this->riderprofilepic = $data['riderprofilepic'];
		if ( isset( $data['rideraadharcard'] ) ) $this->rideraadharcard = $data['rideraadharcard'];
		if ( isset( $data['riderpancard'] ) ) $this->riderpancard = $data['riderpancard'];
		if ( isset( $data['riderresidence'] ) ) $this->riderresidence = $data['riderresidence'];
		if ( isset( $data['riderdra'] ) ) $this->riderdra = $data['riderdra'];
		if ( isset( $data['riderpcc'] ) ) $this->riderpcc = $data['riderpcc'];
		if ( isset( $data['bankaccno'] ) ) $this->bankaccno = $data['bankaccno'];
		if ( isset( $data['bankifsc'] ) ) $this->bankifsc = $data['bankifsc'];
		if ( isset( $data['riderbeneid'] ) ) $this->riderbeneid = $data['riderbeneid'];
		if ( isset( $data['ridercode'] ) ) $this->ridercode = $data['ridercode'];
		if ( isset( $data['password'] ) ) $this->password = $data['password'];
			if ( isset( $data['flagname'] ) ) $this->flagname = $data['flagname'];
		if ( isset( $data['rider_block'] ) ) $this->rider_block = $data['rider_block'];
		if ( isset( $data['rideraddedon'] ) ) $this->rideraddedon = $data['rideraddedon'];	
		 }
		
		 public function storeFormValues ( $params ) {
		 $this->__construct( $params );
		 }
		
		
		public function insert() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "INSERT INTO Riders ( id,ridername,rideraddress,ridercontactnumber,ridercompany,riderage,riderprofilepic,rideraadharcard,riderpancard,riderresidence,riderdra,riderpcc,bankaccno,bankifsc,riderbeneid,ridercode,password,rider_block,rideraddedon ) VALUES ( :id, :ridername, :rideraddress, :ridercontactnumber, :ridercompany, :riderage, :riderprofilepic, :rideraadharcard, :riderpancard, :riderresidence, :riderdra, :riderpcc, :bankaccno, :bankifsc, :riderbeneid, :ridercode, :password, :rider_block, :rideraddedon )";
			$st = $conn->prepare ( $sql );
					
		$st->bindValue( "id", $this->id, PDO::PARAM_STR );
		$st->bindValue( "ridername", $this->ridername, PDO::PARAM_STR );
		$st->bindValue( "rideraddress", $this->rideraddress, PDO::PARAM_STR );
		$st->bindValue( "ridercontactnumber", $this->ridercontactnumber, PDO::PARAM_STR );
		$st->bindValue( "ridercompany", $this->ridercompany, PDO::PARAM_STR );
		$st->bindValue( "riderage", $this->riderage, PDO::PARAM_STR );
		$st->bindValue( "riderprofilepic", $this->riderprofilepic, PDO::PARAM_STR );
		$st->bindValue( "rideraadharcard", $this->rideraadharcard, PDO::PARAM_STR );
		$st->bindValue( "riderpancard", $this->riderpancard, PDO::PARAM_STR );
		$st->bindValue( "riderresidence", $this->riderresidence, PDO::PARAM_STR );
		$st->bindValue( "riderdra", $this->riderdra, PDO::PARAM_STR );
		$st->bindValue( "riderpcc", $this->riderpcc, PDO::PARAM_STR );
		$st->bindValue( "bankaccno", $this->bankaccno, PDO::PARAM_STR );
		$st->bindValue( "bankifsc", $this->bankifsc, PDO::PARAM_STR );
		$st->bindValue( "riderbeneid", $this->riderbeneid, PDO::PARAM_STR );
		$st->bindValue( "ridercode", $this->ridercode, PDO::PARAM_STR );
		$st->bindValue( "password", $this->password, PDO::PARAM_STR );
		$st->bindValue( "rider_block", $this->rider_block, PDO::PARAM_STR );
		$st->bindValue( "rideraddedon", $this->rideraddedon, PDO::PARAM_STR );
			$st->execute();
			$conn = null;
		  }
				
		
		public function update() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "UPDATE Riders SET id=:id, ridername=:ridername, rideraddress=:rideraddress, ridercontactnumber=:ridercontactnumber, ridercompany=:ridercompany, riderage=:riderage, riderprofilepic=:riderprofilepic, rideraadharcard=:rideraadharcard, riderpancard=:riderpancard, riderresidence=:riderresidence, riderdra=:riderdra, riderpcc=:riderpcc, bankaccno=:bankaccno, bankifsc=:bankifsc, riderbeneid=:riderbeneid, ridercode=:ridercode, password=:password, rider_block=:rider_block, rideraddedon=:rideraddedon WHERE id = :id";
			$st = $conn->prepare ( $sql );
					
		$st->bindValue( "id", $this->id, PDO::PARAM_STR );
		$st->bindValue( "ridername", $this->ridername, PDO::PARAM_STR );
		$st->bindValue( "rideraddress", $this->rideraddress, PDO::PARAM_STR );
		$st->bindValue( "ridercontactnumber", $this->ridercontactnumber, PDO::PARAM_STR );
		$st->bindValue( "ridercompany", $this->ridercompany, PDO::PARAM_STR );
		$st->bindValue( "riderage", $this->riderage, PDO::PARAM_STR );
		$st->bindValue( "riderprofilepic", $this->riderprofilepic, PDO::PARAM_STR );
		$st->bindValue( "rideraadharcard", $this->rideraadharcard, PDO::PARAM_STR );
		$st->bindValue( "riderpancard", $this->riderpancard, PDO::PARAM_STR );
		$st->bindValue( "riderresidence", $this->riderresidence, PDO::PARAM_STR );
		$st->bindValue( "riderdra", $this->riderdra, PDO::PARAM_STR );
		$st->bindValue( "riderpcc", $this->riderpcc, PDO::PARAM_STR );
		$st->bindValue( "bankaccno", $this->bankaccno, PDO::PARAM_STR );
		$st->bindValue( "bankifsc", $this->bankifsc, PDO::PARAM_STR );
		$st->bindValue( "riderbeneid", $this->riderbeneid, PDO::PARAM_STR );
		$st->bindValue( "ridercode", $this->ridercode, PDO::PARAM_STR );
		$st->bindValue( "password", $this->password, PDO::PARAM_STR );
		$st->bindValue( "rider_block", $this->rider_block, PDO::PARAM_STR );
		$st->bindValue( "rideraddedon", $this->rideraddedon, PDO::PARAM_STR );
			$st->execute();
			$conn = null;
		}
		
		
		public function delete() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$st = $conn->prepare ( "DELETE FROM Riders WHERE id = :id LIMIT 1" );
			$st->bindValue( ":id", $this->id, PDO::PARAM_INT );
			$st->execute();
			$conn = null;
		}
		
		
		public static function getList( $pageno=1  ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Riders
					LIMIT 10 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*10), PDO::PARAM_INT );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $riders = new Riders( $row );
			  $list[] = $riders;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListall() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Riders";

			$st = $conn->prepare( $sql );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $riders = new Riders( $row );
			  $list[] = $riders;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListalljoindomain($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Riders  JOIN Company ON Riders.ridercompany = Company.companycode JOIN Flag ON Riders.rider_block = Flag.flagvalue WHERE domainname = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $riders = new Riders( $row );
			  $list[] = $riders;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListalljoin($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Riders  JOIN Company ON Riders.ridercompany = Company.companycode JOIN Flag ON Riders.rider_block = Flag.flagvalue WHERE riders.id = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $riders = new Riders( $row );
			  $list[] = $riders;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
	    public static function getById( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT * FROM Riders WHERE id = :id ";
			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$row = $st->fetch();
			$conn = null;
			if ( $row ) return new Riders( $row );
		}
		
			public static function getByRidercode( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT * FROM Riders WHERE ridercode = :id ";
			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->execute();
			$row = $st->fetch();
			$conn = null;
			if ( $row ) return new Riders( $row );
			}
			
			
		public static function getByDomainname($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Riders WHERE domainname = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $riders = new Riders( $row );
			  $list[] = $riders;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public function saveimage($images) {
				$target_dir = TARGET_DIR."/Riders/";
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
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Riders WHERE ridercompany = :id 
					LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $riders = new Riders( $row );
			  $list[] = $riders;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getListallByIdCompany( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Riders WHERE ridercompany = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $riders = new Riders( $row );
			  $list[] = $riders;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getSearchByIdCompany( $pageno=1, $id, $search ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Riders WHERE ridercompany = :id 
					 AND ridercontactnumber LIKE :search OR ridername LIKE :search OR ridercode LIKE :search LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->bindValue( ":search", '%'.$search.'%', PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $riders = new Riders( $row );
			  $list[] = $riders;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getSortByIdCompany( $pageno=1, $id, $sort, $order  ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Riders WHERE ridercompany = :id 
					 ORDER BY ".$sort." ".$order." LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $riders = new Riders( $row );
			  $list[] = $riders;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	
	public static function getListbyjoinCompany($id, $varstr, $joinstr, $from, $to) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS ".$varstr." FROM Riders ".$joinstr." WHERE ridercompany  = :id AND ridersaddedon BETWEEN :from AND :to";

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
		
	
	public static function checkauth($username, $password) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Riders WHERE Riders.password = :password AND
			Riders.ridercontactnumber = :username";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":username", $username, PDO::PARAM_STR );
			$st->bindValue( ":password", $password, PDO::PARAM_STR );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $riders = new Riders( $row );
			  $list[] = $riders;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
					
		/* REPLACE THIS TEXT */	

			
	
		 
		}
		
		
		?>
		
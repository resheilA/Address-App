
		<?php 
		
		class Payout
		{
			
		
		public $id = null;			
				
		public $payoutid = null;			
				
			public $ridername = null;	
			
		public $payoutrider = null;			
				
			public $companyname = null;	
			
		public $payoutcompany = null;			
				
		public $payoutamt = null;			
				
		public $payoutaddedon = null;			
				
			public $paymentmodename = null;	
			
		public $payoutstatus = null;			
				
		public $payoutdescription = null;			
					
			
		 public function __construct( $data=array() ) {	
		
		if ( isset( $data['id'] ) ) $this->id = $data['id'];
		if ( isset( $data['payoutid'] ) ) $this->payoutid = $data['payoutid'];
			if ( isset( $data['ridername'] ) ) $this->ridername = $data['ridername'];
		if ( isset( $data['payoutrider'] ) ) $this->payoutrider = $data['payoutrider'];
			if ( isset( $data['companyname'] ) ) $this->companyname = $data['companyname'];
		if ( isset( $data['payoutcompany'] ) ) $this->payoutcompany = $data['payoutcompany'];
		if ( isset( $data['payoutamt'] ) ) $this->payoutamt = $data['payoutamt'];
		if ( isset( $data['payoutaddedon'] ) ) $this->payoutaddedon = $data['payoutaddedon'];
			if ( isset( $data['paymentmodename'] ) ) $this->paymentmodename = $data['paymentmodename'];
		if ( isset( $data['payoutstatus'] ) ) $this->payoutstatus = $data['payoutstatus'];
		if ( isset( $data['payoutdescription'] ) ) $this->payoutdescription = $data['payoutdescription'];	
		 }
		
		 public function storeFormValues ( $params ) {
		 $this->__construct( $params );
		 }
		
		
		public function insert() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "INSERT INTO Payout ( id,payoutid,payoutrider,payoutcompany,payoutamt,payoutaddedon,payoutstatus,payoutdescription ) VALUES ( :id, :payoutid, :payoutrider, :payoutcompany, :payoutamt, :payoutaddedon, :payoutstatus, :payoutdescription )";
			$st = $conn->prepare ( $sql );
					
		$st->bindValue( "id", $this->id, PDO::PARAM_STR );
		$st->bindValue( "payoutid", $this->payoutid, PDO::PARAM_STR );
		$st->bindValue( "payoutrider", $this->payoutrider, PDO::PARAM_STR );
		$st->bindValue( "payoutcompany", $this->payoutcompany, PDO::PARAM_STR );
		$st->bindValue( "payoutamt", $this->payoutamt, PDO::PARAM_STR );
		$st->bindValue( "payoutaddedon", $this->payoutaddedon, PDO::PARAM_STR );
		$st->bindValue( "payoutstatus", $this->payoutstatus, PDO::PARAM_STR );
		$st->bindValue( "payoutdescription", $this->payoutdescription, PDO::PARAM_STR );
			$st->execute();
			$conn = null;
		  }
				
		
		public function update() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "UPDATE Payout SET id=:id, payoutid=:payoutid, payoutrider=:payoutrider, payoutcompany=:payoutcompany, payoutamt=:payoutamt, payoutaddedon=:payoutaddedon, payoutstatus=:payoutstatus, payoutdescription=:payoutdescription WHERE id = :id";
			$st = $conn->prepare ( $sql );
					
		$st->bindValue( "id", $this->id, PDO::PARAM_STR );
		$st->bindValue( "payoutid", $this->payoutid, PDO::PARAM_STR );
		$st->bindValue( "payoutrider", $this->payoutrider, PDO::PARAM_STR );
		$st->bindValue( "payoutcompany", $this->payoutcompany, PDO::PARAM_STR );
		$st->bindValue( "payoutamt", $this->payoutamt, PDO::PARAM_STR );
		$st->bindValue( "payoutaddedon", $this->payoutaddedon, PDO::PARAM_STR );
		$st->bindValue( "payoutstatus", $this->payoutstatus, PDO::PARAM_STR );
		$st->bindValue( "payoutdescription", $this->payoutdescription, PDO::PARAM_STR );
			$st->execute();
			$conn = null;
		}
		
		
		public function delete() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$st = $conn->prepare ( "DELETE FROM Payout WHERE id = :id LIMIT 1" );
			$st->bindValue( ":id", $this->id, PDO::PARAM_INT );
			$st->execute();
			$conn = null;
		}
		
		
		public static function getList( $pageno=1  ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Payout
					LIMIT 10 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*10), PDO::PARAM_INT );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $payout = new Payout( $row );
			  $list[] = $payout;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListall() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Payout";

			$st = $conn->prepare( $sql );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $payout = new Payout( $row );
			  $list[] = $payout;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListalljoindomain($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Payout  JOIN Riders ON payout.payoutrider = Riders.ridercode JOIN Company ON payout.payoutcompany = Company.companycode JOIN Paymentmode ON payout.payoutstatus = Paymentmode.id WHERE domainname = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $payout = new Payout( $row );
			  $list[] = $payout;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListalljoin($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Payout  JOIN Riders ON payout.payoutrider = Riders.ridercode JOIN Company ON payout.payoutcompany = Company.companycode JOIN Paymentmode ON payout.payoutstatus = Paymentmode.id WHERE payout.id = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $payout = new Payout( $row );
			  $list[] = $payout;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
	    public static function getById( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT * FROM Payout WHERE id = :id ";
			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$row = $st->fetch();
			$conn = null;
			if ( $row ) return new Payout( $row );
		}
		
			public static function getByPayoutid( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT * FROM Payout WHERE payoutid = :id ";
			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->execute();
			$row = $st->fetch();
			$conn = null;
			if ( $row ) return new Payout( $row );
			}
			
			
		public static function getByDomainname($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Payout WHERE domainname = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $payout = new Payout( $row );
			  $list[] = $payout;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public function saveimage($images) {
				$target_dir = TARGET_DIR."/Payout/";
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
							break();
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
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Payout WHERE payoutcompany = :id 
					LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $payout = new Payout( $row );
			  $list[] = $payout;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getListallByIdCompany( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Payout WHERE payoutcompany = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $payout = new Payout( $row );
			  $list[] = $payout;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getSearchByIdCompany( $pageno=1, $id, $search ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Payout WHERE payoutcompany = :id 
					 AND payoutrider LIKE :search OR payoutcompany LIKE :search OR payoutid LIKE :search LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->bindValue( ":search", '%'.$search.'%', PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $payout = new Payout( $row );
			  $list[] = $payout;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getSortByIdCompany( $pageno=1, $id, $sort, $order  ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Payout WHERE payoutcompany = :id 
					 ORDER BY ".$sort." ".$order." LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $payout = new Payout( $row );
			  $list[] = $payout;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	
	public static function getListbyjoinCompany($id, $varstr, $joinstr, $from, $to) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS ".$varstr." FROM Payout ".$joinstr." WHERE payoutcompany  = :id AND payoutaddedon BETWEEN :from AND :to";

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
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Payout WHERE payoutrider = :id 
					LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $payout = new Payout( $row );
			  $list[] = $payout;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getListallByIdRiders( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Payout WHERE payoutrider = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $payout = new Payout( $row );
			  $list[] = $payout;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getSearchByIdRiders( $pageno=1, $id, $search ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Payout WHERE payoutrider = :id 
					 AND payoutrider LIKE :search OR payoutcompany LIKE :search OR payoutid LIKE :search LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->bindValue( ":search", '%'.$search.'%', PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $payout = new Payout( $row );
			  $list[] = $payout;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getSortByIdRiders( $pageno=1, $id, $sort, $order  ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Payout WHERE payoutrider = :id 
					 ORDER BY ".$sort." ".$order." LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $payout = new Payout( $row );
			  $list[] = $payout;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	
	public static function getListbyjoinRiders($id, $varstr, $joinstr, $from, $to) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS ".$varstr." FROM Payout ".$joinstr." WHERE payoutrider  = :id AND payoutaddedon BETWEEN :from AND :to";

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
		
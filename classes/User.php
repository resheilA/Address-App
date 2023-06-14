
		<?php 
		
		class User
		{
			
		
		public $id = null;			
				
		public $usercode = null;			
				
		public $fullname = null;			
				
		public $contact = null;			
				
		public $username = null;			
				
		public $userpassword = null;			
				
			public $companyname = null;	
			
		public $usercompany = null;			
				
			public $flagname = null;	
			
		public $user_block = null;			
					
			
		 public function __construct( $data=array() ) {	
		
		if ( isset( $data['id'] ) ) $this->id = $data['id'];
		if ( isset( $data['usercode'] ) ) $this->usercode = $data['usercode'];
		if ( isset( $data['fullname'] ) ) $this->fullname = $data['fullname'];
		if ( isset( $data['contact'] ) ) $this->contact = $data['contact'];
		if ( isset( $data['username'] ) ) $this->username = $data['username'];
		if ( isset( $data['userpassword'] ) ) $this->userpassword = $data['userpassword'];
			if ( isset( $data['companyname'] ) ) $this->companyname = $data['companyname'];
		if ( isset( $data['usercompany'] ) ) $this->usercompany = $data['usercompany'];
			if ( isset( $data['flagname'] ) ) $this->flagname = $data['flagname'];
		if ( isset( $data['user_block'] ) ) $this->user_block = $data['user_block'];	
		 }
		
		 public function storeFormValues ( $params ) {
		 $this->__construct( $params );
		 }
		
		
		public function insert() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "INSERT INTO User ( id,usercode,fullname,contact,username,userpassword,usercompany,user_block ) VALUES ( :id, :usercode, :fullname, :contact, :username, :userpassword, :usercompany, :user_block )";
			$st = $conn->prepare ( $sql );
					
		$st->bindValue( "id", $this->id, PDO::PARAM_STR );
		$st->bindValue( "usercode", $this->usercode, PDO::PARAM_STR );
		$st->bindValue( "fullname", $this->fullname, PDO::PARAM_STR );
		$st->bindValue( "contact", $this->contact, PDO::PARAM_STR );
		$st->bindValue( "username", $this->username, PDO::PARAM_STR );
		$st->bindValue( "userpassword", $this->userpassword, PDO::PARAM_STR );
		$st->bindValue( "usercompany", $this->usercompany, PDO::PARAM_STR );
		$st->bindValue( "user_block", $this->user_block, PDO::PARAM_STR );
			$st->execute();
			$conn = null;
		  }
				
		
		public function update() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "UPDATE User SET id=:id, usercode=:usercode, fullname=:fullname, contact=:contact, username=:username, userpassword=:userpassword, usercompany=:usercompany, user_block=:user_block WHERE id = :id";
			$st = $conn->prepare ( $sql );
					
		$st->bindValue( "id", $this->id, PDO::PARAM_STR );
		$st->bindValue( "usercode", $this->usercode, PDO::PARAM_STR );
		$st->bindValue( "fullname", $this->fullname, PDO::PARAM_STR );
		$st->bindValue( "contact", $this->contact, PDO::PARAM_STR );
		$st->bindValue( "username", $this->username, PDO::PARAM_STR );
		$st->bindValue( "userpassword", $this->userpassword, PDO::PARAM_STR );
		$st->bindValue( "usercompany", $this->usercompany, PDO::PARAM_STR );
		$st->bindValue( "user_block", $this->user_block, PDO::PARAM_STR );
			$st->execute();
			$conn = null;
		}
		
		
		public function delete() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$st = $conn->prepare ( "DELETE FROM User WHERE id = :id LIMIT 1" );
			$st->bindValue( ":id", $this->id, PDO::PARAM_INT );
			$st->execute();
			$conn = null;
		}
		
		
		public static function getList( $pageno=1  ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM User
					LIMIT 10 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*10), PDO::PARAM_INT );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $user = new User( $row );
			  $list[] = $user;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListall() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM User";

			$st = $conn->prepare( $sql );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $user = new User( $row );
			  $list[] = $user;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListalljoindomain($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM User  JOIN Company ON User.usercompany = Company.companycode JOIN Flag ON User.user_block = Flag.flagvalue WHERE domainname = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $user = new User( $row );
			  $list[] = $user;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListalljoin($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM User  JOIN Company ON User.usercompany = Company.companycode JOIN Flag ON User.user_block = Flag.flagvalue WHERE user.id = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $user = new User( $row );
			  $list[] = $user;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
	    public static function getById( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT * FROM User WHERE id = :id ";
			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$row = $st->fetch();
			$conn = null;
			if ( $row ) return new User( $row );
		}
		
			public static function getByUsercode( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT * FROM User WHERE usercode = :id ";
			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->execute();
			$row = $st->fetch();
			$conn = null;
			if ( $row ) return new User( $row );
			}
			
			
		public static function getByDomainname($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM User WHERE domainname = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $user = new User( $row );
			  $list[] = $user;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public function saveimage($images) {
				$target_dir = TARGET_DIR."/User/";
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
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM User WHERE usercompany = :id 
					LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $user = new User( $row );
			  $list[] = $user;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getListallByIdCompany( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM User WHERE usercompany = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $user = new User( $row );
			  $list[] = $user;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getSearchByIdCompany( $pageno=1, $id, $search ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM User WHERE usercompany = :id 
					 AND usercode LIKE :search OR fullname LIKE :search OR username LIKE :search LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->bindValue( ":search", '%'.$search.'%', PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $user = new User( $row );
			  $list[] = $user;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	public static function getSortByIdCompany( $pageno=1, $id, $sort, $order  ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM User WHERE usercompany = :id 
					 ORDER BY ".$sort." ".$order." LIMIT 20 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*20), PDO::PARAM_INT );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $user = new User( $row );
			  $list[] = $user;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		
	}
	
	
	public static function getListbyjoinCompany($id, $varstr, $joinstr, $from, $to) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS ".$varstr." FROM User ".$joinstr." WHERE usercompany  = :id AND useraddedon BETWEEN :from AND :to";

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
		

		<?php 
		
		class Paymentmode
		{
			
		
		public $id = null;			
				
		public $paymentmodename = null;			
					
			
		 public function __construct( $data=array() ) {	
		
		if ( isset( $data['id'] ) ) $this->id = $data['id'];
		if ( isset( $data['paymentmodename'] ) ) $this->paymentmodename = $data['paymentmodename'];	
		 }
		
		 public function storeFormValues ( $params ) {
		 $this->__construct( $params );
		 }
		
		
		public function insert() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "INSERT INTO Paymentmode ( id,paymentmodename ) VALUES ( :id, :paymentmodename )";
			$st = $conn->prepare ( $sql );
					
		$st->bindValue( "id", $this->id, PDO::PARAM_STR );
		$st->bindValue( "paymentmodename", $this->paymentmodename, PDO::PARAM_STR );
			$st->execute();
			$conn = null;
		  }
				
		
		public function update() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "UPDATE Paymentmode SET id=:id, paymentmodename=:paymentmodename WHERE id = :id";
			$st = $conn->prepare ( $sql );
					
		$st->bindValue( "id", $this->id, PDO::PARAM_STR );
		$st->bindValue( "paymentmodename", $this->paymentmodename, PDO::PARAM_STR );
			$st->execute();
			$conn = null;
		}
		
		
		public function delete() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$st = $conn->prepare ( "DELETE FROM Paymentmode WHERE id = :id LIMIT 1" );
			$st->bindValue( ":id", $this->id, PDO::PARAM_INT );
			$st->execute();
			$conn = null;
		}
		
		
		public static function getList( $pageno=1  ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Paymentmode
					LIMIT 10 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*10), PDO::PARAM_INT );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $paymentmode = new Paymentmode( $row );
			  $list[] = $paymentmode;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListall() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Paymentmode";

			$st = $conn->prepare( $sql );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $paymentmode = new Paymentmode( $row );
			  $list[] = $paymentmode;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListalljoindomain($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Paymentmode  WHERE domainname = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $paymentmode = new Paymentmode( $row );
			  $list[] = $paymentmode;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListalljoin($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Paymentmode  WHERE paymentmode.id = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $paymentmode = new Paymentmode( $row );
			  $list[] = $paymentmode;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
	    public static function getById( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT * FROM Paymentmode WHERE id = :id ";
			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$row = $st->fetch();
			$conn = null;
			if ( $row ) return new Paymentmode( $row );
		}
		
		public static function getByDomainname($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Paymentmode WHERE domainname = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $paymentmode = new Paymentmode( $row );
			  $list[] = $paymentmode;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public function saveimage($images) {
				$target_dir = TARGET_DIR."/Paymentmode/";
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
			

		
		
		/* REPLACE THIS TEXT */
		 
		}
		
		
		?>
		
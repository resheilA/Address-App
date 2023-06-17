
		<?php 
		
		class Company
		{
			
		
		public $id = null;			
				
		public $companyname = null;			
				
		public $companycontact = null;			
				
		public $companyaddress = null;			
				
		public $gstno = null;			
				
		public $logo = null;			
				
		public $companypan = null;			
				
		public $companycoi = null;			
				
		public $companygst = null;			
				
		public $companydirectordoc = null;			
				
		public $companycode = null;			
				
		public $adminusername = null;			
				
		public $adminpassword = null;			
				
		public $cashfreeapikey = null;			
				
		public $cashfreeapipass = null;			
				
		public $companyaddedon = null;			
				
			public $flagname = null;	
			
		public $company_block = null;			
					
			
		 public function __construct( $data=array() ) {	
		
		if ( isset( $data['id'] ) ) $this->id = $data['id'];
		if ( isset( $data['companyname'] ) ) $this->companyname = $data['companyname'];
		if ( isset( $data['companycontact'] ) ) $this->companycontact = $data['companycontact'];
		if ( isset( $data['companyaddress'] ) ) $this->companyaddress = $data['companyaddress'];
		if ( isset( $data['gstno'] ) ) $this->gstno = $data['gstno'];
		if ( isset( $data['logo'] ) ) $this->logo = $data['logo'];
		if ( isset( $data['companypan'] ) ) $this->companypan = $data['companypan'];
		if ( isset( $data['companycoi'] ) ) $this->companycoi = $data['companycoi'];
		if ( isset( $data['companygst'] ) ) $this->companygst = $data['companygst'];
		if ( isset( $data['companydirectordoc'] ) ) $this->companydirectordoc = $data['companydirectordoc'];
		if ( isset( $data['companycode'] ) ) $this->companycode = $data['companycode'];
		if ( isset( $data['adminusername'] ) ) $this->adminusername = $data['adminusername'];
		if ( isset( $data['adminpassword'] ) ) $this->adminpassword = $data['adminpassword'];
		if ( isset( $data['cashfreeapikey'] ) ) $this->cashfreeapikey = $data['cashfreeapikey'];
		if ( isset( $data['cashfreeapipass'] ) ) $this->cashfreeapipass = $data['cashfreeapipass'];
		if ( isset( $data['companyaddedon'] ) ) $this->companyaddedon = $data['companyaddedon'];
			if ( isset( $data['flagname'] ) ) $this->flagname = $data['flagname'];
		if ( isset( $data['company_block'] ) ) $this->company_block = $data['company_block'];	
		 }
		
		 public function storeFormValues ( $params ) {
		 $this->__construct( $params );
		 }
		
		
		public function insert() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "INSERT INTO Company ( id,companyname,companycontact,companyaddress,gstno,logo,companypan,companycoi,companygst,companydirectordoc,companycode,adminusername,adminpassword,cashfreeapikey,cashfreeapipass,companyaddedon,company_block ) VALUES ( :id, :companyname, :companycontact, :companyaddress, :gstno, :logo, :companypan, :companycoi, :companygst, :companydirectordoc, :companycode, :adminusername, :adminpassword, :cashfreeapikey, :cashfreeapipass, :companyaddedon, :company_block )";
			$st = $conn->prepare ( $sql );
					
		$st->bindValue( "id", $this->id, PDO::PARAM_STR );
		$st->bindValue( "companyname", $this->companyname, PDO::PARAM_STR );
		$st->bindValue( "companycontact", $this->companycontact, PDO::PARAM_STR );
		$st->bindValue( "companyaddress", $this->companyaddress, PDO::PARAM_STR );
		$st->bindValue( "gstno", $this->gstno, PDO::PARAM_STR );
		$st->bindValue( "logo", $this->logo, PDO::PARAM_STR );
		$st->bindValue( "companypan", $this->companypan, PDO::PARAM_STR );
		$st->bindValue( "companycoi", $this->companycoi, PDO::PARAM_STR );
		$st->bindValue( "companygst", $this->companygst, PDO::PARAM_STR );
		$st->bindValue( "companydirectordoc", $this->companydirectordoc, PDO::PARAM_STR );
		$st->bindValue( "companycode", $this->companycode, PDO::PARAM_STR );
		$st->bindValue( "adminusername", $this->adminusername, PDO::PARAM_STR );
		$st->bindValue( "adminpassword", $this->adminpassword, PDO::PARAM_STR );
		$st->bindValue( "cashfreeapikey", $this->cashfreeapikey, PDO::PARAM_STR );
		$st->bindValue( "cashfreeapipass", $this->cashfreeapipass, PDO::PARAM_STR );
		$st->bindValue( "companyaddedon", $this->companyaddedon, PDO::PARAM_STR );
		$st->bindValue( "company_block", $this->company_block, PDO::PARAM_STR );
			$st->execute();
			$conn = null;
		  }
				
		
		public function update() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "UPDATE Company SET id=:id, companyname=:companyname, companycontact=:companycontact, companyaddress=:companyaddress, gstno=:gstno, logo=:logo, companypan=:companypan, companycoi=:companycoi, companygst=:companygst, companydirectordoc=:companydirectordoc, companycode=:companycode, adminusername=:adminusername, adminpassword=:adminpassword, cashfreeapikey=:cashfreeapikey, cashfreeapipass=:cashfreeapipass, companyaddedon=:companyaddedon, company_block=:company_block WHERE id = :id";
			$st = $conn->prepare ( $sql );
					
		$st->bindValue( "id", $this->id, PDO::PARAM_STR );
		$st->bindValue( "companyname", $this->companyname, PDO::PARAM_STR );
		$st->bindValue( "companycontact", $this->companycontact, PDO::PARAM_STR );
		$st->bindValue( "companyaddress", $this->companyaddress, PDO::PARAM_STR );
		$st->bindValue( "gstno", $this->gstno, PDO::PARAM_STR );
		$st->bindValue( "logo", $this->logo, PDO::PARAM_STR );
		$st->bindValue( "companypan", $this->companypan, PDO::PARAM_STR );
		$st->bindValue( "companycoi", $this->companycoi, PDO::PARAM_STR );
		$st->bindValue( "companygst", $this->companygst, PDO::PARAM_STR );
		$st->bindValue( "companydirectordoc", $this->companydirectordoc, PDO::PARAM_STR );
		$st->bindValue( "companycode", $this->companycode, PDO::PARAM_STR );
		$st->bindValue( "adminusername", $this->adminusername, PDO::PARAM_STR );
		$st->bindValue( "adminpassword", $this->adminpassword, PDO::PARAM_STR );
		$st->bindValue( "cashfreeapikey", $this->cashfreeapikey, PDO::PARAM_STR );
		$st->bindValue( "cashfreeapipass", $this->cashfreeapipass, PDO::PARAM_STR );
		$st->bindValue( "companyaddedon", $this->companyaddedon, PDO::PARAM_STR );
		$st->bindValue( "company_block", $this->company_block, PDO::PARAM_STR );
			$st->execute();
			$conn = null;
		}
		
		
		public function delete() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$st = $conn->prepare ( "DELETE FROM Company WHERE id = :id LIMIT 1" );
			$st->bindValue( ":id", $this->id, PDO::PARAM_INT );
			$st->execute();
			$conn = null;
		}
		
		
		public static function getList( $pageno=1  ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Company
					LIMIT 10 OFFSET :pageno ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":pageno", (($pageno-1)*10), PDO::PARAM_INT );
			
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $company = new Company( $row );
			  $list[] = $company;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListall() {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Company";

			$st = $conn->prepare( $sql );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $company = new Company( $row );
			  $list[] = $company;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListalljoindomain($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Company  JOIN Flag ON Company.company_block = Flag.flagvalue WHERE domainname = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $company = new Company( $row );
			  $list[] = $company;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public static function getListalljoin($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Company  JOIN Flag ON Company.company_block = Flag.flagvalue WHERE company.id = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $company = new Company( $row );
			  $list[] = $company;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
	    public static function getById( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT * FROM Company WHERE id = :id ";
			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$row = $st->fetch();
			$conn = null;
			if ( $row ) return new Company( $row );
		}
		
			public static function getByCompanycode( $id ) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT * FROM Company WHERE companycode = :id ";
			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_STR );
			$st->execute();
			$row = $st->fetch();
			$conn = null;
			if ( $row ) return new Company( $row );
			}
			
			
		public static function getByDomainname($id) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Company WHERE domainname = :id ";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $company = new Company( $row );
			  $list[] = $company;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
		public function saveimage($images) {
				$target_dir = TARGET_DIR."/Company/";
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
			

		
		
		
	public static function checkauth($username, $password) {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Company WHERE Company.adminpassword = :password AND
			Company.adminusername = :username";

			$st = $conn->prepare( $sql );
			$st->bindValue( ":username", $username, PDO::PARAM_STR );
			$st->bindValue( ":password", $password, PDO::PARAM_STR );
			$st->execute();
			$list = array();

			while ( $row = $st->fetch() ) {
			  $company = new Company( $row );
			  $list[] = $company;
			}

			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
		}
		
					
		/* REPLACE THIS TEXT */	

		
		 
		}
		
		
		?>
		
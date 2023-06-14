<?php 
	
	function checkvalidation()
	{
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{			
			if(isset($_POST['contactno'])&& strlen($_POST['contactno']) != 10 )
			{	
				return false;
			}
			
			
			if (isset($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				return false;
			}

			
		}	
		return true;
	}
?>
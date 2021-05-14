<?
	
	require_once('connect.php');

	@$conn = new mysqli($host, $username, $password, $dbname);
			
	$user = $_POST['name'];
	$pass = $_POST['pass'];
	$email = $_POST['email'];
	
				
		$sql = "INSERT INTO `users` (`id`, `username`, `pass`, `email`) VALUES (NULL, '$user', '$pass', '$email');";
				
		try{			
			
			$conn->query($sql);
			
		} catch(Exception $e){
			echo $e;
		}



?>
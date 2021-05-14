<?php 
	
			if(isset($_POST['send'])):
			
				$user = $_SESSION['nick'];	
				$msg = $_POST['msg'];	
				
				$sql2 = "INSERT INTO `chatmsg` (`id`, `nick`, `msgText`, `datum`) VALUES (NULL, '$user', '$msg', current_timestamp())";
				
				try{			
				
					$conn->query($sql2);
					
				} catch(Exception $e){
					echo $e;
				}
				
			endif;
			$sql = ("SELECT * FROM `chatmsg`");
			$result = $conn->query($sql);
			$row = new IteratorIterator($result);
			
			
			
			foreach($row as $key): 
					
                        echo "<font size='5'><a class='user' href='#' >".$key['datum']." | ".$key['nick'].": ".$key['msgText']."</a></font>"."<br>";
	
			endforeach;
			
?>
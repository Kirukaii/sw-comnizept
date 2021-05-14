<?php
	
		if(isset($_POST['send'])):
			
			$datum = "(".date('d-m-Y | G:i:s ').")";
			$user = $_SESSION['nick'];

			$msg = $_POST['msg'];	
			
			file_put_contents('data.txt', "<font size='5'> <a class='user' href='#'>".$datum.$user.": ".$msg."</a> </font> <br>", FILE_APPEND);

		endif;

		if(file_exists ('data.txt')):
			$content = file_get_contents('data.txt');
		else:
			file_put_contents('data.txt');
		endif;
	
		if(file_exists ('data.txt')):
			echo $content;
		else:
			file_put_contents('data.txt');
		endif;

?>
<!doctype html>

<?php

session_start();

			require_once('connect.php');

			@$conn = new mysqli($host, $username, $password, $dbname);
			
?>

<script>

	/* Reload + Scroll Script */
	function loadLogMysql(){		

		$.ajax({
			url: "mysqlChat.php",
			cache: false,
			success: function(html){		
				$("#chatbox").html(html); //Insert chat log into the #chatbox div				
				
				
		  	},
		
		});
	}	*/
	
	function loadLogTxt(){		

		$.ajax({
			url: "txtChat.php",
			cache: false,
			success: function(html){		
				$("#chatbox").html(html); //Insert chat log into the #chatbox div				
				
				
		  	},
		
		});
	}
	

	
	function myFunction() {
	  alert("Hello! I am an alert box!");
	}
	function scrollDown() {
	  $("#chatbox").scrollTop($("#chatbox")[0].scrollHeight);				
	}

</script>
<!-- <button onclick="myFunction();" type="button">test</button> -->
<HTML>

<head>
<title>Chat</title>
<?php
	include("head.php");
?>

</head>

<body>

<?php
include("header.php");
	
	if(!isset($_SESSION['sendnick'])):
	/* Username Formular*/
		echo '<form id="chatForm" method="POST"> 
			  <p><input type="text" name="name" value="" placeholder="Username" required></p>
			  <input class="chatfeld" type="submit" name="sendnick" value="Submit Username">
			  </form>';		
			  
		
	
	elseif(isset($_SESSION['sendnick'])):
		
		echo "<form action='logout.php'>
				<font size='5' color='white' >"."Dein Username: ".$_SESSION['nick']."</font>
				<input type='submit' name='changeName' value='Change Name' />
			  </form>";
		
	endif;
	
	if(isset($_POST['sendnick']) && $_POST['name'] != ""):
	
		$_SESSION['sendnick'] = $_POST['sendnick'];
		
		$_SESSION['nick'] = $_POST['name'];
		header('location: chat.php');
	endif;
	
	
	
	if (!$conn->connect_error) {
		echo "<font size='4'> chat with <font color='blue'> MySQL </font><br></font>";
	}else{
		echo "<font size='4'> chat with <font color='blue'> TXT </font><br></font>";
	}
?>
<button id="scroll" onclick="scrollDown()" type="button">🢃 Scroll Down 🢃</button>
<div id="chatbox">

<ul id="chat">

	<li id="msg">		
		<?php			

			if (!$conn->connect_error) {
				include("mysqlChat.php");
				echo "<script>
						setInterval (loadLogMysql, 100);
					  </script>";				
			}else{
				include("txtChat.php");
				echo "<script>
						setInterval (loadLogTxt, 100);
					  </script>";
			}
			
		?>
	</li>
</ul>



</div>
<!--<button type="button">Get logs</button> -->
<?php

/* Message Send Form*/
if(isset($_SESSION['nick'])):
	echo ' <form id="msgForm" method="POST">
	<input style="width: 90%"class="chatfeld" type="text" name="msg" placeholder="Message" required> <input class="chatfeld" type="submit" name="send" value="Send">
	</form>';
endif;
?>


</body>

</HTML>

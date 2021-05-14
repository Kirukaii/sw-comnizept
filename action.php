<?php

if(isset($_POST['c'])):

$x = $_POST['a'];
$sign = $_POST['sign'];
$z = $_POST['b'];

	if($sign == '+'): 

		$Ergebnis = $x + $z;
		$ds = 'Ergebnis: '.$Ergebnis;
		
	elseif($sign == '-'):

		$Ergebnis = $x - $z;
		$ds = 'Ergebnis: '.$Ergebnis;
		
	elseif ($sign == '*'):

		$Ergebnis = $x * $z;
		$ds = 'Ergebnis: '.$Ergebnis;
		
	elseif($sign == '/'):

		$Ergebnis = $x / $z;
		$ds = 'Ergebnis: '.$Ergebnis;

	endif;
endif;
?>
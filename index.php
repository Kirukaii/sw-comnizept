<!doctype html>

<?php
include("action.php");
?>

<HTML>

<head>
<?php
include("head.php");
?>

<title>Taschenrechner</title>

</head>

<body>

<?php
include("header.php");
?>

<form name="FORM" method="POST">

<div id="form">
<!-- 1. Zahlfeld-->
<p><input class="feld" type="text" name="a"	placeholder="1. Zahl" required></p>

<!-- Dropdown menu für das Zeichen -->
<select class="feld" name="sign2" onchange="javascript:document.FORM.sign.value = document.FORM.sign2.value;"  required>
<option value="" selected>Auswählen</option>
<option value="+">+</option>
<option value="-">-</option>
<option value="*">*</option>
<option value="/">/</option>
</select>

<!-- Zeichenfeld -->
<p><input type="hidden" name="sign" placeholder="Zeichen" required></p>

<!-- 2. Zahlfeld-->
<p><input class="feld" type="text" name="b" placeholder="2. Zahl" required></p>


<input class="feld" type="submit" name="c" value="Rechnen">

</div>
</form>

<!-- Ergebnis-->
<div id="Ergebnis"> 

<?php 

if(isset($ds)):
	echo $ds; 
endif;
?>

</div>

</body>

</HTML>

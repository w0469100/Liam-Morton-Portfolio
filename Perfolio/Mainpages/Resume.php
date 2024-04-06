<!DOCTYPE html>
<html lang="en">	
	
<head>
	<?php
	$Title =  "Resume";
	include "../Sections/Head.php";
	?>
	<link href="../Sections/CSS/stylespersonalweb.css" rel="stylesheet"/>
</head>
<?php
	include "../Sections/Header.php";
	include "../Sections/nav.php";
?>
<body style="height: 70%;">
	<object
		type="application/pdf"
  		data="../Resume/LIAMMORTONResume.pdf"
		width="100%"
		height="100%"
	>
	</object>
</body>
<?php
	include "../Sections/Footer.php";
?>
</html>
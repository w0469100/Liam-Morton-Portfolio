<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
	
<head>
	<?php
	$Title = "Hi I'm <br /> Liam Morton";
	include "Sections/Head.php";
	?>
	<link href="CSS/stylespersonalweb.css" rel="stylesheet"/>
</head>

<body>
<?php
	include "Sections/Header.php";
	include "Sections/nav.php";
?>
<article>
	<section>
		<h2> About Me </h2>
		<p><b> 
			Hi, my name in Liam Morton. I live in Nova Scotia Canada. 
			I am currently in my second year in the IT Programming course located at COGS NSCC.  
		</b></p> 
	</section>
	<img id="me" src="CSS/img/picme.jpg" alt="picture of me" />
</article>
<?php
	include "Sections/Footer.php";
?>
</body>

</html>
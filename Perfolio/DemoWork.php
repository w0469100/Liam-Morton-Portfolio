<!DOCTYPE html>
<html lang="en">
	
<head>
	<?php
	$Title =  "Demos";
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
	<section id = "goals">
		<p><b>
			Here are some of my demo examples I have for PHP.
		</b></p>
	</section>
    <section>
    <dl>
        <dt><a href="Demos/Rmatch.php"><b>RMatch</b></a></dt>
        <dd>Match random text in a input felid <br/><br/></dd>
        <dt><a href="Demos/Chat/index.php"><b>Chat</b></a></dt>
        <dd>A Chat room<br/><br/></dd>
        <dt><a href="Demos/Table/Index.php"><b>Table</b></a></dt>
        <dd>A program that talks to a data base and allows for adding removing and editing of data displayed in a table</dd>
    </dl>
    </section>
</article>
<?php
	include "Sections/Footer.php";
?>
</body>

</html>
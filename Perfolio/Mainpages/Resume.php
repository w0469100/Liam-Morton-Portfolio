<!DOCTYPE html>
<html lang="en">	
	
<head>
	<?php
	$Title =  "Resume";
	include "../Sections/Head.php";
	?>
	<link href="../Sections/CSS/stylespersonalweb.css" rel="stylesheet"/>
</head>

<body>
<?php
	include "../Sections/Header.php";
	include "../Sections/nav.php";
?>

<button onclick="Load()"> View My Resume</button>

<?php
	include "../Sections/Footer.php";
?>

</body>
</html>

<script>
    function Load(){
        window.open("../Resume/LiamMortonResume.php", '_blank');
    }
</script>
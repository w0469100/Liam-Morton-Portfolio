<!-- <nav class="topnav">
	<a href="index.php"><b>Home</b></a>
	<a href="About.php"><b>About</b></a>
	<a><b>Projects</b></a>
	<a href="Skills_Education.php"><b>Skills&Education</b></a>
	<a href="DemoWork.php"><b>DemoWork</b></a>
	<a href="Contact.php"><b>Contact</b></a>
</nav> -->

<div class="topnav">
    <a href="index.php"><b>Home</b></a>
    <a href="About.php"><b>About</b></a>
    <a href="Projects.php">Projects</a>
    <a href="DemoWork.php"><b>DemoWork</b></a>
    <a href="Contact.php"><b>Contact</b></a>
	<a href='Login.php'><b>Login</b></a>
	<?php
		if($_SESSION['login']){
			echo "<a href='Resume.php'><b>Resume</b></a>";
		}
	?>
</div>
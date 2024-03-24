<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
	
<head>
	<?php
	$Title =  "Login";
	include "Sections/Head.php";
	?>
	<link href="CSS/stylespersonalweb.css" rel="stylesheet"/>
</head>

<body>
<?php
	include "Sections/Header.php";
	include "Sections/nav.php";
?>
<?php if($_SESSION['login']){
    echo "<p>You have logged in</p>";
    echo '<form method="post">
    <button type="submit" name="logout">Logout</button>
</form>';
    
}else{?>
<p>Login to see my Resume Page</p>
<form method="post">
    <label class="pass" for="pass">Password:</label>
    <input class="pass" type="text" id="pass" name="pass" required>

    <button type="submit" name="button">Login</button>
</form>
<?php }
    if(isset($_POST['button'])){
        $pass = $_POST['pass'];
        if($pass == "Test"){
            $_SESSION['login'] = true;
            echo "<p> Link to my Resume: <a href='Resume.php'><b>Resume</b></a>";
        }else{
            echo "<p>Sorry, Wrong password.</p>";
        }
    }

    if(isset($_POST['logout'])){
        $_SESSION['login'] = null;
    }
?>
<?php
	include "Sections/Footer.php";
?>
</body>
</html>
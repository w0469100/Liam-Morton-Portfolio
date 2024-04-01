<!DOCTYPE html>
<html lang="en">
	
<head>
	<?php
	$Title =  "Contact";
	include "../Sections/Head.php";
	?>
	<link href="../Sections/CSS/stylespersonalweb.css" rel="stylesheet"/>
</head>

<body>
<?php
	include "../Sections/Header.php";
	include "../Sections/nav.php";
?>
<form method="post">
    <label class="name" for="name">Name:</label>
    <input class="name" type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="message">Message:</label>
    <textarea id="message" name="message" rows="4" required></textarea>

    <button type="submit" name="button">Submit</button>
</form>

<?php
    if(isset($_POST['button'])){
        $message = $_POST['message'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        $to = "liampgmorton@gmail.com";
        $subject = "email from $name";

        $header = "email from: $email";

        $body = "$name, \n $message";
        if(mail($to, $subject, $body, $header)) {
            echo "<p>Your message has been sent successfully. Thank you!</p>";
        }else {
            echo "<p>Sorry, there was an error sending your message. Please try again.</p>";
        }
    }
?>
<?php
	include "../Sections/Footer.php";
?>
</body>
</html>
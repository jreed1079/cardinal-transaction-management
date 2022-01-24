<?php
if($_POST["message"]) {
	$to = "kiernan@cardinaltm.com";
	$from = "webform@cardinaltm.com";
	$subject = "A new submission was submitted";
	$name = $_POST["name"];
	$email = $_POST["email"];
	$emailBody = $_POST["message"];
	$message = "Name: $name"."\r\n"."Email: $email"."\r\n"."Message: $emailBody";

	$headers = "From: $from". "\r\n" .
					 "Reply-To: $from" . "\r\n" .
					 "X-Mailer: PHP/" . phpversion();
					 
	mail($to, $subject, $message, $headers);
}


?>
<!DOCTYPE html>
<html>
<head>
<title>Cardinal Transaction Management - Contact Us</title>
<link rel="stylesheet" href="./styles/ctm-main.css">
<link rel="icon" href="./img/favico.png" type="image/x-icon">
<style>
.hidden
{
	display: none;
}
</style>
<script language=javascript>
function sendEmail() {
	var emailResult = validation();
	if (!emailResult) {
		return false;
	}
	
	var formName = document.getElementById("name").value;
	var formAgency = document.getElementById("agency").value;
	var formEmail = document.getElementById("email").value;
	var formMessage = document.getElementById("message").value;

	return true;
}

function validation() {
	var emailAddress = document.getElementById("email").value;
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	
	if (!re.test(String(emailAddress).toLowerCase())) {
		alert("The entered email address is invalid.  Please correct entry and try again.");
		return false;
	}
	return true;
}
</script>
</head>
<body>
<div class="crn_img">&nbsp;</div>
<div class=header>&nbsp;</div>
<div class=logo>&nbsp;</div>

<div>
<ul class=navbar>
	<li><a href="./index.html">Home</a></li>
	<li><a href="./about.html">About Us</a></li>
	<li><a href="./contact.html" class=active>Contact Us</a></li>
</ul>
</div>
<div class="ctm_content">
<form method=post action="contact.php" id="contactForm" onsubmit="sendEmail();">
Name:<br>
<input type=text id="name" name="name">

<p class=hidden>Agency:<br>
<input type=text name="agency" id="agency" value="kw"></p>

<p>Email:<br>
<input type=text name="email" id="email" onBlur="validation();"></p>

<p>Message:<br>
<textarea name="message" id="message" rows=10></textarea></p>

<p><input type=submit></p>
</form>
<?php

if($_POST["message"]) {
	"<p>Thank you for your interest.  Your message has been sent and someone will get back to you shortly!</p>"
}
</div>
<!-- <div class=bottom-bar>&nbsp;</div>
 --></body>
</html>
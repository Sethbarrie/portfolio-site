<!-- <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Strict//EN">

<head>
	<title>A Nice & Simple Contact Form</title>
	
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

	<div id="page-wrap">

		<img src="images/title.gif" alt="A Nice & Simple Contact Form" />
		<p>By <a href="http://css-tricks.com">CSS-Tricks</a></p>
			
			
		<br /><br />
		
			
		<h1>Your message has been sent!</h1><br />
		
		<p><a href="index.html">Back to the Main Page</a></p>
	
	</div>
	
	<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
	</script>
	<script type="text/javascript">
	_uacct = "UA-68528-29";
	urchinTracker();
	</script>

</body>

</html>


<?php
  
if($_POST) {
    $name = "";
    $email = "";
    $subject = "";
    $message = "";
    $email_body = "<div>";
      
    if(isset($_POST['name'])) {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Visitor Name:</b></label>&nbsp;<span>".$name."</span>
                        </div>";
    }
 
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
                           <label><b>Visitor Email:</b></label>&nbsp;<span>".$email."</span>
                        </div>";
    }
      
    if(isset($_POST['subject'])) {
        $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Reason For Contacting Us:</b></label>&nbsp;<span>".$subject."</span>
                        </div>";
    }
      
    if(isset($_POST['body'])) {
        $body = filter_var($_POST['body'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Concerned Department:</b></label>&nbsp;<span>".$body."</span>
                        </div>";
    }

    $email_body .= "</div>";
 
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
      
    if(mail("sethbarrie@gmail.com", $subject, $email_body, $headers)) {
        echo "<p>Thank you for contacting us, $name. You will get a reply shortly.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
      
} else {
    echo '<p>Something went wrong</p>';
}
?>
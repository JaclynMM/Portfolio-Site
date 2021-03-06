<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "jaclyn.mullin@gmail.com";
    $email_subject = "jaclynmullin.com contact response";

    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['num']) ||
        !isset($_POST['email']) ||
        !isset($_POST['sub']) ||        
        !isset($_POST['msg'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
 
    $name = $_POST['name']; // required
    $num = $_POST['num']; // required
    $email = $_POST['email']; // required
    $sub = $_POST['sub']; // required    
    $conversation = $_POST['msg']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Number: ".clean_string($num)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Subject: ".clean_string($sub)."\n";    
    $email_message .= "Coonversation Starter: ".clean_string($msg)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();

mail($email_to, $email_subject, $email_message, $headers);  

// if you want the redirect:
header('Location: /contact-thank-you.html');
exit();
?>
 
<!-- include your own success html here -->
 
Thank you for contacting me. 
I will be in touch soon!
 
<?php
 
}

function died($error) {
  // your error code can go here
  echo "We are very sorry, but there were error(s) found with the form you submitted.";
  echo "These errors appear below.<br /><br />";
  echo $error."<br /><br />";
  echo "Please go back and fix these errors.<br /><br />";
  die();
}

function clean_string($string) {
  $bad = array("content-type","bcc:","to:","cc:","href");
  return str_replace($bad,"",$string);
}
?>
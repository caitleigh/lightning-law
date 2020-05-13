    <?php
    if(isset($_POST['email'])) {

    if (isset($_POST['submit']))
    {   
    ?>
<script type="text/javascript">
window.location = "http://www.google.com/";
</script>      
    <?php
    }

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "caitleigh27@gmail.com";
    $email_subject = "Mailing List Form";

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you
       submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

   // validation expected data exists
    if(!isset($_POST['fname']) ||
        !isset($_POST['lname']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you 
    submitted.');      
    }

    $first_name = $_POST['fname']; // required
    $last_name = $_POST['lname']; // required
    $email_from = $_POST['email']; // required
    $message = $_POST['message']; // required


    $error_message = "";
    $string_exp = "/^[A-Za-z0-9 .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }  
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$message)) {
    $error_message .= 'The Company you entered does not appear to be valid.<br />';
  }
    $email_message = "Response from Mailing List Page.  Please enter in database.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "First Name: ".clean_string($fname)."\n";
    $email_message .= "Last Name: ".clean_string($lname)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";


// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
header("Location: mail.php")

?>

<!-- include your own success html here -->

Thanks for subscribing to our mailing list



<?php
}
?>
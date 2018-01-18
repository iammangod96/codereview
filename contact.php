<?php
    require_once 'header.php';
  $error = $fullname = $message = $email = "";


    if (isset($_POST['fullname']) && isset($_POST['email'])&& isset($_POST['message'])){
        
        $fullname = sanitizeString($_POST['fullname']);
        $email = sanitizeString($_POST['email']);
        $message = sanitizeString($_POST['message']);
        
        if ($fullname == "" || $message == ""|| $email == ""){
          $error = "<span style='color:green;margin-left:10px;'>Not all fields were entered</span>";
        }else{
          
          $to = "man.god96@gmail.com";
          $subject = "Contact Form: $fullname";
          $message = "Name: $fullname\r\nEmail: $email\r\nMessage:\r\n$message";
          
          
if (mail($to, $subject, $message)) {
    echo '<div class="alert alert-success">Thank You! I will be in touch</div>';
     
  } else {
    echo '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
  }
           
          }
        }
        
    
 
echo <<< _ENDL
<div class="row">

 
 
 <div class="container-fluid col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10" style="margin-top:20px;margin-bottom:20px;" >
 <form role="form" method='post' action='contact.php' style="background-color:white;">
 <div id="errormessage">$error </div>
  <div class="form-group" style="margin:10px;padding:10px;">
    <label for="name" ><b>Name:</b><br /></label>
    <input style="width:100%;" maxlength='32' type="text" name="fullname" class="form-control" id="name" placeholder="name">
  </div>
  <div class="form-group" style="margin:10px;padding:10px;">
    <label for="email"><b>Email address:</b><br /></label>
    <input style="width:100%;"  type="email" name="email"class="form-control" id="email" placeholder="Email address">
  </div>
  <div class="form-group" style="margin:10px;padding:10px;">
    <label for="message"><b>Message:</b><br /></label>
  
  <textarea class="form-control" rows="5"   name="message"  id="editor1" placeholder="Message"></textarea>
  <script>
      CKEDITOR.replace( 'editor1' );
    </script>
  </div>
        <button name="submit" type="submit"  style="border:1px solid white;margin-left:20px;margin-bottom:20px;background-color:#169874;padding:10px;width:90%;color:white;font-family: 'Open Sans', sans-serif;" value="register">SUBMIT</button>
      

</form>
</div>

</div>
_ENDL;

include ('footer.php');
?>





<?php
    require_once 'header.php';
  $error =  $pass=  $email = "";


    if (isset($_POST['email'])){
        
        $email = sanitizeString($_POST['email']);
                
        if ($email == ""){
          $error = "<span style='color:red;margin-left:10px;'>Not all fields were entered</span>";
        }else{
        	$result = queryMysql("SELECT password FROM members WHERE  email='$email';");
  			if($result->num_rows){
    			while($rows = $result->fetch_assoc()){
        			$pass = $rows['password'];
        		}
        		$to = "$email";
          		$subject = "Your CodeReview Password ";
          		$message = "Your password on CodeReview is : $pass";
          		if (mail($to, $subject, $message)) {
    				echo '<div class="alert alert-success">Your password is sent to this email from <b>Apache</b>. If not found, search in it in spam.</div>';
     			} else {
    				echo '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
  				}
  			}else{
  				$error = "<span style='color:red;margin-left:10px;'>Sorry, this email does not exist in CodeReview.</span>";	
  			}
        }
    }
        
    
 
echo <<< _ENDL
<div class="row">

 
 
 <div class="container-fluid col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10" style="margin-top:20px;margin-bottom:20px;" >
 <form role="form" method='post' action='forgotpass.php' style="background-color:white;">
 <div id="errormessage">$error </div>
  
  <div class="form-group" style="margin:10px;padding:10px;">
    <label for="email"><b>Enter your email address given at the time of registration:</b><br /></label>
    <input style="width:100%;"  type="email" name="email"class="form-control" id="email" placeholder="Email address">
  </div>
  
        <center><button name="submit" type="submit"  style="border:1px solid white;background-color:#169874;padding:10px;width:90%;color:white;font-family: 'Open Sans', sans-serif;" value="register">SUBMIT</button>
<p style="margin:10px;color:blue;">If you don't remember the email or any other problem just specify your problem on contact us page.</p></center>
      
</form>

</div>

</div>
_ENDL;

include ('footer.php');
?>





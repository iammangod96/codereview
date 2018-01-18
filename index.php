<?php // Example 26-2: header.php
	session_start();
	
	
	if(isset($_SESSION['username'])){
		$loggedin = true;
	}else{
		$loggedin = false;
	}
  	echo "<!DOCTYPE html>\n<html><head>";
  	require_once 'functions.php';
  	
  	echo <<<_ENDL

<meta charset="UTF-8">
<meta name="description" content="Do cometitive programming? Get your full code reviewed by a members a level above you based on codeforces ratings." />
<meta name="keywords" content="codereview, codereview.orgfree.com, code review, online code review, competitive programming, review full code, codeforces levels, review code, Manish Sharma, i want to get my code reviewed, code reviewer" />
<meta name="author" content="Manish Sharma">
<meta name="robots" content="index, follow" />
<meta name="language" content="english"> 
<meta http-equiv="content-language" content="en-us">
<title>CODE REVIEW | codereview.orgfree.com</title>
<!-- code review, online code review, competitive programming code review --><cmt>



		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans|Indie+Flower|Press+Start+2P' rel='stylesheet' type='text/css'>
		<script src="ckeditor/ckeditor.js"></script>
                <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.9.1/styles/monokai_sublime.min.css">
                <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.9.1/highlight.min.js"></script>
	        
<script type="text/javascript">stLight.options({publisher: "cbd11d88-335f-4551-bc31-fc69b56269a5", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
		

</head>
		
		<body style="background-color:#f0f0f0;" ><!--

_ENDL;
echo"-->";
 //include_once("analyticstracking.php");

 echo"<h1 style='display:none;'>code review</h1>";
		echo "<nav class='navbar navbar-default' role='navigation' style='box-shadow: 5px 0px 5px #888888;margin:0;padding:10px;background-color: white;'>";
	
	echo<<<_ENDL
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="index.php" style="position:relative;top:0px;"><b><p style="font-size:32px;font-family: 'Open Sans', sans-serif;color:#3b423c;"><span style="color:#3ecea6;"> CODE </span>REVIEW</p></b></a>
					</div>
_ENDL;
					if($loggedin){
						
						
						echo<<<_ENDL
						<ul class="nav navbar-nav navbar-right" style="font-family: 'Open Sans', sans-serif;font-size:18px;">
							
							<li class="button1" style="border:1px solid #3ecea6;padding:1px 5px 1 px 5px;margin-right:5px;"><a href="profile.php" >PROFILE</a></li>
							<li class="button2" style="border:1px solid #3ecea6;padding:1px 5px 1 px 5px;margin-right:5px;"><a href="level.php" >REVIEW</a></li>
							<li class="button2" style="border:1px solid #3ecea6;padding:1px 5px 1 px 5px;margin-right:5px;"><a href="history.php" >HISTORY</a></li>
<li class="button3" style="border:1px solid #3ecea6;padding:1px 5px 1 px 5px;margin-right:5px;"><a href="contact.php">CONTACT</a></li>
<li class="button1" style="border:1px solid #3ecea6;padding:1px 5px 1 px 5px;margin-right:5px;"><a href="about.php" >ABOUT</a></li>
        		    		<li class="button4" style="border:1px solid #3ecea6;padding:1px 5px 1 px 5px;"><a href="logout.php">LOG OUT</a></li>
        		    	</ul>
_ENDL;
					}else{
						echo<<<_ENDL
						<ul class="nav navbar-nav navbar-right" style="font-family: 'Open Sans', sans-serif;font-size:18px;">
							<li class="button1" style="border:1px solid #3ecea6;padding:1px 5px 1 px 5px;margin-right:5px;"><a href="index.php" >HOME</a></li>
<li class="button1" style="border:1px solid #3ecea6;padding:1px 5px 1 px 5px;margin-right:5px;"><a href="register.php" >SIGN UP</a></li>
<li class="button1" style="border:1px solid #3ecea6;padding:1px 5px 1 px 5px;margin-right:5px;"><a href="about.php" >ABOUT</a></li>
							<li class="button2" style="border:1px solid #3ecea6;padding:1px 5px 1 px 5px;"><a href="contact.php">CONTACT</a></li>
        		    	</ul>
_ENDL;
					}
					echo<<<_ENDL
				</div><!-- end of container-fluid -->
			</nav>
			
_ENDL;

     
     
    



?>

<?php


$error = $username = $password = "";


if (isset($_POST['username']))
  {

    $username = sanitizeString($_POST['username']);
    $password = sanitizeString($_POST['password']);
    
    if ($username == "" || $password == "")
        $error = "<span style='color:green'>Not all fields were entered</span><br>";
    else
    {
      $result = queryMySQL("SELECT username,password FROM members WHERE username='$username' AND password='$password';");

      if ($result->num_rows == 0)
      {
        $error = "<span style='color:green'>Username/Password invalid</span><br>";
      }
      else
      {
        $_SESSION['username'] = $username;
        
        //do after this
        
        
      header("location: profile.php");
      }//do before this
    }
  }

echo <<<_ENDL
<p class="bg-primary" style="padding:10px;">! NEW ! Private and group chat with other competitive programmers coming soon. ! NEW ! The top ad banner is a forced one by the host. Just Refresh or scroll down.</p>

<div class="container" style="background:rgba(255,255,255,0.5);width:100%;height:100%;">
<div id="tagline" style="font-family: 'Open Sans', sans-serif;padding:20px;width:40%;float:left;color:black;margin:50px 20px 20px 20px;">
  <h2>GET YOUR CODE REVIEWED.</h2>
  <h3>FOR SURE.</h3>

  <button type="button" class="btn btn-danger" onclick="location.href='/contact.php';">This is the beta version of site. So every feedback is welcomed.</button>
 
</div>
      <form method='post' action='index.php' style="float:right;padding:15px;width:25%;margin:0% auto auto auto;background-color:white;">
      <div id="errormessage"> $error </div>
      <div class="form-group" style="margin:10px;padding:10px;">
            <label for="inputUsername">USERNAME : </label>
           <input style="width:100%;" maxlength='16'  name='username' type="username" class="form-control" id="inputUsername" placeholder="Username" >
        </div>

        <div class="form-group" style="margin:10px;padding:10px;">
            <label for="inputPassword"><b>PASSWORD : </b></label>
            <input style="width:100%;" type="password" maxlength='16'  name='password' class="form-control" id="inputPassword" placeholder="Password">
       </div>
   
        <button name="submit" type="submit"  style="border:1px solid white;margin-left:20px;background-color:#169874;padding:10px;width:90%;color:white;font-family: 'Open Sans', sans-serif;" value="LOGIN">LOGIN</button>
      <p style="margin:20px 20px 0 20px;"><span style="color:red;">SIGN UP ? </span><a href="register.php">REGISTER</a></p><p style="margin:0 20px 0 20px;"><span style="color:red;">FORGOT PASSWORD? </span><a href="forgotpass.php">PASSWORD</a></p>
    </form><br>
</div>


<section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Here's how the site is meant to be used</h2>
                    
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        
                        <h3>LEVELS</h3>
                        <p class="text-muted">Your codeforces rating is used to put you in one of the 2 divisions.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        
                        <h3>SUBMIT CODE</h3>
                        <p class="text-muted">Your code will be reviewed by a member of your division.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        
                        <h3>REVIEW CODES</h3>
                        <p class="text-muted">Review codes of other members (which you probably be able to) to unlock button to submit code.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        
                        <h3>ALL BENEFITED</h3>
                        <p class="text-muted">Everyone is allowed to submit first code but after that you have to review codes to submit codes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
_ENDL;
?>

<?php
echo<<<_ENDL

<div class="navbar navbar-default " style="background-color:#169874;padding:10px;border-bottom:5px solid #154f3f;margin:0;">
    <div class="container">
      <ul class="nav navbar-nav">
         <div class="container">
                    <p style="color:white;width:30%;margin:auto;">CR | CODE REVIEW | 2018  <!-- Begin W3Counter Tracking Code -->
<script type="text/javascript" src="https://www.w3counter.com/tracker.js"></script>
<script type="text/javascript">
w3counter(97085);
</script>
<noscript>
<div><a href="http://www.w3counter.com"><img src="https://www.w3counter.com/tracker.php?id=97085" style="border: 0" alt="W3Counter" /></a></div>
</noscript>
<!-- End W3Counter Tracking Code -->
<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=10702063; 
var sc_invisible=1; 
var sc_security="29f5451a"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="shopify traffic
stats" href="http://statcounter.com/shopify/"
target="_blank"><img class="statcounter"
src="http://c.statcounter.com/10702063/0/29f5451a/1/"
alt="shopify traffic stats"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->
</p>

                </div> 
      </ul>
    </div>
  </div>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57db9a9c474a970d"></script>


</body>
</html>  


_ENDL;
?>

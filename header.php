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
                <script src="adapters/jquery.js"></script>
                <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.9.1/styles/monokai_sublime.min.css">
                <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.9.1/highlight.min.js"></script>
	   
		</head>
		
		<body style="background-color:#f0f0f0;padding-bottom:50px;">
_ENDL;

	echo "<h1 style='display:none'>code review</h1>";
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

                                                        <li class="button2" style="border:1px solid #3ecea6;padding:1px 5px 1 px 5px;margin-right:5px;"><a href="stats.php" >STATS</a></li>							
<li class="button3" style="border:1px solid #3ecea6;padding:1px 5px 1 px 5px;margin-right:5px;"><a href="contact.php">CONTACT</a></li>
<li class="button1" style="border:1px solid #3ecea6;padding:1px 5px 1 px 5px;margin-right:5px;"><a href="about.php" >ABOUT</a></li>
        		    		<li class="button4" style="border:1px solid #3ecea6;padding:1px 5px 1 px 5px;"><a href="logout.php">LOG OUT</a></li>
        		    	</ul>
_ENDL;
					}else{
						echo<<<_ENDL
						<ul class="nav navbar-nav navbar-right" style="font-family: 'Open Sans', sans-serif;font-size:18px;">
							<li class="button1" style="border:1px solid #3ecea6;padding:1px 5px 1 px 5px;margin-right:5px;"><a href="index.php" >HOME</a></li>
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

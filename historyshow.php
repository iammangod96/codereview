<?php
require_once 'header.php';
$progCode = $error = "";

if (isset($_GET['view']))
{
   	$view = sanitizeString($_GET['view']);
   	$filename = $view;
    $result1 = queryMysql("SELECT title,descr,code FROM submitfiles WHERE filename='$filename';");
    while($row1 = $result1->fetch_assoc()){
      $title = $row1['title'];
      $description = $row1['descr'];
      $code = $row1['code'];
    }
	
	echo<<<_ENDL

	<div style="margin:1% auto 1% auto;width:85%;padding:10px;background-color:white;font-family: 'Open Sans', sans-serif;">
	<p style="font-size:28px;">$title</p><hr>
	<p style="font-size:18px;">$description</p>
	<pre><code>$code</code></pre>
	
	</div>
  <div style="margin:1% auto 1% auto;width:85%;padding:10px;background-color:white;font-family: 'Open Sans', sans-serif;">
  <p style="font-size:28px;">REVIEW</p><hr>
  </div>
_ENDL;
  
  $result = queryMysql("SELECT reviewfilename FROM review WHERE  codefilename = '$filename' AND correctreview=1;");
  if($result->num_rows){
    while($rows = $result->fetch_assoc()){
        $filename1 = $rows['reviewfilename'];
        $result3 = queryMysql("SELECT descr,code FROM reviewfiles WHERE filename='$filename1';");
        while($row3 = $result3->fetch_assoc()){
          $description1 = $row3['descr'];
          $code1 = $row3['code'];
        }
                
  echo<<<_ENDL

  <div style="margin:1% auto 1% auto;width:85%;padding:10px;background-color:white;font-family: 'Open Sans', sans-serif;">
    <p style="font-size:16px;">$description1</p>
    <pre><code>$code1</code></pre>
  </div>

_ENDL;
    }
  }
}

echo<<<_ENDL
<div class="navbar navbar-default navbar-fixed-bottom" style="background-color:#169874;padding:10px;border-bottom:5px solid #154f3f;margin:0;">
    <div class="container">
      <ul class="nav navbar-nav">
         <div class="container">
                    <p style="color:white;width:30%;margin:auto;">CR CODE REVIEW | naam to suna hi hoga <!-- Begin W3Counter Tracking Code -->
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
<!-- End of StatCounter Code for Default Guide --></p>

                </div> 
      </ul>
    </div>
  </div>  

</body>

</html>


_ENDL;





?>

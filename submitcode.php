 <?php
    require_once 'header.php';
	$error = $progTitle= $progDescription = $progCode  = "";
  $submits =$level = 0;


    if (isset($_POST['progTitle']) && isset($_POST['progDescription'])&& isset($_POST['progCode'])){
        
        $progTitle = sanitizeString($_POST['progTitle']);
		    $progDescription = sanitizeString($_POST['progDescription']);
        $progCode = $_POST['progCode'];
        
        if ($progTitle == "" || $progCode == ""|| $progDescription == ""){
        	$error = "<span style='color:green'>Not all fields were entered</span><br>";
        }else{
          $user = $_SESSION['username'];
          $res1 = queryMysql("SELECT submits FROM usersubmitnumber WHERE username='$user'");
          if($res1->num_rows){
            while ($row1 = $res1->fetch_assoc()) {
              $submits = $row1['submits'];
            }
          }
            
          
          $submits = $submits+1;
          $filename = $user.$submits;
          queryMysql("UPDATE usersubmitnumber SET submits='$submits' WHERE username='$user';");
                 
          $level = $_SESSION['level'];
          queryMysql("INSERT INTO codesubmit VALUES('$user',$level,'$filename',0,CURDATE());");
          queryMysql("INSERT INTO submitfiles VALUES('$filename','$progTitle','$progDescription','$progCode');");

          header("location: profile.php");
        }
        
    }
 
echo <<< _ENDL

<div class="submitcode-form">
 
 
 <div class="container" >
 <form role="form" method='post' action='submitcode.php' style="background-color:white;width:100%;margin:1% auto 5% auto;">
 <div id="errormessage">$error </div>
  <div class="form-group" style="margin:10px;padding:10px;">
    <label for="progTitle" ><b>TITLE:</b><br /></label>
    <input style="width:100%;" maxlength='100' type="text" class="form-control" name="progTitle"  placeholder="Title">
  </div>
  <div class="form-group" style="margin:10px;padding:10px;">
    <label for="progDescription"><b>Description:</b><br /></label>
    <!--<textarea class="form-control" rows="3" maxlength="1000"  name="progDescription" id="editor2" placeholder="Description"></textarea>-->
    <textarea style="resize:none;" class="form-control" rows="3" cols="50" maxlength="1000" name="progDescription" id="editor2" placeholder="Description"></textarea>
  </div>
  <div class="form-group" style="margin:10px;padding:10px;">
    <label for="progCode"><b>Program Code:(If you have copied, do indentation here)</b><br /></label>
    <textarea class="form-control" rows="10"   name="progCode"  id="editor1" placeholder="CODE"></textarea>
    <script>
      CKEDITOR.replace( 'editor1' );
    </script>
  </div>
  
      	<button name="submit" type="submit"  style="border:1px solid white;margin-left:20px;background-color:#169874;padding:10px;width:90%;color:white;font-family: 'Open Sans', sans-serif;" >SUBMIT CODE</button>
      

</form>
</div>

_ENDL

?>

<?php
echo<<<_ENDL

<div class="navbar navbar-default " style="background-color:#169874;padding:10px;border-bottom:5px solid #154f3f;margin:0;">
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
<!-- End of StatCounter Code for Default Guide -->
</p>

                

                </div> 
      </ul>
    </div>
  </div>  


_ENDL;
?>
<?php
echo<<<_ENDL
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57db9a9c474a970d"></script>
_ENDL;
if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
echo<<<_ENDL
<script type="text/javascript" src="https://www.w3counter.com/tracker.js"></script>
<script type="text/javascript">
w3counter(97085);
</script>
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
<!-- End of StatCounter Code for Default Guide -->
_ENDL;
}else{
  echo<<<_ENDL
<div class="navbar navbar-default navbar-fixed-bottom" style="background-color:#169874;padding:10px;border-bottom:5px solid #154f3f;margin:0px;">
    <div class="container">
      <ul class="nav navbar-nav">
         <div class="container">
                    <p style="color:white;width:30%;margin:auto;">CR | CODE REVIEW | 2018 <!-- Begin W3Counter Tracking Code -->
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
}
echo<<<_ENDL
</body>

</html>
_ENDL;
?>

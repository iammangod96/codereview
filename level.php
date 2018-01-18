<?php
require_once 'header.php';

$level = $_SESSION['level'];
$username = $_SESSION['username'];
if($level == 1){
	$level = 1;
	//new code


echo "<ul class='pagination'>";


$resultnew = queryMysql("SELECT COUNT(*) AS rrr FROM codesubmit WHERE level=$level AND reviewed = 0 AND username!='$username';");
while($r = $resultnew->fetch_assoc()){

$numrows = $r["rrr"];
}


// number of rows to show per page
$rowsperpage = 10;


// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;

// get the info from the db 

$res = queryMysql("SELECT filename FROM codesubmit WHERE level=$level AND reviewed = 0 AND username!='$username' LIMIT $offset, $rowsperpage;");
	if($res->num_rows){
		while($row = $res->fetch_assoc()){
			$filename = $row['filename'];
			$res1 = queryMysql("SELECT codefilename,reviewedby FROM review WHERE codefilename='$filename' AND reviewedby='$username';");
			if(!($res1->num_rows)){
queryMysql("UPDATE submitfiles SET views=views+1 WHERE filename='$filename';");
	$res11 = queryMysql("SELECT views FROM submitfiles WHERE filename='$filename';");
        if($res11->num_rows){
          while($row11 = $res11->fetch_assoc()){
            $num_views = $row11['views'];
          }
        }
         
        $res12 = queryMysql("SELECT COUNT(codefilename) FROM review WHERE codefilename='$filename';");
        if($res12->num_rows){
          while($row12 = $res12->fetch_assoc()){
            $num_ans = $row12['COUNT(codefilename)'];
          }
        }		
				$result4 = queryMysql("SELECT title,descr FROM submitfiles WHERE filename='$filename';");
       		while($row4 = $result4->fetch_assoc()){
       			$title = $row4['title'];
       			$description = $row4['descr'];
       			echo<<<_ENDL
				<a href="forreview.php?view=$filename" style="text-decoration:none;margin-top:10px;">
  			<a href="forreview.php?view=$filename" style="text-decoration:none;margin-top:10px;">
  <div class="row container-fluid" >
  <div class="container-fluid col-md-2" >
    <div style="margin:auto;padding:10px;background-color:#169874;color:white;">$num_ans Answers</div>
    <div class="btn-danger" onclick="#" style="margin:auto;padding:10px;color:white;">$num_views views</div>
  </div>

    <div class="clickable container-fluid col-md-10" style="font-family: 'Open Sans', sans-serif;padding:10px;background-color:white;color:black;">
    <h3>$title</h3>
    <p style="overflow:scroll">$description</p>
    </div>
    </div>
</a>
_ENDL;
       		}
			}
		}
	}else{
		echo "<h3>No submitted codes available to be reviewed</h3>";
	}

/******  build the pagination links ******/
// range of num links to show
$range = 3;

// if not on page 1, don't show back links
if ($currentpage > 1) {
   // show << link to go back to page 1
   echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a></li>";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a></li> ";
} // end if 

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages)) {
      // if we're on current page...
      if ($x == $currentpage) {
         // 'highlight' it but don't make a link
         echo " <li><a>$x</a></li> ";
      // if not current page...
      } else {
         // make it a link
         echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> </li>";
      } // end else
   } // end if 
} // end for
                 
// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a></li> ";
   // echo forward link for lastpage
   echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a></li> ";
} // end if
/****** end build pagination links ******/


echo "</ul>";




}else if($level==5){
	//new code



echo "<ul class='pagination'>";

$resultnew = queryMysql("SELECT COUNT(*) AS rrr FROM codesubmit WHERE level=$level AND reviewed = 0 AND username!='$username';");
while($r = $resultnew->fetch_assoc()){

$numrows = $r["rrr"];
}


// number of rows to show per page
$rowsperpage = 10;
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;

// get the info from the db 

$res = queryMysql("SELECT filename FROM codesubmit WHERE reviewed = 0 AND level=4 OR level=5 AND username!='$username' LIMIT $offset, $rowsperpage;");
	if($res->num_rows){
		while($row = $res->fetch_assoc()){
			$filename = $row['filename'];
			$res1 = queryMysql("SELECT codefilename,reviewedby FROM review WHERE codefilename='$filename' AND reviewedby='$username';");
			if(!($res1->num_rows)){
queryMysql("UPDATE submitfiles SET views=views+1 WHERE filename='$filename';");
	$res11 = queryMysql("SELECT views FROM submitfiles WHERE filename='$filename';");
        if($res11->num_rows){
          while($row11 = $res11->fetch_assoc()){
            $num_views = $row11['views'];
          }
        }
         
        $res12 = queryMysql("SELECT COUNT(codefilename) FROM review WHERE codefilename='$filename';");
        if($res12->num_rows){
          while($row12 = $res12->fetch_assoc()){
            $num_ans = $row12['COUNT(codefilename)'];
          }
        }
				
				$result4 = queryMysql("SELECT title,descr FROM submitfiles WHERE filename='$filename';");
       		while($row4 = $result4->fetch_assoc()){
       			$title = $row4['title'];
       			$description = $row4['descr'];
       			echo<<<_ENDL
				<a href="forreview.php?view=$filename" style="text-decoration:none;margin-top:10px;">
  <div class="container-fluid" style="border:2px solid black;">
  <div class="container-fluid col-md-2" >
    <div style="margin:auto;padding:10px;background-color:#169874;color:white;">$num_ans Answers</div>
    <div class="btn-danger" onclick="#" style="margin:auto;padding:10px;color:white;">$num_views views</div>
  </div>

    <div class="clickable container-fluid col-md-10" style="font-family: 'Open Sans', sans-serif;padding:10px;background-color:white;color:black;">
    <h3>$title</h3>
    <p style="overflow:scroll">$description</p>
    </div>
    </div>
</a>

_ENDL;
       		}
			}
		}
	}else{
		echo "<h3>No submitted codes available to be reviewed</h3>";
	}

/******  build the pagination links ******/
// range of num links to show
$range = 3;

// if not on page 1, don't show back links
if ($currentpage > 1) {
   // show << link to go back to page 1
   echo "<li> <a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a></li> ";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a></li> ";
} // end if 

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages)) {
      // if we're on current page...
      if ($x == $currentpage) {
         // 'highlight' it but don't make a link
         echo " <li><a>$x</a></li> ";
      // if not current page...
      } else {
         // make it a link
         echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a></li> ";
      } // end else
   } // end if 
} // end for
                 
// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a></li> ";
   // echo forward link for lastpage
   echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a></li> ";
} // end if
/****** end build pagination links ******/



echo "</ul>";



}else{
	$level -=1;

echo "<ul class='pagination'>";

	$resultnew = queryMysql("SELECT COUNT(*) AS rrr FROM codesubmit WHERE level=$level AND reviewed = 0 AND username!='$username';");
while($r = $resultnew->fetch_assoc()){

$numrows = $r["rrr"];
}


// number of rows to show per page
$rowsperpage = 10;


// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;

// get the info from the db 

$res = queryMysql("SELECT filename FROM codesubmit WHERE level=$level AND reviewed = 0 AND username!='$username' LIMIT $offset, $rowsperpage;");
	if($res->num_rows){
		while($row = $res->fetch_assoc()){
			$filename = $row['filename'];
			$res1 = queryMysql("SELECT codefilename,reviewedby FROM review WHERE codefilename='$filename' AND reviewedby='$username';");
			if(!($res1->num_rows)){
queryMysql("UPDATE submitfiles SET views=views+1 WHERE filename='$filename';");
	$res11 = queryMysql("SELECT views FROM submitfiles WHERE filename='$filename';");
        if($res11->num_rows){
          while($row11 = $res11->fetch_assoc()){
            $num_views = $row11['views'];
          }
        }
         
        $res12 = queryMysql("SELECT COUNT(codefilename) FROM review WHERE codefilename='$filename';");
        if($res12->num_rows){
          while($row12 = $res12->fetch_assoc()){
            $num_ans = $row12['COUNT(codefilename)'];
          }
        }		
				$result4 = queryMysql("SELECT title,descr FROM submitfiles WHERE filename='$filename';");
       		while($row4 = $result4->fetch_assoc()){
       			$title = $row4['title'];
       			$description = $row4['descr'];
       			echo<<<_ENDL
				<a href="forreview.php?view=$filename" style="text-decoration:none;margin-top:10px;">
  <div class="container-fluid" style="border:2px solid black;">
  <div class="container-fluid col-md-2" >
    <div style="margin:auto;padding:10px;background-color:#169874;color:white;">$num_ans Answers</div>
    <div class="btn-danger" onclick="#" style="margin:auto;padding:10px;color:white;">$num_views views</div>
  </div>

    <div class="clickable container-fluid col-md-10" style="font-family: 'Open Sans', sans-serif;padding:10px;background-color:white;color:black;">
    <h3>$title</h3>
    <p style="overflow:scroll">$description</p>
    </div>
    </div>
</a>

_ENDL;
       		}
			}
		}
	}else{
		echo "<h3>No submitted codes available to be reviewed</h3>";
	}

/******  build the pagination links ******/
// range of num links to show
$range = 3;

// if not on page 1, don't show back links
if ($currentpage > 1) {
   // show << link to go back to page 1
   echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a></li> ";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a></li> ";
} // end if 

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages)) {
      // if we're on current page...
      if ($x == $currentpage) {
         // 'highlight' it but don't make a link
         echo " <li><a>$x</a></li> ";
      // if not current page...
      } else {
         // make it a link
         echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a></li> ";
      } // end else
   } // end if 
} // end for
                 
// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a></li> ";
   // echo forward link for lastpage
   echo " <li><a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a></li> ";
} // end if
/****** end build pagination links ******/

echo "</ul>";


}

?>

<?php
require_once 'footer.php';
?>
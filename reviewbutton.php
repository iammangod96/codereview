<?php
require_once 'header.php';
if (isset($_GET['view']) && isset($_GET['view2']))
{
   	$view = sanitizeString($_GET['view']);
   	$view2 = sanitizeString($_GET['view2']);
   	$filename = $view;
   	$reviewedby = $view2;
   	queryMysql("UPDATE codesubmit SET reviewed = 1 WHERE filename = '$filename';");
   	$res1 = queryMysql("SELECT reviews FROM userreviewnumber WHERE username='$reviewedby';");
          if($res1->num_rows){
            while ($row1 = $res1->fetch_assoc()) {
              $reviews = $row1['reviews'];
            }
          }
    $reviews+=1;
   	queryMysql("UPDATE userreviewnumber SET reviews = $reviews WHERE username = '$reviewedby';");
        queryMysql("UPDATE review SET correctreview = 1 WHERE codefilename='$filename' AND reviewedby='$reviewedby';");
   	header("location: profile.php");
}

?> 
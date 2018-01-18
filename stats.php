<?php
require_once 'header.php';
/*
$color = $username = $codeforcesid =  "";
$codeforces = $level = 0;

$username = $_SESSION['username'];
*/
$res1 = queryMysql("SELECT COUNT(filename) FROM codesubmit;");
        if($res1->num_rows){
          while($row1 = $res1->fetch_assoc()) {
            $num_ques = $row1['COUNT(filename)'];
          }
        }

$res2 = queryMysql("SELECT COUNT(reviewfilename) FROM review;");
        if($res2->num_rows){
          while($row2 = $res2->fetch_assoc()) {
            $num_ans = $row2['COUNT(reviewfilename)'];
          }
        }

$res4 = queryMysql("SELECT COUNT(filename) FROM codesubmit WHERE reviewed=1;");
        if($res4->num_rows){
          while($row4 = $res4->fetch_assoc()) {
            $num_accepted = $row4['COUNT(filename)'];
          }
        }

$res3 = queryMysql("SELECT COUNT(username) FROM members;");
        if($res3->num_rows){
          while($row3 = $res3->fetch_assoc()) {
            $num_members = $row3['COUNT(username)'];
          }
        }

$res5 = queryMysql("SELECT username,submits FROM usersubmitnumber WHERE username!= 'iammangod96' ORDER BY submits ASC;");
        if($res5->num_rows){
          while($row5 = $res5->fetch_assoc()) {
            $mostquesasked = $row5['username'];
            $mostquesaskednum = $row5['submits'];
          }
        }

$res6 = queryMysql("SELECT username,reviews FROM userreviewnumber WHERE username!= 'iammangod96' ORDER BY reviews ASC;");
        if($res6->num_rows){
          while($row6 = $res6->fetch_assoc()) {
            $mostrevgiven = $row6['username'];
            $mostrevgivennum = $row6['reviews'] - 1;
          }
        }



/*
$res7 = queryMysql("SELECT usersubmitnumber.username,usersubmitnumber.submits,reviews FROM userreviewnumber ORDER BY reviews DESC;");
        if($res7->num_rows){
          while($row7 = $res7->fetch_assoc()) {
            $mostacceptedrevs = $row7['username'];
          }
        }
*/
        echo<<<_ENDL

      <center><h1 style="background-color:white;padding:10px;">STATISTICS</h1></center>
      <div class="row">
        <div class="container-fluid col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10" style="background-color:white;padding:20px;margin-top:10px;margin-bottom:10px;">
            <p style="margin:10px auto 10px auto;">Number of registered members : <span style="font-size:20px;">$num_members</span></p>

            <p style="margin:10px auto 10px auto;">Number of questions asked : <span style="font-size:20px;">$num_ques</span></p>
            <p style="margin:10px auto 10px auto;">Number of reviews/answers given : <span style="font-size:20px;">$num_ans</span></p>
            <p style="margin:10px auto 10px auto;">Number of accepted reviews/answers : <span style="font-size:20px;">$num_accepted</span></p>
            <br /><hr />
            <p style="margin:10px auto 10px auto;">Most questions asked by member : <span style="font-size:20px;">$mostquesasked ( $mostquesaskednum )</span></p>
            
<p style="margin:10px auto 10px auto;">Most reviews/answers given by member : <span style="font-size:20px;">$mostrevgiven ( $mostrevgivennum )</span></p>
<p style="margin:10px auto 10px auto;color:red;"> More different statistics coming soon</p>        
</div>
      </div>

_ENDL;



include('footer.php');
?>

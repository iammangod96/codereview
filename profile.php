<?php
require_once 'header.php';

$color = $username = $codeforcesid =  "";
$codeforces = $level = 0;

$username = $_SESSION['username'];
$result = queryMysql("SELECT codeforcesid FROM members WHERE username='$username';");
        if($result->num_rows){
          while($row = $result->fetch_assoc()) {
            $codeforcesid = $row['codeforcesid'];
          }
        }
        $_SESSION['codeforcesid'] = $codeforcesid;


function curl_get_contents($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}
$data = curl_get_contents("http://codeforces.com/api/user.info?handles='$codeforcesid'");

       $regex = '/"rating":(.+?),/';
$regex2 = '/"contribution":(.+?),/';


        preg_match($regex,$data,$match);
preg_match($regex2,$data,$match2);
        $match = array_filter($match);
        $match2 = array_filter($match2);
        if (!empty($match)) {
          $codeforces =  $match[1];
          
          switch($codeforces){
            case $codeforces<=1500:
            $level = 1;$color = "green";
            break;
            case $codeforces<=1800:
            $level = 1;$color = "blue";
            break;
            case $codeforces<=1900:
            $level = 5;$color = "blue";
            break;
            case $codeforces<=2100:
            $level = 5;$color = "violet";
            break;
            case $codeforces<=2400:
            $level = 5;$color = "yellow";
            break;
            case $codeforces<=3700:
            $level = 5;$color = "yellow";
            break;
            default:
            $level = 0;$color = "black";
          }
         
        }else{if(!empty($match2)) {$level=1;$color ="black";echo "<p>You are currently unrated on codeforces but still we are putting you in level 1. Enter codeforces contests to get yourself rated.</p>";}else{
			echo "<p><span style='color:green'>Your Codeforces ID is not incorrect/not valid. Make a new account with your valid <a href='http://codeforces.com'>codeforces</a> user ID.</span></p>";}
			}

$username = $_SESSION['username'];
$_SESSION['level'] = $level;
$codeforces  = $codeforces;





echo<<<_ENDL
<div class="row">
<div id="profile" class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10" style="margin-top:20px;margin-bottom:20px;padding:20px;background-color:white;">
<h1>$username </h1>
<h4> $codeforcesid <span style="color:black;">$codeforces</span></h4>
</hr>
_ENDL;
if($level==1){
  echo"<h3 style='color:$color;'> DIV 1</h3>";
}else if($level==5){
  echo"<h3 style='color:$color;'> DIV 2</h3>";
}
if($level==0){
    echo "<h3><p style='background-color:grey;padding:10px;color:white;width:100%;'>I NEED MY CODE REVIEWED</p></h3><p style='color:red;'>MAKE <a href='http://codeforces.com'>codeforces account </a>to unlock it.</p><hr>";
}else{
    $r1 = queryMysql("SELECT submits FROM usersubmitnumber WHERE username='$username';");
if($r1->num_rows){
    while($row1 = $r1->fetch_assoc()){
        $numsubmits = $row1['submits'];
        $r2 = queryMysql("SELECT reviews FROM userreviewnumber WHERE username='$username';");
        if($r2->num_rows){
            while($row2 = $r2->fetch_assoc()){
                $numreviews = $row2['reviews'];
                if($numreviews > $numsubmits){
                    echo "<h3><a style='text-decoration:none;background-color:#169874;padding:10px;color:white;width:100%;' href='submitcode.php'>I NEED MY CODE REVIEWED</a></h3><hr>";
                }else{
                    echo "<h3><p style='background-color:grey;padding:10px;color:white;width:100%;'>I NEED MY CODE REVIEWED</p></h3><p style='color:red;'>REVIEW codes to unlock it.</p><hr>";
                }
            }
        }
    }
}


echo "<h4 style='font-family: 'Open Sans', sans-serif;'> Code sent to be reviewed :</h4>";



$result2 = queryMysql("SELECT filename FROM codesubmit WHERE username='$username' AND reviewed = 0;");
if($result2->num_rows){
    while($row = $result2->fetch_assoc()){
        $filename = $row['filename'];
        $result4 = queryMysql("SELECT title FROM submitfiles WHERE filename='$filename';");
        while($row4 = $result4->fetch_assoc()){
            $title = $row4['title'];
            $result3 = queryMysql("SELECT reviewfilename FROM review WHERE codefilename='$filename';");
            if($result3->num_rows){
                echo "<a style='text-decoration:none;' href='reviewcheck.php?view=$filename' ><p style='font-size:18px;font-family: 'Open Sans', sans-serif;'>$title <span style='color:green;' class='glyphicon glyphicon-ok-circle' ></span></p></a>";
            }else{
                echo "<p style='font-size:18px;font-family: 'Open Sans', sans-serif;'>$title <span style='color:red;' class='glyphicon glyphicon-remove-circle' ></span></p>";
            }
        }
    }
}

echo "</div></div>";

}//end of level0 else

include ('footer.php');
?>

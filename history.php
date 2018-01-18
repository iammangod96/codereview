<?php
require_once 'header.php';

$username = "";
$username = $_SESSION['username'];

echo<<<_ENDL
<div class="row">
<div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10" style="margin-top:20px;margin-bottom:20px;padding:20px;background-color:white;">
<h1>My History </h1>
</hr>
_ENDL;

$result2 = queryMysql("SELECT filename FROM codesubmit WHERE username='$username' AND reviewed = 1;");
if($result2->num_rows){
    while($row = $result2->fetch_assoc()){
        $filename = $row['filename'];
        $result4 = queryMysql("SELECT title FROM submitfiles WHERE filename='$filename';");
        while($row4 = $result4->fetch_assoc()){
            $title = $row4['title'];
            $result3 = queryMysql("SELECT reviewfilename FROM review WHERE codefilename='$filename';");
            if($result3->num_rows){
                echo "<a style='text-decoration:none;' href='historyshow.php?view=$filename' ><p style='font-size:18px;font-family: 'Open Sans', sans-serif;'>$title</p></a>";
            }else{
                echo "<p style='font-size:18px;font-family: 'Open Sans', sans-serif;'>$title <span style='color:red;' class='glyphicon glyphicon-remove-circle' ></span></p>";
            }
        }
    }
}

echo "</div></div>";


include ('footer.php');
?>

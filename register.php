 <?php
    require_once 'header.php';
  $error = $username = $pwd = $email = $codeforcesid = "";


    if (isset($_POST['username']) && isset($_POST['email'])&& isset($_POST['codeforces'])&& isset($_POST['pwd'])){
        
        $username = sanitizeString($_POST['username']);
    $email = sanitizeString($_POST['email']);
        $pwd = sanitizeString($_POST['pwd']);
        $codeforcesid = sanitizeString($_POST['codeforces']);
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
        if ($username == "" || $pwd == ""|| $email == ""|| $codeforcesid == ""){
          $error = "<span style='color:green'>Not all fields were entered</span><br>";
        }else{
          $result = queryMysql("SELECT * FROM members WHERE username='$username' OR email ='$email' OR codeforcesid = '$codeforcesid';");
          if ($result->num_rows)
            $error = "<span style='color:green'>That account already exists</span><br>";
        else{
            $data = curl_get_contents("http://codeforces.com/profile/'$codeforcesid'");
            $regex = '/cr_/';
            preg_match($regex,$data,$match);
            $match = array_filter($match);
            if(!empty($match)){
              queryMysql("INSERT INTO members VALUES ('$username', '$pwd', '$email','$codeforcesid')");
              queryMysql("INSERT INTO usersubmitnumber VALUES ('$username',0);");
              queryMysql("INSERT INTO userreviewnumber VALUES ('$username',1);");
              header("location: index.php");
            }else{
              $error = "<span style='color:green'>Your account is not verified. Add prefix hsr_ to your first name in codeforces profile and try registering again. (go to profile -> Settings ->SOCIAL to change your first name.)</span><br>";
            }
          }
        }
        
    }
 
echo <<< _ENDL
<div class="container-fluid row register-form">
<b><p class="col-lg-offset-2 col-lg-3 col-md-offset-2 col-md-3 col-sm-offset-2 col-sm-8 col-xs-offset-2 col-xs-8" style="margin-top:20px;margin-bottom:20px;padding:10px;line-height:200%;background-color:#006dcc;color:white;">! NEW ! Before registration, for codeforces ID authentication you have to add prefix cr_ to your first name in your codeforces profile( go to profile->Settings->SOCIAL to change first name).</br></br> For example if my first name is "azgod" change it to "cr_azgod" for ID verification. After registration you can change back to your original first name.</p></b>

 
 <form role="form" class="col-lg-offset-0 col-lg-5 col-md-offset-0 col-md-5 col-sm-offset-2 col-sm-8 col-xs-offset-2 col-xs-8" method='post' action='register.php' style="margin-top:20px;margin-bottom:20px;background-color:white;">
 <div id="errormessage">$error </div>
  <div class="form-group" style="margin:10px;padding:10px;">
    <label for="username" ><b>User Name:</b><br /></label>
    <input style="width:100%;" maxlength='16' type="text" class="form-control" name="username" id="username" placeholder="username">
  </div>
  <div class="form-group" style="margin:10px;padding:10px;">
    <label for="email"><b>Email address:</b><br /></label>
    <input style="width:100%;" maxlength='32' type="email" class="form-control" name="email" id="email" placeholder="Email address">
  </div>
  <div class="form-group" style="margin:10px;padding:10px;">
    <label for="codeforces"><b><a target="_blank" href="http://codeforces.com">Codeforces ID: (If you dont have a codeforces account click here)</a></b><br /></label>
    <input style="width:100%;" maxlength='16' type="text" class="form-control" name="codeforces" id="codeforces" placeholder="codeforces ID">
  </div>
  <div class="form-group" style="margin:10px;padding:10px;">
    <label for="pwd"><b>Password:</b><br /></label>
    <input style="width:100%;" maxlength='16' type="password" class="form-control" name="pwd" id="pwd"placeholder="Enter password">
  </div>
        <button name="submit" type="submit"  style="border:1px solid white;margin-left:20px;background-color:#169874;padding:10px;width:90%;color:white;font-family: 'Open Sans', sans-serif;" value="register">Sign UP</button>
      <p style="margin:20px;"><span style="color:red;">Login ? </span><a href="index.php">Login</a></p>

</form>

</div>

_ENDL;

include('footer.php');

?>
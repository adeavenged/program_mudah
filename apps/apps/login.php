<!DOCTYPE html>
<html>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/font-awesome.min.css">

<link rel="shortcut icon" href="favicon.ico" />
<style>
.w3-theme {color:#fff !important;background-color:#4CAF50 !important;}
.w3-btn {background-color:#4CAF50 ;margin-bottom:4px;}
.w3-code{border-left:4px solid #4CAF50}
@media only screen and (max-width: 601px) {.w3-top{position:static;} #main{margin-top:0px !important}}
</style>
<body class='w3-green'>

<div style="margin-top: 20px;"></div>

<div class="w3-row w3-small">
  <div class="w3-col s5">&nbsp;</div>

  <div class="w3-col s3 w3-card-2 w3-white">
    <?php
      include"login_check.php";

      if(isset($_SESSION['login_user'])){
        header("location: index.php");
      }
    if(!empty($error)) :
    ?>
    <div class="w3-container w3-red">
      <span onclick="this.parentElement.style.display='none'" class="w3-closebtn">x</span> 
      <p><?php echo $error; ?></p>
    </div>
    <?php endif; ?>

    <div class="w3-center">
      <img src="images/img_avatar4.png" alt="Avatar" style="width:40%" class="w3-circle w3-margin-top">
    </div>

    <form class="w3-container" method="POST">
      <p>
        <label class="w3-label w3-text-black"><b>Username :</b></label>
        <input class="w3-input w3-border" type="text" name="username" required>
      </p>
      
      <p>
        <label class="w3-label w3-text-black"><b>Password :</b></label>
        <input class="w3-input w3-border" type="password" name="password" required>
      </p>

      <p><button class="w3-btn w3-blue w3-large" name="submit" value="submit">Login</button>
        <button class="w3-btn w3-amber w3-large" type="reset">Reset</button></p>
     
    </form>

    <div class="w3-container w3-green">
      <p>Nama Program Anda</p>
    </div>

  </div>

  <div class="w3-col s4">&nbsp;</div>
</div>


</body>
</html> 
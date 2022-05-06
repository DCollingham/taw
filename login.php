<?php
include_once 'includes\header.inc.php';
//Logs the user out if they try to access login page while logged in
if(isset($_SESSION)){
  session_unset();
  session_destroy();
}


?>


<h1 class="landing-header pt-5" id="aboutus">Please Login</h1>
<div class="container test d-flex justify-content-center">

<div class="login-wrapper mt-2">
  <!-- Display $_GET messages -->
  <div class="message"> <?php echo $message;?></div>
  
    <form action="includes/login.inc.php" method="post">
      <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Enter username">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Enter Password">
      </div>
      <button type="submit" class="btn btn-primary" name="submit" btn-primary">Submit</button>
    </form>
</div>

</div>

<?php
include_once 'includes\footer.inc.php';
?>
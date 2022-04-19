<?php
include_once 'includes\header.inc.php'
?>


<h1 class="landing-header pt-5" id="aboutus">Please Login</h1>
<div class="container test d-flex justify-content-center">

<div class="login-wrapper mt-2">

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
include_once 'includes\footer.inc.php'
?>
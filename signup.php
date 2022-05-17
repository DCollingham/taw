<?php
include_once 'includes\header.inc.php'
?>

<!-- Signup form -->
<h1 class="landing-header pt-5" id="aboutus">Register</h1>
<div class="container test d-flex justify-content-center">

    <div class="login-wrapper mt-2 mb-5">
        <!-- Display $_GET messages -->
        <div class="message"> <?php echo $message;?></div>
        
        <form action="includes/signup.inc.php" method="post">
        <div class="form-group">
                <input type="text" name="username" class="form-control" id="formGroupExampleInput" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="text" name="email" class="form-control" id="formGroupExampleInput" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" name="pwd" class="form-control" id="formGroupExampleInput2" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" name="pwd_repeat" class="form-control" id="formGroupExampleInput2" placeholder="Password Repeat">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<?php
include_once 'includes\footer.inc.php'
?>
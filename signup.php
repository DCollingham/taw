<?php
include_once 'includes\header.inc.php'
?>


<h1 class="landing-header pt-5" id="aboutus">Register</h1>
<div class="container test d-flex justify-content-center">

    <div class="login-wrapper mt-2 mb-5">
        <form action="includes/signup.inc.php">
        <div class="form-group">
                <input type="text" name="first_name" class="form-control" id="formGroupExampleInput" placeholder="First Name">
            </div>
            <div class="form-group">
                <input type="text" name="last_name" class="form-control" id="formGroupExampleInput" placeholder="Last Name">
            </div>
            <div class="form-group">
                <input type="text" name="email" class="form-control" id="formGroupExampleInput" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" name="password" class="form-control" id="formGroupExampleInput2" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="text" name="password_repeat" class="form-control" id="formGroupExampleInput2" placeholder="Password Repeat">
            </div>
            <div class="form-group">
                <input type="text" name="street" class="form-control" id="formGroupExampleInput2" placeholder="Street Address">
            </div>
            <div class="form-group">
                <input type="text" name="postcode" class="form-control" id="formGroupExampleInput2" placeholder="Postcode">
            </div>
            <div class="form-group">
                <input type="text" name="number" class="form-control" id="formGroupExampleInput2" placeholder="Contact Number">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</div>






<?php
include_once 'includes\header.inc.php'
?>
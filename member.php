<?php
include_once 'includes\header.inc.php'
?>

<h1 class="landing-header pt-5" id="aboutus">Become a full member to attend events</h1>
<div class="container test d-flex justify-content-center">

    <div class="login-wrapper mt-2 mb-5">
        <form action="includes/member.inc.php" method="post">
        <div class="form-group">
                <input type="text" name="first_name" class="form-control" placeholder="First Name">
            </div>
            <div class="form-group">
                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
            </div>
            <div class="form-group">
                <input type="text" name="address" class="form-control" placeholder="House Number & Street">
            </div>
            <div class="form-group">
                <input type="text" name="postcode" class="form-control" placeholder="Postcode">
            </div>
            <div class="form-group">
                <input type="text" name="number" class="form-control" placeholder="Phone Number">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<?php
include_once 'includes\footer.inc.php'
?>
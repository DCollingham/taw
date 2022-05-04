<?php
require_once 'includes\header.inc.php';
require_once 'classes\dbh.classes.php';
require_once 'classes\memdetails.classes.php';
require_once 'includes\priviledge.inc.php';
setAccessLevel('admin');
$details = new Details();
$members = $details->getMemberId();
?>


<h1 class="landing-header pt-5" id="aboutus">Select Member</h1>
<div class="container test d-flex justify-content-center">

    <div class="login-wrapper mt-2 mb-5">
            <!-- Display $_GET messages -->
            <div class="message"> <?php echo $message;?></div>

        <form action="view-member.php" method="post">
        <select class="form-select form-select-lg form-dropdown d-block" name="member_id">
<option selected disabled="disabled">Select member</option>
        <?php foreach($members as $member): ?>
        <option value="<?=$member['member_id']; ?>"><?=$member['first_name'] . " " . $member['last_name'] ?></option>
        <?php endforeach; ?>
</select>
<button type="submit" class="btn btn-primary" name="submit" btn-primary">Submit</button>
        </form>
    </div>
</div>


<?php
include_once 'includes\footer.inc.php'
?>


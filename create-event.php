<?php
require_once 'includes\header.inc.php';
require_once 'includes\priviledge.inc.php';
setAccessLevel('admin');
$today = gmdate("d-m-Y");

?>


<h1 class="landing-header pt-5">Create Event</h1>
<div class="container test d-flex justify-content-center">

<div class="login-wrapper mt-2">

    <form action="includes/create-event.inc.php" method="post">
      <div class="form-group">
        <input type="text" class="form-control" name="location" placeholder="Event Location">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="date" value="<?php echo htmlspecialchars($today); ?>">
      </div>
      <button type="submit" class="btn btn-primary" name="submit" btn-primary">Submit</button>
    </form>
</div>

</div>

<?php
include_once 'includes\footer.inc.php'
?>
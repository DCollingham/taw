<?php
require_once 'includes\header.inc.php';
require_once 'includes\priviledge.inc.php';
$today = gmdate("d-m-Y");
setAccessLevel('admin');
?>


<h1 class="landing-header pt-5">Create Competition Category</h1>
<div class="container test d-flex justify-content-center">

<div class="login-wrapper mt-2">
  <!-- Display $_GET messages -->
    <div class="message"> <?php echo $message;?></div>
    <form action="includes/create-comp.inc.php" method="post">
      <div class="form-group">
        <input type="text" class="form-control" name="category" placeholder="Competition Category">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="date" value="<?php echo htmlspecialchars($today); ?>">
      </div>
      <select class="form-select form-select-lg form-dropdown d-block" name="status">
        <option selected disabled="disabled">Competition Status</option>
        <option value="open">Open</option>
        <option value="closed">Closed</option>
      </select>
      <button type="submit" class="btn btn-primary" name="submit" btn-primary">Submit</button>
    </form>
</div>

</div>

<?php
include_once 'includes\footer.inc.php'
?>
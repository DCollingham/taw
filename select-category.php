<?php
require_once 'includes\header.inc.php';
require_once 'classes\dbh.classes.php';
require_once 'classes\category.classes.php';
require_once 'includes\priviledge.inc.php';
setAccessLevel('admin');
$categories = new Category();
$catArr = $categories->getCategory('open');
?>


<h1 class="landing-header pt-5" id="aboutus">Select Category</h1>
<div class="container test d-flex justify-content-center">

    <div class="login-wrapper mt-2 mb-5">
        <!-- Display $_GET messages -->
        <div class="message"> <?php echo $message;?></div>

        <form action="score.php" method="post">
        <select class="form-select form-select-lg form-dropdown d-block" name="category">
<option selected disabled="disabled">Select Category</option>
        <?php foreach($catArr as $category): ?>
        <option value="<?=$category['category_id']; ?>"><?=$category['category']?></option>
        <?php endforeach; ?>
</select>
<button type="submit" class="btn btn-primary" name="submit" btn-primary">Submit</button>
        </form>
    </div>
</div>


<?php
include_once 'includes\footer.inc.php'
?>


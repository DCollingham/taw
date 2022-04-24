<?php
include_once 'includes\header.inc.php';
require_once 'classes\dbh.classes.php';
require_once 'classes\category.classes.php';

//Creates object and calls getCategory to get list to populate categorys
$category = new Category();
$categories = $category->getCategory('open');
?>

<h1 class="landing-header pt-5" id="aboutus">Enter Competition</h1>
<div class="container test d-flex justify-content-center">

    <div class="login-wrapper mt-2 mb-5">
        <form action="includes\upload.inc.php" method="post" enctype="multipart/form-data">

        <select class="form-select form-select-lg form-dropdown d-block" name="category">
            <?php foreach($categories as $cat): ?>
            <option value="<?=$cat['category_id']; ?>"><?=$cat['category']; ?></option>
            <?php endforeach; ?>
        </select>

            <div class="form-group">
                <input type="text" name="image_name" class="form-control" placeholder="Name of entry">
            </div>
            <div class="form-group">    
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php
include_once 'includes\header.inc.php'
?>
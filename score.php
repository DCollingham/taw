<?php
//Redirect is page is accessed through url
if(!isset($_POST["submit"]))
{
    header("location: select-category.php");
}
//Redirects if category not selected on previous page
if(isset($_POST["submit"]))
{
    if($_POST['category'] == null){
        header("location: select-category.php");
    }
}

include_once 'includes\header.inc.php';
require_once 'classes\dbh.classes.php';
require_once 'classes\images.classes.php';

$image = new Images();
$category_id = $_POST['category'];
$result = $image->getUrls($category_id);
?>
<h1 class="landing-header p-5">Score Entries</h1>
<div class="container test d-block justify-content-center">


<?php
//Displays images of competition
$image->displayImages($result)
?>

<h1 class="landing-header pt-5" id="aboutus">Score Entries</h1>
<div class="container test d-flex justify-content-center">

<div class="login-wrapper mt-2">

    <form action="includes/score.inc.php" method="post">
    <label>First Place</label>
    <select class="form-select form-select-lg form-dropdown d-block" name="first">
    <option selected disabled="disabled">Select The Winner</option>
            <?php foreach($result as $entry): ?>
            <option value="<?=$entry[2]; ?>"><?=$entry[2] ." ". $entry[1]; ?></option>
            <?php endforeach; ?>
    </select>

    <label>Second Place</label>
    <select class="form-select form-select-lg form-dropdown d-block" name="second">
    <option selected disabled="disabled">Second Second Place</option>
            <?php foreach($result as $entry): ?>
            <option value="<?=$entry[2]; ?>"><?=$entry[2] ." ". $entry[1]; ?></option>
            <?php endforeach; ?>
    </select>
    
    <label>Third Place</label>
    <select class="form-select form-select-lg form-dropdown d-block" name="third">
    <option selected disabled="disabled">Select Third Place</option>
            <?php foreach($result as $entry): ?>
            <option value="<?=$entry[2]; ?>"><?=$entry[2] ." ". $entry[1]; ?></option>
            <?php endforeach; ?>
    </select>   
      <button type="submit" class="btn btn-primary" name="submit" value="<?php echo htmlspecialchars($category_id); ?>"" btn-primary">Submit</button>
    </form>
</div>
</div>

<?php
include_once 'includes\footer.inc.php'
?>
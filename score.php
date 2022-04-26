<?php
include_once 'includes\header.inc.php';
require_once 'classes\dbh.classes.php';
require_once 'classes\category.classes.php';
require_once 'classes\images.classes.php';
$image = new Images();
$result = $image->getUrls(4);
?>

<h1 class="landing-header p-5">Score Entries</h1>
<div class="container test d-block justify-content-center">

<?php
        foreach($result as $imageUrl){

            echo'<div class="card comp-card">
            <img class="card-img-top img-fluid" img src="uploads/' . $imageUrl[0] . '"'. 'alt="'. $imageUrl[1] . '" >
            <div class="card-body">
                <p class="card-text">' . $imageUrl[1]. "<br>No: ". $imageUrl[2] .'</p>
            </div>
            </div>';
        }
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

      <button type="submit" class="btn btn-primary" name="submit" btn-primary">Submit</button>
    </form>
</div>

</div>

<?php
include_once 'includes\footer.inc.php'
?>
<?php
//Redirect is page is accessed through url

include_once 'includes\header.inc.php';
require_once 'classes\dbh.classes.php';
require_once 'classes\images.classes.php';

$image = new Images();
$result = $image-> getAllUrls();
?>
<h1 class="landing-header p-5">Gallery</h1>
<div class="container test d-block justify-content-center">


<?php
//Displays images of competition
foreach($result as $image){

    echo'<div class="card comp-card">
    <img class="card-img-top img-fluid" img src="uploads/' . $image['image_url'] . '"'. 'alt="'. $image['image_url'] . '" >
    <div class="card-body">
        <p class="card-text">' . $image['category']. "<br>". $image['image_name'] .'</p>
    </div>
    </div>';
}

?>

<div class="container test d-flex justify-content-center">


</div>

<?php
include_once 'includes\footer.inc.php'
?>
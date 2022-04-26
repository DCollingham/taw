<?php
include_once 'includes\header.inc.php';
require_once 'classes\dbh.classes.php';
require_once 'classes\category.classes.php';
require_once 'classes\images.classes.php';
$image = new Images();
$result = $image->getUrls(4);
?>

<h1 class="landing-header p-5">View Competition</h1>
<div class="container test d-block justify-content-center">

<?php
$image->displayImages($result);
?>


</div>

<?php
include_once 'includes\footer.inc.php'
?>
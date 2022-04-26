<?php
include_once 'includes\header.inc.php';
require_once 'classes\dbh.classes.php';
require_once 'classes\memdetails.classes.php';

//Creates object and calls getCategory to get list to populate categorys
$details = new Details();
$result = $details->memberDetails(14);
print_r($result[1]);

?>

<h1 class="landing-header pt-5" id="aboutus">Member Details</h1>
<div class="container test d-flex justify-content-center">

    <div class="login-wrapper mt-2 mb-5">
        <form action="includes/signup.inc.php" method="post">
            
            <div class="form-group">
                <?php echo'<input type="text" class="form-control" value="' .  $result[0]['first_name'] . '" disabled>';?>
            </div>
            <div class="form-group">
                <?php echo'<input type="text" class="form-control" value="' .  $result[0]['last_name'] . '" disabled>';?>
            </div>
            <div class="form-group">
                <?php echo'<input type="text" class="form-control" value="' .  $result[0]['street_address'] . '" disabled>';?>
            </div>
            <div class="form-group">
                <?php echo'<input type="text" class="form-control" value="' .  $result[0]['postcode'] . '" disabled>';?>
            </div>
            <div class="form-group">
                <?php echo'<input type="text" class="form-control" value="' .  $result[0]['number'] . '" disabled>';?>
            </div>
        </form>

        <h1 class="landing-header pt-5" id="aboutus">Submissions</h1>
        <?php
        
        foreach($result as $row){

            echo'<div class="card ">
            <img class="card-img-top img-fluid" img src="uploads/' . $row['image_url'] . '"'. 'alt="'. $row['image_name'] . '" >
            <div class="card-body">
                <p>' . $row['category'] ." - ". $row['image_name']. " - ". $row['date'] .'</p>
            </div>
            </div>';
        }
?>
    </div>
</div>




<?php
include_once 'includes\header.inc.php'
?>
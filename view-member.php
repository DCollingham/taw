<?php
//Redirect if page is accessed through url
if(!isset($_POST["submit"]))
{
    header("location: select-member.php");
}elseif($_POST['member_id'] == null){
        header("location: select-member.php");
    }

include_once 'includes\header.inc.php';
require_once 'classes\dbh.classes.php';
require_once 'classes\memdetails.classes.php';
require_once 'classes\images.classes.php';

//Creates object and calls getCategory to get list to populate categorys
$details = new Details();
$member_id = $_POST['member_id'];
$result = $details->memberDetails($member_id);
$imgObj = new Images();
$images = $imgObj->getImages($member_id);
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
        
        foreach($images as $img){

            echo'<div class="card ">
            <img class="card-img-top img-fluid" img src="uploads/' . $img['image_url'] . '"'. 'alt="'. $img['image_name'] . '" >
            <div class="card-body">
                <p>' . $img['category'] ." - ". $img['image_name']. " - ". $img['date'] .'</p>
            </div>
            </div>';
        }
?>
    </div>
</div>




<?php
include_once 'includes\footer.inc.php'
?>
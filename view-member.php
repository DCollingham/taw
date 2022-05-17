<?php
require_once 'includes\priviledge.inc.php';
setAccessLevel('admin');
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
<!-- View and update member details -->
<h1 class="landing-header pt-5" id="aboutus">Member Details</h1>
<div class="container test d-flex justify-content-center">

    <div class="login-wrapper mt-2 mb-5">
        <!-- Display $_GET messages -->
        <div class="message"> <?php echo $message;?></div>

        <form action="includes/member.inc.php" method="post">
            
        <div class="form-group">
                <?php echo'<input type="text" name="member_id" class="form-control" value="' .  $result[0]['member_id'] . '" readonly>';?>
            </div>
            <div class="form-group">
                <?php echo'<input type="text" name="first_name" class="form-control" value="' .  $result[0]['first_name'] . '" >';?>
            </div>
            <div class="form-group">
                <?php echo'<input type="text" name="last_name" class="form-control" value="' .  $result[0]['last_name'] . '" >';?>
            </div>
            <div class="form-group">
                <?php echo'<input type="text" name="address" class="form-control" value="' .  $result[0]['street_address'] . '" >';?>
            </div>
            <div class="form-group">
                <?php echo'<input type="text" name="postcode" class="form-control" value="' .  $result[0]['postcode'] . '" >';?>
            </div>
            <div class="form-group">
                <?php echo'<input type="text" name="number" class="form-control" value="' .  $result[0]['number'] . '">';?>
            </div>
            <button type="submit" class="btn btn-primary" name="update" btn-primary">Submit Edit</button>
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
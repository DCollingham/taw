<?php
require_once 'includes\header.inc.php';
require_once "classes/dbh.classes.php";
require_once "classes/event.classes.php";
require_once 'includes\priviledge.inc.php';
setAccessLevel('admin');

$today = gmdate("d-m-Y");
$event = new Event();
$startDate =  strtotime("2022-03-27");
$endDate =  strtotime("2025-06-30");
$result = $event->viewEventRange($startDate, $endDate);
?>


<h1 class="landing-header pt-5">View Events</h1>
<div class="container test d-flex justify-content-center">

<!-- <div class="login-wrapper mt-2">

    <form action="includes/view-events.inc.php" method="post">

      <div class="form-group">
        <input type="text" class="form-control" name="startDate" value="<?php echo htmlspecialchars($today); ?>">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="endDate" value="<?php echo htmlspecialchars($today); ?>">
      </div>

      <button type="submit" class="btn btn-primary" name="submit" btn-primary">Submit</button>
    </form>
</div> -->

</div>


    <div class="container pt-5">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Location</th>
            <th scope="col">Members</th>
          </tr>
        </thead>

        <tbody>
        <!-- Iterates through events and uses event id to find all attendees -->
        <?php foreach($result as $shoot): 
          $event_id = $shoot['event_id']; 
          $attendees = $event->attending($event_id);
          $newDate = date('d-m-Y', strtotime($shoot['date']));
          echo '
          <tr>
            <th scope="row">' . $newDate .'</th>
            <td>' . $shoot['location'] . '</td>
            <td>'; foreach($attendees as $member): echo $member['first_name'] . " " .  $member['last_name'] . ", "; endforeach; 
            echo 
           '</td>
          </tr>';
        endforeach; 
        ?>

      </table>
      </div>
    </div>


<?php
include_once 'includes\footer.inc.php'
?>
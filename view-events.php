<?php
include_once 'includes\header.inc.php';
require_once "classes/dbh.classes.php";
require_once "classes/event.classes.php";

$today = gmdate("d-m-Y");
$event = new Event();
$result = $event->viewEventRange(2021-06-30, 2023-06-30);
print_r($result);
?>


<h1 class="landing-header pt-5">View Events</h1>
<div class="container test d-flex justify-content-center">

<div class="login-wrapper mt-2">

    <form action="includes/view-events.inc.php" method="post">

      <div class="form-group">
        <input type="text" class="form-control" name="startDate" value="<?php echo htmlspecialchars($today); ?>">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="endDate" value="<?php echo htmlspecialchars($today); ?>">
      </div>

      <button type="submit" class="btn btn-primary" name="submit" btn-primary">Submit</button>
    </form>
</div>

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
          <tr>
            <th scope="row">09/05/17</th>
            <td>Braunton Burrows</td>
            <td>Ian, Tim, Rob, Lynda, Bill, Jemma, Angela, Gemma</td>
          </tr>
          <tr>
            <th scope="row">09/05/17</th>
            <td>Braunton Burrows</td>
            <td>Ian, Tim, Rob, Lynda, Bill, Jemma, Angela, Gemma</td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>


<?php
include_once 'includes\footer.inc.php'
?>
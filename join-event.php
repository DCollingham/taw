<?php
include_once 'includes\header.inc.php';
require_once "classes/dbh.classes.php";
require_once "classes/event.classes.php";
$event = new Event();
$eventArr = $event->viewEvents();
print_r($eventArr);
?>


<h1 class="landing-header pt-5">Attend Event</h1>
<div class="container test d-flex justify-content-center">

<div class="login-wrapper mt-2">

    <form action="includes/join-event.inc.php" method="post">
    <!-- Select event from select box -->
    <select class="form-select form-select-lg form-dropdown d-block" name="event_id">
    <option selected disabled="disabled">Select an event</option>
    <!-- Converts sql date to UK date format and populates select box -->
            <?php foreach($eventArr as $event): ?>
            <?php $date = strtotime($event['date']);?>
            <option value="<?=$event['event_id']; ?>"><?=$event['location'] ." - ". date('d-m-y', $date) ?></option>
            <?php endforeach; ?>
    </select>

      <button type="submit" class="btn btn-primary" name="submit" btn-primary">Attend</button>
    </form>
</div>

</div>

<?php
include_once 'includes\footer.inc.php'
?>
<?php
require_once 'includes\priviledge.inc.php';
setAccessLevel('full');
require_once 'includes\header.inc.php';
require_once 'classes\dbh.classes.php';
require_once 'classes\highscores.classes.php';
require_once 'classes\category.classes.php';
$categories = new Category();
$allCats = $categories->getCategory('closed');
$highscore = new Highscore();
?>
<!-- Displays the overall winners by points for all categorys -->
<h1 class="landing-header pt-5">Category Winners</h1>
<div class="container test d-block justify-content-center">

<?PHP foreach($allCats as $category): 
    $catName = $category['category'];
    echo '<div class="container p-0 m-0">' .
         '<h3 class="pb-2">' . $catName . '</h3>' .
        '<table class="table">
            <thead>
                <tr>
                    <th scope="col">Member</th>
                    <th scope="col">Points</th>
                    <th scope="col">Position</th>
                </tr>
            </thead>

            <tbody>';

        $position = 1;
        $category_id = $category['category_id'];
        $result = $highscore->getCatScores($category_id);
        foreach($result as $score): 
        echo '
               
          <tr>
            <th scope="row">' . $score['first_name']." ".$score['last_name'] .'</th>
            <td>' . $score['points'] . '</td>
            <td>'. $position++ . '</td>
          </tr>';
        endforeach; 
    ?>
        </table>
        <?Php endforeach; ?>
    </div>

</div>


<?php
include_once 'includes\footer.inc.php';
?>
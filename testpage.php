<?PHP
include_once 'includes\header.inc.php';
require_once 'classes\dbh.classes.php';
require_once 'classes\category.classes.php';
$categories = new Category();
$categories->setCatStatus('closed', 4);
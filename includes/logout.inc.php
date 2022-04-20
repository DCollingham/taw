<?PHP
//Destroys session
session_start();
session_unset();
session_destroy();
//Back to index page
header("location: ../index.php?message=loggedOut");
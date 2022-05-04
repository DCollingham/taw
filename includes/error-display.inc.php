<?php

//Returns message variable depending on get error
function displayMessage()
{
    $message = "";

    if (isset($_GET["error"])) {

        if ($_GET["error"] == "emptyInput") {
            $message = "Please fill in all fields";

        } else if ($_GET["error"] == "wrongAccessLevel") {
            $message = "Please log in to access that page";

        } else if ($_GET["error"] == "wrongCredentials") {
            $message = "Invalid username or password";

        } else if ($_GET["error"] == "sqlfail") {
            $message = "Woops, something went wrong";

        } else if ($_GET["error"] == "emailInvalid") {
            $message = "Sorry, email address invalid";

        } else if ($_GET["error"] == "alreadyTaken") {
            $message = "Username or Email already exists";

        } else if ($_GET["error"] == "toomanyentries") {
            $message = "Sorry, you already have three entries";

        } else if ($_GET["error"] == "loggedOut") {
            $message = "Log out successfull";

        } else if ($_GET["error"] == "invalidCharacters") {
            $message = "Username may only contain letters and numbers";

        } else if ($_GET["error"] == "noneImageUploaded") {
            $message = "Image uploaded successfully";

        } else if ($_GET["error"] == "invalidAddress") {
            $message = "Street address should not contain special characters";

        } else if ($_GET["error"] == "success") {
            $message = "Account Created";

        } else if ($_GET["error"] == "noneCompCreated") {
            $message = "Competition created!";

        } else if ($_GET["error"] == "noneEntryAdded") {
            $message = "Event Added!";

        } else if ($_GET["error"] == "noneEventJoined") {
            $message = "Event Joined Successfully!";
        }
        return $message;
    }
}

?>
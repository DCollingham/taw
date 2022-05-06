<?php
//Redirects if user does not have access to page
function setAccessLevel($acountTypeReq){

    if (!isset($_SESSION)) { 
        // starts if not session is set
        session_start(); 
      } 
        $user_type = $_SESSION['account_type'];

        if($user_type == 'admin'){
            return;
        } elseif($user_type == $acountTypeReq){
            return;
        } else{
            header("location: login.php?error=wrongAccessLevel");
        }
}


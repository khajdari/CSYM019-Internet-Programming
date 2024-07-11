<?php
/*
 *  Authorisation helpers in order to give access only on authorised users
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function protectedpage() {
    if(!isLoggedIn()) {
        header("Location: login.php");
        die();
    }
}?>
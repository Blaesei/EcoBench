<?php
session_start();

// Destroy all session data
if(session_destroy())
{
    // Redirect to Login Page
    header("Location: index.php");
}
?>
<?php
session_start();
$_SESSION = array();

// delete cookie
if (ini_get("session.use_cookies")) {
  $params = session_get_cookie_params();
  setcookie(session_name(), '', time() - 42000, 
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
  );
}

session_destroy();

// delete remeember token
if(isset($_COOKIE['remember_token'])) {
  setcookie('remember_token', '', time() - 3600, '/');
}

header("Location: login.php");
exit();
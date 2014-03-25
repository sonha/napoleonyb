<?php
session_start();
$_SESSION['isLoggedIn'] = true;
$_SESSION['user'] = 'july30';

// Override any config option
//$_SESSION['imagemanager.filesystem.rootpath'] = 'some path';
//$_SESSION['filemanager.filesystem.rootpath'] = 'some path';
// Redirect
header("location: " . $_REQUEST['return_url']);
die;
?>
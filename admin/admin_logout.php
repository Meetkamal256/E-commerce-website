<?php
session_start();
session_unset();
session_destroy();

// Redirect to admin_login.php
header("Location: admin_login.php");
exit();

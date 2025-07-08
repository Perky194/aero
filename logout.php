<?php
session_start();
session_unset();
session_destroy();
header("Location: signup.html");
exit();
?>

// logout.php
<?php
session_start();
session_destroy();
header("Location: admin_login.html");
?>


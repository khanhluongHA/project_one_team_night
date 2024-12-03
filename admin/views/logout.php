<?php
session_start();
session_destroy();
header("Location: ?act=login");
exit;
?>

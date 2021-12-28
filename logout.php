<?php
session_start();
unset($_SESSION['USER_ID']);
unset($_SESSION['NAME']);
session_destroy();
?>

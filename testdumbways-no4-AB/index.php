<?php
session_start();
ob_start();
error_reporting(0);
include 'config/koneksi.php';

include 'views/header.php';
include 'views/content.php';
include 'views/footer.php';

?>





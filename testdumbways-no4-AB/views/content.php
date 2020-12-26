<?php

$pages = $_GET['pages'];
$id = $_GET['id'];

switch ($pages) {
	case 'logout':
		$ses=session_destroy();
		if ($ses) {
			header("location:./");
		}
		break;

	case 'delete':
		
		$del = mysqli_query($con, "DELETE FROM post_tb WHERE id = '$id'");
		if ($del) {
			header("location:./");
		}

		break;

	default:
		include 'index.php';
		break;
}


?>
<?php
	if (isset($_GET['mod'])) {
		$mod = $_GET['mod'];
	}

	if ($mod == "home") {
		echo"Dashboard";
	}
	else
	{
		echo"Nama Program Anda";
	}
?>
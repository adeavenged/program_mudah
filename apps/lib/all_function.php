<?php


	function nama_m($id)
	{
		$sql = mysql_query("SELECT * FROM menu WHERE id_menu = $id") or die(mysql_error());
		$m = mysql_fetch_assoc($sql);

		return $m['nama_menu'];
	}


?>
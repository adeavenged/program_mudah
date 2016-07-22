<?php

$string = "<?php
	session_start();
	include\"../../lib/conn.php\";

	if(!isset(\$_SESSION['login_user'])){
		header('location: ../../login.php'); // Mengarahkan ke Home Page
	}

	if(isset(\$_GET['mod']) && isset(\$_GET['act']))
	{
		\$mod = \$_GET['mod'];
		\$act = \$_GET['act'];
	}
	else
	{
		\$mod = \"\";
		\$act = \"\";
	}

	if(\$mod == \"".$mod."\" AND \$act == \"simpan\")
	{
		mysql_query(\"INSERT INTO ".$nama_table."(";
									$arr = array();
									foreach ($non_pk as $row) {
										$arr[] = $row['column_name'];
									}
									$string .= implode(", ", $arr);

									$string .=")
									VALUES (";
									$arr2 = array();
									foreach ($non_pk as $row) {
										$arr2[] = "'\$_POST[".$row['column_name']."]'";
									}
									$string .= implode(", ", $arr2);
									$string .=")\") or die(mysql_error());
		flash('example_message', '<p>Berhasil menambah data biaya.</p>' );

		echo\"<script>
			window.history.go(-2);
		</script>\";
	}

	elseif (\$mod == \"".$mod."\" AND \$act == \"edit\") 
	{
		mysql_query(\"UPDATE ".$nama_table." SET ";
						$arr3 = array();
						foreach ($non_pk as $row) {
							$arr3[] = $row['column_name']."= '\$_POST[".$row['column_name']."]'";
						}
						$string .= implode(", ", $arr3);
					$string .= " WHERE ".$pk." = '\$_POST[id]'\") or die(mysql_error());

		flash('example_message', '<p>Berhasil mengubah data biaya.</p>');

		echo\"<script>
			window.history.go(-2);
		</script>\";
	}

	elseif (\$mod == \"".$mod."\" AND \$act == \"hapus\") 
	{
		mysql_query(\"DELETE FROM ".$nama_table." WHERE ".$pk." = '\$_GET[id]'\") or die(mysql_error());
		flash('example_message', '<p>Berhasil menghapus data biaya kuliah.</p>' );
		echo\"<script>
			window.history.back();
		</script>\";	
	}

?>";


createFile($string, "../mod/" . $nama_folder . "/" . $file2);

?>
<?php
include"lib/conn.php";
session_start(); // Memulai Session
$error=''; // Variabel untuk menyimpan pesan error
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
	}
	else
	{
		// Variabel username dan password
		$username=$_POST['username'];
		$password=$_POST['password'];

		$pass = md5($password);
		
		// Mencegah MySQL injection 
		$username = stripslashes($username);
		$password = stripslashes($password);

		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		// SQL query untuk memeriksa apakah karyawan terdapat di database?
		$query = mysql_query("SELECT * FROM user WHERE passwd='$pass' AND usernm='$username'", $conn) or die(mysql_error());
		$rows = mysql_num_rows($query);

		if ($rows == 1) {
			$a = mysql_fetch_assoc($query);
			$_SESSION['login_user']=$username; // Membuat Sesi/session
			$_SESSION['login_id'] = $a['id_user'];
			$_SESSION['level'] = $a['level'];

			mysql_query("UPDATE user SET last_login = NOW() WHERE id_user = '$a[id_user]'");

			header("location: index.php"); // Mengarahkan ke halaman profil
		} else {
			$error = "Username atau Password salah.";
		}
		mysql_close($conn); // Menutup koneksi
	}
}
?>
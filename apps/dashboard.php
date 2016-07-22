<script src="js/chart/canvasjs.min.js"></script>
<script src="js/chart/jquery.canvasjs.min.js"></script>

<?php
	date_default_timezone_set('Asia/Jakarta');

	if(!isset($_SESSION['login_user'])){
		header('location: login.php'); // Mengarahkan ke Home Page
	}

?>

<div class="w3-blue"><marquee><h3>Selamat Datang di Nama Aplikasi Anda</h3></marquee></div>
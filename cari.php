<?php
	$connect = mysqli_connect("localhost", "root", "", "telp");
	
	function cari($q){
		$query = "SELECT * FROM mahasiswa 
					WHERE 
				nama LIKE '%$q%'";
	}
	header("Location:index.php");
?>

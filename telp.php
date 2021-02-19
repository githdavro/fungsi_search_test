<?php 
error_reporting(0);
require 'b.php';
$k = query("SELECT * FROM phonebook");
?>
<!DOCTYPE html>
<html>
<head>
	<title>PhoneBook</title>
</head>
<body>
		<tr>
			<td>nama</td>
			<td><input type="text" name="nama" value="<? echo $nama; ?>"></td>
			<td><input type="submit" name="cari" value="cari"></td>
			
		</tr>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>		
			<th>nama</th>
			<th>telp 1</th>
			<th>telp 2</th>
			<th>telp 3</th>
			<th>keterangan</th>
		</tr>
		<?php $i = 1; ?>
		<?php foreach ( $k as $row ) : ?>
		<tr>
			<td><?= $i; ?></td>
			<td><?= $row["nama"] ?></td>
			<td><?= $row["telp1"] ?></td>
			<td><?= $row["telp2"] ?></td>
			<td><?= $row["telp3"] ?></td>
			<td><?= $row["keterangan"] ?></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
	</table>
</body>
</html>
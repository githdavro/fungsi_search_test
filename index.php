<?php
error_reporting( error_reporting() & ~E_NOTICE );

$connect = mysqli_connect("localhost", "root", "", "telp");


$q=$_POST["q"];


if( isset($_POST["cari"]) ){
		 $query = "SELECT * FROM contact
					WHERE 
				nama LIKE '%$q%'";
				
}else{
$query = "SELECT * FROM contact ORDER BY no";

}

$result = mysqli_query($connect, $query);
	
?>

<html>

<body>
    <br>
    <div>
        <a href="add.php" class="button">Add</a>
    </div>
	<br>
	<div>
	<form action = "" method = "post">
	
		<input type="text" name="q" size="50" autofocus placeholder="masukkan data pencarian" autocomplete="off">
		<button type="submit" name = "cari">cari</button>
		
	</form>
	</div>

    <table width='80%' border=1>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telp1</th>
            <th>Telp2</th>
            <th>Telp3</th>
            <th>Keterangan</th>
            <th>Action</th>
        </tr>
        <?php $nomor = 1; ?>
        <?php
        while ($user_data = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?= $nomor ?></td>
                <td><?= $user_data['nama'] ?></td>
                <td><?= $user_data['telp1'] ?></td>
                <td><?= $user_data['telp2'] ?></td>
                <td><?= $user_data['telp3'] ?></td>
                <td><?= $user_data['keterangan'] ?></td>
                <td><a href='edit.php?no=<?= $user_data['no'] ?>'>Edit</a> | <a href='delete.php?no=<?= $user_data['no'] ?>'>Delete</a></td>
            </tr>
            <?php $nomor++; ?>
        <?php
        } ?>
    </table>
</body>

</html>
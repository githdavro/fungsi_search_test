<html>

<head>
    <title>Add Contact</title>
</head>
<?php

// Check If form submitted, insert form data into users table.
if (isset($_POST['Submit'])) {
    $nama = $_POST['nama'];
    $telp1 = $_POST['telp1'];
    $telp2 = $_POST['telp2'];
    $telp3 = $_POST['telp3'];
    $keterangan = $_POST['keterangan'];

    // include database connection file
    $connect = mysqli_connect("localhost", "root", "", "telp");

    // Insert user data into table
    $result = mysqli_query($connect, "INSERT INTO contact(nama, telp1, telp2, telp3, keterangan) VALUES('$nama','$telp1','$telp2','$telp3','$keterangan')");
    header("Location: index.php");
    // Show message when user added
}
?>

<body>
    <a href="index.php">View Contact</a>
    <br /><br />

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>telp1</td>
                <td><input type="number" name="telp1"></td>
            </tr>
            <tr>
                <td>telp2</td>
                <td><input type="number" name="telp2"></td>
            </tr>
            <tr>
                <td>telp3</td>
                <td><input type="number" name="telp3"></td>
            </tr>
            <tr>
                <td>keterangan</td>
                <td><input type="text" name="keterangan"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

</body>

</html>
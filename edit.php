<?php
// include database connection file
error_reporting(0);
$connect = mysqli_connect("localhost", "root", "", "telp");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $no = $_POST['no'];

    $nama = $_POST['nama'];
    $telp1 = $_POST['telp1'];
    $telp2 = $_POST['telp2'];
    $telp3 = $_POST['telp3'];
    $keterangan = $_POST['keterangan'];

    // update user data
    $result = mysqli_query($connect, "UPDATE contact SET nama='$nama', telp1='$telp1',  telp2='$telp2',  telp3='$telp3',  keterangan='$keterangan' WHERE no=$no");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$no = $_GET['no'];

// Fetech user data based on id
$result = mysqli_query($connect, "SELECT * FROM contact WHERE no=$no");
while ($user_data = mysqli_fetch_array($result)) {
    $nama = $user_data['nama'];
    $telp1 = $user_data['telp1'];
    $telp2 = $user_data['telp2'];
    $telp3 = $user_data['telp3'];
    $keterangan = $user_data['keterangan'];
}
?>
<html>

<head>
    <title>Edit Contact</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br /><br />

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?= $nama; ?>></td>
            </tr>
            <tr>
                <td>telp1</td>
                <td><input type="number" name="telp1" value=<?= $telp1; ?>></td>
            </tr>
            <tr>
                <td>telp2</td>
                <td><input type="number" name="telp2" value=<?= $telp2; ?>></td>
            </tr>
            <tr>
                <td>telp3</td>
                <td><input type="number" name="telp3" value=<?= $telp3; ?>></td>
            </tr>
            <tr>
                <td>keterangan</td>
                <td><input type="text" name="keterangan" value=<?= $keterangan; ?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="no" value=<?= $_GET['no']; ?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>
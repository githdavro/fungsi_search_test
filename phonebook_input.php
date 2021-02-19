<html>
<head>
<?
	error_reporting(0);
	if($_POST["simpan"])
	{
	 $sambung=mysql_connect("localhost","root","");
	 mysql_select_db("identitas_rpl2",$sambung);
	 $noinduk=$_POST["noinduk"];
	 $nama=$_POST["nama"];
	 $alamat=$_POST["alamat"];
	 $hp=$_POST["hp"];
	 $jenis_kelamin=$_POST["jenis_kelamin"];
	 $masuk="insert into siswa(no_induk,nama,alamat,hp,jenis_kelamin)values('".$noinduk."','".$nama."','".$alamat."','".$hp."','".$jenis_kelamin."')";
	 $dimasukan=mysql_query($masuk,$sambung);
	}
?>
<title>Identitas</title>
</head>
<body>
<form name="form_dent" action="identitas.php" method="POST">
<table border=0>
<tr>
	<td colspan=3><center>IDENTITITAS</td>
</tr>
<tr>
	<td>No Induk</td>
	<td><input type="text" name="noinduk" value="<? echo $noinduk; ?>" ></td>
</tr>
<tr>
	<td>Nama</td>
	<td><input type="text" name="nama" value="<? echo $nama; ?>" ></td>
</tr>
<tr>
	<td>Alamat</td>
	<td><input type="text" name="alamat" value="<? echo $alamat; ?>" ></td>
</tr>
<tr>
	<td>No Hp</td>
	<td><input type="text" name="hp" value="<? echo $hp; ?>" ></td>
</tr>
<tr>
    <td>Jenis Kelamin</td>
    <td><select name="jenis_kelamin">
	<option></option>
    <option>Laki-Laki</option>
    <option>Perempuan</option>
    </select></td>
</tr>
<tr>
	<td colspan=3><center><input type="submit" name="simpan" value="Simpan"/>
</tr>
</table>
</form>
</body>
</html>
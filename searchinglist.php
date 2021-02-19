<head>
</head>

<body>

<form name="myForm" action="" method="post">

<?php
//koneksi database pendaftaran....
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); $host = "localhost";$username = "javacpos_e-filling4g";$password = "^bismillah.786";$database = "javacpos_e-filling4g";$koneksi = new mysqli($host, $username, $password, $database);if($koneksi){	    }else{	  echo"Tidak Terhubung dg DataBase"; };  

?>
<select class="" name="jenis" style="width:100%;height:40px" required>
<option value="" selected>--Pilih Jenis Document---</option>
<option value="1">Surat Masuk</option>
<option value="2">Surat Keluar</option>
<option value="3">Notulen Rapat</option>
<option value="4">Memo</option>
<option value="5">Laporan</option>
<option value="6">MTA</option>
<option value="7">Daftar Temuan</option>
</select>
<br><br>
<input name="keyword"  type="text" value="<?php echo $keyword; ?>" placeholder='Masukkan Prihal Document !' style="width:100%;height:40px" required>
<br><br>

<input type='submit' name='cari' value='cari' size='10' class="submit">
<br>

<hr>

<?php

$cari  = $_POST ['cari'];
$keyword  = $_POST ['keyword'];
$jenis  = $_POST ['jenis'];

if($cari){

echo "<table width='80%' align='center' border='0' style='border-collapse:collapse;' id='tblMain'>
<tr bgcolor='#F5F5DC'>
<td align=''>Info Detail</td>
</tr>
";

if($jenis=='1'){
$q="select * from s_document where prihal like '%$keyword%' ORDER BY prihal asc";
}

$hasil  = mysqli_query($koneksi, $q);  
$no=1;
while   ($data = mysqli_fetch_array($hasil,MYSQLI_ASSOC)){    
//$jaminan = $data[jaminan];

echo "
<tr bgcolor='#F5F5DC'>
<td align=''>
Nomor Urut : $no<br>
Nomor Agenda : $data[noagenda]<br>
Nomor Document : $data[nodocument]<br>
Tgl Document : $data[tgldocument]<br>
Tgl Terima : $data[tglterima]<br>
Nomor Document : $data[nodocument]<br>
Jenis Document : $data[jenisdocument]<br>
Prihal : $data[prihal]
Dari : $data[dari]<br>
Odner : $data[kodeodner]<br>
</td>
</tr>
";

$no+=1;

}//end while..

echo "
</table>
";

}//end if simpan

?>

</form>

</body>
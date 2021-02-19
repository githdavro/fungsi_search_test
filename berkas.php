<?php
$host = "localhost";$username = "javacpos_e-filling4g";
$password = "^bismillah.786";$database = "javacpos_e-filling4g";$koneksi = new mysqli($host, $username, $password, $database);

?>

<head>
</head>

<body>

<form name="myForm" action="" method="post">

&nbsp;ADD NEW
<br>
<input name="jenis"  type="radio" value="s_masuk" checked>Surat Masuk
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="jenis"  type="radio" value="s_keluar">Surat Keluar
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="jenis"  type="radio" value="laporan">Laporan
<br><br>
TGL Document<br>
<input name="tgldocument"  type="date" value="<?php echo $tgldocument; ?>" style="width:100%;height:40px"required>
<br><br>
TGL Terima<br>
<input name="tglterima"  type="date" value="<?php echo $tglterima; ?>" style="width:100%;height:40px"required>
<br><br>
Jenis Document<br>
<select name="jenisdocument">
<option value=''>Pilih Jenis Document</option>
<option value='Surat Masuk'>Surat Masuk</option>
<option value='MOU'>MOU</option>
<option value='MEMO'>MEMO</option>
<option value='Laporan'>Laporan</option>
</select>	
<br><br>
<input name="nodocument"  type="text" value="<?php echo $nodocument; ?>"  placeholder='nodocument' style="width:100%;height:40px"required>
<br><br>
<input name="prihal"  type="text" value="<?php echo $prihal; ?>"  placeholder='prihal' style="width:100%;height:40px"required>
<br><br>
<input name="dari"  type="text" value="<?php echo $dari; ?>"  placeholder='dari' style="width:100%;height:40px"required>
<br><br>
<input name="kodeodner"  type="text" value="<?php echo $kodeodner; ?>"  placeholder='kodeodner' style="width:100%;height:40px"required>
<br><br>
<input name="koderak"  type="text" value="<?php echo $koderak; ?>"  placeholder='koderak' style="width:100%;height:40px" required>
<br><br>

<input type='submit' name='simpan' value='simpan' size='10' class="submit">
<br>

<hr>

<?php
//tampilkan data...
$q="SELECT * from s_document order by id desc limit 0,100";
$hasil  = mysqli_query($koneksi, $q);  

        echo "
        <table>
        <tr>
        <td width='5%'></td>
<td width='80%'>Ket</td>
<td width='15%'>Option</td>
        </tr>
        ";


 if($hasil){
 	$no=1;
  while   ($data = mysqli_fetch_array($hasil)){  

/*
$qq   = "select * from nj_antrian where id='$data[idantrian]'";
$hq=mysqli_query($koneksi,$qq);
$dq=mysqli_fetch_array($hq); 
$idlokasi = $dq['idlokasi'];
$tgl = $dq['tgl'];
*/

        echo "
        <tr>
<td>$no</td>
<td>
No Agenda : $data[noagenda]<br>
Tgl Document : $data[tgldocument]<br>
Tgl Terima : $data[tglterima]<br>
No Document : $data[nodocument]<br>
Jenis Document : $data[jenisdocument]<br>
Prihal : $data[prihal]<br>
Dari : $data[dari]<br>
Kode Odner : $data[kodeodner]<br>
Kode Rak : $data[koderak]<br>
</td>
<td>
<a href=''>Upload PDF</a><br><br>
<a href=''>Email</a><br>
</td>
        </tr>
        ";

        $no+=1;
  }//end while
}//end if
        echo "</table>";

$simpan  = $_POST ['simpan'];

if($simpan){

$jenis = $_POST ['jenis'];
//$noagenda = $_POST ['noagenda'];
$tgldocument = $_POST ['tgldocument'];
$tglterima = $_POST ['tglterima'];
$nodocument = $_POST ['nodocument'];
$jenisdocument = $_POST ['jenisdocument'];
$prihal = $_POST ['prihal'];
$dari = $_POST ['dari'];
$kodeodner = $_POST ['kodeodner'];
$koderak = $_POST ['koderak'];

//cari nomor agenda
//cari norut noregistrasi
//$tgl_periksa=date("d/m/Y");
$tanggalx=date("Y-m-d");
$timer=gmdate("d/m/Y H:i:s");

$thn = substr($tgldocument,2,2);
$tahun = substr($tgldocument,0,4);
$bulan = substr($tgldocument,5,2);
$tanggal = substr($tgldocument,8,2);

//$query = "SELECT MAX(noagenda) AS LAST FROM e_document WHERE YEAR(tgl_periksa)=$tahun and MONTH(tgl_periksa)=$bulan and day(tgl_periksa)=$tanggal";
$query = "SELECT MAX(noagenda) AS LAST FROM s_document WHERE YEAR(tgldocument)=$tahun order by id desc";
$urut  = mysqli_query($koneksi, $query);
$dataurut = mysqli_fetch_array($urut);	
$urut = $dataurut[LAST];

$row2 = explode('/',$urut);

$urut2  = trim($row2[0]);

if($jenis=='s_masuk'){
	$j_document='SM';
}

	if (empty($urut2)){
		//$noakhir = substr($urut, 0, 12);
		$urut2 = '001';		
		$noakhir = $urut2.'/'.$bulan.'/'.$j_document.'/SPI/'.$tahun;				
	}else{
		$urut2 = intval($urut2)+1;
		if($urut2<10){
			$urut2 = '00'.$urut2;
		}
		if($urut2>10 and $urut2<100){
			$urut2 = '0'.$urut2;
		}

		$noakhir = $urut2.'/'.$bulan.'/'.$j_document.'/SPI/'.$tahun;		
	}

//format : 250/12/SM/SPI/2019	
echo $noakhir;
echo "<br>";
$noagenda = $noakhir;

//$noreg=$noakhir;
	//$noakhir = substr((string)$noakhir ,1,4);



$q="insert s_document
(noagenda,tgldocument,tglterima,nodocument,jenisdocument,prihal,dari,kodeodner,koderak,jenis)
value
(
'$noagenda','$tgldocument','$tglterima','$nodocument','$jenisdocument','$prihal','$dari','$kodeodner','$koderak','$jenisdocument'
)";
  $hs = mysqli_query($koneksi,$q);
    
    if($hs){
        $eror ="Data berhasil disimpan dg nodocument :".$noagenda;
        
                    echo "
            <script>
            alert('".$eror."');
            history.go(-1);
            </script>
            ";
    }else{
        $eror ="Data gagal disimpan";
        
                    echo "
            <script>
            alert('".$eror."');
            history.go(-1);
            </script>
            ";
    }        


}//end if simpan

?>


</form>

</body>
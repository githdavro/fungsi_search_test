<head>
</head>

<body>
  <form action="" method="post">

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>


<h3>Silahkan memilih salah satu menu di bawah ini !</h3>
1. <input type='checkbox' name='rs' value='1'> Was.OP <br>
2. <input type='checkbox' name='rs' value='2'> Was.Min <br>
3. <input type='checkbox' name='rs' value='3'> TKP.MR <br>

<br>
<input type='submit' name='lanjutkan' value='lanjutkan' size='10' class="submit">

<?php
$lanjutkan  = $_POST ['lanjutkan'];
$rs         = $_POST ['rs'];

if($lanjutkan){


if($rs=='1'){

echo "
            <script>
            top.location='https://e-filling4g.site/2020/02/28/searching-list/';
            </script>
            ";

}


}//end if lanjut...
?>

</form>
</body>
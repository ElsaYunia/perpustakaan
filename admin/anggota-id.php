
<?php

include "../conn.php";
$carikode = mysql_query("select max(nrp) from tbl_anggota") or die (mysql_error());
  // menjadikannya array
  $datakode = mysql_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis = $kode;
  } else {
   $kode_otomatis = "1";
  }
  ?>
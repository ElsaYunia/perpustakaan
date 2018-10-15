
<?php

include "../conn.php";
$carikode = mysql_query("select max(idJenis) from tbl_jenis_buku") or die (mysql_error());
  // menjadikannya array
  $datakode = mysql_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis = "J".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "J0001";
  }
  ?>
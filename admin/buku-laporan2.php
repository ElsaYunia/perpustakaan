<?php

include "../pdf/class.ezpdf.php"; //class ezpdf yg di panggil
$pdf = new Cezpdf('L');
//$pdf = new Cezpdf('a4','landscape');
//Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3,'L');
$pdf->selectFont('../pdf/fonts/Times-Bold.afm');

//Tampilkan gambar di dokumen PDF
//$pdf->addJpegFromFile('sipi.jpg',31,778,90);

//Teks di tengah atas untuk judul header

$pdf->addText(200, 800, 16,'<b>Rekapitulasi Jumlah Buku</b>');
$pdf->addText(220, 780, 14,'<b>Perpustakaan XXX</b>');


//Garis atas untuk header
$pdf->line(31, 770, 565, 770);

//Garis bawah untuk footer
$pdf->line(31, 50, 565, 50);

//Teks kiri bawah
$pdf->addText(410,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));

// Baca input tanggal yang dikirimkan user
//$dari = date_format(date_create($_POST['isi1']), 'Y/m/d');
//$sampai = date_format(date_create($_POST['isi2']), 'Y/m/d');
//echo "$mulai $selesai";exit;

//Menampilkan isi dari database
//Koneksi ke database dan tampilkan datanya
include"../conn.php";

$tampil = "select idBuku,Judul,Pengarang,Penerbit,thnTerbit,NamaJenis,stok,NamaRak,tglInput,Foto from tbl_buku , tbl_jenis_buku,tbl_rak WHERE tbl_jenis_buku.idJenis = tbl_buku.idJenis AND tbl_rak.idRak = tbl_buku.idRak";
//echo $tampil;exit;
$sql = mysql_query($tampil);

//Menghitung jumlah data pada database				
$jml = mysql_num_rows($sql);
//echo $jml;exit;
if ($jml > 0){

$i = 1;
while($r = mysql_fetch_array($sql)) {

//Format Menampilkan data di ezPdf
	$data[$i]=array('No'=>$i,
			       'ID Buku'=>"$r[idBuku]",
				   'Judul Buku'=>"$r[Judul]",
				   'Pengarang'=>"$r[Pengarang]",
				   'Penerbit'=>"$r[Penerbit]",
				   'Jenis Buku'=>"$r[NamaJenis]",
				   'Rak'=>"$r[NamaRak]",
				   'Tanggal'=>"$r[tglInput]"
				   );
	$i++;

}

//Tampilkan Dalam Bentuk Table
$pdf->ezTable($data);

//$pdf->ezText("\nPeriode: $dari s/d $sampai");

// Penomoran halaman
$pdf->ezStartPageNumbers(564, 20, 8);
$pdf->ezStream();
}

else{

		echo "<script>alert('tidak ada data!'); window.location = 'dashboard.php'</script>";	

}

?>
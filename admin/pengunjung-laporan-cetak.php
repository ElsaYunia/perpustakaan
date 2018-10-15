<?php

include "../pdf/class.ezpdf.php"; //class ezpdf yg di panggil
$pdf = new Cezpdf();

//Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('../pdf/fonts/Courier.afm');

//Tampilkan gambar di dokumen PDF
//$pdf->addJpegFromFile('sipi.jpg',31,778,90);

//Teks di tengah atas untuk judul header
$pdf->addText(200, 800, 16,'<b>Rekapitulasi Jumlah Pengunjung</b>');
$pdf->addText(220, 780, 14,'<b>Perpustakaan XXX</b>');


//Garis atas untuk header
$pdf->line(31, 770, 565, 770);

//Garis bawah untuk footer
$pdf->line(31, 50, 565, 50);

//Teks kiri bawah
$pdf->addText(410,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));

// Baca input tanggal yang dikirimkan user
$dari = date_format(date_create($_POST['isi1']), 'Y/m/d');
$sampai = date_format(date_create($_POST['isi2']), 'Y/m/d');
//echo "$mulai $selesai";exit;

//Menampilkan isi dari database
//Koneksi ke database dan tampilkan datanya
include"../conn.php";

$tampil = "SELECT * from tbl_pengunjung WHERE 
	tgl between '$dari' and '$sampai'";
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
			       'nrp'=>"$r[nrp]",
				   'Jenis Kelamin'=>"$r[jk]",
				   'Keperluan'=>"$r[keperluan]",
				   'Saran'=>"$r[saran]",
				   'Tanggal'=>"$r[tgl]"
				   );
	$i++;

}

//Tampilkan Dalam Bentuk Table
$pdf->ezTable($data);

$pdf->ezText("\nPeriode: $dari s/d $sampai");

// Penomoran halaman
$pdf->ezStartPageNumbers(564, 20, 8);
$pdf->ezStream();
}

else{

		echo "<script>alert('tidak ada data!'); window.location = 'dashboard.php'</script>";	

}

?>
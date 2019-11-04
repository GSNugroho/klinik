<?php

function buatKode($tabel, $inisial){
	//$inisial=substr($inisial,0,1);
	// require "../koneksi.php";
	if($inisial=="RM" || $inisial=="RJ"){$panjang=8;}
	elseif($inisial=="R"){$panjang=6;}
	elseif($inisial=="O"){$panjang=5;}
	else{$panjang=4;}
	if($inisial=="RM"){
		require "../koneksi.php";
		$struktur = mysqli_query($koneksi, "SELECT no_rm FROM $tabel");
	}else if($inisial=="RJ"){
		require "../koneksi.php";
		$struktur = mysqli_query($koneksi, "SELECT id_kunjungan FROM $tabel");
	}else if($inisial =="R"){
		require "../../koneksi.php";
		$struktur = mysqli_query($koneksi, "SELECT id_resep FROM $tabel");
	}else if($inisial == "O"){
		require "../../koneksi.php";
		$struktur = mysqli_query($koneksi, "SELECT id_obat FROM $tabel");
	}else if($inisial == "U"){
		require "../koneksi.php";
		$struktur = mysqli_query($koneksi, "SELECT id_user FROM $tabel");
	}else if($inisial == "T"){
		require "../koneksi.php";
		$struktur = mysqli_query($koneksi, "SELECT id_tindakan FROM $tabel");
	}else if($inisial == "K"){
		require "../koneksi.php";
		$struktur = mysqli_query($koneksi, "SELECT id_kuitansi FROM $tabel");
	}
	
	// $field = mysql_field_name($struktur,0);
	while ($property = mysqli_fetch_field($struktur)) 
	{
		// printf("Name: %s\n",$property->name);
		$field = $property->name;
	}
	 //mysqli_field_len($struktur,0);
	$qry = mysqli_query($koneksi, "SELECT MAX(".$field.") FROM ".$tabel);
	$row = mysqli_fetch_array($qry);
	if ($row[0]=="") {
		$angka=0;
	}else {
		$angka = substr($row[0], strlen($inisial));
	}
	$angka++;
	$angka = strval($angka);
	$tmp ="";
	for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
		$tmp=$tmp."0";
	}
	
	return $inisial.$tmp.$angka;
}

function format_angka($angka) {
	$hasil = number_format($angka,0, ",",".");
	return $hasil;
}

function IndonesiaTgl($tanggal){
	$tgl = substr($tanggal,8,2);
	$bln = substr($tanggal,5,2);
	$thn = substr($tanggal,0,4);
	$awal="$tgl-$bln-$thn";
	return $awal;
}
function nmKlinik(){
	require "koneksi.php";
	$sd = mysqli_query($koneksi, "SELECT * FROM nama_klinik");
	$r=mysqli_fetch_array($sd);
	return $r['nama'];
}
function namaKlinik(){
	require "../koneksi.php";
	$sd = mysqli_query($koneksi, "SELECT * FROM nama_klinik");
	$r=mysqli_fetch_array($sd);
	return $r['nama'];
}
function namaKlinik2(){
	require "../../koneksi.php";
	$sd = mysqli_query($koneksi, "SELECT * FROM nama_klinik");
	$r=mysqli_fetch_array($sd);
	return $r['nama'];
}
function namaKlinik3(){
	require "../../../koneksi.php";
	$sd = mysqli_query($koneksi, "SELECT * FROM nama_klinik");
	$r=mysqli_fetch_array($sd);
	return $r['nama'];
}
?>

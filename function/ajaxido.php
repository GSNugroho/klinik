<?php
    include "../koneksi.php";
    $inisial = 'R';
    $panjang=6;
    $struktur = mysqli_query($koneksi, "SELECT id_resep FROM resep");

    while ($property = mysqli_fetch_field($struktur)) 
	{
		// printf("Name: %s\n",$property->name);
		$field = $property->name;
	}
	 //mysqli_field_len($struktur,0);
	$qry = mysqli_query($koneksi, "SELECT MAX(".$field.") FROM resep");
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
    
    $value = $inisial.$tmp.$angka;

	echo json_encode($value);
?>
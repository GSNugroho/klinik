<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//mungkin gak kepake
class database {

//properties
    private $server;
    private $username;
    private $password;
    private $database_name;

//constructor
    function __construct($server, $username, $password, $database_name) {
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
        $this->database_name = $database_name;
        //variabel $this itu built in variabel untuk mengakses properties atau method yang ada di class tersebut.
    }

//method koneksi
    function connectMySQL() {
        $con = mysqli_connect($this->server, $this->username, $this->password);
        mysqli_select_db($con, $this->database_name);

//        mysqli_connect($this->server, $this->username, $this->password, $this->database_name);
    }

    function tambahData($nama_obat, $nama_dagang, $harga_beli, $harga_jual, $stok) {
        connectMySQL();
        $query = mysqli_query($con, "insert into obat (nama_obat, nama_dagang, harga_beli, harga_jual, stok) values ('" . $nama_obat . "','" . $nama_dagang . "','" . $harga_beli . "','" . $harga_jual . "','" . $stok . "')");

        header('location:function/obat/data_obat.php');
    }

    function editDataObat($id_obatD, $nama_obat, $nama_dagang, $harga_beli, $harga_jual, $stok) {
        mysqli_query($con, "update obat set nama_obat = '" . $nama_obat . "' , nama_dagang = '" . $nama_dagang . "', harga_beli ='" . $harga_beli . "', harga_jual ='" . $harga_jual . "', stok = '" . $stok . "' where id_obat = '" . $id_obatD . "' ");

        header('location:function/obat/data_obat.php');
    }

    function bacaDataObat($type, $id_obat) {
        $query = mysql_query($con, "select * from obat where id_obat = '$id_obat' ");
        while ($hasil = mysql_fetch_array($query)) {
            if ($type == 'id_obat') {
                echo $hasil['id_obat'];
            } elseif ($type == 'nama_obat') {
                echo $hasil['nama_obat'];
            } else if ($type == 'nama_dagang') {
                echo $hasil['nama_dagang'];
            } elseif ($type == 'harga_beli') {
                echo $hasil['harga_beli'];
            } else if ($type == 'harga_jual') {
                echo $hasil['harga_jual'];
            } elseif ($type == 'stok') {
                echo $hasil['stok'];
            }
        }
    }

    function cb() {
        echo 'cb';
    }

}

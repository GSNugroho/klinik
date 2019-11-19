<?php
    function signkey(){
        global $cons_id,$secretKey;
        $cons_id = '743627386';
        $secretKey = 'pwd';
        date_default_timezone_set('UTC');
        $tStamp=strval(time()-strtotime('1970-01-01 00:00:00'));$signature=hash_hmac('sha256',$cons_id."&".$tStamp,$secretKey,true);$encodedSignature=base64_encode($signature);
        $data=array('Content-type:application/json;charset=utf-8','X-cons-id:'.$cons_id,'X-timestamp:'.$tStamp,'X-signature:'.$encodedSignature);
        return $data;
    }

    $data = "743627386"; //Ganti dengan consumerID dari BPJS
    $secretKey = "pwd"; //Ganti dengan consumerSecret dari BPJS
    $url = "http://api.asterix.co.id/SepWebRest/peserta/nik/";  //Lihat katalog
    $nik = "3174016909650001";  //ganti dengan NIK (nomor KTP)

    date_default_timezone_set('UTC');
    $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
    $signature = hash_hmac('sha256', $data."&".$tStamp, $secretKey, true);
    $encodedSignature = base64_encode('743627386');
    $urlencodedSignature = urlencode($encodedSignature);

    echo "X-cons-id: " .$data ."<br>";
    echo "X-timestamp:" .$tStamp ."<br>";
    echo "X-signature: " .$encodedSignature."<br>";

    $opts = array(
    'http'=>array(
    'method'=>"GET",
    'header'=>"Host: api.asterix.co.id\r\n".
    "Connection: close\r\n".
    "X-timestamp: ".$tStamp."\r\n".
    "X-signature: ".$encodedSignature."\r\n".
    "User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64)\r\n".
    "X-cons-id: ".$data."\r\n".
    "Accept: application/json\r\n"
    )
    );

    $context = stream_context_create($opts);

    $result = file_get_contents($url.$nik, false, $context);
    echo "<br>Respon:";
    if ($result === false) 
    { 
    echo "Tidak dapat menyambung ke server"; 
    } else { 
    $resultarr=json_decode($result, true);
    $s=$resultarr['response']['start'];
    $l=$resultarr['response']['limit'];
    $c=$resultarr['response']['count'];
    
    echo "<br>Ditemukan ".$c." data, tampil mulai dari nomor ".$s." hingga nomor ".$l."<br>";
    for($i=0;$i<$c;$i++){
        echo "<h1>Nama: ".$resultarr['response']['list'][$i]['nama']."</h1>";
    }
    
    echo "<pre>";
    //print_r($resultarr['response']); 
    echo "</pre>";
    }
?>
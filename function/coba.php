<?php
//    	$data = "testtesttest";
//        $secretKey = "secretkey";
   
//    // Computes the signature by hashing the salt with the secret key as the key
//        $signature = hash_hmac('sha256', $data, $secretKey, true);
   
//        // base64 encode…
//        $encodedSignature = base64_encode($signature);
   
//        // urlencode…
//        // $encodedSignature = urlencode($encodedSignature);
   
//        echo "Voila! A signature: " . $encodedSignature;
   

       global $cons_id,$secretKey;
       $cons_id = '743627386';
       $secretKey = 'secretkey';
       date_default_timezone_set('UTC');
       $tStamp=strval(time()-strtotime('1970-01-01 00:00:00'));
       $signature=hash_hmac('sha256',$cons_id."&".$tStamp,$secretKey,true);
       $encodedSignature=base64_encode($signature);
       $data=array('Content-type:application/json;charset=utf-8','X-cons-id:'.$cons_id,'X-timestamp:'.$tStamp,'X-signature:'.$encodedSignature);
       print_r($data);
?>
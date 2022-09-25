<?php

function get_provinsi() {
    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL,"https://kipi.covid19.go.id/api/get-province");
    // curl_setopt($ch, CURLOPT_POST, 1);
    // curl_setopt($ch, CURLOPT_POSTFIELDS, "");
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // $response = curl_exec($ch);
    
    // curl_close ($ch);
    // var_dump($response);
    // https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json

    $json_url = "https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json";
    $json = file_get_contents($json_url);
    $data = json_decode($json, TRUE);
    echo json_encode($data);
}

function get_rs() {
    $nama_provinsi = $_GET['nama_provinsi'];
    $json_url = "https://data.covid19.go.id/public/api/rs.json";
    $json = file_get_contents($json_url);
    $data = json_decode($json, TRUE);

    $res = [];
    foreach ($data as $key => $value) {
        if (strpos($value['wilayah'], $nama_provinsi) !== false) {
            $res[] = $value;
        }
    }
    echo json_encode($res);
}

$function = $_GET['function'];
$function();

<?php

    $curl = curl_init();

    curl_setopt_array($curl,[
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://api.github.com/users/'.$_GET['usuario'].'',
        CURLOPT_USERAGENT => 'Github API in CURL'
    ]);

    $response = curl_exec($curl);
    $arqui_json = json_decode($response, false);
    

    curl_close($curl);
    





 
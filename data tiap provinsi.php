<?php 
    $APIVaksin = "https://data.covid19.go.id/public/api/prov_list.json";
    $konten = file_get_contents($APIVaksin);
    $data = json_decode($konten, true);
    $dataVaksin = $data['list_data'];
    
    $jakarta = $dataVaksin[0]['key'];
    echo $jakarta;
?>
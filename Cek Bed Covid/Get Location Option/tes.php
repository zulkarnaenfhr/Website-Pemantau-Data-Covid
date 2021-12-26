<?php 
    include '../../configData.php';
    $kodeProv = $_POST['provinsi'];
    $kodeKota = $_POST['kota'];
    $type = $_POST['type'];
    $dataHospital = getListHospital($kodeProv,$kodeKota,$type);
    
    for ($i=0; $i < count($dataHospital); $i++) { 
        echo $dataHospital[$i]['name'];
    }
?>
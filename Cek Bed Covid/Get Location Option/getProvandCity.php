<?php 
    function getProv () {
        $apiGetProvinsi = "https://rs-bed-covid-api.vercel.app/api/get-provinces";
        $kontenGetProvinsi = file_get_contents($apiGetProvinsi);
        $dataProvinsi = json_decode($kontenGetProvinsi, true);
        $dataProvinsi = $dataProvinsi["provinces"];

        return $dataProvinsi;
    }

    if(isset($_POST['kodeProv'])){
        $kodeProv = $_POST["kodeProv"];
        $apiGetKota = "https://rs-bed-covid-api.vercel.app/api/get-cities?provinceid=$kodeProv";
        $kontenKota = file_get_contents($apiGetKota);
        $dataKota = json_decode($kontenKota,true);
        $dataKota = $dataKota["cities"];

        $varName = "name";
        for ($i=0; $i < count($dataKota); $i++) { 
		 	echo '<option value='.$dataKota[$i]['id'].'>'.$dataKota[$i]['name'].'</option>';
        }
    }
?>
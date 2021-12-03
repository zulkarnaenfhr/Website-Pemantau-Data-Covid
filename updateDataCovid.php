<?php 
    $APIUpdateData = "https://data.covid19.go.id/public/api/update.json";
    $konten = file_get_contents($APIUpdateData);
    $data = json_decode($konten, true);

    $fahri = "Fahri";
    echo "halo ".$fahri." Izzuddin";
?>
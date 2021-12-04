<?php 
    $APIUpdateData = "https://data.covid19.go.id/public/api/update.json";
    $konten = file_get_contents($APIUpdateData);
    $data = json_decode($konten, true);

    $penambahanKasusPositif = $data['update']['penambahan']['jumlah_positif'];
    $totalJumlahKasusPositif = $data['update']['total']['jumlah_positif'];
    $penambahanDirawat = $data['update']['penambahan']['jumlah_dirawat'];
    $totalJumlahDirawat = $data['update']['total']['jumlah_dirawat'];
    $penambahanKasusSembuh = $data['update']['penambahan']['jumlah_sembuh'];
    $totalJumlahKasusSembuh = $data['update']['total']['jumlah_sembuh'];
    $penambahanKasusMeninggal = $data['update']['penambahan']['jumlah_meninggal'];
    $totalJumlahKasusMeninggal = $data['update']['total']['jumlah_meninggal'];

    // $totalJumlahKasusPositif = number_format($totalJumlahKasusPositif);
    
?>
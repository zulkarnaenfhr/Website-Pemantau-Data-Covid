<?php 
    $APIUpdateData = "https://data.covid19.go.id/public/api/update.json";
    $kontenAPIUpdateData = file_get_contents($APIUpdateData);
    $dataUpdateData = json_decode($kontenAPIUpdateData, true);

    $penambahanKasusPositif = $dataUpdateData['update']['penambahan']['jumlah_positif'];
    $penambahanKasusPositif = number_format($penambahanKasusPositif);
    $totalJumlahKasusPositif = $dataUpdateData['update']['total']['jumlah_positif'];
    $totalJumlahKasusPositif = number_format($totalJumlahKasusPositif);
    $penambahanDirawat = $dataUpdateData['update']['penambahan']['jumlah_dirawat'];
    $penambahanDirawat = number_format($penambahanDirawat);
    $totalJumlahDirawat = $dataUpdateData['update']['total']['jumlah_dirawat'];
    $totalJumlahDirawat = number_format($totalJumlahDirawat);
    $penambahanKasusSembuh = $dataUpdateData['update']['penambahan']['jumlah_sembuh'];
    $penambahanKasusSembuh = number_format($penambahanKasusSembuh);
    $totalJumlahKasusSembuh = $dataUpdateData['update']['total']['jumlah_sembuh'];
    $totalJumlahKasusSembuh = number_format($totalJumlahKasusSembuh);
    $penambahanKasusMeninggal = $dataUpdateData['update']['penambahan']['jumlah_meninggal'];
    $penambahanKasusMeninggal = number_format($penambahanKasusMeninggal);
    $totalJumlahKasusMeninggal = $dataUpdateData['update']['total']['jumlah_meninggal'];
    $totalJumlahKasusMeninggal = number_format($totalJumlahKasusMeninggal);
?>

<?php 
    $APIUpdateDataTesdanVaksin = "https://data.covid19.go.id/public/api/pemeriksaan-vaksinasi.json";
    $kontenUpdateDataTesdanVaksin = file_get_contents($APIUpdateDataTesdanVaksin);
    $dataUpdateDataTesdanVaksin = json_decode($kontenUpdateDataTesdanVaksin, true);

    //total spesimen diperiksa
    $penambahanJumlahSpesimenDiperiksaPcrTcm = $dataUpdateDataTesdanVaksin['pemeriksaan']['penambahan']['jumlah_spesimen_pcr_tcm'];
    $penambahanJumlahSpesimenDiperiksaPcrTcm = number_format($penambahanJumlahSpesimenDiperiksaPcrTcm);
    $totalJumlahSpesimenDiperiksaPcrTcm = $dataUpdateDataTesdanVaksin['pemeriksaan']['total']['jumlah_spesimen_pcr_tcm'];
    
    $penambahanJumlahSpesimenDiperiksaAntigen = $dataUpdateDataTesdanVaksin['pemeriksaan']['penambahan']['jumlah_spesimen_antigen'];
    $penambahanJumlahSpesimenDiperiksaAntigen = number_format($penambahanJumlahSpesimenDiperiksaAntigen);
    $totalJumlahSpesimenDiperiksaAntigen = $dataUpdateDataTesdanVaksin['pemeriksaan']['total']['jumlah_spesimen_antigen'];
    
    $totalSpesimenDiperiksa = $totalJumlahSpesimenDiperiksaPcrTcm + $totalJumlahSpesimenDiperiksaAntigen;
    $totalJumlahSpesimenDiperiksaAntigen = number_format($totalJumlahSpesimenDiperiksaAntigen);
    $totalJumlahSpesimenDiperiksaPcrTcm = number_format($totalJumlahSpesimenDiperiksaPcrTcm);
    $totalSpesimenDiperiksa = number_format($totalSpesimenDiperiksa);

    // total orang diperiksa
    $penambahanJumlahOrangDiperiksaPcrTcm = $dataUpdateDataTesdanVaksin['pemeriksaan']['penambahan']['jumlah_orang_pcr_tcm'];
    $penambahanJumlahOrangDiperiksaPcrTcm = number_format($penambahanJumlahOrangDiperiksaPcrTcm);
    $totalJumlahSpesimenOrangDiperiksaPcrTcm = $dataUpdateDataTesdanVaksin['pemeriksaan']['total']['jumlah_orang_pcr_tcm'];

    $penambahanJumlahorangDiperiksaAntigen = $dataUpdateDataTesdanVaksin['pemeriksaan']['penambahan']['jumlah_orang_antigen'];
    $penambahanJumlahorangDiperiksaAntigen = number_format($penambahanJumlahorangDiperiksaAntigen);
    $totalJumlahorangDiperiksaAntigen = $dataUpdateDataTesdanVaksin['pemeriksaan']['total']['jumlah_orang_antigen'];

    $totalOrangDiperiksa = $totalJumlahSpesimenOrangDiperiksaPcrTcm + $totalJumlahorangDiperiksaAntigen;
    $totalJumlahSpesimenOrangDiperiksaPcrTcm = number_format($totalJumlahSpesimenOrangDiperiksaPcrTcm);
    $totalJumlahorangDiperiksaAntigen = number_format($totalJumlahorangDiperiksaAntigen);
    $totalOrangDiperiksa = number_format($totalOrangDiperiksa);
?>
<?php 
    // vaksinasi
    $totalVaksinasiKe1 = $dataUpdateDataTesdanVaksin['vaksinasi']['total']['jumlah_vaksinasi_1'];
    $totalVaksinasiKe1 = number_format($totalVaksinasiKe1);
    $penambahanVaksinasiKe1 = $dataUpdateDataTesdanVaksin['vaksinasi']['penambahan']['jumlah_vaksinasi_1'];
    $penambahanVaksinasiKe1 = number_format($penambahanVaksinasiKe1);
    $totalVaksinasiKe2 = $dataUpdateDataTesdanVaksin['vaksinasi']['total']['jumlah_vaksinasi_2'];
    $totalVaksinasiKe2 = number_format($totalVaksinasiKe2);
    $penambahanVaksinasiKe2 = $dataUpdateDataTesdanVaksin['vaksinasi']['penambahan']['jumlah_vaksinasi_2'];
    $penambahanVaksinasiKe2 = number_format($penambahanVaksinasiKe2);
?>
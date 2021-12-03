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

    $penambahanKasusPositif = number_format($penambahanKasusPositif);
    $totalJumlahKasusPositif = number_format($totalJumlahKasusPositif);
    $penambahanDirawat = number_format($penambahanDirawat);
    $totalJumlahDirawat = number_format($totalJumlahDirawat);
    $penambahanKasusSembuh = number_format($penambahanKasusSembuh);
    $totalJumlahKasusSembuh = number_format($totalJumlahKasusSembuh);
    $penambahanKasusMeninggal = number_format($penambahanKasusMeninggal);
    $totalJumlahKasusMeninggal = number_format($totalJumlahKasusMeninggal);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="styleUpdateDataCovidHarian.css">

    <title>Covid-19 Data</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbarBranding" href="#">Covid-19 Indonesia Data</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <main>
        <section id="homeStatistikIndonesiaUpdate">
            <div class="container-fluid">
                <div class="container">
                    <p class="homeStatistikIndonesiaUpdate-Judul">Monitoring Covid-19 Indonesia Data</p>

                    <div class="row">
                        <div class="col-3 cardSection1" style="border: 1px solid black;">
                            <div class="cardFahriPendek row1-point1">
                                <div class="container">
                                    <p class="valueCard">
                                        <?php 
                                            echo $totalJumlahKasusPositif
                                        ?>
                                    </p>
                                    <p class="keyCard">
                                        TERKONFIRMASI
                                    </p>
                                    <p class="angkaCard">
                                        <span class="angka">
                                            <?php 
                                                echo "+".$penambahanKasusPositif
                                            ?>
                                        </span> Kasus
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 cardSection1" style="border: 1px solid black;">
                            <div class="cardFahriPendek row1-point2">
                                <div class="container">
                                    <p class="valueCard">
                                        <?php 
                                            echo $totalJumlahDirawat
                                        ?>
                                    </p>
                                    <p class="keyCard">
                                        KASUS AKTIF
                                    </p>
                                    <p class="angkaCard">
                                        <span class="angka">
                                            <?php               
                                                echo $penambahanDirawat
                                            ?>
                                        </span> Kasus Aktif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 cardSection1" style="border: 1px solid black;">
                            <div class="cardFahriPendek row1-point3">
                                <div class="container">
                                    <p class="valueCard">
                                        <?php 
                                            echo $totalJumlahKasusSembuh
                                        ?>
                                    </p>
                                    <p class="keyCard">
                                        SEMBUH
                                    </p>
                                    <p class="angkaCard">
                                        <span class="angka">
                                            <?php 
                                                echo "+".$penambahanKasusSembuh
                                            ?>
                                        </span> Kasus Sembuh
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 cardSection1" style="border: 1px solid black;">
                            <div class="cardFahriPendek row1-point4">
                                <div class="container">
                                    <p class="valueCard">
                                        <?php 
                                            echo $totalJumlahKasusMeninggal
                                        ?>
                                    </p>
                                    <p class="keyCard">
                                        MENINGGAL
                                    </p>
                                    <p class="angkaCard">
                                        <span class="angka">
                                            <?php 
                                                echo "+".$penambahanKasusMeninggal
                                            ?>
                                        </span> Kasus Meninggal
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 1.2rem;">
                        <div class="col-6" style="border: 1px solid black;">
                            <div class="cardFahriPanjang">
                                <div class="container">
                                    <p class="valueCard">
                                        4.400.100
                                    </p>
                                    <p class="keyCard">
                                        TOTAL SPESIMEN DIPERIKSA
                                    </p>
                                    <p class="angkaCard">
                                        PCR + TCM=<span class="totalPcrTcm">50.000.000</span> (+<span
                                            class="penambahanPcrTcm">32.200</span>)
                                    </p>
                                    <p class="angkaCard">
                                        ANTIGEN=<span class="totalAntigen">23.000.000</span> (+<span class="penambahanAntigen">12.000</span>)
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6" style="border: 1px solid black;">
                            <div class="cardFahriPanjang">
                                <div class="container">
                                    <p class="valueCard">
                                        4.400.100
                                    </p>
                                    <p class="keyCard">
                                        TOTAL ORANG DIPERIKSA
                                    </p>
                                    <p class="angkaCard">
                                        PCR + TCM=<span class="totalPcrTcm">50.000.000</span> (+<span
                                            class="penambahanPcrTcm">32.200</span>)
                                    </p>
                                    <p class="angkaCard">
                                        ANTIGEN=<span class="totalAntigen">23.000.000</span> (+<span class="penambahanAntigen">12.000</span>)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 1.2rem;">
                        <div class="col-6" style="border: 1px solid black;">
                            <div class="cardFahriPanjang2">
                                <div class="container">
                                    <p class="valueCard">
                                        4.400.100
                                    </p>
                                    <p class="keyCard">
                                        TOTAL SPESIMEN DIPERIKSA
                                    </p>
                                    <p class="angkaCard">
                                        PCR + TCM=<span class="totalPcrTcm">50.000.000</span> (+<span
                                            class="penambahanPcrTcm">32.200</span>)
                                    </p>
                                    <p class="angkaCard">
                                        ANTIGEN=<span class="totalAntigen">23.000.000</span> (+<span
                                            class="penambahanAntigen">12.000</span>)
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6" style="border: 1px solid black;">
                            <div class="cardFahriPanjang2">
                                <div class="container">
                                    <p class="valueCard">
                                        4.400.100
                                    </p>
                                    <p class="keyCard">
                                        TOTAL ORANG DIPERIKSA
                                    </p>
                                    <p class="angkaCard">
                                        PCR + TCM=<span class="totalPcrTcm">50.000.000</span> (+<span
                                            class="penambahanPcrTcm">32.200</span>)
                                    </p>
                                    <p class="angkaCard">
                                        ANTIGEN=<span class="totalAntigen">23.000.000</span> (+<span
                                            class="penambahanAntigen">12.000</span>)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>
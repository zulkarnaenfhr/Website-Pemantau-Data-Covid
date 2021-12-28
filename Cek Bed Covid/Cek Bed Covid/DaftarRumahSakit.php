<?php 
    include '../../configData.php';
    $kodeProv = $_GET['provinsi'];
    $kodeKota = $_GET['kota'];
    $type = $_GET['type'];
    $dataHospital = getListHospital($kodeProv,$kodeKota,$type);

    $dataProvinsi = getProv();

    $getInformasiProvinsi = getInformasiProvinsi($kodeProv);
    $getInformasiKota = getInformasiKota($kodeProv,$kodeKota);
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- font-awsome -->
        <script src="https://kit.fontawesome.com/a7fb2d6a5a.js" crossorigin="anonymous"></script>

        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous">

        <!-- js buat jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <title>Daftar Rumah Sakit</title>

        <!-- link css bed covid -->
        <link rel="stylesheet" href="DaftarRumahSakit.css">

        <!-- Fontawesome CSS -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    </head>
    <body>

        <main>
            <div id="daftarRumahSakit">
                <div class="container" style="border: 1px solid black">
                    <div class="daftarRumahSakit-content row">
                        <div class="navInformation">
                            <h1 class="daftarRumahSakit-title">Daftar Rumah Sakit</h1>
                            <?php if ($type == 1) { ?>
                                <h6 class="daftarRumahSakit-locationInfo">
                                    Menampilkan Bed Covid untuk Provinsi <?php echo $getInformasiProvinsi ?>, Kota <?php echo $getInformasiKota ?>
                                </h6> 
                            <?php } else { ?>
                                <h6 class="daftarRumahSakit-locationInfo">
                                    Menampilkan Bed Non-Covid untuk Provinsi <?php echo $getInformasiProvinsi ?>, Kota <?php echo $getInformasiKota ?>
                                </h6> 
                            <?php } ?>  
                        </div>
                        <button class="buttonBacktoSearch">
                            <a href="../Get Location Option/GetLocation.php">Cari Rumah Sakit Lokasi Lain</a>
                        </button>
                        <div id="daftarRumahSakit">
                            <?php 
                                if ($type==1) { ?>
                                <?php
                                        for ($i=0; $i < count($dataHospital); $i++) { 
                                ?>
                                <div class="card">
                                    <div class="card-body row">
                                        <div class="col-md-8">
                                            <h5 class="hospitalName">
                                                <?php echo $dataHospital[$i]['name']; ?>
                                            </h5>
                                            <h6 class="hospitalAddress">
                                                <?php echo $dataHospital[$i]['address']; ?>
                                            </h6>
                                            <h6 class="infoUpdate">
                                            <?php
                                                echo $dataHospital[$i]['info'];
                                            ?>
                                            </h6>
                                        </div>
                                        <div class="col-md-4 row1-rightSide">
                                            <?php 
                                                $availabel = $dataHospital[$i]['bed_availability'];
                                                if ($availabel > 0) { ?>
                                                    <h6 class="informasiTersedia">
                                                        Tersedia : 
                                                        <span>
                                                            <?php
                                                                echo $dataHospital[$i]['bed_availability'];     
                                                            ?>
                                                        </span>
                                                    </h6>
                                                <?php } else { ?>
                                                    <h6 class="noAvailability">
                                                        Maaf, Bed Penuh !
                                                    </h6>
                                                <?php }
                                            ?>
                                            
                                            <h6>
                                                <?php 
                                                    $antrian = $dataHospital[$i]['queue'];

                                                    if ($antrian == 0) {
                                                        echo "Tidak Ada Antrian";
                                                    } else if ($antrian > 0){
                                                        echo "Antri $antrian";
                                                    }
                                                ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="card-body row card-row2">
                                        <div class="col-md-6">
                                            <button class="buttonCall">
                                                <i class="fas fa-phone"></i>
                                                <a href="tel:<?php echo $dataHospital[$i]['phone']?>">
                                                    <?php echo $dataHospital[$i]['phone']?>
                                                </a>    
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row row2-rightSide">
                                                <div class="col-6">
                                                    <button class="buttonHospitalInformation">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <a href="https://www.google.co.id/maps/search/<?php echo $dataHospital[$i]['name'];?>">Maps</a>
                                                    </button>
                                                </div>
                                                <div class="col-6 buttonInformasiRight">
                                                    <form action="../Details Rumah Sakit/DetailsRumahSakit.php" method="get">
                                                        <input type="hidden" value="<?php echo $dataHospital[$i]['name'] ?>" name="namaRS">
                                                        <input type="hidden" value="<?php echo $dataHospital[$i]['id'] ?>" name="idRumahSakit">
                                                        <input type="hidden" value="<?php echo $type ?>" name="covidOrNonCovid">
                                                        <button type="submit" class="buttonHospitalInformation">
                                                            <a>Details</a>
                                                        </button>    
                                                    </form>
                                                </div>
                                            </div>   
                                        </div>
                                    </div>
                                </div>

                                <!-- Punya for $datahospital -->
                                <?php 
                                        }
                                ?>
                                <!-- punya else if  -->
                            <?php } else { ?>
                                <?php 
                                    for ($i=0; $i < count($dataHospital); $i++) { ?>
                                <div class="card">
                                    <div class="card-body row">
                                        <div class="col-8">
                                            <h5>
                                                <?php echo $dataHospital[$i]['name']; ?>
                                            </h5>
                                            <h6>
                                                <?php echo $dataHospital[$i]['address']; ?>
                                            </h6>
                                            <h6>
                                            <?php
                                                echo $dataHospital[$i]['available_beds'][0]['info'];
                                            ?>
                                            </h6>
                                        </div>
                                        <div class="col-4">
                                            <?php 
                                                $availabel = $dataHospital[$i]['available_beds'][0]['available'];
                                                if ($availabel > 0) { ?>
                                                    <h6>
                                                        Tersedia, <span><?php echo $dataHospital[$i]['available_beds'][0]['bed_class']?></span>
                                                    </h6>
                                                    <h6>
                                                    <?php
                                                        echo $dataHospital[$i]['available_beds'][0]['available'];
                                                    ?>
                                                    </h6>
                                            <?php    } else if ($availabel == 0) { ?>
                                                    <h6 class="noAvailability">
                                                        Maaf, Bed Penuh !</span>
                                                    </h6>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="card-body row card-row2">
                                        <div class="col-md-6">
                                            <button class="buttonCall">
                                                <i class="fas fa-phone"></i>
                                                <a href="tel:<?php echo $dataHospital[$i]['phone']?>">
                                                    <?php echo $dataHospital[$i]['phone']?>
                                                </a>    
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row row2-rightSide">
                                                <div class="col-6">
                                                    <button class="buttonHospitalInformation">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <a href="https://www.google.co.id/maps/search/<?php echo $dataHospital[$i]['name'];?>">Maps</a>
                                                    </button>
                                                </div>
                                                <div class="col-6 buttonInformasiRight">
                                                    <form action="../Details Rumah Sakit/DetailsRumahSakit.php" method="get">
                                                        <input type="hidden" value="<?php echo $dataHospital[$i]['name'] ?>" name="namaRS">
                                                        <input type="hidden" value="<?php echo $dataHospital[$i]['id'] ?>" name="idRumahSakit">
                                                        <input type="hidden" value="<?php echo $type ?>" name="covidOrNonCovid">
                                                        <button type="submit" class="buttonHospitalInformation">
                                                            <a>Details</a>
                                                        </button>    
                                                    </form>  
                                                </div>
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                                <?php    }    // punyanya for data hospital 2
                                ?>
                                
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

        <script type="text/javascript">
            function getKota(idKota) {
                $('#kota').html('<option>Tunggu Sebentar</option>')
                $.ajax({
                    type: 'post',
                    url: '../../configData.php',
                    data: {
                        kodeProv: idKota
                    },
                    success: function (data) {
                        $('#kota').html(data);
                    }
                })
            }
        </script>
    </body>
</html>
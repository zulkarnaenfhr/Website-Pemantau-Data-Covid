<?php 
    include '../../configData.php';
    $kodeProv = $_POST['provinsi'];
    $kodeKota = $_POST['kota'];
    $type = $_POST['type'];
    $dataHospital = getListHospital($kodeProv,$kodeKota,$type);

    $dataProvinsi = getProv();
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
    <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbarBranding" href="#">Covid-19 Indonesia Data</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                aria-current="page"
                                href="../../index.php"
                                >Home</a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="../Get Location Option/GetLocation.php"
                                >Cek Bed Covid</a>
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
                    </div>
                </div>
                <div class="cardSizing text-center mt-5 bg-danger rounded">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-10 offset-md-1 d-flex flex-column">
                                <form action="../Cek Bed Covid/DaftarRumahSakit.php" method="post">
                                    <div class="form-group">
                                        <div class="radio-toolbar p-2">
                                            <p class="text-white fw-bold fs-4">Pilih Bed</p>
                                            <input type="radio" id="Covid-Option" name="type" value="1" required="required">
                                            <label for="Covid-Option">
                                                Covid
                                                <i class="iconChecked fas fa-check"></i>
                                            </label>

                                            <input type="radio" id="NonCovid-Option" name="type" value="2">
                                            <label for="NonCovid-Option">
                                                Non-Covid<i class="iconChecked fas fa-check"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group p-2">
                                        <label for="provinsi" class="text-white fw-bold fs-4">Select Provinsi</label>
                                        <br>
                                        <select required
                                            class="selectOption"
                                            name="provinsi"
                                            id="provinsi"
                                            onchange="getKota(this.value)"
                                            require="require">
                                            <option value="">Select Provinsi</option>
                                            <?php 
                                            for ($i=0; $i < count($dataProvinsi); $i++) { ?>
                                            <option value='<?php echo $dataProvinsi[$i]['id']?>'>
                                                <?php echo $dataProvinsi[$i]['name'] ?>
                                            </option>
                                            <?php }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group p-2">
                                        <label for="kota" class="text-white fw-bold fs-4">Select Kota</label>
                                        <br>
                                        <select required class="selectOption" name="kota" id="kota" require="require">
                                            <option value="">Select Kota</option>
                                        </select>
                                    </div>
                                <button type="submit" class="btn btn-light mt-4 mb-5" name="submit">kirimkan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <div id="daftarRumahSakit">
            <?php
                for ($i=0; $i < count($dataHospital); $i++) { 
                    for ($i=0; $i < count($dataHospital); $i++) { 
            ?>
            <div class="card p-1">
                <div class="card-body">
                    <h5 class="card-title fw-bold">
                        <i class="fas fa-clinic-medical"></i>
                        <span class="ms-3"><?php echo $dataHospital[$i]['name']; ?></span>
                    </h5>
                    <h6 class="card-text">
                        <i class="fas fa-street-view"></i>
                         <span class="ms-4">alamat </span> <span class="fw-bolder ms-4"> : <?php echo $dataHospital[$i]['address']; ?> </span>
                    </h6>
                    <h6 class="card-text">
                        <i class="fas fa-phone"></i>
                        <span class="ms-4"> No. telpon </span> <span class="fw-bolder ms-1"> : <?php echo $dataHospital[$i]['phone']; ?> </span>
                    </h6>
                    <h6 class="card-text">
                        <i class="fas fa-bed"></i>
                        <span class="bed"> Bed Availability </span> 
                        <span class="fw-bolder ms-1"> : 
                            <?php
                                if($type==1){
                                    echo $dataHospital[$i]['bed_availability']; 
                                } else{
                                    echo $dataHospital[$i]['available_beds'][0]['available'].'<br>';
                                }
                            ?>
                        </span>
                        <br>
                        <span class="fw-light">
                            <?php 
                            $preappend = '<span class="fw-bold">';
                            $append = '</span>';
                            if($type==2){
                                echo '<i class="far fa-question-circle"></i>';
                                echo 'Bed Class : '.$preappend.$dataHospital[$i]['available_beds'][0]['bed_class'].$append. '<br>';
                                echo 'Room Name : '.$preappend.$dataHospital[$i]['available_beds'][0]['room_name'].$append;
                            }
                            ?>
                        </span>
                    </h6>
                    <h6 class="card-text">
                        <i class="fas fa-info"></i>
                        <span class="info"> Info </span> 
                        <span class="fw-bolder ms-1"> : 
                            <?php
                            if($type==1){
                                echo $dataHospital[$i]['info'];
                            }else{
                                echo $dataHospital[$i]['available_beds'][0]['info'];
                            }
                            ?>
                        </span>
                    </h6>
                </div>
            </div>
            
            <!-- Punya for $datahospital -->
            <?php 
                    }
                }
            ?>
        </div>

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
<?php 
    // include '../../configData.php';
    // $kodeProv = $_POST['provinsi'];
    // $kodeKota = $_POST['kota'];
    // $type = $_POST['type'];
    // $dataHospital = getListHospital($kodeProv,$kodeKota,$type);

    include "../../configData.php";
    $dataProvinsi = getProv();
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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

        <div id="navbarLocation">
            <div class="container">
                <form
                    class="formNavbarLocation"
                    action="../Cek Bed Covid/DaftarRumahSakit.php"
                    method="post">
                    <div>
                        <label for="type">Cek Ketersediaan Untuk</label>
                        <div class="radio-toolbar">
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
                    <div class="form-group">
                        <label for="provinsi">Select Provinsi</label>
                        <br>
                        <select
                            required="required"
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
                    <div class="form-group">
                        <label for="kota">Select Kota</label>
                        <br>
                        <select
                            required="required"
                            class="selectOption"
                            name="kota"
                            id="kota"
                            require="require">
                            <option value="">Select Kota</option>
                        </select>
                    </div>
                    <button type="submit">kirimkan</button>
                </form>
            </div>
        </div>

        <div id="daftarRumahSakit">
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
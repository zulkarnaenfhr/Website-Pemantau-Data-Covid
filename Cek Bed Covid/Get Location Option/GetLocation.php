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

        <link rel="stylesheet" href="GetLocation.css">
        <title>Hello, world!</title>
    </head>
    <?php 
        include "getProvandCity.php";
        $dataProvinsi = getProv();
    ?>
    <body>
        <div id="inputLocation">
            <div class="container" style="border: 1px solid black">
                <div class="inputLocation-container">
                    <div class="row">
                        <p>Sistem Informasi Cek Bed Covid</p>
                    </div>
                    <form action="tes.php" method="post">
                        covid<input type="radio" name="type" value="1">
                        non-covid<input type="radio" name="type" value="2">
                        <div class="form-group">
                            <label for="">Select Provinsi</label>
                            <select
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
                            <label for="">Select Kota</label>
                            <select style="width: 350px;" name="kota" id="kota" require="require">
                                <option value="">Select Kota</option>
                            </select>
                        </div>
                        <button type="submit">kirimkan</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

        <script type="text/javascript">
            function getKota(idKota) {
                $.ajax({
                    type: 'post',
                    url: 'getProvandCity.php',
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
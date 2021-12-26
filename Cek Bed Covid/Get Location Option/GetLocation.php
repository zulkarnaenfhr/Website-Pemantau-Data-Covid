<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dynamic Dependent Select Box using jQuery, Ajax and PHP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <?php 
        include "../../configData.php";
        $dataProvinsi = getProv();
    ?>
    <body>
        <div class="container-fluid">
            <div class="container" style="padding-top: 9rem;">
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
    <script type="text/javascript">
        function getKota(idKota) {
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
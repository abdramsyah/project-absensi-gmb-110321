<?php
// include 'config/config.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Gerakan Membaca Buku</title>
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
</head>

<body>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat in odit fugiat cum maiores, recusandae saepe dolorum quod aut iste obcaecati aspernatur voluptate aperiam optio dolor. Quam ipsum saepe quaerat!
    <!-- <h1>Hello, world!</h1> -->
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="img/gmb.jpg" alt="" width="30" height="24" class="d-inline-block align-top">
                Gerakan Membaca Buku
            </a>
        </div>
    </nav>
    <div class="container mt-3">

        <div class="row">
            <div class="card">
                <div class="card-header text-center">
                    Absensi Gerakan Membaca Buku
                </div>
                <div class="card-body">
                    <br>
                    <form class="row g-3 needs-validation" action="config/act.php" method="POST" novalidate>
                        <div class="col4">
                            <label for="validationCustom01" class="form-label">First name</label>
                            <!-- <input type="text" class="form-control" id="validationCustom01" name="gmb" required> -->
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="gmb" required></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please insert text.
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" name="kirim">Submit form</button>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="card mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Title</th>
                            <th scope="col">Page</th>
                            <th scope="col">Quote</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $doc = "source/member.json"; //Variabel berisi nama doc di mana data dibaca dan ditulis.
                        $dataJson = file_get_contents($doc);
                        $dataSiswa = json_decode($dataJson, true);
                        $hit = count($dataSiswa);
                        for ($i = 0; $i < $hit; $i++) {
                            # code...
                            $name = $dataSiswa[$i]['name'];
                            $title = $dataSiswa[$i]['title'];
                            $page = $dataSiswa[$i]['page'];
                            $quote = $dataSiswa[$i]['quote'];

                            echo "<tr>
                            <td> </td> <!-- Data nama. -->
                            <td>" . $name . "</td> <!-- Data nomor induk siswa. -->
                            <td>" . $title . "</td> <!-- Data jenis kelamin. -->
                            <td>" . $page . "</td> <!-- Data tanggal lahir. -->
                            <td>" . $quote . "</td> <!-- Data orang tua. -->
                        </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>
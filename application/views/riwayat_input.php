<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pakar - Kelompok B</title>
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Rekomendasi Banjir</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <!-- <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">Features</a>
            <a class="nav-item nav-link" href="#">Pricing</a>
            </div> -->
        </div>
    </nav>

    <div class="row">
        <div class="col-3">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action disabled bg-light" style="text-align: center">
                    Menu Pakar
                </a>
                <a href="home_pakar.html" class="list-group-item list-group-item-action">Sistem Pakar</a>
                <a href="lihatInput.html" class="list-group-item list-group-item-action active">Riwayat Input</a>
                <a href="#" class="list-group-item list-group-item-action">Basis Pengetahuan</a>
            </div>
        </div>
        <div class="col-9" style="padding-left: 10px">
            <div class="row" style="padding-bottom: 20px">
                <table class="table table-hover table-light">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="text-align: center">Tinggi Permukaan</th>
                        <th scope="col" style="text-align: center">Jumlah Penduduk</th>
                        <th scope="col" style="text-align: center">Jarak Sungai</th>
                        <th scope="col" style="text-align: center">Curah Hujan</th>
                        <th scope="col" style="text-align: center">Rendah</th>
                        <th scope="col" style="text-align: center">Sedang</th>
                        <th scope="col" style="text-align: center">Tinggi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>15 Mdpl</td>
                        <td>5925 jiwa</td>
                        <td>1,6 Km</td>
                        <td>583</td>
                        <td>10%</td>
                        <td>70%</td>
                        <td>10%</td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<script src="bootstrap.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>

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
    <nav class="navbar navbar-dark bg-dark">    
        <a class="navbar-brand" href="<?= base_url('Pakar');?>">Deteksi Banjir</a>
        <form class="form-inline" method="post" action="<?= base_url('Welcome/logout');?>">
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" name="logout">Log Out</button>
        </form>
    </nav>

    <div class="row">
        <div class="col-3">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action disabled bg-light" style="text-align: center">
                    Menu Pakar
                </a>
                <a href="<?= base_url('Pakar');?>" class="list-group-item list-group-item-action">Sistem Pakar</a>
                <a href="<?= base_url('C_riwayat/tampilData');?>" class="list-group-item list-group-item-action active">Riwayat Input</a>
                <a href="<?= base_url('BasisPengetahuan/tampilData');?>" class="list-group-item list-group-item-action">Basis Pengetahuan</a>
            </div>
        </div>
        <div class="col-9" style="padding-left: 10px">
            <div class="row" style="padding-bottom: 20px">
                <table class="table table-hover table-light">
                    <thead>
                      <tr>
                        <th scope="col" style="text-align: center">Tinggi Permukaan</th>
                        <th scope="col" style="text-align: center">Jumlah Daerah Tinggi</th>
                        <th scope="col" style="text-align: center">Jarak Sungai</th>
                        <th scope="col" style="text-align: center">Curah Hujan</th>
                        <th scope="col" style="text-align: center">Rendah</th>
                        <th scope="col" style="text-align: center">Tinggi</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $v): ?>
                      <tr>
                        <td><?php echo $v["tinggi_permukaan"]; ?> Mdpl</td>
                        <td><?php echo $v["jumlah_daerahT"]; ?> Daerah</td>
                        <td><?php echo $v["jarak_sungai"]; ?> Km</td>
                        <td><?php echo $v["curah_hujan"]; ?></td>
                        <td><?php echo $v["hasil2"]; ?>%</td>
                        <td><?php echo $v["hasil1"]; ?>%</td>
                      </tr>
                        <?php endforeach; ?>
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

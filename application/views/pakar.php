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
                <a href="<?= base_url('Pakar/tampilHasil');?>" class="list-group-item list-group-item-action active">Sistem Pakar</a>
                <a href="<?= base_url('C_riwayat/tampilData');?>" class="list-group-item list-group-item-action">Riwayat Input</a>
                <a href="<?= base_url('BasisPengetahuan/tampilData');?>" class="list-group-item list-group-item-action">Basis Pengetahuan</a>
            </div>
        </div>
        <div class="col-9" style="padding-left: 10px; padding-top: 10px;">
            <?php foreach ($user_data->result() as $v) {?>
            <div class="row" style="padding-bottom: 20px">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Resiko Tinggi</h5>
                            <p class="card-text">
                                <h1>
                                    <?php echo $v->hasil2 ?> %
                                </h1>
                            </p>
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalLong">
                            Detail
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Risiko Tinggi Detail</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Hasil Input</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <b>Tinggi Permukaan</b>
                                            </div>
                                            <div class="col-sm-7">
                                                : <?php echo $v->tinggi_permukaan ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <b>Jumlah Penduduk</b>
                                            </div>
                                            <div class="col-sm-7">
                                                : <?php echo $v->jumlah_daerahT ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <b>Jarak Menuju Sungai</b>
                                            </div>
                                            <div class="col-sm-7">
                                                : <?php echo $v->jarak_sungai ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <b>Curah Hujan</b>
                                            </div>
                                            <div class="col-sm-7">
                                                : <?php echo $v->curah_hujan ?>
                                            </div>
                                        </div>

                                        <hr>

                                        <h5>Penjelasan</h5>
                                        <hr>
                                        <p>Risiko tinggi dari hasil perhitungan Tsukamoto (z = (A1Z1 + A2Z2 + ... + AnZn)/(A1 + A2 + ... + An))</p>

                                        <hr>

                                        <h5>Rekomendasi</h5>
                                        <hr>
                                        <p>Disarankan untuk selalu waspada terhadap potensi banjir yang tinggi dan/atau tidak tinggal daerah tersebut</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Resiko Rendah</h5>
                            <p class="card-text">
                                <h1>
                                    <?php echo $v->hasil1 ?> %
                                </h1>
                            </p>
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalLong1">
                            Detail
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Risiko Rendah Detail</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Hasil Input</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <b>Tinggi Permukaan</b>
                                            </div>
                                            <div class="col-sm-7">
                                                : <?php echo $v->tinggi_permukaan ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <b>Jumlah Penduduk</b>
                                            </div>
                                            <div class="col-sm-7">
                                                : <?php echo $v->jumlah_daerahT ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <b>Jarak Menuju Sungai</b>
                                            </div>
                                            <div class="col-sm-7">
                                                : <?php echo $v->jarak_sungai ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <b>Curah Hujan</b>
                                            </div>
                                            <div class="col-sm-7">
                                                : <?php echo $v->curah_hujan ?>
                                            </div>
                                        </div>

                                        <hr>

                                        <h5>Penjelasan</h5>
                                        <hr>
                                        <p>Risiko rendah didapatkan dari hasil perhitungan Tsukamoto (1-z)</p>

                                        <hr>

                                        <h5>Rekomendasi</h5>
                                        <hr>
                                        <p>Disarankan untuk sebagai tempat tinggal</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card"style="height: 350px;">
                        <div class="card-body">
                            <h3>
                                Input nilai
                            </h3>
                            <hr>
                            <form  method="post" action="<?= base_url('C_fuzzy/fuzzy');?>">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputPermukaan"><h5>Tinggi Permukaan:</h5></label>
                                        <input type="number" class="form-control" id="inputPermukaan" placeholder="Tinggi Permukaan Dataran" name="inputPermukaan">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputDaerah"><h5>Jumlah Wilayah Tinggi:</h5></label>
                                        <input type="number" class="form-control" id="inputDaerah" placeholder="Jumlah Wilyah yang lebih tinggi" name="banyakDaerah">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputSungai"><h5>Jarak Menuju Sungai:</h5></label>
                                        <input type="number" class="form-control" id="inputSungai" placeholder="Jarak Wilayah Dengan Sungai" name="inputSungai">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCurahHujan"><h5>Curah Hujan:</h5></label>
                                        <input type="number" class="form-control" id="inputCurahHujan" placeholder="Curah Hujan di Wilayah" name="inputCHujan">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <button type="submit" class="btn btn-dark" name="kirim">Submit</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            </div>
        </div>
    </div>
</body>

<script src="bootstrap.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>

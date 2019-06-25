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
        <a class="navbar-brand" href="#">Deteksi Banjir</a>
        <form class="form-inline" method="post" action="<?= base_url('Welcome/login');?>">
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" name="logout" >Log Out</button>
        </form>
    </nav>

    <div class="row">
        <div class="col-3">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action disabled bg-light" style="text-align: center">
                    Menu Pakar
                </a>
                <a href="home_pakar.html" class="list-group-item list-group-item-action">Sistem Pakar</a>
                <a href="lihatInput.html" class="list-group-item list-group-item-action">Riwayat Input</a>
                <a href="#" class="list-group-item list-group-item-action active">Basis Pengetahuan</a>
            </div>
        </div>
        <div class="col-9" style="padding-left: 10px; padding-top: 10px;">
            <div class="row">
                <h2>Aturan saat ini </h2>
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalScrollable">Edit</button>
                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Basis Pengetahuan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>   
                                <h5>1. Risiko Banjir</h5>
                                <div class="form-group">
                                    <Label>1.1. Risiko Kecil</Label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number"  class="form-control" placeholder="Minimal">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Maximal">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>1.2. Risiko Sedang</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Minimal">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Maximal">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>1.3. Risiko Tinggi</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Minimal">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Maximal">
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <h5>2. Tinggi Permukaan</h5>
                                <div class="form-group">
                                    <Label>2.1. Tinggi</Label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number"  class="form-control" placeholder="Minimal">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Maximal">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>2.2. Sedang</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Minimal">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Maximal">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>2.3. Rendah</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Minimal">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Maximal">
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <h5>3. Banyak Daerah Lebih Tinggi</h5>
                                <div class="form-group">
                                    <Label>3.1. Tinggi</Label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number"  class="form-control" placeholder="Minimal">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Maximal">
                                        </div>
                                    </div>
                                    <label>3.2. Sedang</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Minimal">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Maximal">
                                        </div>
                                    </div>
                                    <label>3.3. Rendah</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Minimal">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Maximal">
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <h5>4. Jarak Sungai</h5>
                                <div class="form-group">
                                    <Label>4.1. Dekat</Label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number"  class="form-control" placeholder="Minimal">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Maximal">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>4.2. Sedang</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Minimal">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Maximal">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>4.3. Jauh</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Minimal">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Maximal">
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <h5>5. Tinggi Permukaan</h5>
                                <div class="form-group">
                                    <Label>5.1. Tinggi</Label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number"  class="form-control" placeholder="Minimal">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Maximal">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>5.2. Sedang</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Minimal">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Maximal">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>5.3. Rendah</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Minimal">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Maximal">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h4>Risiko Banjir</h4>
                            <hr>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card">
                                        <div class="card-body">
                                            Risiko Tinggi: 80
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm">
                                    <div class="card">
                                        <div class="card-body">
                                            Risiko Sedang: 100
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm">
                                    <div class="card">
                                        <div class="card-body">
                                            Risiko Rendah: 100
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 20px;">
                <div class="col-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h4>Tinggi Permukaan Dataran</h4>
                            <hr>
                            <ul class="list-group">
                                <li class="list-group-item">Tinggi: 100 - 150</li>
                                <li class="list-group-item">Sedang: 50 - 100</li>
                                <li class="list-group-item">Rendah: 0 - 50</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h4>Jumlah Daerah Lebih Tinggi</h4>
                            <hr>
                            <ul class="list-group">
                                <li class="list-group-item">Tinggi: 1000 - 10.000</li>
                                <li class="list-group-item">Sedang: 500 - 1.000</li>
                                <li class="list-group-item">Rendah: 0 - 500</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h4>Jarak Menuju Sungai</h4>
                            <hr>
                            <ul class="list-group">
                                <li class="list-group-item">Jauh: 100 - 200</li>
                                <li class="list-group-item">Sedang: 70 - 100</li>
                                <li class="list-group-item">Dekat: 0 - 70</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h4>Curah Hujan</h4>
                            <hr>
                            <ul class="list-group">
                                <li class="list-group-item">Tinggi: 100 - 170</li>
                                <li class="list-group-item">Sedang: 60 - 100</li>
                                <li class="list-group-item">Rendah: 0 - 60</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>

<script src="bootstrap.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>

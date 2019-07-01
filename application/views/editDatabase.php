
<!doctype html>
<html lang="en">
  <head>
    <title>Sistem Pakar - Kelompok B</title>
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
  </head>

  <body>
    <form role="form" method="post" action="<?= base_url('C_logistik/editP');?>">
    <nav class="navbar navbar-dark bg-dark">    
        <a class="navbar-brand" href="<?= base_url('Pakar');?>">Deteksi Banjir</a>
        <form class="form-inline" method="post" action="<?= base_url('Welcome/logout');?>">
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" name="logout">Log Out</button>
        </form>
    </nav>
    </form>

    <div class="container">
      <form method="post" action="<?php echo base_url('BasisPengetahuan/editNilaiDB');?>">
      <?php foreach ($user_data->result() as $v) {?>
      <h2>ID</h2>
      <input class="form-control" name="id" value="<?php echo $v->id_parameter ?>" ></input>
      <H2>Batas Bawah</H2>
      <input class="form-control" name="bb" value="<?php echo $v->batas_bawah ?>" >
      <h2>Batas Atas</h2>
      <input class="form-control" name="ba" value="<?php echo $v->batas_atas ?>" >
      <input type="submit" class="btn btn-dark" value="kirim"  >
      <?php } ?> 
      </form>
      
    </div>

  </body>
</html>

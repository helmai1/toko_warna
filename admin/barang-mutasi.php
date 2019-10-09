<?php
  include('goods-mutation.php')
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tambah Supplier</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="barang-mutasi.php">Mutasi Barang</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="btn btn-outline-danger" href="admin-tampilan.php"><i class="fa fa-sign-out-alt"></i></a></li>
            </ul>
        </div>
      </div>
    </nav>

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">Barang Mutasi</div>
              <div class="card-body">
                <form class="" action="goods-mutation.php?id=<?=$_GET['id']?>" method="POST" id="formbarang" enctype="multipart/form-data">
                    
                    <div class="form-group">
                      <label for="tanggalmutasi">Tanggal Mutasi</label>
                      <input type="date" class="form-control" id="tanggalmutasi" name="tanggalmutasi">
                    </div>
                    <div class="form-group">
                      <label for="mutasiquantity">Quantity</label>
                      <input type="number" class="form-control" placeholder="Quantity" id="mutasiquantity" name="mutasiquantity">
                    </div>
                    <div class="form-group">
                      <label for="mutasiharga">Harga Jual</label>
                      <input type="number" class="form-control" placeholder="Harga Jual" id="mutasiharga" name="mutasiharga">
                    </div>
                    <div class="form-group">
                      <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>
                    </div>   
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    <script src="js/bootstrap.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
  </body>
</html>

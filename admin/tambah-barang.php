<?php
  include('barang-add.php')
  
?>
<?php
  $supplier 	= mysqli_query($koneksi,"SELECT * FROM supplier");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tambah Admin / Pegawai</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="tambah-barang.php">Tambah Barang </a>
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
              <div class="card-header">Tambah Barang</div>
              <div class="card-body">
                <form class="" action="barang-add.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                      <label for="kode_barang">Kode Barang</label>
                      <input type="text" class="form-control" name="kode_barang"  placeholder="Enter Kode" value="">
                    </div>
                    <div class="form-group">
                      <label for="nama_barang">Nama Barang</label>
                      <input type="text" class="form-control" name="nama_barang"  placeholder="Enter Barang" value="">
                    </div>
                    <div class="form-group">
                      <label for="stok">Quantity</label>
                      <input type="number" class="form-control" name="stok" placeholder="Enter quantity" value="">
                    </div>
                    <div class="form-group">
                      <label for="harga">Harga</label>
                      <input type="number" class="form-control" name="harga" placeholder="Enter Harga" value="">
                    </div>
                    
                    <div class="form-group">
                      <label for="supplier">Supplier</label>
                      <select name="supplier" id="supplier" class="form-control">
                        <!-- <option value="" disabled selected>Pilih Id Admin</option> -->
                        <?php
		        					  foreach($supplier as $supplierdata){
		        					  	echo '<option value="'.$supplierdata['id'].'">'.$supplierdata['nama_supplier'].'</option>';
		        					}
		        				?>
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="gambar">Choose Image</label>
                      <input type="file" class="form-control" name="gambar" value="">
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

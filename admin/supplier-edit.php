
<?php
  require_once('../koneksi.php');
  $upload_dir = '../uploads/';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from supplier where id=".$id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

  if(isset($_POST['Submit'])){
		$nama_supplier = $_POST['nama_supplier'];
    $alamat_supplier = $_POST['alamat_supplier'];        
    $kontak_supplier = $_POST['kontak_supplier'];
		
		if(!isset($errorMsg)){
			$sql = "update supplier
									set nama_supplier = '".$nama_supplier."',
										alamat_supplier = '".$alamat_supplier."',
										kontak_supplier = '".$kontak_supplier."'
					where id=".$id;
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record updated successfully';
				header('Location:daftar-supplier.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		}

	}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit-Supplier</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="index.php">Edit Supplier</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt"></i></a></li>
            </ul>
        </div>
      </div>
    </nav>

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                Edit Supplier
              </div>
              <div class="card-body">
                <form class="" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="nama_supplier">Nama Supplier</label>
                      <input type="text" class="form-control" name="nama_supplier"  placeholder="Enter NamaSupplier" value="<?php echo $row['nama_supplier']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="alamat_supplier">Alamat Supllier</label>
                      <input type="text" class="form-control" name="alamat_supplier" placeholder="Enter AlamatSupplier" value="<?php echo $row['alamat_supplier']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="kontak_supplier">Kontak Supplier</label>
                      <input type="number" class="form-control" name="kontak_supplier" placeholder="Enter KontakSupplier" value="<?php echo $row['kontak_supplier']; ?>">
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

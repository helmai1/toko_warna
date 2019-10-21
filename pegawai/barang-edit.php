<?php
  require_once('../koneksi.php');
  $upload_dir = '../uploads/';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $supplier 	= mysqli_query($koneksi,"SELECT * FROM supplier");
    $sql = "select * from barang where id_barang= " .$id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

  if(isset($_POST['Submit'])){
		$nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $supplier = $_POST['supplier'];

		$imgName = $_FILES['gambar']['name'];
		$imgTmp = $_FILES['gambar']['tmp_name'];
		$imgSize = $_FILES['gambar']['size'];

		if($imgName){

			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');

			$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

			if(in_array($imgExt, $allowExt)){

				if($imgSize < 5000000){
					unlink($upload_dir.$row['gambar']);
					move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
			}
		}else{

			$userPic = $row['gambar'];
		}

		if(!isset($errorMsg)){
			$sql = "update barang
									set nama_barang = '".$nama_barang."',
										harga = '".$harga."',
                    stok = '".$stok."',
                    id_supplier = '".$supplier."',
										gambar = '".$userPic."'
					where id_barang =".$id;
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record updated successfully';
				header('Location:daftar-barang.php');
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
    <title>Edit-User</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="daftar-barang.php">Daftar Barang</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="btn btn-outline-danger" href="daftar-barang.php"><i class="fa fa-sign-out-alt"></i></a></li>
            </ul>
        </div>
      </div>
    </nav>

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                Edit User
              </div>
              <div class="card-body">
                <form class="" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="nama_barang">Nama Barang</label>
                      <input type="text" class="form-control" name="nama_barang"  placeholder="Enter Nama Barang" value="<?php echo $row['nama_barang']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="stok">Stok</label>
                      <input type="text" class="form-control" name="stok" placeholder="Enter Stok" value="<?php echo $row['stok']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="harga">Harga</label>
                      <input type="number" class="form-control" name="harga" placeholder="Enter Harga" value="<?php echo $row['harga']; ?>">
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
                      <div class="col-md-4">
                        <img src="<?php echo $upload_dir.$row['gambar'] ?>" width="100">
                        <input type="file" class="form-control" name="gambar" value="">
                      </div>
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

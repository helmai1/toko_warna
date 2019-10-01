<?php
  require_once('../koneksi.php');
  $upload_dir = '../uploads/';

  if (isset($_POST['Submit'])) {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $supplier = $_POST['supplier'];

    $imgName = $_FILES['gambar']['name'];
		$imgTmp = $_FILES['gambar']['tmp_name'];
		$imgSize = $_FILES['gambar']['size'];

    if(empty($kode_barang)){
			$errorMsg = 'Please input kode barang';
		}elseif(empty($nama_barang)){
			$errorMsg = 'Please input nama barang';
		}elseif(empty($harga)){
            $errorMsg = 'Please input harga';
        }elseif(empty($stok)){
            $errorMsg = 'Please input stok';
        }elseif(empty($supplier)){
			$errorMsg = 'Please input supplier';
		}else{

			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');

			$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

			if(in_array($imgExt, $allowExt)){

				if($imgSize < 5000000){
					move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
			}
		}


		if(!isset($errorMsg)){
			$sql = "insert into barang(kode_barang, nama_barang, harga, stok, gambar, id_supplier)
					values('".$kode_barang."', '".$nama_barang."', '".$harga."', '".$stok."', '".$userPic."', '".$supplier."')";
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record added successfully';
				header('Location: admin-tampilan.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		}
  }
?>

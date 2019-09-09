<?php
  require_once('../koneksi.php');
//   $upload_dir = '../uploads/';

  if (isset($_POST['Submit'])) {
    $nama_supplier = $_POST['nama_supplier'];
    $alamat_supplier = $_POST['alamat_supplier'];
    $kontak_supplier = $_POST['kontak_supplier'];

    if(empty($nama_supplier)){
			$errorMsg = 'Please input nama_supplier';
		}elseif(empty($alamat_supplier)){
			$errorMsg = 'Please input alamat_supplier';
		}elseif(empty($kontak_supplier)){
            $errorMsg = 'Please input kontak_supplier';
		}

		if(!isset($errorMsg)){
			$sql = "insert into supplier(nama_supplier , alamat_supplier, kontak_supplier)
					values('".$nama_supplier."', '".$alamat_supplier."', '".$kontak_supllier."')";
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

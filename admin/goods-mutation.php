<?php
	// include_once '../koneksi.php';
  require_once('../koneksi.php');
//   $upload_dir = '../uploads/';

  if (isset($_POST['Submit'])) {
        $id = $_GET['id'];
        $barang 	= mysqli_query($koneksi,"SELECT * FROM barang WHERE id_barang='$id'");
        $databarang = mysqli_fetch_array($barang);
		$tanggalmutasi		= $_POST['tanggalmutasi'];
		$mutasiquantity		= $_POST['mutasiquantity'];
		$totalharga 		= $databarang['harga'] * $mutasiquantity;
		$quantity = $databarang['stok'] - $mutasiquantity;
	
    if(empty($tanggalmutasi)){
			$errorMsg = 'Please input nama_supplier';
		}elseif(empty($mutasiquantity)){
			$errorMsg = 'Please input alamat_supplier';
		}

		if(!isset($errorMsg)){
			$sql = "insert into history_barang(id_item , tanggal,stok,total_harga)
					values('".$id."', '".$tanggalmutasi."', '".$mutasiquantity."', '".$totalharga."')";
			$result = mysqli_query($conn, $sql);
			if($result){
                $quantityupdate = mysqli_query($koneksi,"UPDATE barang SET stok='$quantity' WHERE id_barang='$id'
				");
				$successMsg = 'New record added successfully';
				header('Location: admin-tampilan.php');
			}else if($quantity>=0){
				alert("Stok habis!");
				header('Location: barang-mutasi.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		}
  }
?>


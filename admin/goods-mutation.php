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
		$hargajual			= $_POST['mutasiharga'];
		$quantity = $databarang['stok'] - $mutasiquantity;

		$barang_toko 	= mysqli_query($koneksi,"SELECT * FROM barang_toko");
		$data_toko = mysqli_fetch_array($barang_toko);
		$quantity_toko = $data_toko['stok_barang'] + $mutasiquantity;

	
    if(empty($tanggalmutasi)){
			$errorMsg = 'Please input nama_supplier';
		}elseif(empty($mutasiquantity)){
			$errorMsg = 'Please input alamat_supplier';
		}

		if(!isset($errorMsg)){
			$sql = "insert into history_barang(id_item , tanggal,stok, harga_jual )
					values('".$id."', '".$tanggalmutasi."', '".$mutasiquantity."', '".$hargajual."')";

			$sql3 = "insert into barang_toko(stok_barang, harga_jual, id_barang)
					values('".$quantity_toko."', '".$hargajual."', '".$_GET['id']."')";	

			$kueri = "SELECT id_barang, stok_barang, harga_jual FROM barang_toko WHERE id_barang = '".$_GET['id']."'";
			$data = mysqli_fetch_array(mysqli_query($koneksi, $kueri));
			
			$stok_tambah = $data['stok_barang'] + $mutasiquantity;
			

			$sql2 = "UPDATE barang_toko SET stok_barang = '".$stok_tambah."', harga_jual = '".$hargajual."' WHERE id_barang = '".$_GET['id']."'" ;
			

			$result = mysqli_query($conn, $sql);
			$result2 = mysqli_query($conn, $sql2);
			$result3 = mysqli_query($conn, $sql3);
			if($result && $result2 ){
                $quantityupdate = mysqli_query($koneksi,"UPDATE barang SET stok='$quantity' WHERE id_barang='$id' ");
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


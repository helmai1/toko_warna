<?php
	// include_once '../koneksi.php';
  require_once('../koneksi.php');
//   $upload_dir = '../uploads/';

  if (isset($_POST['Submit'])) {
        $id = $_GET['id'];
        $barang 	= mysqli_query($koneksi,"SELECT * FROM barang_toko WHERE id_barang='$id'");
        $databarang = mysqli_fetch_array($barang);
		$tanggalmutasi		= $_POST['tanggalmutasi'];
		$mutasiquantity		= $_POST['mutasiquantity'];
        $harga 				= $databarang['harga_jual'] * $mutasiquantity;
        $quantity = $databarang['stok_barang'] - $mutasiquantity;
		
		// var_dump($mutasiquantity, $harga, $quantity);
		var_dump($databarang);
	
    if(empty($tanggalmutasi)){
			$errorMsg = 'Please input tanggal';
		}elseif(empty($mutasiquantity)){
			$errorMsg = 'Please input quantitiy';
		}

		if(!isset($errorMsg)){
			$sql = "insert into history_toko(id_item , tanggal, jual, total_harga )
					values('".$id."', '".$tanggalmutasi."', '".$mutasiquantity."', '".$harga."')";

			// var_dump($sql);

			// $sql3 = "insert into barang_toko(stok_barang, harga_jual, id_barang)
			// 			values('".$quantity_toko."', '".$hargajual."', '".$id."')";	

			// $kueri = "SELECT id_toko, stok_barang, harga_jual FROM barang_toko WHERE id_toko = '".$_GET['id']."'";
			// $data = mysqli_fetch_array(mysqli_query($koneksi, $kueri));
			
			
			

			$result = mysqli_query($conn, $sql);
			// $result2 = mysqli_query($conn, $sql2);
			// $result3 = mysqli_query($conn, $sql3);
			if($result){
                $quantityupdate = mysqli_query($koneksi,"UPDATE barang_toko SET stok_barang='$quantity' WHERE id_barang='$id' ");
				$successMsg = 'New record added successfully';
				header('Location: admin-tampilan.php');
			}else if($quantity>=0){
				alert("Stok habis!");
				header('Location: toko-mutation.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		}
  }
?>


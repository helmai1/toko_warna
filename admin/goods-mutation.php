<?php
	require_once('../koneksi.php');

	$id_barang_gudang = $_GET['id'];
	$tanggal_mutasi = $_POST['tanggalmutasi'];
	$mutasi_quantity = $_POST['mutasiquantity'];
	$mutasi_harga = $_POST['mutasiharga'];
	
	$q1 = mysqli_query($conn, "SELECT * FROM barang_toko WHERE id_barang = '".$id_barang_gudang."'"); // query barang_toko
	$q2 = mysqli_query($conn, "SELECT stok FROM barang WHERE id_barang = '".$id_barang_gudang."'"); // query barang gudang
	
	$cek_barang_toko = mysqli_fetch_assoc($q1);
	$ambil_stok_barang_gudang = mysqli_fetch_assoc($q2);
	
	$hitung_sisa_stok = $ambil_stok_barang_gudang['stok'] - $mutasi_quantity;

	if (isset($_POST['submit'])) {
		if ($cek_barang_toko == NULL) {
			$insert_barang_toko = mysqli_query($conn, "INSERT INTO barang_toko VALUES(NULL, '".$mutasi_quantity."', '".$mutasi_harga."', '".$id_barang_gudang."') ");

			$update_stok_barang = mysqli_query($conn, "UPDATE barang SET stok = '".$hitung_sisa_stok."' WHERE id_barang = '".$id_barang_gudang."' ");
			
			echo "<script>alert('BERHASIL Menambah Barang!')</script>";
			header('Location: admin-tampilan.php');
		} else {
			$tambah_stok = $cek_barang_toko['stok_barang'] + $mutasi_quantity;

			$update_stok_toko = mysqli_query($conn, "UPDATE barang_toko SET stok_barang = '".$tambah_stok."', harga_jual = '".$mutasi_harga."' 
				WHERE id_barang = '".$id_barang_gudang."' ");

			$update_stok_barang = mysqli_query($conn, "UPDATE barang SET stok = '".$hitung_sisa_stok."' WHERE id_barang = '".$id_barang_gudang."' ");
		
			echo "<script>alert('BERHASIL Merubah Barang!')</script>";
			header('Location: admin-tampilan.php');
			
		}
	}	

?>
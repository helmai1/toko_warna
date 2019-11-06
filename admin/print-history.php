<?php
  include('../koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print History Barang</title>
</head>
<body>
    <!-- BASIC TABLE -->
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Tabel History Gudang</h3>
			</div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr><th>id</th><th>ID item</th><th>Kode Barang</th><th>Nama Barang</th><th>Tanggal</th><th>Stok</th></tr>
					</thead>
					<tbody>
					<?php
						$sql = "select * from history_barang a inner join barang s on a.id_item=s.id_barang ";
						$result = mysqli_query($conn, $sql);
								if(mysqli_num_rows($result)){
									while($row = mysqli_fetch_assoc($result)){
					?>
					<tr>
						<td><?php echo $row['id'] ?></td>
						<td><?php echo $row['id_item'] ?></td>
						<td><?php echo $row['kode_barang'] ?></td>
						<td><?php echo $row['nama_barang'] ?></td>
						<td><?php echo $row['tanggal'] ?></td>
						<td><?php echo $row['stok'] ?></td>
						
					</tr>
					<?php
						}
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
</body>
    <script>
		window.print();
	</script>
</html>

 
	

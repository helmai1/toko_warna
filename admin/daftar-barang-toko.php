<?php
  include('../koneksi.php');
  $upload_dir = '../uploads/';

  if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$sql = "select * from barang_toko where id_barang = ".$id;
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			$image = $row['image'];
			unlink($upload_dir.$image);
			$sql = "delete from barang_toko where id_barang =".$id;
			if(mysqli_query($conn, $sql)){
				header('location:daftar-toko.php');
			}
		}
	}
?>
<!doctype html>
<html lang="en">

<head>
	<title>Barang Toko</title><meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="../assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="../assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">
    
</head>

<body>
<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
 
	?>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="../assets/img/warna_logo2.png"  alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Search dashboard...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
					</div>
				</form>
				
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger">5</span>
							</a>
							<ul class="dropdown-menu notifications">
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
								<li><a href="#" class="more">See all notifications</a></li>
							</ul>


						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Basic Use</a></li>
								<li><a href="#">Working With Data</a></li>
								<li><a href="#">Security</a></li>
								<li><a href="#">Troubleshooting</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $_SESSION['username']; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="page-profile.html"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li><a href="../logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>

					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="admin-tampilan.php" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="daftar-karyawan.php" class="active"><i class="lnr lnr-user"></i> <span>Daftar Pengelola</span></a></li>
						<li><a href="daftar-supplier.php" class="active"><i class="lnr lnr-store"></i> <span>Daftar Supplier</span></a></li>
						<li><a href="daftar-barang.php" class="active"><i class="lnr lnr-cart"></i> <span>Barang Gudang</span></a></li>
						<li><a href="daftar-barang-toko.php" class="active"><i class="lnr lnr-cart"></i> <span>Barang Toko</span></a></li>
						<li><a href="history-barang.php" class="active"><i class="lnr lnr-bookmark"></i> <span>History Gudang</span></a></li>
						<li><a href="history-toko.php" class="active"><i class="lnr lnr-bookmark"></i> <span>History Toko</span></a></li>
						
					</ul>
				</nav>
			</div>
        </div>
		<!-- END LEFT SIDEBAR -->
		<div class="main">
		<!-- MAIN CONTENT -->
		<div class="main-content">
				<div class="container-fluid">
		<h3 class="page-title">Barang Gudang</h3>

		<div class="row">
			<div class="col-md-12">

			<!-- BASIC TABLE -->
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Tabel Barang</h3>
				</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr><th>id</th><th>Kode Barang</th><th>Gambar</th><th>Nama Barang</th><th>Stok</th><th>Harga Jual Barang</th><th></th></tr>
						</thead>
						<tbody>
						<?php
                            $sql = "select * from barang_toko a JOIN barang b ON a.id_barang=b.id_barang";
                            $result = mysqli_query($conn, $sql);
                    				if(mysqli_num_rows($result)){
                    					while($row = mysqli_fetch_assoc($result)){
                          ?>
                          <tr>   
						  	<td><?php echo $row['id_barang'] ?></td>                                             
                            <td><?php echo $row['kode_barang'] ?></td>
							<td><img src="<?php echo $upload_dir.$row['gambar'] ?>" height="40"></td>
                            <td><?php echo $row['nama_barang'] ?></td>
							<td><?php echo $row['stok'] ?></td>
							<td><?php echo $row['harga_jual'] ?></td>
                            <td class="text-center">
							  <a href="barang-edit.php?id=<?php echo $row['id_barang'] ?>" button type="button" class="btn btn-primary "><i class="fa fa-pencil" style="color: #fff"></i></a>
                              <a href="daftar-barang.php?delete=<?php echo $row['id_barang'] ?>" type="button" class="btn btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash" style="color: #fff"></i></a>
							  <a href="barang-mutasi.php?id=<?php echo $row['id_barang'] ?>" button type="button" class="btn btn-primary "><i class="fa fa-truck" style="color: #fff"></i></a>	
							</td>
                          </tr>
                          <?php
                              }
                            }
                          ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- END BASIC TABLE -->

		</div>
		</div>
		
	</div>
	

				</div>
			</div>
			<!-- END MAIN CONTENT -->
	
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="../assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="../assets/scripts/klorofil-common.js"></script>
	
</body>

</html>

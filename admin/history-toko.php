<?php
  include('../koneksi.php');
  $upload_dir = '../uploads/';

  if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$sql = "select * from history_toko where id = ".$id;
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			$sql = "delete from history_toko where id=".$id;
			if(mysqli_query($conn, $sql)){
				header('location:history-toko.php');
			}
		}
	}
?>

<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title><meta charset="utf-8">
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
		<!-- MAIN -->
		<div class="main">

<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid">
		<h3 class="page-title">History Barang</h3>
		<div class="row">
			<div class="col-md-3">
				<a href="print-history-toko.php" target="_BLANK" button type="button" class="btn btn-primary ">Print History</a></div>
			</div>
		</div>

		<div class="row">
		<div class="col-md-12">

		<!-- BASIC TABLE -->
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Tabel History Barang Toko</h3>
			</div>
			
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr><th>id</th><th>ID item</th><th>Kode Barang</th><th>Nama Barang</th><th>Tanggal</th><th>Terjual</th><th>Total Harga</th></tr>
					</thead>
					<tbody>
					<?php
						$sql = "select * from history_toko a inner join barang s on a.id_item=s.id_barang";
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
						<td><?php echo $row['jual'] ?></td>
                        <td><?php echo $row['total_harga'] ?></td>
						
					</tr>
					<?php
						}
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
	
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="../assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="../assets/scripts/klorofil-common.js"></script>
	<script>
	$(function() {
		var data, options;

		// headline charts
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[23, 29, 24, 40, 25, 24, 35],
				[14, 25, 18, 34, 29, 38, 44],
			]
		};

		options = {
			height: 300,
			showArea: true,
			showLine: false,
			showPoint: false,
			fullWidth: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
		};

		new Chartist.Line('#headline-chart', data, options);


		// visits trend charts
		data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [{
				name: 'series-real',
				data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
			}, {
				name: 'series-projection',
				data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
			}]
		};

		options = {
			fullWidth: true,
			lineSmooth: false,
			height: "270px",
			low: 0,
			high: 'auto',
			series: {
				'series-projection': {
					showArea: true,
					showPoint: false,
					showLine: false
				},
			},
			axisX: {
				showGrid: false,

			},
			axisY: {
				showGrid: false,
				onlyInteger: true,
				offset: 0,
			},
			chartPadding: {
				left: 20,
				right: 20
			}
		};

		new Chartist.Line('#visits-trends-chart', data, options);


		// visits chart
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[6384, 6342, 5437, 2764, 3958, 5068, 7654]
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#visits-chart', data, options);


		// real-time pie chart
		var sysLoad = $('#system-load').easyPieChart({
			size: 130,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245, 0.8)',
			scaleColor: false,
			lineWidth: 5,
			lineCap: "square",
			animate: 800
		});

		var updateInterval = 3000; // in milliseconds

		setInterval(function() {
			var randomVal;
			randomVal = getRandomInt(0, 100);

			sysLoad.data('easyPieChart').update(randomVal);
			sysLoad.find('.percent').text(randomVal);
		}, updateInterval);

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

	});
	</script>
</body>

</html>

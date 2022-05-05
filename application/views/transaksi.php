<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<?php $data['title'] = "AdminLTE 3 | Tabel Transaksi"; ?>
<?php $this->load->view("components/header.php", $data) ?>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<!-- Navbar -->
		<?php $this->load->view("components/navbar.php") ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php $this->load->view("components/sidebar.php") ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Database Penjualan</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Database Penjualan</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Tabel Transaksi</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Id</th>
												<th>Nama Barang</th>
												<th>Harga</th>
												<th>Nama pembeli</th>
												<th>Tanggal</th>
												<th>Keterangan</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($transaksi['Data'] as $m) { 
												$id_transaksi = $m['p_id_transaksi'];
												$nama_barang = $m['p_nama_barang'];
												$harga = $m['p_harga'];
												$nama_pembeli = $m['p_nama_pembeli'];
												$tanggal = $m['p_tanggal'];
												$keterangan = $m['p_keterangan'];
											?>
												<tr>
													<td><?=$id_transaksi?></td>
													<td><?=$nama_barang?></td>
													<td><?=$harga?></td>
													<td><?=$nama_pembeli?></td>
													<td><?=$tanggal?></td>
													<td><?=$keterangan?></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<?php $this->load->view("components/footer.php") ?>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->
	<?php $this->load->view("components/js.php") ?>

</body>

</html>

<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<?php $data['title'] = "AdminLTE 3 | Tabel Pembeli"; ?>
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
									<h3 class="card-title">Tabel Pembeli</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Id</th>
												<th>Nama</th>
												<th>Jenis Kelamin</th>
												<th>No telpon</th>
												<th>Alamat</th>
												<th>Foto</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($pembeli['Data'] as $m) { 
												$id_pembeli = $m['p_id_pembeli'];
												$nama_pembeli = $m['p_nama_pembeli'];
												$jk = $m['p_jk'];
												$no_telp = $m['p_no_telp'];
												$alamat = $m['p_alamat'];
												$foto = $m['p_foto'];
											?>
												<tr>
													<td><?=$id_pembeli?></td>
													<td><?=$nama_pembeli?></td>
													<td><?=$jk?></td>
													<td><?=$no_telp?></td>
													<td><?=$alamat?></td>
													<td><?=$foto?></td>
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

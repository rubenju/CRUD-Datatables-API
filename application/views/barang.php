<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<?php $data['title'] = "AdminLTE 3 | Tabel Barang"; ?>
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
									<h3 class="card-title">Tabel Barang</h3>
									<div class="text-right">
										<a type="button" class="btn btn-primary" href="<?= base_url(); ?>Barang/laporan_pdf">
											Cetak Laporan
											<i class="fas fa-print"></i>
										</a>
										<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
											Tambah Data Barang
											<i class="fas fa-plus"></i>
										</a>
									</div>
								</div>
								
								<!-- /.card-header -->
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Id</th>
												<th>Nama</th>
												<th>Harga</th>
												<th>Stok</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($barang['Data'] as $m) {
												$id_barang = $m['p_id_barang'];
												$nama_barang = $m['p_nama_barang'];
												$harga = $m['p_harga'];
												$stok = $m['p_stok'];
											?>
												<tr>
													<td><?= $id_barang ?></td>
													<td><?= $nama_barang ?></td>
													<td><?= $harga ?></td>
													<td><?= $stok ?></td>
													<td class="text-center">
														<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#update<?= $id_barang ?>">
															<i class="fas fa-edit"></i>
														</a>
														<a type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $id_barang ?>">
															<i class="fas fa-trash"></i>
														</a>
													</td>
												</tr>
										</tbody>
										<!-- Edit Data Modal -->
										<div class="modal fade" id="update<?= $id_barang ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Edit data barang</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<form action="<?= base_url() ?>Barang/edit_barang/<?= $id_barang ?>" method="POST" enctype="multipart/form-data">
															<div class="form-group">
																<label for="nama_barang">Nama barang</label>
																<input type="text" class="form-control" id="nama_barang" name="nama_barang" aria-describedby="nama_barang" value="<?= $nama_barang ?>">
															</div>
															<div class="form-group">
																<label for="harga">Harga barang</label>
																<input type="text" class="form-control" id="harga" name="harga" aria-describedby="harga" value="<?= $harga ?>">
															</div>
															<div class="form-group">
																<label for="stok">Stok barang</label>
																<input type="text" class="form-control" id="stok" name="stok" aria-describedby="stok" value="<?= $stok ?>">
															</div>
															<button type="submit" class="btn btn-primary">Edit</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										
										<!-- Delete Data Modal -->
										<div class="modal fade" id="delete<?= $id_barang ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Hapus data barang</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<form action="<?= base_url() ?>Barang/delete_barang/<?= $id_barang ?>" method="POST" enctype="multipart/form-data">
															<div class="row">
																<div class="col-md-12">
																	<input type="hidden" class="form-control" id="id_barang" name="id_barang" aria-describedby="id_barang">
																	<p>Apakah Anda yakin untuk menghapus data ini?</p>
																</div>
															</div>
															<div class="modal-footer">
																<button type="submit" class="btn btn-primary ripple save-category">Ya</button>
																<button type="button" class="btn btn-danger ripple" data-dismiss="modal">Tidak</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
									</table>

									<!-- Create Data Modal -->
									<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Tambah data barang</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form action="<?= base_url() ?>Barang/insert_barang" method="POST" enctype="multipart/form-data">
														<div class="form-group">
															<label for="nama_barang">Nama barang</label>
															<input type="text" class="form-control" id="nama_barang" name="nama_barang" aria-describedby="nama_barang" required>
														</div>
														<div class="form-group">
															<label for="harga">Harga barang</label>
															<input type="text" class="form-control" id="harga" name="harga" aria-describedby="harga" required>
														</div>
														<div class="form-group">
															<label for="stok">Stok barang</label>
															<input type="text" class="form-control" id="stok" name="stok" aria-describedby="stok" required>
														</div>
														<button type="submit" class="btn btn-primary">Submit</button>
													</form>
												</div>
											</div>
										</div>
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
	
	<?php if ($this->session->flashdata('error_get_data')) { ?>
		<script>
			Swal.fire({
				title: "Error",
				text: "Data Gagal Dimuat!",
				icon: "error"
			});
		</script>
	<?php } ?>
	<?php if ($this->session->flashdata('success_input')) { ?>
		<script>
			Swal.fire({
				title: "Success",
				text: "Data Berhasil Ditambahkan!",
				icon: "success"
			});
		</script>
	<?php } ?>
	<?php if ($this->session->flashdata('error_input')) { ?>
		<script>
			Swal.fire({
				title: "Error",
				text: "Data Gagal Ditambahkan!",
				icon: "error"
			});
		</script>
	<?php } ?>
	<?php if ($this->session->flashdata('success_edit')) { ?>
		<script>
			Swal.fire({
				title: "Success",
				text: "Data Berhasil Diubah!",
				icon: "success"
			});
		</script>
	<?php } ?>
	<?php if ($this->session->flashdata('error_edit')) { ?>
		<script>
			Swal.fire({
				title: "Error",
				text: "Data Gagal Diubah!",
				icon: "error"
			});
		</script>
	<?php } ?>
	<?php if ($this->session->flashdata('success_delete')) { ?>
		<script>
			Swal.fire({
				title: "Success",
				text: "Data Berhasil Dihapus!",
				icon: "success"
			});
		</script>
	<?php } ?>
	<?php if ($this->session->flashdata('error_delete')) { ?>
		<script>
			Swal.fire({
				title: "Error",
				text: "Data Gagal Dihapus!",
				icon: "error"
			});
		</script>
	<?php } ?>
	<?php if ($this->session->flashdata('error_file_foto')) { ?>
		<script>
			Swal.fire({
				title: "Error",
				text: "Data Foto Gagal Ditambahkan!",
				icon: "error"
			});
		</script>
	<?php } ?>
	
</body>

</html>

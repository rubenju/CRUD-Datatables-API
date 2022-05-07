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
									<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#create">
										Tambah Data Transaksi
										<i class="fas fa-plus"></i>
									</button>
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
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($transaksi['Data'] as $m) {
												$id_transaksi = $m['p_id_transaksi'];
												$nama_barang = $m['p_nama_barang'];
												$harga = $m['p_harga'];
												$nama_pembeli = $m['p_nama_pembeli'];
												$tanggal = $m['p_tanggal'];
												$keterangan = $m['p_keterangan'];
											?>
												<tr>
													<td><?= $id_transaksi ?></td>
													<td><?= $nama_barang ?></td>
													<td><?= $harga ?></td>
													<td><?= $nama_pembeli ?></td>
													<td><?= $tanggal ?></td>
													<td><?= $keterangan ?></td>
													<td class="text-center">
														<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#update<?= $id_transaksi ?>">
															<i class="fas fa-edit"></i>
														</a>
														<a type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $id_transaksi ?>">
															<i class="fas fa-trash"></i>
														</a>
													</td>
												</tr>
										</tbody>
										<!-- Edit Data Modal -->
										<div class="modal fade" id="update<?= $id_transaksi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Edit data transaksi</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<form form action="<?= base_url() ?>Transaksi/edit_transaksi/<?= $id_transaksi ?>" method="POST" enctype="multipart/form-data">
															<div class="form-group">
																<label for="id_barang">Nama barang</label>
																<select class="form-control" name="id_barang" id="id_barang">
																	<?php foreach ($barang['Data'] as $b) { ?>
																		<?php if ($nama_barang == $b["p_nama_barang"]) { ?>
																			<option value="<?= $b["p_id_barang"] ?>" selected><?= $b["p_nama_barang"] ?></option>
																			<?php continue; ?>
																		<?php } ?>
																		<option value="<?= $b["p_id_barang"] ?>"><?= $b["p_nama_barang"] ?></option>
																	<?php } ?>
																</select>
															</div>
															<div class="form-group">
																<label for="id_pembeli">Nama pembeli</label>
																<select class="form-control" name="id_pembeli" id="id_pembeli">
																	<?php foreach ($pembeli['Data'] as $b) { ?>
																		<?php if ($nama_pembeli == $b["p_nama_pembeli"]) { ?>
																			<option value="<?= $b["p_id_pembeli"] ?>" selected><?= $b["p_nama_pembeli"] ?></option>
																			<?php continue; ?>
																		<?php } ?>
																		<option value="<?= $b["p_id_pembeli"] ?>"><?= $b["p_nama_pembeli"] ?></option>
																	<?php } ?>
																</select>
															</div>
															<div class="form-group">
																<label for="tanggal">Tanggal</label>
																<input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="tanggal" value="<?= $tanggal ?>">
															</div>
															<div class="form-group">
																<label for="keterangan">Keterangan</label>
																<input type="text" class="form-control" id="keterangan" name="keterangan" aria-describedby="keterangan" value="<?= $keterangan ?>">
															</div>
															<button type="submit" class="btn btn-primary">Edit</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!-- Delete Data Modal -->
										<div class="modal fade" id="delete<?= $id_transaksi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Hapus data transaksi</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<form form action="<?= base_url() ?>Transaksi/delete_transaksi/<?= $id_transaksi ?>" method="POST" enctype="multipart/form-data">
															<div class="row">
																<div class="col-md-12">
																	<input type="hidden" class="form-control" id="id_transaksi" name="id_transaksi" aria-describedby="id_transaksi">
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
													<h5 class="modal-title" id="exampleModalLabel">Tambah data transaksi</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form form action="<?= base_url() ?>Transaksi/insert_transaksi" method="POST" enctype="multipart/form-data">
														<div class="form-group">
															<label for="id_barang">Nama barang</label>
															<select class="form-control" name="id_barang" id="id_barang">
																<?php foreach ($barang['Data'] as $b) { 
																	$id_barangg = $b['p_id_barang'];
																	$nama_barangg = $b['p_nama_barang'];
																?>
																	<option value="<?= $id_barangg ?>"><?= $nama_barangg ?></option>
																<?php } ?>
															</select>
														</div>
														<div class="form-group">
															<label for="id_pembeli">Nama pembeli</label>
															<select class="form-control" name="id_pembeli" id="id_pembeli">
																<?php foreach ($pembeli['Data'] as $p) { 
																	$id_pembelii = $p['p_id_pembeli'];
																	$nama_pembelii = $p['p_nama_pembeli'];
																?>
																	<option value="<?= $id_pembelii ?>"><?= $nama_pembelii ?></option>
																<?php } ?>
															</select>
														</div>
														<div class="form-group">
															<label for="tanggal">Tanggal</label>
															<input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="tanggal">
														</div>
														<div class="form-group">
															<label for="keterangan">Keterangan</label>
															<input type="text" class="form-control" id="keterangan" name="keterangan" aria-describedby="keterangan">
														</div>
														<button type="submit" class="btn btn-primary">Submit</button>
													</form>
												</div>
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

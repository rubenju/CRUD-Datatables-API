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
									<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#create">
										Tambah Data Pembeli
										<i class="fas fa-plus"></i>
									</button>
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
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($pembeli['Data'] as $m) {
												$id_pembeli = $m['p_id_pembeli'];
												$nama_pembeli = $m['p_nama_pembeli'];
												$jk = $m['p_jk'];
												$no_telp = $m['p_no_telp'];
												$alamat = $m['p_alamat'];
												$foto = $m['p_foto'];
											?>
												<tr>
													<td><?= $id_pembeli ?></td>
													<td><?= $nama_pembeli ?></td>
													<td><?= $jk ?></td>
													<td><?= $no_telp ?></td>
													<td><?= $alamat ?></td>
													<td class="text-center">
														<a href="<?= base_url(); ?>assets/foto/<?php echo $foto ?>" target="_blank">
															<img src="<?= base_url(); ?>assets/foto/<?php echo $foto ?>" alt="foto-pembeli" style="width: 50%">
														</a>
													</td>
													<td class="text-center">
														<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#update<?= $id_pembeli ?>">
															<i class="fas fa-edit"></i>
														</a>
														<a type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $id_pembeli ?>">
															<i class="fas fa-trash"></i>
														</a>
													</td>
												</tr>
										</tbody>
										<!-- Edit Data Modal -->
										<div class="modal fade" id="update<?= $id_pembeli ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Edit data pembeli</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<form action="<?= base_url() ?>Pembeli/edit_pembeli/<?= $id_pembeli ?>" method="POST" enctype="multipart/form-data">
															<div class="form-group">
																<label for="nama_pembeli">Nama pembeli</label>
																<input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" aria-describedby="nama_pembeli" value="<?= $nama_pembeli ?>">
															</div>
															<div class="form-group">
																<label for="jk">Jenis kelamin</label>
																<input type="text" class="form-control" id="jk" name="jk" aria-describedby="jk" value="<?= $jk ?>">
															</div>
															<div class="form-group">
																<label for="no_telp">No telpon</label>
																<input type="text" class="form-control" id="no_telp" name="no_telp" aria-describedby="no_telp" value="<?= $no_telp ?>">
															</div>
															<div class="form-group">
																<label for="alamat">Alamat</label>
																<input type="text" class="form-control" id="alamat" name="alamat" aria-describedby="alamat" value="<?= $alamat ?>">
															</div>
															<div class="form-group">
																<label for="foto">File foto</label>
																<input type="file" class="form-control" id="foto" name="foto" aria-describedby="foto" value="<?= $foto ?>">
																<input type="text" class="form-control" id="foto_old" name="foto_old" aria-describedby="foto_old" value="<?= $foto ?>" hidden>
															</div>
															<button type="submit" class="btn btn-primary">Edit</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!-- Delete Data Modal -->
										<div class="modal fade" id="delete<?= $id_pembeli ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Hapus data pembeli</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<form action="<?= base_url() ?>Pembeli/delete_pembeli/<?= $id_pembeli ?>" method="POST" enctype="multipart/form-data">
															<div class="row">
																<div class="col-md-12">
																	<input type="text" class="form-control" id="foto" name="foto" aria-describedby="foto" value="<?= $foto ?>" hidden>
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
													<h5 class="modal-title" id="exampleModalLabel">Tambah data pembeli</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form action="<?= base_url() ?>Pembeli/insert_pembeli" method="POST" enctype="multipart/form-data">
														<div class="form-group">
															<label for="nama_pembeli">Nama pembeli</label>
															<input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" aria-describedby="nama_pembeli">
														</div>
														<div class="form-group">
															<label for="jk">Jenis kelamin</label>
															<input type="text" class="form-control" id="jk" name="jk" aria-describedby="jk">
														</div>
														<div class="form-group">
															<label for="no_telp">No telpon</label>
															<input type="text" class="form-control" id="no_telp" name="no_telp" aria-describedby="no_telp">
														</div>
														<div class="form-group">
															<label for="alamat">Alamat</label>
															<input type="text" class="form-control" id="alamat" name="alamat" aria-describedby="alamat">
														</div>
														<div class="form-group">
															<label for="foto">File foto</label>
															<input type="file" class="form-control" id="foto" name="foto" aria-describedby="foto">
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

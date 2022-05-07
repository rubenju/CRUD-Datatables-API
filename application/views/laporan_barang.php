<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		* {
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
		}

		body {
			font-family: Helvetica;
			-webkit-font-smoothing: antialiased;
		}

		h2 {
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
			letter-spacing: 1px;
			color: black;
			padding: 30px 0;
		}

		/* Table Styles */

		.table-wrapper {
			margin: 10px;
			box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
		}

		.fl-table {
			border-radius: 5px;
			font-size: 12px;
			font-weight: normal;
			border: none;
			border-collapse: collapse;
			width: 100%;
			max-width: 100%;
			white-space: nowrap;
			background-color: white;
		}

		.fl-table td,
		.fl-table th {
			text-align: center;
			padding: 8px;
			border: 1px solid #f8f8f8;
		}

		.fl-table thead th {
			color: #ffffff;
			background: #ff6666;
		}

		.fl-table tr:nth-child(even) {
			background: #F8F8F8;
		}
	</style>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<h2>Laporan Data Barang</h2>
	<div class="table-wrapper">
		<table class="fl-table">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nama</th>
					<th>Harga</th>
					<th>Stok</th>
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
					</tr>
			</tbody>
				<?php } ?>
		</table>
	</div>
</body>

</html>

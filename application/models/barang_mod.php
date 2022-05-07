<?php
class barang_mod extends CI_Model {
	
	public function http_request_get() {
		$curl = curl_init();
		$url = API_URL_LOCAL . "/barang";
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($curl);
		curl_close($curl);
		return json_decode($result, TRUE);
	}

	public function http_request_post($data) {
		$curl = curl_init();
		$url = API_URL_LOCAL . "/barang";
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($curl);
		curl_close($curl);
		return json_decode($result, TRUE);
	}
	
	public function http_request_put($id_barang, $data) {
		$curl = curl_init();
		$url = API_URL_LOCAL . "/barang" . "/" . $id_barang;
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($curl);
		curl_close($curl);
		return json_decode($result, TRUE);
	}

	public function http_request_delete($id_barang) {
		$curl = curl_init();
		$url = API_URL_LOCAL . "/barang" . "/" . $id_barang;
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($curl);
		curl_close($curl);
		return json_decode($result, TRUE);
	}

	public function set_data_barang($nama_barang, $harga, $stok) {
		$data = [
			'nama_barang' => $nama_barang, 
			'harga' => $harga, 
			'stok' => $stok,
		];

		return $data;
	}
}

<?php
class transaksi_mod extends CI_Model {
	
	public function http_request_get() {
		$curl = curl_init();
		$url = API_URL_LOCAL . "/transaksi_join";
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($curl);
		curl_close($curl);
		return json_decode($result, TRUE);
	}
	
	public function http_request_post($data) {
		$curl = curl_init();
		$url = API_URL_LOCAL . "/transaksi";
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($curl);
		curl_close($curl);
		return json_decode($result, TRUE);
	}
	
	public function http_request_put($id_transaksi, $data) {
		$curl = curl_init();
		$url = API_URL_LOCAL . "/transaksi" . "/" . $id_transaksi;
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($curl);
		curl_close($curl);
		return json_decode($result, TRUE);
	}

	public function http_request_delete($id_transaksi) {
		$curl = curl_init();
		$url = API_URL_LOCAL . "/transaksi" . "/" . $id_transaksi;
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($curl);
		curl_close($curl);
		return json_decode($result, TRUE);
	}

	public function set_data_transaksi($id_barang, $id_pembeli, $tanggal, $keterangan) {
		$data = [
			'id_barang' => $id_barang, 
			'id_pembeli' => $id_pembeli, 
			'tanggal' => $tanggal, 
			'keterangan' => $keterangan
		];

		return $data;
	}
}

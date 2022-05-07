<?php
class pembeli_mod extends CI_Model {
	
	public function http_request_get() {
		$curl = curl_init();
		$url = API_URL_LOCAL . "/pembeli";
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($curl);
		curl_close($curl);
		return json_decode($result, TRUE);
	}

	public function http_request_post($data) {
		$curl = curl_init();
		$url = API_URL_LOCAL . "/pembeli";
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($curl);
		curl_close($curl);
		return json_decode($result, TRUE);
	}

	public function http_request_put($id_pembeli, $data) {
		$curl = curl_init();
		$url = API_URL_LOCAL . "/pembeli" . "/" . $id_pembeli;
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($curl);
		curl_close($curl);
		return json_decode($result, TRUE);
	}

	public function http_request_delete($id_pembeli) {
		$curl = curl_init();
		$url = API_URL_LOCAL . "/pembeli" . "/" . $id_pembeli;
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($curl);
		curl_close($curl);
		return json_decode($result, TRUE);
	}

	public function set_data_pembeli($nama_pembeli, $jk, $no_telp, $alamat, $foto) {
		$data = [
			'nama_pembeli' => $nama_pembeli, 
			'jk' => $jk, 
			'no_telp' => $no_telp,
			'alamat' => $alamat,
			'foto' => $foto
		];

		return $data;
	}
}

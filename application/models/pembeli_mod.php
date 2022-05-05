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
	
	public function get_data_barang() {
		return $this->http_request_get();
	}
}

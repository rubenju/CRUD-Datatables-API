<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("barang_mod");
	}


	public function view_barang()
	{
		$data["barang"] = $this->barang_mod->http_request_get();

		if($data["barang"]["Data"] == null) {
			$data["barang"]["Data"] = [];
		} else {
			if($data["barang"]["Pesan"] == "Data barang berhasil dibaca") {
				$data["barang"]["Data"] == $data["barang"]["Data"];
			} else {
				$data["barang"]["Data"] = [];
			}
		}
		$this->load->view('barang', $data);
	}
}

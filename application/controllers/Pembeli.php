<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembeli extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("pembeli_mod");
	}


	public function view_pembeli()
	{
		$data["pembeli"] = $this->pembeli_mod->http_request_get();

		if($data["pembeli"]["Data"] == null) {
			$data["pembeli"]["Data"] = [];
		} else {
			if($data["pembeli"]["Pesan"] == "Data pembeli berhasil dibaca") {
				$data["pembeli"]["Data"] == $data["pembeli"]["Data"];
			} else {
				$data["pembeli"]["Data"] = [];
			}
		}
		$this->load->view('pembeli', $data);
	}
}

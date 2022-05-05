<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("transaksi_mod");
	}


	public function view_transaksi()
	{
		$data["transaksi"] = $this->transaksi_mod->http_request_get();

		if($data["transaksi"]["Data"] == null) {
			$data["transaksi"]["Data"] = [];
		} else {
			if($data["transaksi"]["Pesan"] == "Data transaksi berhasil dibaca") {
				$data["transaksi"]["Data"] == $data["transaksi"]["Data"];
			} else {
				$data["transaksi"]["Data"] = [];
			}
		}
		$this->load->view('transaksi', $data);
	}
}

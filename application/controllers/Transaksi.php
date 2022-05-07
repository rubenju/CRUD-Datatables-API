<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("transaksi_mod");
		$this->load->model("barang_mod");
		$this->load->model("pembeli_mod");
	}

	public function view_transaksi()
	{
		$data["transaksi"] = $this->transaksi_mod->http_request_get();
		$data["barang"] = $this->barang_mod->http_request_get();
		$data["pembeli"] = $this->pembeli_mod->http_request_get();

		if($data["transaksi"]["Data"] == null) {
			$data["transaksi"]["Data"] = [];
		} else {
			if($data["transaksi"]["Pesan"] == "Data transaksi berhasil dibaca") {
				$data["transaksi"]["Data"] = $data["transaksi"]["Data"];
				$data["barang"]["Data"] = $data["barang"]["Data"];
				$data["pembeli"]["Data"] = $data["pembeli"]["Data"];
			} else {
				$data["transaksi"]["Data"] = [];
				$data["barang"]["Data"] = [];
				$data["pembeli"]["Data"] = [];
			}
		}
		$this->load->view('transaksi', $data);
	}

	public function insert_transaksi()
	{
		$id_barang = $this->input->post("id_barang");
		$id_pembeli = $this->input->post("id_pembeli");
		$tanggal = $this->input->post("tanggal");
		$keterangan = $this->input->post("keterangan");

		$data = $this->transaksi_mod->set_data_transaksi($id_barang, $id_pembeli, $tanggal, $keterangan);
		$hasil= $this->transaksi_mod->http_request_post($data);

		if($hasil==false) {
			$this->session->set_flashdata('error_input', 'error_input');
		} else {
			$this->session->set_flashdata('success_input', 'success_input');
		}

		redirect("Transaksi/view_transaksi");
	}

	public function edit_transaksi($id_transaksi)
	{
		$id_barang = $this->input->post("id_barang");
		$id_pembeli = $this->input->post("id_pembeli");
		$tanggal = $this->input->post("tanggal");
		$keterangan = $this->input->post("keterangan");

		$data = $this->transaksi_mod->set_data_transaksi($id_barang, $id_pembeli, $tanggal, $keterangan);
		$hasil= $this->transaksi_mod->http_request_put($id_transaksi, $data);

		if($hasil==false) {
			$this->session->set_flashdata('error_edit', 'error_edit');
		} else {
			$this->session->set_flashdata('success_edit', 'success_edit');
		}

		redirect("Transaksi/view_transaksi");
	}

	public function delete_transaksi($id_transaksi)
	{
		$hasil= $this->transaksi_mod->http_request_delete($id_transaksi);

		if($hasil==false) {
			$this->session->set_flashdata('error_delete', 'error_delete');
		} else {
			$this->session->set_flashdata('success_delete', 'success_delete');
		}

		redirect("Transaksi/view_transaksi");
	}
}

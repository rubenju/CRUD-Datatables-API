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
			$this->session->set_flashdata('error_get_data', 'error_get_data');
		} else {
			if($data["barang"]["Pesan"] == "Data barang berhasil dibaca") {
				$data["barang"]["Data"] = $data["barang"]["Data"];
			} else {
				$data["barang"]["Data"] = [];
			}
		}
		$this->load->view('barang', $data);
	}

	public function insert_barang()
	{
		$nama_barang = $this->input->post("nama_barang");
		$harga = $this->input->post("harga");
		$stok = $this->input->post("stok");

		$data = $this->barang_mod->set_data_barang($nama_barang, $harga, $stok);
		$hasil= $this->barang_mod->http_request_post($data);

		if($hasil==false) {
			$this->session->set_flashdata('error_input', 'error_input');
		} else {
			$this->session->set_flashdata('success_input', 'success_input');
		}

		redirect("Barang/view_barang");
	}

	public function edit_barang($id_barang)
	{
		$nama_barang = $this->input->post("nama_barang");
		$harga = $this->input->post("harga");
		$stok = $this->input->post("stok");

		$data = $this->barang_mod->set_data_barang($nama_barang, $harga, $stok);
		var_dump($data);
		$hasil= $this->barang_mod->http_request_put($id_barang, $data);

		if($hasil==false) {
			$this->session->set_flashdata('error_edit', 'error_edit');
		} else {
			$this->session->set_flashdata('success_edit', 'success_edit');
		}

		redirect("Barang/view_barang");
	}

	public function delete_barang($id_barang)
	{
		$hasil= $this->barang_mod->http_request_delete($id_barang);

		if($hasil==false) {
			$this->session->set_flashdata('error_delete', 'error_delete');
		} else {
			$this->session->set_flashdata('success_delete', 'success_delete');
		}

		redirect("Barang/view_barang");
	}

	public function laporan_pdf()
	{
		$data["barang"] = $this->barang_mod->http_request_get();

		if($data["barang"]["Data"] == null) {
			$data["barang"]["Data"] = [];
			$this->session->set_flashdata('error_get_data', 'error_get_data');
		} else {
			if($data["barang"]["Pesan"] == "Data barang berhasil dibaca") {
				$data["barang"]["Data"] = $data["barang"]["Data"];
			} else {
				$data["barang"]["Data"] = [];
			}
		}
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'portrait');
		$this->pdf->filename = "Laporan data barang";
		$this->pdf->load_view('laporan_barang', $data);
	}

}

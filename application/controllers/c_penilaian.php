<?php

class c_penilaian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_penilaian', 'penilaian');
	}

	public function index()
	{
		$data['rating_paket'] = $this->penilaian->tampil_paket_wisata('paket_wisata')->result_array();
		$data['durasi'] = $this->penilaian->getDurasi('subkriteria')->result_array();
		$data['usia'] = $this->penilaian->getUsia('subkriteria')->result_array();
		$data['harga_paket'] = $this->penilaian->getHargaPaket('subkriteria')->result_array();
		$data['nilai'] = $this->penilaian->tampil_penilaian()->result();

		$data['title'] = 'Penilaian Alternatif';
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('v_saw/penilaian', $data);
		$this->load->view('templates/admin/footer');
	}

	public function tambah_aksi()
	{
		$data = array(
			'id_paket_wisata'	=> $this->input->post('id_paket_wisata'),
			'C1'		=> $this->input->post('C1'),
			'C2'		=> $this->input->post('C2'),
			'C3'		=> $this->input->post('C3')

		);

		$this->penilaian->tambah_data_db($data);
		$this->session->set_flashdata('message', ' berhasil ditambahkan!');
		redirect('c_penilaian');
	}

	// public function hapus($id_nilai)
	// {

	// 	$this->penilaian->hapus_data($id_nilai);
	// 	$this->session->set_flashdata('message', 'berhasil dihapus!');
	// 	redirect('c_penilaian');
	// }

	public function edit($id_nilai)
	{
		$data['paket_wisata'] = $this->penilaian->tampil_paket_wisata('paket_wisata')->result();
		$data['durasi'] = $this->penilaian->getDurasi('subkriteria')->result();
		$data['rating'] = $this->penilaian->getRating('subkriteria')->result();
		$data['harga_paket'] = $this->penilaian->getHargaPaket('subkriteria')->result();

		$where = array('id_nilai' => $id_nilai);
		$data['nilai'] = $this->penilaian->edit($where, 'nilai')->result();

		$data['title'] = 'Edit Penilaian';
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('v_saw/penilaian_edit', $data);
		$this->load->view('templates/admin/footer');
	}

	public function edit_aksi()
	{
		$id_nilai	= $this->input->post('id_nilai');
		$id_paket_wisata	= $this->input->post('id_paket_wisata');
		$C1			= $this->input->post('C1');
		$C2			= $this->input->post('C2');
		$C3			= $this->input->post('C3');

		$data = array(

			'id_nilai'	=> $id_nilai,
			'id_paket_wisata'	=> $id_paket_wisata,
			'C1'		=> $C1,
			'C2'		=> $C2,
			'C3'		=> $C3

		);

		$where	=	array('id_nilai' => $id_nilai);

		$this->penilaian->update_data($where, $data, 'nilai');
		$this->session->set_flashdata('message', ' berhasil diedit!');
		redirect('c_penilaian');
	}
}

<?php

class c_perangkingan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_penilaian','penilaian');
	}

	public function index()
	{

		$data['nilai'] = $this->penilaian->tampil_penilaian()->result();
		$data['rating'] = $this->penilaian->tampil_rating()->result_array();
		/*Ambil model nilai max*/
		$data['c1max'] = $this->penilaian->get_maxC1();
		$data['c2max'] = $this->penilaian->get_maxC2();
		$data['c3max'] = $this->penilaian->get_maxC3();

		$data['bobotc1'] = $this->penilaian->get_bobotc1();
		$data['bobotc2'] = $this->penilaian->get_bobotc2();
		$data['bobotc3'] = $this->penilaian->get_bobotc3();

		$data['title'] = 'Proses SPK';
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('v_saw/perangkingan', $data);
		$this->load->view('templates/admin/footer');
	}

}
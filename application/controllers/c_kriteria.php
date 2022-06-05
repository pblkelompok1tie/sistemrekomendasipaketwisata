<?php

class c_kriteria extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kriteria', 'kriteria');
		$this->load->model('m_subkriteria', 'subkriteria');
	}

	public function index()
	{
		$data['kriteria']	= $this->kriteria->tampil_data()->result();
		$data['subkriteria']	= $this->subkriteria->tampil_data()->result();
		$data['title'] = 'Data Kriteria';
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('v_saw/kriteria', $data);
		$this->load->view('templates/admin/footer');
	}


	public function tambah_aksi()
	{
		$data = array(

			'kd_kriteria'	=> $this->input->post('kd_kriteria'),
			'ket'			=> $this->input->post('ket'),
			'bobot'			=> $this->input->post('bobot'),
			'attribut'		=> $this->input->post('attribut')

		);

		$this->kriteria->tambah_data($data);
		$this->session->set_flashdata('message', '');
		redirect('c_kriteria');
	}

	public function edit($kd_kriteria)
	{
		$where = array('kd_kriteria' => $kd_kriteria);
		$data['kriteria'] = $this->kriteria->edit_data($where, 'kriteria')->result();

		$this->form_validation->set_rules('kd_kriteria', 'Kd', 'required');
		$this->form_validation->set_rules('ket', 'Keterangan', 'required');
		$this->form_validation->set_rules('bobot', 'Bobot', 'required');
		$this->form_validation->set_rules('attribut', 'Atribut', 'required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Edit Kriteria';
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/sidebar', $data);
			$this->load->view('templates/admin/topbar', $data);
			$this->load->view('v_saw/kriteria_edit', $data);
			$this->load->view('templates/admin/footer');
		} else {
			$kd_kriteria   = $this->input->post('kd_kriteria');
			$ket = $this->input->post('ket');
			$bobot = $this->input->post('bobot');
			$attribut = $this->input->post('attribut');

			$data 	=	array(
				'kd_kriteria'		=> $kd_kriteria,
				'ket'   			=> $ket,
				'bobot'   			=> $bobot,
				'attribut'   		=> $attribut

			);
			$where = array('kd_kriteria' => $kd_kriteria);

			$this->kriteria->update_data($where, $data, 'kriteria');
			$this->session->set_flashdata('message', '');
			redirect('c_kriteria');
		}
	}

	public function hapus($kd_kriteria)
	{
		$this->kriteria->hapus_data($kd_kriteria);
		$this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data kriteria berhasil dihapus!
        </div>
        ');
		redirect('c_kriteria');
	}

	public function tambah_sub()
	{
		$data = array(

			'kd_kriteria'	=> $this->input->post('kd_kriteria'),
			'ket_sub'		=> $this->input->post('ket_sub'),
			'bobot'			=> $this->input->post('bobot')
		);

		$this->subkriteria->tambah_data($data);
		$this->session->set_flashdata('message', '');
		redirect('c_kriteria');
	}

	public function edit_sub($id_subkriteria)
	{
		$where = array('id_subkriteria' => $id_subkriteria);
		$data['kriteria']	= $this->kriteria->tampil_data()->result();
		$data['subkriteria'] = $this->subkriteria->edit_data($where, 'subkriteria')->result();

		$data['title'] = 'Edit SubKriteria';
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('v_saw/subkriteria_edit', $data);
		$this->load->view('templates/admin/footer');
	}

	public function sub_aksi()
	{

		$id_subkriteria   = $this->input->post('id_subkriteria');
		$kd_kriteria   = $this->input->post('kd_kriteria');
		$ket_sub = $this->input->post('ket_sub');
		$bobot = $this->input->post('bobot');

		$data 	=	array(
			'id_subkriteria'		=> $id_subkriteria,
			'kd_kriteria'		=> $kd_kriteria,
			'ket_sub'   		=> $ket_sub,
			'bobot'   			=> $bobot
		);


		$where	=	array('id_subkriteria' => $id_subkriteria);

		$this->subkriteria->update_data($where, $data, 'subkriteria');
		$this->session->set_flashdata('message', '');
		redirect('c_kriteria');
	}

	public function del_sub($id_subkriteria)
	{
		$this->subkriteria->hapus_data($id_subkriteria);
		$this->session->set_flashdata('message', '');
		redirect('c_kriteria');
	}
}

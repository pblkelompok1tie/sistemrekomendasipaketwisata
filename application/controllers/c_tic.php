<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Load library phpspreadsheet
require('./vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class c_tic extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_tic', 'tic');
        $this->load->model('m_paket_wisata', 'paket_wisata');
    }

    public function tampil_data()
    {

        $data['title'] = 'TIC';
        $data['tic'] = $this->tic->get_detail_data();
        $data['paket_wisata'] = $this->paket_wisata->get_detail_data();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('v_tic/index');
        $this->load->view('templates/admin/footer', $data);
    }

    public function tambah_data()
    {
        $data['title'] = 'Tambah Data TIC';
        $data['tic'] = $this->tic->get_detail_data();
        $data['paket_wisata'] = $this->paket_wisata->get_detail_data();


        $this->form_validation->set_rules(
            'nama_tic',
            'Nama TIC',
            'required|is_unique[tic.nama_tic]',
            array('required' => 'Nama TIC harus diisi', 'is_unique' => 'Nama yang Anda isikan sudah ada')
        );
        $this->form_validation->set_rules(
            'alamat_tic',
            'Alamat TIC',
            'required',
            array('required' => 'Alamat TIC harus diisi')
        );
        $this->form_validation->set_rules(
            'kontak_tic',
            'Kontak TIC',
            'required|numeric|max_length[15]',
            array('required' => 'Kontak TIC harus diisi', 'numeric' => 'Karakter yang Anda ketikan harus berupa Angka', 'max_length' => 'Nomor yang anda masukan lebih dari 15 digit')
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('v_tic/tambah');
            $this->load->view('templates/admin/footer', $data);
        } else {
            $nama_tic = $this->input->post('nama_tic');
            $alamat_tic = $this->input->post('alamat_tic');
            $kontak_tic = $this->input->post('kontak_tic');
            // $foto_admin = $_FILES['foto_admin'];
            // if ($foto_admin = '') {
            // } else {
            //   $config['upload_path'] = './assets/img/admin';
            //   $config['allowed_types'] = 'jpeg|jpg|png';
            //   $config['max_size'] = 2048;
            //   $this->load->library('upload', $config);
            //   if (!$this->upload->do_upload('foto_admin')) {
            //     echo "Upload Gagal";
            //     die();
            //   } else {
            //     $foto_admin = $this->upload->data('file_name');
            //   }
            // }
            $data = array(
                'nama_tic' => $nama_tic,
                'alamat_tic' => $alamat_tic,
                'kontak_tic' => $kontak_tic,
                //   'foto_admin' => $foto_admin
            );

            $this->tic->tambah_data_db($data, 'tic');
            $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data TIC berhasil ditambahkan
        </div>
        ');
            redirect('c_tic/tampil_data');
        }
    }

    // public function tampil_detail($id)
    // {
    //     $data['title'] = 'Detail Admin';
    //     $data['admin'] = $this->c_admin->get_detail_data($id);

    //     $this->load->view('templates/admin/header', $data);
    //     $this->load->view('templates/admin/sidebar', $data);
    //     $this->load->view('templates/admin/topbar', $data);
    //     $this->load->view('c_admin/view', $data);
    //     $this->load->view('templates/admin/footer');
    // }
    public function edit_data($id)
    {
        $data['title'] = 'Edit Data TIC';
        $data['tic'] = $this->tic->getDataById($id);
        $data['paket_wisata'] = $this->paket_wisata->get_detail_data();

        $this->form_validation->set_rules('nama_tic', 'Nama TIC');
        $this->form_validation->set_rules('alamat_tic', 'alamat_tic');
        $this->form_validation->set_rules(
            'kontak_tic',
            'Kontak TIC',
            'numeric|max_length[15]',
            array('numeric' => 'Karakter yang Anda ketikan harus berupa Angka')
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('v_tic/edit', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->tic->edit_data_db($id);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fas fa-check-circle"></i>
            Data TIC berhasil diupdate
            </div>
            ');
            redirect('c_tic/tampil_data');
        }
    }

    public function hapus_data($id)
    {
        // $path = './assets/img/admin/';
        // if ($foto_admin != 'default.jpeg') {
        //   unlink(FCPATH . $path . $foto_admin);
        // }
        $id = [
            'id_tic' => $id
        ];
        $this->tic->hapus_data_db($id);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data TIC berhasil dihapus
        </div>
        ');
        redirect('c_tic/tampil_data');
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['tic'] = $this->tic->get_detail_data();

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_data_tic';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "potrait";

        $html = $this->load->view('v_tic/laporan_pdf', $data, true);

        // run dompdf
        $this->dompdf_gen->generate($html, $file_pdf, $paper, $orientation);
    }

    public function Excel()
    {
        $tic = $this->tic->get_detail_data();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Alamat');

        $no = 1;
        $x = 2;
        foreach ($tic as $row) {
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $row['nama_tic']);
            $sheet->setCellValue('C' . $x, $row['alamat_tic']);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan-tic';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        ob_end_clean(); // tambahin ini biar bisa buka excelnya
        flush();
        $writer->save('php://output');
    }
    public function word()
    {

        $data['tic'] = $this->tic->get_detail_data();


        //$admin = $this->admin->get_detail_data();
        $this->load->view('v_tic/word', $data);

        header("Content-type=application/vnd.ms-word");
        header("content-disposition:attachment;filename=laporan-tempat-makan.doc");
    }
}

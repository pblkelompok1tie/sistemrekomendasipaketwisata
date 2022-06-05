<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Load library phpspreadsheet
require('./vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// End load library phpspreadsheet

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

class c_destinasi_tujuan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_destinasi_tujuan', 'destinasi_tujuan');
  }

  public function tampil_data()
  {
    $data['title'] = 'Destinasi Tujuan';
    $data['destinasi_tujuan'] = $this->destinasi_tujuan->get_detail_data();

    $this->load->view('templates/admin/header', $data);
    $this->load->view('templates/admin/sidebar', $data);
    $this->load->view('templates/admin/topbar', $data);
    $this->load->view('v_destinasi_tujuan/index', $data);
    $this->load->view('templates/admin/footer', $data);
  }

  public function tambah_data()
  {
    $data['title'] = 'Tambah Data Destinasi Tujuan';
    $data['destinasi_tujuan'] = $this->destinasi_tujuan->get_detail_data();

    $this->form_validation->set_rules(
      'nama_destinasi_tujuan',
      'Nama Destinasi Tujuan',
      'required|is_unique[destinasi_tujuan.nama_destinasi_tujuan]|alpha_numeric_spaces',
      array('required' => 'Nama destinasi tujuan harus diisi', 'is_unique' => 'Nama destinasi tujuan sudah terdaftar', 'alpha_numeric_spaces' => "Karakter yang Anda ketikan harus berupa Alpabet atau Angka")
    );

    $this->form_validation->set_rules(
      'durasi_jam',
      'Durasi Jam',
      'required',
      array('required' => 'Jam harus diisi')
    );

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin/header', $data);
      $this->load->view('templates/admin/sidebar', $data);
      $this->load->view('templates/admin/topbar', $data);
      $this->load->view('v_destinasi_tujuan/tambah', $data);
      $this->load->view('templates/admin/footer', $data);
    } else {
      $nama_destinasi_tujuan = $this->input->post('nama_destinasi_tujuan');
      $durasi_jam = $this->input->post('durasi_jam');
      $foto_destinasi_tujuan = $_FILES['foto_destinasi_tujuan'];
      if ($foto_destinasi_tujuan = '') {
      } else {
        $config['upload_path'] = './assets/img/destinasi_tujuan';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto_destinasi_tujuan')) {
          echo "Upload Gagal";
          die();
        } else {
          $foto_destinasi_tujuan = $this->upload->data('file_name');
        }
      }
      $data = array(
        'nama_destinasi_tujuan' => $nama_destinasi_tujuan,
        'durasi_jam' => $durasi_jam,
        'foto_destinasi_tujuan' => $foto_destinasi_tujuan
      );

      $this->destinasi_tujuan->tambah_data_db($data, 'destinasi_tujuan');
      $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data Destinasi Tujuan berhasil ditambahkan
        </div>
        ');
      redirect('c_destinasi_tujuan/tampil_data');
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
    $data['title'] = 'Edit Data Destinasi Tujuan';
    $data['destinasi_tujuan'] = $this->destinasi_tujuan->getDataById($id);

    $this->form_validation->set_rules(
      'nama_destinasi_tujuan',
      'nama_destinasi_tujuan',
      'alpha_numeric_spaces',
      array('alpha_numeric_spaces' => "Karakter yang Anda ketikan harus berupa Alpabet atau Angka")
    );
    $this->form_validation->set_rules('durasi_jam', 'durasi_jam');

    // $this->form_validation->set_rules('username','username','required');
    // $this->form_validation->set_rules('password','password','required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin/header', $data);
      $this->load->view('templates/admin/sidebar', $data);
      $this->load->view('templates/admin/topbar', $data);
      $this->load->view('v_destinasi_tujuan/edit', $data);
      $this->load->view('templates/admin/footer');
    } else {
      $this->destinasi_tujuan->edit_data_db($id);
      $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data Destinasi Tujuan berhasil diupdate
        </div>
        ');
      redirect('c_destinasi_tujuan/tampil_data');
    }
  }

  public function hapus_data($id)
  {
    $data = $this->destinasi_tujuan->getDataById($id);
    if (file_exists("./assets/img/destinasi_tujuan/" . $data['foto_destinasi_tujuan'])) {
      unlink("./assets/img/destinasi_tujuan/" . $data['foto_destinasi_tujuan']);
    }
    $id = [
      'id_destinasi_tujuan' => $id
    ];
    $this->destinasi_tujuan->hapus_data_db($id);
    $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data Destinasi Tujuan berhasil dihapus
        </div>
        ');
    redirect('c_destinasi_tujuan/tampil_data');
  }

  public function pdf()
  {
    $this->load->library('dompdf_gen');

    $data['destinasi_tujuan'] = $this->destinasi_tujuan->get_detail_data();

    // filename dari pdf ketika didownload
    $file_pdf = 'laporan_data_destinasi_tujuan';
    // setting paper
    $paper = 'A4';
    //orientasi paper potrait / landscape
    $orientation = "potrait";

    $html = $this->load->view('v_destinasi_tujuan/laporan_pdf', $data, true);

    // run dompdf
    $this->dompdf_gen->generate($html, $file_pdf, $paper, $orientation);
  }
  public function Excel()
  {
    $data = $this->destinasi_tujuan->get_detail_data();


    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama Destinasi Tujuan');
    $sheet->setCellValue('C1', 'Durasi Jam Berkunjung');
    $sheet->setCellValue('D1', 'Foto');


    $rows = 2;
    $no = 1;
    foreach ($data as $val) {
      $sheet->setCellValue('A' . $rows, $no++);
      $sheet->setCellValue('B' . $rows, $val['nama_destinasi_tujuan']);
      $sheet->setCellValue('C' . $rows, $val['durasi_jam']);
      $sheet->setCellValue('D' . $rows, $val['foto_destinasi_tujuan']);

      $rows++;
    }
    $writer = new Xlsx($spreadsheet);
    $filename = 'laporan-destinasi-tujuan';

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

    $data['destinasi_tujuan'] = $this->destinasi_tujuan->get_detail_data();


    //$admin = $this->admin->get_detail_data();
    $this->load->view('v_destinasi_tujuan/word', $data);

    header("Content-type=application/vnd.ms-word");
    header("content-disposition:attachment;filename=laporan-destinasi_tujuan.doc");
  }
}

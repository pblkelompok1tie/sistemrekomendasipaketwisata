<?php

class m_tic extends CI_Model
{

    public function get_detail_data()
    {
        $this->db->order_by('id_tic', 'asc');
        return  $this->db->get('tic')->result_array();
    }

    public function tambah_data_db($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('tic', ['id_tic' => $id])->row_array();
    }

    public function edit_data_db($id)
    {
        $data['tic'] = $this->db->get_where('tic', ['id_tic' => $id])->row_array();

        // cek jika ada foto admin yang di upload
        // $upload_image = $_FILES['foto_admin'];

        // if ($upload_image) {
        //     $config['allowed_types'] = 'jpg|jpeg|png';
        //     $config['max_size'] = '2048';
        //     $config['upload_path'] = './assets/img/admin';
        //     $config['encrypt_name'] = TRUE;

        //     $this->load->library('upload', $config);

        //     if ($this->upload->do_upload('foto_admin')) {
        //         $old_image = $data['admin']['foto_admin'];
        //         $path = './assets/img/admin/';

        //         if ($old_image != 'default.jpeg') {
        //             unlink(FCPATH . $path . $old_image);
        //         }

        //         $new_image = $this->upload->data('file_name');
        //         $this->db->set('foto_admin', $new_image);
        //     } else {
        //         $this->upload->display_errors();
        //     }
        // }
        $data = [
            "id_tic" => $this->input->post('id_tic', true),
            "nama_tic" => $this->input->post('nama_tic', true),
            "alamat_tic" => $this->input->post('alamat_tic',  true),
            "kontak_tic" => $this->input->post('kontak_tic', true)
        ];
        $this->db->where('id_tic', $this->input->post('id_tic'));
        $this->db->update('tic', $data);
    }

    public function hapus_data_db($id)
    {
        $this->db->where($id);
        return $this->db->delete('tic');
    }

    public function jumlah_tic()
    {
        $query = $this->db->get('tic');  
        return $query->num_rows();
    }
}
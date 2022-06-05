<?php

class m_admin extends CI_Model
{

    public function cekDataAdmin($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function get_detail_data()
    {
        $this->db->order_by('id_admin', 'asc');
        return  $this->db->get('admin')->result_array();
    }

    public function tambah_data_db($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('admin', ['id_admin' => $id])->row_array();
    }

    function get_chart_data()
    {
        $this->db->order_by('id_paket_wisata', 'asc');
        return  $this->db->get('paket_wisata')->result_array();
    }

    public function edit_data_db($id)
    {
        $data['admin'] = $this->db->get_where('admin', ['id_admin' => $id])->row_array();

        // cek jika ada foto admin yang di upload
        $upload_image = $_FILES['foto_admin'];

        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/admin';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_admin')) {
                $old_image = $data['admin']['foto_admin'];
                $path = './assets/img/admin/';

                if ($old_image != 'default.jpeg') {
                    unlink(FCPATH . $path . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_admin', $new_image);
            } else {
                $this->upload->display_errors();
            }
        }
        $data = [
            "nama_admin" => $this->input->post('nama_admin', true),
            "username" => $this->input->post('username',  true),
            "password" => $this->input->post('password', true)
        ];
        $this->db->where('id_admin', $this->input->post('id_admin'));
        $this->db->update('admin', $data);
    }

    public function hapus_data_db($id)
    {
        $this->db->where($id);
        return $this->db->delete('admin');
    }
    public function jumlah_admin()
    {
        $query = $this->db->get('admin');
        return $query->num_rows();
    }

    // public function get_keyword($durasi_paket_wisata, $rating, $harga_paket_wisata)
    // {
    //     $this->db->select('*');
    //     $this->db->from('paket_wisata');
    //     $this->db->join('detail_rating', 'detail_rating.id_paket_wisata = paket_wisata.id_paket_wisata');
    //     $this->db->like('durasi_paket_wisata', $durasi_paket_wisata);
    //     $this->db->select_avg('rating', 'rating');
    //     $this->db->or_like('rating', $rating);
    //     $this->db->or_like('harga_paket_wisata', $harga_paket_wisata);

    //     return $this->db->get()->result();
    // }
    public function get_keyword_filter($durasi, $harga_paket_wisata)
    {
        // $sql = "SELECT durasi_paket_wisata as durasi, harga_paket_wisata as harga FROM paket_wisata WHERE durasi ='$durasi' AND harga_paket_wisata='$harga_paket_wisata' GROUP BY durasi, harga_paket_wisata order by id_paket_wisata asc";
        // $query = $this->db->query($sql);
        // return $query->result_array();
        $this->db->select('paket_wisata.*','*','sk.bobot as b1, sb.bobot as b2, st.bobot as b3');
        $this->db->from('detail_rating');
        $this->db->join('paket_wisata', 'paket_wisata.id_paket_wisata = detail_rating.id_paket_wisata');
        $this->db->join('nilai', 'paket_wisata.id_paket_wisata = nilai.id_paket_wisata');
        $this->db->join('subkriteria sk','sk.id_subkriteria=nilai.C1');
		$this->db->join('subkriteria sb','sb.id_subkriteria=nilai.C2');
		$this->db->join('subkriteria st','st.id_subkriteria=nilai.C3');
        $this->db->select_avg('rating', 'rating');
        $this->db->group_by('nama_paket_wisata');
        $data = array(
            'durasi_paket_wisata' => $durasi,
            'harga_paket_wisata' => $harga_paket_wisata
        );
        $this->db->where($data);
        $query = $this->db->get();
        return $query;
    }
}

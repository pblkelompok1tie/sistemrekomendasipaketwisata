<?php
class m_detail_rating extends CI_Model
{
    public function rata_rata($id)
    {
        $this->db->select('AVG(rating) rata_rata_rating');
        $this->db->where('detail_rating.id_paket_wisata', $id);
        return $this->db->get('detail_rating')->row_array();
    }

    public function rata_rata_page_rekomendasi($id)
    {
        $this->db->select('AVG(rating) rata_rata_rating');
        $this->db->from('detail_rating');
        $this->db->where('id_paket_wisata', $id);
        return $this->db->get()->result_array();
    }

    public function hapus_data_db($id)
    {
        $this->db->where($id);
        return $this->db->delete('detail_rating');
    }

    public function cek_rate($id, $ip)
    {
        $this->db->select('*');
        $this->db->from('detail_rating');
        $array = array('id_paket_wisata' => $id, 'ip_address' => $ip);
        $this->db->where($array);
        return $this->db->get();
    }

    public function tambah_data_db($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function ubah_data_db($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function tambah_data_db_rating_paket($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function ubah_data_db_rating_paket($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function get_average_rating()
    {
        $this->db->select('paket_wisata.*', '*', 'sk.bobot as b1, sb.bobot as b2, st.bobot as b3');
        $this->db->from('detail_rating');
        $this->db->join('paket_wisata', 'paket_wisata.id_paket_wisata = detail_rating.id_paket_wisata');
        $this->db->join('nilai', 'paket_wisata.id_paket_wisata = nilai.id_paket_wisata');
        $this->db->join('subkriteria sk', 'sk.id_subkriteria=nilai.C1');
        $this->db->join('subkriteria sb', 'sb.id_subkriteria=nilai.C2');
        $this->db->join('subkriteria st', 'st.id_subkriteria=nilai.C3');
        $this->db->select_avg('rating', 'rating');
        $this->db->group_by('nama_paket_wisata');
        $query = $this->db->get();
        return $query;
    }
}

<?php
class m_filter extends CI_Model
{
    function get_data_filter($harga_paket, $durasi_paket, $usia, $rating_paket)
    {
        if ($harga_paket == null and $durasi_paket == null and $usia == null and $rating_paket == null) {
            $query = $this->db->query("SELECT paket_wisata.*,sk.bobot as b1, sb.bobot as b2, st.bobot as b3,(nilai.C1 * nilai.C2 * nilai.C3) as combination, AVG(rating) as ratings FROM detail_rating INNER JOIN paket_wisata ON paket_wisata.id_paket_wisata = detail_rating.id_paket_wisata INNER JOIN nilai ON paket_wisata.id_paket_wisata = nilai.id_paket_wisata INNER JOIN subkriteria sk ON sk.id_subkriteria=nilai.C1 INNER JOIN subkriteria sb ON sb.id_subkriteria=nilai.C2 INNER JOIN subkriteria st ON st.id_subkriteria=nilai.C3 GROUP BY nama_paket_wisata ORDER BY combination DESC");
            return $query->result_array();
        } else if ($harga_paket == null and $durasi_paket == null and $rating_paket == null) {
            $query = $this->db->query("SELECT paket_wisata.*,sk.bobot as b1, sb.bobot as b2, st.bobot as b3,(nilai.C1 * nilai.C2 * nilai.C3) as combination, AVG(rating) as ratings FROM detail_rating INNER JOIN paket_wisata ON paket_wisata.id_paket_wisata = detail_rating.id_paket_wisata INNER JOIN nilai ON paket_wisata.id_paket_wisata = nilai.id_paket_wisata INNER JOIN subkriteria sk ON sk.id_subkriteria=nilai.C1 INNER JOIN subkriteria sb ON sb.id_subkriteria=nilai.C2 INNER JOIN subkriteria st ON st.id_subkriteria=nilai.C3 WHERE C2 = $usia GROUP BY nama_paket_wisata ORDER BY combination DESC");
            return $query->result_array();
        } else if ($usia == null and $harga_paket == null and $rating_paket == null) {
            $query = $this->db->query("SELECT paket_wisata.*,sk.bobot as b1, sb.bobot as b2, st.bobot as b3,(nilai.C1 * nilai.C2 * nilai.C3) as combination, AVG(rating) as ratings FROM detail_rating INNER JOIN paket_wisata ON paket_wisata.id_paket_wisata = detail_rating.id_paket_wisata INNER JOIN nilai ON paket_wisata.id_paket_wisata = nilai.id_paket_wisata INNER JOIN subkriteria sk ON sk.id_subkriteria=nilai.C1 INNER JOIN subkriteria sb ON sb.id_subkriteria=nilai.C2 INNER JOIN subkriteria st ON st.id_subkriteria=nilai.C3 WHERE C1 = $durasi_paket GROUP BY nama_paket_wisata ORDER BY combination DESC");
            return $query->result_array();
        } else if ($durasi_paket == null and $usia == null and $rating_paket == null) {
            $query = $this->db->query("SELECT paket_wisata.*,sk.bobot as b1, sb.bobot as b2, st.bobot as b3,(nilai.C1 * nilai.C2 * nilai.C3) as combination, AVG(rating) as ratings FROM detail_rating INNER JOIN paket_wisata ON paket_wisata.id_paket_wisata = detail_rating.id_paket_wisata INNER JOIN nilai ON paket_wisata.id_paket_wisata = nilai.id_paket_wisata INNER JOIN subkriteria sk ON sk.id_subkriteria=nilai.C1 INNER JOIN subkriteria sb ON sb.id_subkriteria=nilai.C2 INNER JOIN subkriteria st ON st.id_subkriteria=nilai.C3 WHERE C3 = $harga_paket GROUP BY nama_paket_wisata ORDER BY combination DESC");
            return $query->result_array();
        } else if ($durasi_paket == null and $usia == null and $harga_paket == null) {
            $query = $this->db->query("SELECT paket_wisata.*,sk.bobot as b1, sb.bobot as b2, st.bobot as b3,(nilai.C1 * nilai.C2 * nilai.C3) as combination, AVG(rating) as ratings FROM detail_rating INNER JOIN paket_wisata ON paket_wisata.id_paket_wisata = detail_rating.id_paket_wisata INNER JOIN nilai ON paket_wisata.id_paket_wisata = nilai.id_paket_wisata INNER JOIN subkriteria sk ON sk.id_subkriteria=nilai.C1 INNER JOIN subkriteria sb ON sb.id_subkriteria=nilai.C2 INNER JOIN subkriteria st ON st.id_subkriteria=nilai.C3 WHERE floor(rating_paket_wisata)=$rating_paket GROUP BY nama_paket_wisata ORDER BY combination DESC");
            return $query->result_array();
        } else if ($harga_paket == null and $durasi_paket == null) {
            $query = $this->db->query("SELECT paket_wisata.*,sk.bobot as b1, sb.bobot as b2, st.bobot as b3,(nilai.C1 * nilai.C2 * nilai.C3) as combination, AVG(rating) as ratings FROM detail_rating INNER JOIN paket_wisata ON paket_wisata.id_paket_wisata = detail_rating.id_paket_wisata INNER JOIN nilai ON paket_wisata.id_paket_wisata = nilai.id_paket_wisata INNER JOIN subkriteria sk ON sk.id_subkriteria=nilai.C1 INNER JOIN subkriteria sb ON sb.id_subkriteria=nilai.C2 INNER JOIN subkriteria st ON st.id_subkriteria=nilai.C3 WHERE C2 = $usia AND floor(rating_paket_wisata)=$rating_paket GROUP BY nama_paket_wisata ORDER BY combination DESC");
            return $query->result_array();
        } else if ($usia == null and $harga_paket == null) {
            $query = $this->db->query("SELECT paket_wisata.*,sk.bobot as b1, sb.bobot as b2, st.bobot as b3,(nilai.C1 * nilai.C2 * nilai.C3) as combination, AVG(rating) as ratings FROM detail_rating INNER JOIN paket_wisata ON paket_wisata.id_paket_wisata = detail_rating.id_paket_wisata INNER JOIN nilai ON paket_wisata.id_paket_wisata = nilai.id_paket_wisata INNER JOIN subkriteria sk ON sk.id_subkriteria=nilai.C1 INNER JOIN subkriteria sb ON sb.id_subkriteria=nilai.C2 INNER JOIN subkriteria st ON st.id_subkriteria=nilai.C3 WHERE C1 = $durasi_paket AND floor(rating_paket_wisata)=$rating_paket GROUP BY nama_paket_wisata ORDER BY combination DESC");
            return $query->result_array();
        } else if ($durasi_paket == null and $rating_paket == null) {
            $query = $this->db->query("SELECT paket_wisata.*,sk.bobot as b1, sb.bobot as b2, st.bobot as b3,(nilai.C1 * nilai.C2 * nilai.C3) as combination, AVG(rating) as ratings FROM detail_rating INNER JOIN paket_wisata ON paket_wisata.id_paket_wisata = detail_rating.id_paket_wisata INNER JOIN nilai ON paket_wisata.id_paket_wisata = nilai.id_paket_wisata INNER JOIN subkriteria sk ON sk.id_subkriteria=nilai.C1 INNER JOIN subkriteria sb ON sb.id_subkriteria=nilai.C2 INNER JOIN subkriteria st ON st.id_subkriteria=nilai.C3 WHERE C3 = $harga_paket AND C2 = $usia GROUP BY nama_paket_wisata ORDER BY combination DESC");
            return $query->result_array();
        } else if ($rating_paket == null and $harga_paket == null) {
            $query = $this->db->query("SELECT paket_wisata.*,sk.bobot as b1, sb.bobot as b2, st.bobot as b3,(nilai.C1 * nilai.C2 * nilai.C3) as combination, AVG(rating) as ratings FROM detail_rating INNER JOIN paket_wisata ON paket_wisata.id_paket_wisata = detail_rating.id_paket_wisata INNER JOIN nilai ON paket_wisata.id_paket_wisata = nilai.id_paket_wisata INNER JOIN subkriteria sk ON sk.id_subkriteria=nilai.C1 INNER JOIN subkriteria sb ON sb.id_subkriteria=nilai.C2 INNER JOIN subkriteria st ON st.id_subkriteria=nilai.C3 WHERE C2 = $usia AND C1 = $durasi_paket GROUP BY nama_paket_wisata ORDER BY combination DESC");
            return $query->result_array();
        } else if ($usia == null and $rating_paket == null) {
            $query = $this->db->query("SELECT paket_wisata.*,sk.bobot as b1, sb.bobot as b2, st.bobot as b3,(nilai.C1 * nilai.C2 * nilai.C3) as combination, AVG(rating) as ratings FROM detail_rating INNER JOIN paket_wisata ON paket_wisata.id_paket_wisata = detail_rating.id_paket_wisata INNER JOIN nilai ON paket_wisata.id_paket_wisata = nilai.id_paket_wisata INNER JOIN subkriteria sk ON sk.id_subkriteria=nilai.C1 INNER JOIN subkriteria sb ON sb.id_subkriteria=nilai.C2 INNER JOIN subkriteria st ON st.id_subkriteria=nilai.C3 WHERE C3 = $harga_paket AND C1 = $durasi_paket GROUP BY nama_paket_wisata ORDER BY combination DESC");
            return $query->result_array();
        } else if ($durasi_paket == null and $usia == null) {
            $query = $this->db->query("SELECT paket_wisata.*,sk.bobot as b1, sb.bobot as b2, st.bobot as b3,(nilai.C1 * nilai.C2 * nilai.C3) as combination, AVG(rating) as ratings FROM detail_rating INNER JOIN paket_wisata ON paket_wisata.id_paket_wisata = detail_rating.id_paket_wisata INNER JOIN nilai ON paket_wisata.id_paket_wisata = nilai.id_paket_wisata INNER JOIN subkriteria sk ON sk.id_subkriteria=nilai.C1 INNER JOIN subkriteria sb ON sb.id_subkriteria=nilai.C2 INNER JOIN subkriteria st ON st.id_subkriteria=nilai.C3 WHERE C3 = $harga_paket AND floor(rating_paket_wisata) = $rating_paket GROUP BY nama_paket_wisata ORDER BY combination DESC");
            return $query->result_array();
        } else if ($durasi_paket == null) {
            $query = $this->db->query("SELECT paket_wisata.*,sk.bobot as b1, sb.bobot as b2, st.bobot as b3,(nilai.C1 * nilai.C2 * nilai.C3) as combination, AVG(rating) as ratings FROM detail_rating INNER JOIN paket_wisata ON paket_wisata.id_paket_wisata = detail_rating.id_paket_wisata INNER JOIN nilai ON paket_wisata.id_paket_wisata = nilai.id_paket_wisata INNER JOIN subkriteria sk ON sk.id_subkriteria=nilai.C1 INNER JOIN subkriteria sb ON sb.id_subkriteria=nilai.C2 INNER JOIN subkriteria st ON st.id_subkriteria=nilai.C3 WHERE C2 = $usia  AND C3 = $harga_paket  AND floor(rating_paket_wisata) = $rating_paket GROUP BY nama_paket_wisata ORDER BY combination DESC");
            return $query->result_array();
        } else if ($usia == null) {
            $query = $this->db->query("SELECT paket_wisata.*,sk.bobot as b1, sb.bobot as b2, st.bobot as b3,(nilai.C1 * nilai.C2 * nilai.C3) as combination, AVG(rating) as ratings FROM detail_rating INNER JOIN paket_wisata ON paket_wisata.id_paket_wisata = detail_rating.id_paket_wisata INNER JOIN nilai ON paket_wisata.id_paket_wisata = nilai.id_paket_wisata INNER JOIN subkriteria sk ON sk.id_subkriteria=nilai.C1 INNER JOIN subkriteria sb ON sb.id_subkriteria=nilai.C2 INNER JOIN subkriteria st ON st.id_subkriteria=nilai.C3 WHERE C1 = $durasi_paket AND C3 = $harga_paket AND floor(rating_paket_wisata)=$rating_paket GROUP BY nama_paket_wisata ORDER BY combination DESC");
            return $query->result_array();
        } else if ($harga_paket == null) {
            $query = $this->db->query("SELECT paket_wisata.*,sk.bobot as b1, sb.bobot as b2, st.bobot as b3,(nilai.C1 * nilai.C2 * nilai.C3) as combination, AVG(rating) as ratings FROM detail_rating INNER JOIN paket_wisata ON paket_wisata.id_paket_wisata = detail_rating.id_paket_wisata INNER JOIN nilai ON paket_wisata.id_paket_wisata = nilai.id_paket_wisata INNER JOIN subkriteria sk ON sk.id_subkriteria=nilai.C1 INNER JOIN subkriteria sb ON sb.id_subkriteria=nilai.C2 INNER JOIN subkriteria st ON st.id_subkriteria=nilai.C3 WHERE C2 = $usia AND C1 = $durasi_paket AND floor(rating_paket_wisata)=$rating_paket GROUP BY nama_paket_wisata ORDER BY combination DESC");
            return $query->result_array();
        } else if ($rating_paket == null) {
            $query = $this->db->query("SELECT paket_wisata.*,sk.bobot as b1, sb.bobot as b2, st.bobot as b3,(nilai.C1 * nilai.C2 * nilai.C3) as combination, AVG(rating) as ratings FROM detail_rating INNER JOIN paket_wisata ON paket_wisata.id_paket_wisata = detail_rating.id_paket_wisata INNER JOIN nilai ON paket_wisata.id_paket_wisata = nilai.id_paket_wisata INNER JOIN subkriteria sk ON sk.id_subkriteria=nilai.C1 INNER JOIN subkriteria sb ON sb.id_subkriteria=nilai.C2 INNER JOIN subkriteria st ON st.id_subkriteria=nilai.C3 WHERE C2 = $usia AND C1 = $durasi_paket AND C3 = $harga_paket GROUP BY nama_paket_wisata ORDER BY combination DESC");
            return $query->result_array();
        } else {
            $query = $this->db->query("SELECT paket_wisata.*,sk.bobot as b1, sb.bobot as b2, st.bobot as b3, (nilai.C1 * nilai.C2 * nilai.C3) as combination, AVG(rating) as ratings FROM detail_rating INNER JOIN paket_wisata ON paket_wisata.id_paket_wisata = detail_rating.id_paket_wisata INNER JOIN nilai ON paket_wisata.id_paket_wisata = nilai.id_paket_wisata INNER JOIN subkriteria sk ON sk.id_subkriteria=nilai.C1 INNER JOIN subkriteria sb ON sb.id_subkriteria=nilai.C2 INNER JOIN subkriteria st ON st.id_subkriteria=nilai.C3 WHERE C1 = $durasi_paket AND C2 = $usia AND C3 = $harga_paket AND floor(rating_paket_wisata)=$rating_paket GROUP BY nama_paket_wisata ORDER BY combination DESC");
            return $query->result_array();
        }
    }
}

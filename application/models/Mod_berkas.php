<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_berkas extends CI_Model {

    private $table   = "berkas";
    private $primary = "norm";

    function searchBerkas($cari, $limit, $offset)
    {
        $this->db->like($this->primary,$cari);
        $this->db->or_like("nama",$cari);
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table);
    }

    function totalRows($table)
	{
		return $this->db->count_all_results($table);
    }

    
    function getAll()
    {
        $this->db->order_by('berkas.norm desc');
        return $this->db->get('berkas');
    }

    function insertBerkas($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    function cekBerkas($kode)
    {
        $this->db->where("norm", $kode);
        return $this->db->get("berkas");
    }

    function updateBerkas($norm, $data)
    {
        $this->db->where('norm', $norm);
		$this->db->update('berkas', $data);
    }

    function getGambar($norm)
    {
        $this->db->select('image');
        $this->db->from('berkas');
        $this->db->where('norm', $norm);
        return $this->db->get();
    }

    function deleteBerkas($kode, $table)
    {
        $this->db->where('norm', $kode);
        $this->db->delete($table);
    }

    function DocSearch($nama)
    {
        if (isset($nama) AND $nama == "") {
            $this->db->where('status !=', 'Dipinjam');
            $this->db->limit(10);
            return $this->db->get($this->table);
        } else {
            $this->db->where('status !=', 'Dipinjam');
            $this->db->like($this->primary,$nama);
            $this->db->or_like("nama",$nama);
            $this->db->limit(10);
            return $this->db->get($this->table);
        }
    }

    function totalRak()
    {
        $total = $this->db->query("SELECT rak,COUNT(norm) as jumlahrak
                                 FROM berkas
                                 Group By rak");
        return $total;

    }


}

/* End of file ModelName.php */

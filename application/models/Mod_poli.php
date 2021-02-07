<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_poli extends CI_Model {

    function getPoli()
    {
        return $this->db->get('poli');
    }

    function getAll()
    {
        $this->db->order_by('poli.id_unit desc');
        return $this->db->get('poli');
    }

    function insertPoli($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    function cekPoli($kode)
    {
        $this->db->where("id_unit", $kode);
        return $this->db->get("poli");
    }

    function updatePoli($id_unit, $data)
    {
        $this->db->where('id_unit', $id_unit);
		$this->db->update('poli', $data);
    }

    function getDataPoli($limit, $offset)
    {
        // return $this->db->get_where('post', array('category_id' => $category_id));
        $this->db->select('*');
        $this->db->from('poli a');
        // $this->db->where('a.id_unit', $id_unit);
        $this->db->limit($limit, $offset);
        $this->db->order_by('a.id_unit desc');
        return $this->db->get();
    }

    //function getGambar($id_unit)
    //{
      //  $this->db->select('image');
        //$this->db->from('poli');
        //$this->db->where('id_unit', $id_unit);
        //return $this->db->get();
    //}

    function totalRows($table)
	{
		return $this->db->count_all_results($table);
    }

    // function getTotalRows()
    // {
    //     return $this->db->get('poli')->num_rows();
    // }


    
    function searchPoli($cari, $limit, $offset)
    {
        $this->db->like("id_unit",$cari);
        $this->db->or_like("nama",$cari);
        $this->db->limit($limit, $offset);
        return $this->db->get('poli');
    }

    function deletePoli($kode, $table)
    {
        $this->db->where('id_unit', $kode);
        $this->db->delete($table);
    }

}

/* End of file ModelName.php */

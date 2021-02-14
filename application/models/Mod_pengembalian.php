<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_pengembalian extends CI_Model {

    private $table_transaksi    = 'transaksi';
    private $table_pengembalian = 'pengembalian';
    private $table_poli      = 'poli';  
    private $table_berkas         = 'berkas';    

    public function SearchNis($id_unit)
    {
        $data = $this->db->query("SELECT * FROM $this->table_transaksi WHERE id_transaksi 
                                  NOT IN(SELECT id_transaksi FROM $this->table_pengembalian)
                                  AND id_unit LIKE '%$id_unit%' GROUP BY id_unit");
        return $data;
    }

    public function SearchTransaksi($no_transaksi)
    {
        $query = $this->db->query("
        SELECT 
            a.*,
            b.unit,
            d.rak
        FROM
            $this->table_transaksi a,
            $this->table_poli b,
            $this->table_berkas d
        WHERE a.id_transaksi = '$no_transaksi' 
            AND a.id_transaksi NOT IN 
            (SELECT 
                c.id_transaksi 
            FROM
                $this->table_pengembalian c) 
            AND a.id_unit = b.id_unit AND a.norm = d.norm
        ");
        return $query;
    }

    public function showBook($no_transaksi)
    {
        $query = $this->db->query("SELECT a.*, b.nama,b.alamat,b.rak 
                                   FROM $this->table_transaksi a, $this->table_berkas b 
                                   WHERE a.id_transaksi = '$no_transaksi' AND a.id_transaksi 
                                   NOT IN(SELECT c.id_transaksi FROM $this->table_pengembalian c)
                                   AND a.kode_berkas = b.kode_berkas");
        return $query;
    }

    public function insertPengembalian($data)
    {
        $this->db->insert($this->table_pengembalian, $data);
    }

    public function UpdateStatus($no_transaksi, $data)
    {
        $this->db->where("id_transaksi", $no_transaksi);
        $this->db->update($this->table_transaksi, $data);
        
    }

    function getTransaksi($no_transaksi)
    {
        $this->db->where("id_transaksi", $no_transaksi);
        return $this->db->get("transaksi");
    }

    public function UpdateRak($norm, $rak)
    {
    
        $this->db->where("norm", $norm);
        $this->db->update($this->table_berkas, $rak);
        
    }

    public function UpdateStatusBerkas($norm, $status)
    {
    
        $this->db->where("norm", $norm);
        $this->db->update($this->table_berkas, $status);
        
    }

}

/* End of file Mod_pengembalian.php */

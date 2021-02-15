<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_laporan extends CI_Model {

    public function searchPinjaman($tanggal1, $tanggal2)
    {
        // $this->db->select('*');
        // $this->db->from('transaksi');
        // $this->db->where('tanggal_pinjam <','$tanggal1');
        // $this->db->where('tanggal_kembali >','$tanggal2');

        // return $this->db->get();
        if (empty($tanggal1) && empty($tanggal2)) {
            return $this->db->query("SELECT a.*,  
                                 CASE 
                                    WHEN a.status = 'N' THEN 'Masih Dipinjam'
                                 ELSE 'Sudah Dikembalikan' 
                                 END AS status_pinjam
                                 FROM transaksi a GROUP BY a.id_transaksi LIMIT 10");
    
        } else {
            return $this->db->query("SELECT a.*,  
                                 CASE 
                                    WHEN a.status = 'N' THEN 'Masih Dipinjam'
                                 ELSE 'Sudah Dikembalikan' 
                                 END AS status_pinjam
                                 FROM transaksi a WHERE a.tanggal_pinjam  BETWEEN '$tanggal1' AND '$tanggal2' GROUP BY a.id_transaksi");
    
        }
    }   
    
    public function detailPinjaman($id_transaksi)
    {
        // $this->db->select("*");
        // $this->db->from("transaksi a");
        // $this->db->where("a.id_transaksi", $id_transaksi);
        // $this->db->join("berkas b", "a.norm = b.norm");
        // return $this->db->get();
        return $this->db->query("SELECT a.*,b.norm,b.nama, b.alamat, 
                                 CASE 
                                    WHEN a.status = 'N' THEN 'Masih di pinjam'
                                 ELSE 'Sudah Dikembalikan' 
                                 END AS status_pinjam
                                 FROM transaksi a, berkas b 
                                 WHERE a.id_transaksi = '$id_transaksi' 
                                 AND a.norm = b.norm");
    }

    public function searchPengembalian($tanggal1, $tanggal2)
    {
        if (empty($tanggal1) && empty($tanggal2)) {
                                 
            return $this->db->query("SELECT a.*, b.id_petugas, b.full_name FROM pengembalian a, petugas b 
                                 GROUP BY a.id_transaksi LIMIT 10");
    
        } else {
            return $this->db->query("SELECT a.*, b.id_petugas, b.full_name FROM pengembalian a, petugas b 
                                 WHERE a.tgl_pengembalian BETWEEN '$tanggal1' AND '$tanggal2'
                                 AND a.id_petugas = b.id_petugas 
                                 GROUP BY a.id_transaksi");
        }
    }

    public function detailPengembalian($id_transaksi)
    {
        return $this->db->query("SELECT a.*, b.status, c.norm, c.nama, c.alamat, 
                                CASE 
                                    WHEN b.status = 'N' THEN 'Masih di pinjam'
                                ELSE 'Sudah Dikembalikan' 
                                END AS status_pinjam
                                FROM pengembalian a, transaksi b, berkas c
                                WHERE a.id_transaksi = '$id_transaksi'
                                AND a.id_transaksi = b.id_transaksi
                                AND b.norm = c.norm");
    }

    
}

/* End of file Mod_laporan.php */

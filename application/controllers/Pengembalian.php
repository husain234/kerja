<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_pengembalian');
    }


    public function index()
    {
        $data['title'] = "Pengembalian Berkas";
        $this->template->load('layoutbackend', 'pengembalian/pengembalian_data', $data);
    }

    public function cari_nis()
    {
        $id_unit = $this->input->post('id_unit');
        // $id_unit = 121210;
        $data['pencarian'] = $this->Mod_pengembalian->SearchNis($id_unit);
        // print_r($data['pencarian']);
        $this->load->view('pengembalian/pengembalian_pencarian', $data);
        
         
    }

    public function cari_transaksi()
    {
        $no_transaksi = $this->input->get_post('no_transaksi');
        // $no_transaksi = 20180411002;
        $hasil = $this->Mod_pengembalian->SearchTransaksi($no_transaksi);
        if($hasil->num_rows() > 0) {
            $dtrans = $hasil->row_array();
            echo $dtrans['id_unit']."|".$dtrans['tanggal_pinjam']."|".$dtrans['tanggal_kembali']."|".$dtrans['unit']."|".$dtrans['rak'];
        }
    }

    public function tampil_berkas()
    {
        
        $no_transaksi = $this->input->get('no_transaksi');
        $data['berkas'] = $this->Mod_pengembalian->showBook($no_transaksi)->result();
        $this->load->view('pengembalian/pengembalian_tampil_berkas', $data);
        
    }

    public function simpan_transaksi()
    {
        
        $id_petugas = $this->session->userdata['id_petugas'];
        $table_transaksi = $this->Mod_pengembalian->getTransaksi($this->input->post('no_transaksi'))->result();

        
        $simpan = array(
            'id_transaksi'     => $this->input->post('no_transaksi'),
            'tgl_pengembalian' => date('Y-m-d'),
            'telat'            => $this->input->post('telat'),
            'id_petugas'       => $id_petugas
        );
        $this->Mod_pengembalian->insertPengembalian($simpan);

        //update status peminjaman dari N menjadi Y
        $no_transaksi = $this->input->post('no_transaksi');
        
        $data = array(
            'status' => "Y"
        );

        $this->Mod_pengembalian->UpdateStatus($no_transaksi, $data);

        //update rak berkas
        foreach($table_transaksi as $transaksi){
            
            $norm = $transaksi->norm;

            // Status Berkas
            $status = array(
                'status' => 'Ada'
            );

            $this->Mod_pengembalian->UpdateStatusBerkas($norm, $status);

        }
    }

    public function test() {
        $table_transaksi = $this->Mod_pengembalian->getTransaksi('20210207001')->result();
        foreach($table_transaksi as $transaksi){
            
            $norm = $transaksi->norm;
            var_dump($norm);
        }
    }

}

/* End of file Pengembalian.php */









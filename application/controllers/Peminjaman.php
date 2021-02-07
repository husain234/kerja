<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_peminjaman','Mod_poli','Mod_berkas'));
    }

    public function index()
    {
        $data['tglpinjam']  = date('Y-m-d');
        $data['tglkembali'] = date('Y-m-d', strtotime('+7 day', strtotime($data['tglpinjam'])));
        $data['autonumber'] = $this->Mod_peminjaman->AutoNumbering();
        $data['poli']    = $this->Mod_poli->getPoli()->result();
        $this->template->load('layoutbackend', 'peminjaman/peminjaman_data', $data);
    }

    public function tampil_tmp()
    {
        $data['tmp']       = $this->Mod_peminjaman->getTmp()->result();
        $data['jumlahTmp'] = $this->Mod_peminjaman->jumlahTmp();
        $this->load->view('peminjaman/peminjaman_tampil_tmp',$data);
    }

    public function cari_poli()
    {
        $id_unit = $this->input->post('id_unit');
        $cari = $this->Mod_poli->cekPoli($id_unit);
        //jika ada data poli
        if($cari->num_rows() > 0) {
            $dpoli = $cari->row_array();
            echo $dpoli['unit'];
        }
    }

    public function cari_berkas()
    {
        $cariberkas = $this->input->post('cariberkas');
        $data['berkas'] = $this->Mod_berkas->DocSearch($cariberkas);
        $this->load->view('peminjaman/peminjaman_searchbook', $data);
        // foreach($data['berkas'] as $d) {
        //     print_r($d); die();
        // }
    }

    public function cari_kode_berkas()
    {
        //$norm = 7611;
        $norm = $this->input->post('norm');
        $hasil = $this->Mod_berkas->cekBerkas($norm);
        //jika ada berkas dalam database
        if($hasil->num_rows() > 0) {
            $dberkas = $hasil->row_array();
            echo $dberkas['norm']."|".$dberkas['alamat'];
        }
    }

    public function save_tmp()
    {
        // $kode = $this->Mod_peminjaman->getTransaksi()->result_array();
        
        // if($kode->num_rows()==1) {
        //     echo "sudah ada";
        // }
        // else{

            $norm = $this->input->post('norm');
            // echo $norm; die();
            $cek = $this->Mod_peminjaman->cekTmp($norm);
            //cek apakah data masih kosong di tabel tmp
            if($cek->num_rows() < 1) {
                $data = array(
                    'norm' => $this->input->post('norm'),
                    'nama'     => $this->input->post('nama'),
                    'alamat' => $this->input->post('alamat')
                );
                $this->Mod_peminjaman->InsertTmp($data);
            }
    
        //}


    }

    public function hapus_tmp()
    {
        $norm = $this->input->post('norm');
        $this->Mod_peminjaman->deleteTmp($norm);
    }

    public function simpan_transaksi()
    {
        $id_petugas = $this->session->userdata['id_petugas'];
        //ambil data tmp lakukan looping . setelah looping lakukan insert ke table transaksi
        $table_tmp = $this->Mod_peminjaman->getTmp()->result();
        foreach($table_tmp as $data){

            $norm = $data->norm; 
            
            $data = array(
                'id_transaksi'     => $this->input->post('no_transaksi'),
                'id_unit'          => $this->input->post('id_unit'),
                'norm'             => $data->norm,
                'tanggal_pinjam'   => $this->input->post('tgl_pinjam'),
                'tanggal_kembali'  => $this->input->post('tgl_kembali'),
                'status'           => "N",
                'id_petugas'       => $id_petugas
            );
           // print_r($data);
            //insert data ke table transaksi
            $this->Mod_peminjaman->InsertTransaksi($data); 

            //update rak
            $status = array(
            'status' => "Dipinjam"
        );

            $this->Mod_peminjaman->updateStatus($norm,$status);

            //hapus table tmp
            $this->Mod_peminjaman->deleteTmp($norm);
           
        }
    }


}

/* End of file Peminjaman.php */

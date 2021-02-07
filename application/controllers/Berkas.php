<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_berkas');
    }


    public function index()
    {
        $data['berkas']      = $this->Mod_berkas->getAll();
        
        
        
        if($this->uri->segment(3)=="create-success") {
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
            $this->template->load('layoutbackend', 'berkas/berkas_data', $data); 
        }
        else if($this->uri->segment(3)=="update-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Update...!</p></div>"; 
            $this->template->load('layoutbackend', 'berkas/berkas_data', $data);
        }
        else if($this->uri->segment(3)=="delete-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
            $this->template->load('layoutbackend', 'berkas/berkas_data', $data);
        }
        else{
            $data['message'] = "";
            $this->template->load('layoutbackend', 'berkas/berkas_data', $data);
        }
        
    }

    public function create()
    {
        $this->template->load('layoutbackend', 'berkas/berkas_create');
    }

    public function insert()
    {
        if(isset($_POST['save'])) {

            //function validasi
            $this->_set_rules();

            //apabila user mengkosongkan form input
            if($this->form_validation->run()==true){
                // echo "masuk"; die();
                $norm = $this->input->post('norm');
                $cek = $this->Mod_berkas->cekBerkas($norm);
                //cek nis yg sudah digunakan
                if($cek->num_rows() > 0){
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><strong><i class='icon-ok'></i>No RM</strong> Sudah Digunakan...!</p></div>"; 
                    $this->template->load('layoutbackend', 'berkas/berkas_create', $data); 
                }
                else{
                    $nama = slug($this->input->post('nama'));
                    $config['upload_path']   = './assets/img/berkas/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']	     = '1000';
                    $config['max_width']     = '2000';
                    $config['max_height']    = '1024';
                    $config['file_name']     = $nama; 
                            
                    $this->upload->initialize($config);

                     //apabila ada gambar yg diupload
                    
                        
                        $image = $this->upload->data();

                        $save  = array(
                            'norm'   => $this->input->post('norm'),
                            'nama'       => $this->input->post('nama'),
                            'jk'   => $this->input->post('jenis'),
                            'ttl'   => $this->input->post('tgl_lahir'),
                            'alamat' => $this->input->post('alamat'),
                            'rak' => $this->input->post('rak'),
                            'status' => "Ada"
                        );
                        $this->Mod_berkas->insertBerkas("berkas", $save);
                        // echo "berhasil"; die();
                        redirect('berkas/index/create-success');

                    
                    //apabila tidak ada gambar yg diupload
                     
                }
            
            }
            //jika tidak mengkosongkan form
            else{
                $data['message'] = "";
                $this->template->load('layoutbackend', 'berkas/berkas_create', $data);
            }

        }
    }

    public function edit()
    {
        $norm = $this->uri->segment(3);
        
        $data['edit']    = $this->Mod_berkas->cekBerkas($norm)->row_array();
        // $data['poli'] =  $this->Mod_poli->getAll()->result_array();
        // print_r($data['edit']); die();
        $this->template->load('layoutbackend', 'berkas/berkas_edit', $data);
    }

    public function update()
    {
        if(isset($_POST['update'])) {

            // echo "proses update"; die();
            //apabila ada gambar yg diupload
            if(!empty($_FILES['userfile']['name'])) {

                $this->_set_rules();

                //apabila user mengkosongkan form input
                if($this->form_validation->run()==true){
                    // echo "masuk"; die();
                    
                    $norm = $this->input->post('norm');
                    
                    $nama = slug($this->input->post('nama'));
                    $config['upload_path']   = './assets/img/berkas/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']	     = '1000';
                    $config['max_width']     = '2000';
                    $config['max_height']    = '1024';
                    $config['file_name']     = $nama; 
                            
                    $this->upload->initialize($config);

                        //apabila ada gambar yg diupload
                   
                        
                        $image = $this->upload->data();

                        $save  = array(
                            'norm'   => $this->input->post('norm'),
                            'nama'       => $this->input->post('nama'),
                            'jk'   => $this->input->post('jenis'),
                            'ttl'   => $this->input->post('tgl_lahir'),
                            'alamat' => $this->input->post('alamat'),
                            'rak' => $this->input->post('rak')
                            
                        );

                        $g = $this->Mod_berkas->getGambar($norm)->row_array();
                        
                        //hapus gambar yg ada diserver
                        unlink('assets/img/berkas/'.$g['image']);

                        $this->Mod_berkas->updateBerkas($norm, $save);
                        // echo "berhasil"; die();
                        redirect('berkas/index/update-success');

                    
                    //apabila tidak ada gambar yg diupload
                     
                        
                    
                }
                //jika tidak mengkosongkan
                else{

                    $norm = $this->input->post('norm');
                    $data['edit']    = $this->Mod_berkas->cekBerkas($norm)->row_array();
                    $data['message'] = "";
                    $this->template->load('layoutbackend', 'berkas/berkas_edit', $data);
                }
            
            }
            //jika tidak ada gambar yg diupload
            else{
                $this->_set_rules();
                
                //apabila user mengkosongkan form input
                if($this->form_validation->run()==true){
                    // echo "masuk"; die();
                    
                    $norm = $this->input->post('norm');
                    
                    $save  = array(
                        'norm'   => $this->input->post('norm'),
                        'nama'       => $this->input->post('nama'),
                        'jk'   => $this->input->post('jenis'),
                            'ttl'   => $this->input->post('tgl_lahir'),
                            'alamat' => $this->input->post('alamat'),
                            'rak' => $this->input->post('rak')
                        
                    );
                    $this->Mod_berkas->updateBerkas($norm, $save);
                    // echo "berhasil"; die();
                    redirect('berkas/index/update-success');      
                }
                //jika tidak mengkosongkan
                else{
                    $norm = $this->input->post('norm');
                    $data['edit']    = $this->Mod_berkas->cekBerkas($norm)->row_array();
                    $data['message'] = "";
                    $this->template->load('layoutbackend', 'berkas/berkas_edit', $data);
                }

            } //end empty $_FILES

        } // end $_POST['update']
    
    }

    public function delete()
    {
        // $nis  = $this->uri->segment(3);

        $norm = $this->input->post('norm');
          
        $g = $this->Mod_berkas->getGambar($norm)->row_array();
        
        //hapus gambar yg ada diserver
        unlink('assets/img/berkas/'.$g['image']);

        $this->Mod_berkas->deleteBerkas($norm, 'berkas');
        // echo "berhasil"; die();
        redirect('berkas/index/delete-success');
    }
    public function detail_rak()
    {
        //$id_transaksi = $this->uri->segment(3)
        
        
        $data['title']        = "Detail Rak";
        $data['total']        = $this->Mod_berkas->totalRak()->row_array(); 
        $this->load->view('berkas/rak_detail', $data);

    }

    //function global buat validasi input
    public function _set_rules()
    {
        
        $this->form_validation->set_rules('norm','No RM','required|max_length[10]');
        $this->form_validation->set_rules('nama','Nama','required|max_length[50]');
        $this->form_validation->set_rules('jenis','Jenis Kelamin','required|max_length[2]');
        $this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required'); 
        $this->form_validation->set_rules('rak','Rak','required|max_length[10]');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }

}

/* End of file Berkas.php */

        
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_poli');
    }

    function index()
    {
        $data['countpoli'] = $this->Mod_poli->totalRows('poli');
        $this->template->load('layoutbackend', 'dashboard/dashboard_data', $data);
    }
        
    


}
/* End of file Controllername.php */
 
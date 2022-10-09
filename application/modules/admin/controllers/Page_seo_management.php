<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_seo_management extends MY_Controller 
{
 
    public function __construct() 
    {
        parent::__construct();  
        if (!$this->session->userdata['userdata']['logged_in'])
        { 
            redirect('admin/authentication');
        }
        $this->load->model('Common_model');
    } 
    public function index()
    { 
        
        $data['result']=$this->Common_model->findAllWithJoin('','pages','*');
        $data['datatable'] = true;
        $data['delete_popup'] = true;
        $cont = $this->load->view('list_page_seo', $data, true);
        $this->admin->load_view($cont, 'Brands');
    }
  

   
   
    
}
    
    
    
    
    
    
  
    
    
    
    

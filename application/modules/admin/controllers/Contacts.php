<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends MY_Controller 
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
      
        $data['result']=$this->Common_model->findAllWithJoin('','contact','*','','','','','','','id','desc');
        $data['datatable'] = true;
        $data['delete_popup'] = true;
        $cont = $this->load->view('contact-list', $data, true);
        $this->admin->load_view($cont, 'CMS');
    }
   
   
    
    public function delete(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);
        $del = $this->Common_model->delete($condition,'contact');
        if($del){
            $this->session->set_flashdata('success', 'Deleted Successfully');
        }
    }
    
   

    public function showPopup(){
        $param = $this->input->post('category');
        $data[$param] = true;
        $data['module'] = $this->input->post('module');
        $data['id']     = $this->input->post('id');
        echo $this->load->view('includes/popup', $data, true);
    }
   
    public function change_status(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);
        $result = $this->Common_model->findAllWithJoin($condition,'contact','*');
        $status = $result[0]['status'];
        $cond = array('id'=>$id);
        if($status == 'New'){
            $data=array(
                'status' =>'Checked'
            );
        }else{
            $data=array(
                'status' =>'New'
            ); 
        }
            
        $upd=$this->Common_model->update($data,'contact',$cond);
        if($upd){
            $this->session->set_flashdata('success', 'Status Changed Successfully');
        }
    }
    
}
    
    
    
    
    
    
  
    
    
    
    

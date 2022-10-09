<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flash_news extends MY_Controller 
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
      
        $data['result']=$this->Common_model->findAllWithJoin('','flash_news','*');
        
        //printr( $data['result']);exit;
        $data['datatable'] = true;
        $data['delete_popup'] = true;
        $cont = $this->load->view('flash_news/list', $data, true);
        $this->admin->load_view($cont, 'flash_news');
    }
   
    public function add()
    {
       // printr($this->input->post());exit;
        if($this->input->post()){
            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $this->form_validation->set_rules('title','Title','trim|required|max_length[100]');
           
            $file_name = '';
             
            $data=array( 
                'description' =>strip_tags($this->input->post('description')),
            
                
                
            );
            $result=$this->Common_model->add($data,'flash_news');
            if($result>0){
               
                $this->session->set_flashdata('success', 'flash news Inserted Successfully');
                redirect('admin/flash_news/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'flash news Insertion Failed');
                redirect('admin/flash_news/add');
                exit();
            }
            
        }
       // $data['keywords'] = getKeywords();
        $data['editor'] = true;

        $cont = $this->load->view('flash_news/manage_flash_news', $data, true);
        $this->admin->load_view($cont, 'flash_news');
    }
    
   
    
     public function update($id='')
    {
        
        if($this->input->post()){
            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $this->form_validation->set_rules('title','Title','trim|required|max_length[100]');
            
            $data=array( 
                'description' =>strip_tags($this->input->post('description')),
                                             
            );
            $condition = array('id'=>$id);
            $result=$this->Common_model->update($data,'flash_news',$condition);
            if($result>0){
              
                $this->session->set_flashdata('success', 'flash news Updated Successfully');
                redirect('admin/flash_news/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'flash news Updation Failed');
                redirect('admin/flash_news/update/'.$id);
                exit();
            }
                 
        }
        $condition = array('id'=>$id);
        $data['result']=$this->Common_model->findAllWithJoin($condition ,'flash_news','*');
        $data['result']= $data['result'][0];
        $data['editor'] = true;
        $this->id = $id;
       
        $cont = $this->load->view('flash_news/manage_flash_news', $data, true);
        $this->admin->load_view($cont, 'flash_news');
    }
    
    function upload_image($config,$file,$url)
    {
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($file))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
            redirect('admin/'.$url);
            exit();
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            return $file_name = $data['upload_data']['file_name'];
        }

    }
    
    
    public function delete(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);

        $result = $this->Common_model->findAllWithJoin($condition,'flash_news','*');
        $image = $result[0]['image'];

        $del = $this->Common_model->delete($condition,'flash_news');
        if($del){

            @unlink(FCPATH.'uploads/flash_news/'.$image);
            
            $this->session->set_flashdata('success', 'Flash News Deleted Successfully');
        }
    }
    
    public function change_status(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);
        $result = $this->Common_model->findAllWithJoin($condition,'flash_news','*');
        $status = $result[0]['status'];
        $cond = array('id'=>$id);
        if($status == 'Active'){
            $data=array(
                'status' =>'Inactive'
            );
        }else{
            $data=array(
                'status' =>'Active'
            ); 
        }
            
        $upd=$this->Common_model->update($data,'flash_news',$cond);
        if($upd){
            $this->session->set_flashdata('success', 'Status Changed Successfully');
        }
    }
    
     public function change_featured(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);
        $result = $this->Common_model->findAllWithJoin($condition,'flash_news','*');
        $featured = $result[0]['featured'];
        $cond = array('id'=>$id);
        if($featured == 1){
            $data=array(
                'featured' =>0
            );
        }else{
            $data=array(
                'featured' =>1
            ); 
        }
            
        $upd=$this->Common_model->update($data,'flash_news',$cond);
        if($upd){
            $this->session->set_flashdata('success', 'Flash News Changed Successfully');
        }
    }


    public function showPopup(){
        $param = $this->input->post('category');
        $data[$param] = true;
        $data['module'] = $this->input->post('module');
        $data['id']     = $this->input->post('id');
        echo $this->load->view('includes/popup', $data, true);
    }
    
     function urlSafeString($str)
{
    
    $str = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($str))));
   
   
    return $str;
}
   
    
}
    
    
    
    
    
    
  
    
    
    
    

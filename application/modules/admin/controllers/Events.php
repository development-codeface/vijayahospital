<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends MY_Controller 
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
      
        $data['result']=$this->Common_model->findAllWithJoin('','events','*');
        
        //printr( $data['result']);exit;
        $data['datatable'] = true;
        $data['delete_popup'] = true;
        $cont = $this->load->view('events/list', $data, true);
        $this->admin->load_view($cont, 'events');
    }
   
    public function add()
    {
       // printr($this->input->post());exit;
        if($this->input->post()){
            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $this->form_validation->set_rules('title','Title','trim|required|max_length[100]');
           
            $file_name = '';
            if($_FILES['image']['name']!=''){
                $config['upload_path']          = FCPATH."uploads/events/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                // $config['max_width']            = 128;
                // $config['max_height']           = 128;
                // $config['min_width']            = 128;
                // $config['min_height']           = 128;
                $file_name = $this->upload_image($config,'image','events/add');
            }
            $data=array(
                'title'=>strip_tags($this->input->post('title')),
                'description' =>strip_tags($this->input->post('description')),
                'date'=>date('Y-m-d',strtotime($this->input->post('date'))),                
                'image' => $file_name,
                
                
            );
            $result=$this->Common_model->add($data,'events');
            if($result>0){
               
                $this->session->set_flashdata('success', 'News / Events  Inserted Successfully');
                redirect('admin/events/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'News / Events  Insertion Failed');
                redirect('admin/events/add');
                exit();
            }
            
        }
       // $data['keywords'] = getKeywords();
        $data['editor'] = true;

        $cont = $this->load->view('events/manage_events', $data, true);
        $this->admin->load_view($cont, 'events');
    }
    
     public function update($id='')
    {
        
        if($this->input->post()){
            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $this->form_validation->set_rules('title','Title','trim|required|max_length[100]');
            $file_name = $this->input->post('img_val');
            if($_FILES['image']['name']!=''){
                $config['upload_path']          = FCPATH."uploads/events/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                // $config['max_width']            = 128;
                // $config['max_height']           = 128;
                // $config['min_width']            = 128;
                // $config['min_height']           = 128;
                $file_name = $this->upload_image($config,'image','events/update/'.$id);
            }
           
            $data=array(
                'title'=>strip_tags($this->input->post('title')),
                'description' =>strip_tags($this->input->post('description')),
                'date'=>date('Y-m-d',strtotime($this->input->post('date'))),                
                'image' => $file_name,
                             
            );
            $condition = array('id'=>$id);
            $result=$this->Common_model->update($data,'events',$condition);
            if($result>0){
              
                $this->session->set_flashdata('success', 'events Updated Successfully');
                redirect('admin/events/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'events Updation Failed');
                redirect('admin/events/update/'.$id);
                exit();
            }
                 
        }
        $condition = array('id'=>$id);
        $data['result']=$this->Common_model->findAllWithJoin($condition ,'events','*');
        $data['result']= $data['result'][0];
        $data['editor'] = true;
        $this->id = $id;
       
        $cont = $this->load->view('events/manage_events', $data, true);
        $this->admin->load_view($cont, 'events');
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

        $result = $this->Common_model->findAllWithJoin($condition,'events','*');
        $image = $result[0]['image'];

        $del = $this->Common_model->delete($condition,'events');
        if($del){

            @unlink(FCPATH.'uploads/events/'.$image);
            
            $this->session->set_flashdata('success', 'events Deleted Successfully');
        }
    }
    
    public function change_status(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);
        $result = $this->Common_model->findAllWithJoin($condition,'events','*');
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
            
        $upd=$this->Common_model->update($data,'events',$cond);
        if($upd){
            $this->session->set_flashdata('success', 'Status Changed Successfully');
        }
    }

    public function showPopup(){
        $param = $this->input->post('category');
        $data[$param] = true;
        $data['module'] = $this->input->post('module');
        $data['id']     = $this->input->post('id');
        echo $this->load->view('includes/popup', $data, true);
    }
   
    
}
    
    
    
    
    
    
  
    
    
    
    

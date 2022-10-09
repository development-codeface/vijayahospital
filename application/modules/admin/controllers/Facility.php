<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facility extends MY_Controller 
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
      
        $data['result']=$this->Common_model->findAllWithJoin('','facility','*');
        
        //printr( $data['result']);exit;
        $data['datatable'] = true;
        $data['delete_popup'] = true;
        $cont = $this->load->view('facility/list', $data, true);
        $this->admin->load_view($cont, 'facility');
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
                $config['upload_path']          = FCPATH."uploads/facility/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_width']            = 128;
                $config['max_height']           = 128;
                $config['min_width']            = 128;
                $config['min_height']           = 128;
                $file_name = $this->upload_image($config,'image','facility/add');
            }
            $data=array(
                'title'=>strip_tags($this->input->post('title')),
                'description' =>strip_tags($this->input->post('description')),
                'image' => $file_name,
                
                
            );
            $result=$this->Common_model->add($data,'facility');
            if($result>0){
               
                $this->session->set_flashdata('success', 'facility Inserted Successfully');
                redirect('admin/facility/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'facility Insertion Failed');
                redirect('admin/facility/add');
                exit();
            }
            
        }
       // $data['keywords'] = getKeywords();
        $data['editor'] = true;

        $cont = $this->load->view('facility/manage_facility', $data, true);
        $this->admin->load_view($cont, 'facility');
    }
    
     public function update($id='')
    {
        
        if($this->input->post()){
            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $this->form_validation->set_rules('title','Title','trim|required|max_length[100]');
            $file_name = $this->input->post('img_val');
            if($_FILES['image']['name']!=''){
                $config['upload_path']          = FCPATH."uploads/facility/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_width']            = 128;
                $config['max_height']           = 128;
                $config['min_width']            = 128;
                $config['min_height']           = 128;
                $file_name = $this->upload_image($config,'image','facility/update/'.$id);
            }
           
            $data=array(
                'title'=>strip_tags($this->input->post('title')),
                 'description' =>strip_tags($this->input->post('description')),
                'image' => $file_name,
                             
            );
            $condition = array('id'=>$id);
            $result=$this->Common_model->update($data,'facility',$condition);
            if($result>0){
              
                $this->session->set_flashdata('success', 'facility Updated Successfully');
                redirect('admin/facility/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'facility Updation Failed');
                redirect('admin/facility/update/'.$id);
                exit();
            }
                 
        }
        $condition = array('id'=>$id);
        $data['result']=$this->Common_model->findAllWithJoin($condition ,'facility','*');
        $data['result']= $data['result'][0];
        $data['editor'] = true;
        $this->id = $id;
       
        $cont = $this->load->view('facility/manage_facility', $data, true);
        $this->admin->load_view($cont, 'facility');
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

        $result = $this->Common_model->findAllWithJoin($condition,'facility','*');
        $image = $result[0]['image'];

        $del = $this->Common_model->delete($condition,'facility');
        if($del){

            @unlink(FCPATH.'uploads/facility/'.$image);
            
            $this->session->set_flashdata('success', 'facility Deleted Successfully');
        }
    }
    
    public function change_status(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);
        $result = $this->Common_model->findAllWithJoin($condition,'facility','*');
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
            
        $upd=$this->Common_model->update($data,'facility',$cond);
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
    
    
    
    
    
    
  
    
    
    
    

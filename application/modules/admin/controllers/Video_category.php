<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_category extends MY_Controller 
{
 
    public function __construct() 
    {
        parent::__construct();  
       
        $this->load->model('Common_model');
        if (!$this->session->userdata['userdata']['logged_in'])
        { 
            redirect('admin/authentication');
        }
       
      
    } 

    
    public function index()
    {
        $data['result'] = $this->Common_model->findAllWithJoin('','video_category','*');
        $cont = $this->load->view('video_category/list', $data, true);
        $this->admin->load_view($cont, 'Video');
    }
    
        public function add()
    {

        if($this->input->post()){
            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $this->form_validation->set_rules('title','Title','trim|required|max_length[100]');


            $data=array(
                'name'=>$this->input->post('title')

            );
            $result=$this->Common_model->add($data,'video_category');
            if($result>0){
               
                $this->session->set_flashdata('success', 'Video Category Inserted Successfully');
                redirect('admin/video_category/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'Video Category Insertion Failed');
                redirect('admin/video_category/add');
                exit();
            }
            
        }

        $data['editor'] = true;
        $cont = $this->load->view('video_category/manage_video_category', $data, true);
        $this->admin->load_view($cont, 'Video Category');
    }
     public function update($id='')
     {
        
        if($this->input->post()){
            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $this->form_validation->set_rules('title','Title','trim|required|max_length[100]');

           
            $data=array(
                'name'=>$this->input->post('title')
               
            );
            $condition = array('id'=>$id);

            $result=$this->Common_model->update($data,'video_category',$condition);

            if($result>0){
            
                $this->session->set_flashdata('success', 'Video Category Updated Successfully');
                redirect('admin/video_category/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'Video Category Updation Failed');
                redirect('admin/video_category/update/'.$id);
                exit();
            }
                 
        }
        $condition = array('id'=>$id);
        $data['result']=$this->Common_model->findAllWithJoin($condition ,'video_category','*');
        $data['result']= $data['result'][0];
        $data['editor'] = true;
        $this->id = $id;

        $cont = $this->load->view('video_category/manage_video_category', $data, true);
        $this->admin->load_view($cont, 'Video Category');
    }
        
   

    public function change_status(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);
        $result = $this->Common_model->findAllWithJoin($condition,'video_category','*');
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
            
        $upd=$this->Common_model->update($data,'video_category',$cond);
        if($upd){
            $this->session->set_flashdata('success', 'Status Changed Successfully');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $cond = array('id'=>$id);

        $cond1 = array('category'=>$id);
        $result = $this->Common_model->findAllWithJoin($cond1,'video','*');

        $del = $this->Common_model->delete($cond,'video_category');

        if($del){
            foreach ($result as $key => $value) {

                $del1 = $this->Common_model->delete($cond1,'video');
                
            }   
            
            $this->session->set_flashdata('success', 'Video category Deleted Successfully');
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
    
    
    
    
    
    
  
    
    
    
    

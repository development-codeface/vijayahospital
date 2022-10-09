<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends MY_Controller 
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
      
        $data['result']=$this->Common_model->findAllWithJoin('','jobs','*');
        
        //printr( $data['result']);exit;
        $data['datatable'] = true;
        $data['delete_popup'] = true;
        $cont = $this->load->view('jobs/list', $data, true);
        $this->admin->load_view($cont, 'jobs');
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
                'title' =>strip_tags($this->input->post('title')),
                'description' =>strip_tags($this->input->post('description')),
            
                
                
            );
            $result=$this->Common_model->add($data,'jobs');
            if($result>0){
               
                $this->session->set_flashdata('success', 'Jobs Inserted Successfully');
                redirect('admin/jobs/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'Jobs Insertion Failed');
                redirect('admin/jobs/add');
                exit();
            }
            
        }
       // $data['keywords'] = getKeywords();
        $data['editor'] = true;

        $cont = $this->load->view('jobs/manage_jobs', $data, true);
        $this->admin->load_view($cont, 'jobs');
    }
    
   public function list_enquiries($JobId='')
   {
        $condition = array('career_id'=>$JobId);
        $data['result']=$this->Common_model->findAllWithJoin($condition ,'career_enquiry','*','','','','','','','id','DESC');
        $cont = $this->load->view('jobs/list_enquiries', $data, true);
        $this->admin->load_view($cont, 'jobs');
   }
    
     public function update($id='')
    {
        
        if($this->input->post()){
            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $this->form_validation->set_rules('title','Title','trim|required|max_length[100]');
            
            $data=array( 
                'title' =>strip_tags($this->input->post('title')),

                'description' =>strip_tags($this->input->post('description')),
                                             
            );
            $condition = array('id'=>$id);
            $result=$this->Common_model->update($data,'jobs',$condition);
            if($result>0){
              
                $this->session->set_flashdata('success', 'Jobs Updated Successfully');
                redirect('admin/jobs/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'Jobs Updation Failed');
                redirect('admin/jobs/update/'.$id);
                exit();
            }
                 
        }
        $condition = array('id'=>$id);
        $data['result']=$this->Common_model->findAllWithJoin($condition ,'jobs','*');
        $data['result']= $data['result'][0];
        $data['editor'] = true;
        $this->id = $id;
       
        $cont = $this->load->view('jobs/manage_jobs', $data, true);
        $this->admin->load_view($cont, 'jobs');
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

        $result = $this->Common_model->findAllWithJoin($condition,'jobs','*');
        $image = $result[0]['image'];

        $del = $this->Common_model->delete($condition,'jobs');
        if($del){

            @unlink(FCPATH.'uploads/jobs/'.$image);
            
            $this->session->set_flashdata('success', 'Jobs Deleted Successfully');
        }
    }
    
    public function change_status(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);
        $result = $this->Common_model->findAllWithJoin($condition,'jobs','*');
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
            
        $upd=$this->Common_model->update($data,'jobs',$cond);
        if($upd){
            $this->session->set_flashdata('success', 'Status Changed Successfully');
        }
    }
    
     public function change_featured(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);
        $result = $this->Common_model->findAllWithJoin($condition,'jobs','*');
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
            
        $upd=$this->Common_model->update($data,'jobs',$cond);
        if($upd){
            $this->session->set_flashdata('success', 'Jobs Changed Successfully');
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
    
    
    
    
    
    
  
    
    
    
    

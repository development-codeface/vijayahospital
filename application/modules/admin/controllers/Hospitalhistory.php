<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospitalhistory extends MY_Controller 
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
      
        $data['result']=$this->Common_model->findAllWithJoin('','hospitalhistory','*');
        
        //printr( $data['result']);exit;
        $data['datatable'] = true;
        $data['delete_popup'] = true;
        $cont = $this->load->view('hospitalhistory/list', $data, true);
        $this->admin->load_view($cont, 'hospitalhistory');
    }
   
    public function add()
    {
       // printr($this->input->post());exit;
        if($this->input->post()){
       // var_dump($_FILES);exit();

            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $this->form_validation->set_rules('title','Title','trim|required|max_length[100]');
           
            $file_name = '';
            if($_FILES['image']['name']!=''){
                $config['upload_path']          = FCPATH."uploads/hospitalhistory/";
                $config['allowed_types']        = 'png|gif|jpg|jpeg';
                $config['max_width']            = 350;
                $config['max_height']           = 750;
                $config['min_width']            = 350;
                $config['min_height']           = 750;
                $file_name = $this->upload_image($config,'image','hospitalhistory/add');
            }
            $data=array(
                'year'=>strip_tags($this->input->post('year')),
                'title'=>strip_tags($this->input->post('title')),
                'description' =>strip_tags($this->input->post('description')),
                'image' => $file_name,
                
                
            );
            $result=$this->Common_model->add($data,'hospitalhistory');
            if($result>0){
               
                $this->session->set_flashdata('success', 'hospitalhistory Inserted Successfully');
                redirect('admin/hospitalhistory/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'hospitalhistory Insertion Failed');
                redirect('admin/hospitalhistory/add');
                exit();
            }
            
        }
       // $data['keywords'] = getKeywords();
        $data['editor'] = true;

        $cont = $this->load->view('hospitalhistory/manage_hospitalhistory', $data, true);
        $this->admin->load_view($cont, 'hospitalhistory');
    }
    
     public function update($id='')
    {
        
        if($this->input->post()){
            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $this->form_validation->set_rules('title','Title','trim|required|max_length[100]');
            $file_name = $this->input->post('img_val');
            if($_FILES['image']['name']!=''){
                $config['upload_path']          = FCPATH."uploads/hospitalhistory/";
                $config['allowed_types']        = 'png|gif|jpg|jpeg';
                $config['max_width']            = 350;
                $config['max_height']           = 750;
                $config['min_width']            = 350;
                $config['min_height']           = 750;
                $file_name = $this->upload_image($config,'image','hospitalhistory/update/'.$id);
            }
           
            $data=array(
                'year'=>strip_tags($this->input->post('year')),                
                'title'=>strip_tags($this->input->post('title')),
                 'description' =>strip_tags($this->input->post('description')),
                'image' => $file_name,
                             
            );
            $condition = array('id'=>$id);
            $result=$this->Common_model->update($data,'hospitalhistory',$condition);
            if($result>0){
              
                $this->session->set_flashdata('success', 'hospitalhistory Updated Successfully');
                redirect('admin/hospitalhistory/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'hospitalhistory Updation Failed');
                redirect('admin/hospitalhistory/update/'.$id);
                exit();
            }
                 
        }
        $condition = array('id'=>$id);
        $data['result']=$this->Common_model->findAllWithJoin($condition ,'hospitalhistory','*');
        $data['result']= $data['result'][0];
        $data['editor'] = true;
        $this->id = $id;
       
        $cont = $this->load->view('hospitalhistory/manage_hospitalhistory', $data, true);
        $this->admin->load_view($cont, 'hospitalhistory');
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

        $result = $this->Common_model->findAllWithJoin($condition,'hospitalhistory','*');
        $image = $result[0]['image'];

        $del = $this->Common_model->delete($condition,'hospitalhistory');
        if($del){

            @unlink(FCPATH.'uploads/hospitalhistory/'.$image);
            
            $this->session->set_flashdata('success', 'hospitalhistory Deleted Successfully');
        }
    }
    
    public function change_status(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);
        $result = $this->Common_model->findAllWithJoin($condition,'hospitalhistory','*');
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
            
        $upd=$this->Common_model->update($data,'hospitalhistory',$cond);
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
    
    
    
    
    
    
  
    
    
    
    

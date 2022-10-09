<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends MY_Controller 
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
      
        $data['result']=$this->Common_model->findAllWithJoin('','testimonial','*');
        $data['datatable'] = true;
        $data['delete_popup'] = true;

        $cont = $this->load->view('testimonial/list', $data, true);
        $this->admin->load_view($cont, 'Testimonial');
    }
   
    public function add()
    {
       // printr($this->input->post());exit;
        if($this->input->post()){
            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $this->form_validation->set_rules('name','Title','trim|required|max_length[100]');
            $this->form_validation->set_rules('description','Description','trim|required');
           
            $file_name = '';
            if($_FILES['image']['name']!=''){
                $config['upload_path']          = FCPATH."uploads/testimonial/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_width']            = 100;
                $config['max_height']           = 100;
                $config['min_width']            = 100;
                $config['min_height']           = 100;
                $file_name = $this->upload_image($config,'image','testimonial/add');
            }
            $data=array(
                'name'=>$this->input->post('name'),
                'description' =>strip_tags($this->input->post('description')),
                'image' => $file_name,
                
            );
            $result=$this->Common_model->add_with_insertid($data,'testimonial');
            if($result>0){
               
                $this->session->set_flashdata('success', 'Testimonial Inserted Successfully');
                redirect('admin/testimonial/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'Testimonial Insertion Failed');
                redirect('admin/testimonial/add');
                exit();
            }
            
        }
       // $data['keywords'] = getKeywords();
        $data['editor'] = true;
        $cont = $this->load->view('testimonial/manage_testimonial', $data, true);
        $this->admin->load_view($cont, 'Testimonial');
    }
     public function update($id='')
    {
        
        if($this->input->post()){
            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $this->form_validation->set_rules('name','Title','trim|required|max_length[100]');
            $this->form_validation->set_rules('description','Description','trim|required');
            $file_name = $this->input->post('img_val');
            if($_FILES['image']['name']!=''){
                $config['upload_path']          = FCPATH."uploads/testimonial/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_width']            = 100;
                $config['max_height']           = 100;
                $config['min_width']            = 100;
                $config['min_height']           = 100;
                $file_name = $this->upload_image($config,'image','testimonial/update'.$id);
            }
           
            $data=array(
                'name'=>$this->input->post('name'),
                'description' =>strip_tags($this->input->post('description')),
                'image'       => $file_name,
               
            );
            $condition = array('id'=>$id);
            // printr($data);exit;
            $result=$this->Common_model->update($data,'testimonial',$condition);
            //printr($result);exit;
            if($result>0){
               
                $this->session->set_flashdata('success', 'Testimonial Updated Successfully');
                redirect('admin/testimonial/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'Testimonial Updation Failed');
                redirect('admin/testimonial/update/'.$id);
                exit();
            }
                 
        }
        $condition = array('id'=>$id);
        $data['result']=$this->Common_model->findAllWithJoin($condition ,'testimonial','*');
        $data['result']= $data['result'][0];
        $data['editor'] = true;
        $this->id = $id;
       // $data['keywords'] = getKeywords();
        $cont = $this->load->view('testimonial/manage_testimonial', $data, true);
        $this->admin->load_view($cont, 'Testimonial');
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

         $result = $this->Common_model->findAllWithJoin($condition,'testimonial','*');
        $image = $result[0]['image'];

        $del = $this->Common_model->delete($condition,'testimonial');
        if($del){
            @unlink(FCPATH.'uploads/testimonial/'.$image);
            $this->session->set_flashdata('success', 'Deleted Successfully');
        }
    }
    
    public function change_status(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);
        $result = $this->Common_model->findAllWithJoin($condition,'testimonial','*');
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
            
        $upd=$this->Common_model->update($data,'testimonial',$cond);
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
    
    
    
    
    
    
  
    
    
    
    

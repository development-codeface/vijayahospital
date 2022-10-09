<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends MY_Controller 
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
      
        $data['result']=$this->Common_model->findAllWithJoin('','cms','*');
        $data['datatable'] = true;
        $data['delete_popup'] = true;
        $data['tot_cms_count'] = count($data['result']);
        $cont = $this->load->view('cms/list', $data, true);
        $this->admin->load_view($cont, 'CMS');
    }
   
    public function add()
    {
       // printr($this->input->post());exit;
        if($this->input->post()){
            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $this->form_validation->set_rules('title','Title','trim|required|max_length[100]');
             $this->form_validation->set_rules('short_description','Short Description','trim|required');
            $this->form_validation->set_rules('description','Description','trim|required');
           
            $file_name = '';
            if($_FILES['image']['name']!=''){
                $config['upload_path']          = FCPATH."uploads/cms/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $file_name = $this->upload_image($config,'image','cms/add');
            }
            $data=array(
                'title'=>$this->input->post('title'),
                'description' =>$this->input->post('description'),
                 'short_description' =>$this->input->post('short_description'),
                'subtitle' =>$this->input->post('subtitle'),
                'icon' =>$this->input->post('icons_disp'),
                'image' => $file_name,
                
            );
            $result=$this->Common_model->add_with_insertid($data,'cms');
            if($result>0){
                $datas = array('module'=>'cms','product_id'=>$result,'URL_slug'=>$this->input->post('title'));
                add_seo_url_slug($datas);
                $this->session->set_flashdata('success', 'CMS Inserted Successfully');
                redirect('admin/cms/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'CMS Insertion Failed');
                redirect('admin/cms/add');
                exit();
            }
            
        }
       // $data['keywords'] = getKeywords();
        $data['editor'] = true;
        $cont = $this->load->view('cms/manage_cms', $data, true);
        $this->admin->load_view($cont, 'CMS');
    }
     public function update($id='')
    {
        
        if($this->input->post()){
            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $this->form_validation->set_rules('title','Title','trim|required|max_length[100]');
             $this->form_validation->set_rules('short_description','Short Description','trim|required');
            $this->form_validation->set_rules('description','Description','trim|required');
            $file_name = $this->input->post('img_val');
            if($_FILES['image']['name']!=''){
                $config['upload_path']          = FCPATH."uploads/cms/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                // $config['max_width']            = 400;
                //$config['max_height']           = 107;
                $file_name = $this->upload_image($config,'image','cms/update'.$id);
            }
           
            $data=array(
                'title'=>$this->input->post('title'),
                'description' =>$this->input->post('description'),
                 'short_description' =>$this->input->post('short_description'),
                'subtitle'    =>$this->input->post('subtitle'),
                'icon'        =>$this->input->post('icons_disp'),
                'image'       => $file_name,
               
            );
            $condition = array('id'=>$id);
            // printr($data);exit;
            $result=$this->Common_model->update($data,'cms',$condition);
            //printr($result);exit;
            if($result>0){
                $datas = array('module'=>'cms','product_id'=>$id,'URL_slug'=>$this->input->post('title'));
                add_seo_url_slug($datas,'update');
                $this->session->set_flashdata('success', 'CMS Updated Successfully');
                redirect('admin/cms/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'CMS Updation Failed');
                redirect('admin/cms/update/'.$id);
                exit();
            }
                 
        }
        $condition = array('id'=>$id);
        $data['result']=$this->Common_model->findAllWithJoin($condition ,'cms','*');
        $data['result']= $data['result'][0];
        $data['editor'] = true;
        $this->id = $id;
       // $data['keywords'] = getKeywords();
        $cont = $this->load->view('cms/manage_cms', $data, true);
        $this->admin->load_view($cont, 'CMS');
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

        $result = $this->Common_model->findAllWithJoin($condition,'cms','*');
        $image = $result[0]['image'];

        $del = $this->Common_model->delete($condition,'cms');
        if($del){
            @unlink(FCPATH.'uploads/cms/'.$image);
          
            $this->session->set_flashdata('success', 'Deleted Successfully');
        }
    }
    
    public function change_status(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);
        $result = $this->Common_model->findAllWithJoin($condition,'cms','*');
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
            
        $upd=$this->Common_model->update($data,'cms',$cond);
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
    
    
    
    
    
    
  
    
    
    
    

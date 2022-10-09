<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_management extends MY_Controller 
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
      
        
        $data['result']=$this->Common_model->findAllWithJoin('','banners','*');
        $data['datatable'] = true;
        $data['delete_popup'] = true;
        $cont = $this->load->view('banners/list', $data, true);
        $this->admin->load_view($cont, 'Brands');
    }
   
    public function add($id='')
    {
        if($this->input->post()){
            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $file_name = '';
            if($_FILES['image']['name']!=''){
                $config['upload_path']          = FCPATH."uploads/banners/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_width']            = 810;
                $config['max_height']           = 500;
                $config['min_width']            = 810;
                $config['min_height']           = 500;
                $file_name = $this->upload_image($config,'image','banner_management/add');
                $data=array(
                    'image' => $file_name,
                    'title1' => $this->input->post('title1'),
                    'title2' => $this->input->post('title2'),
                    'description' => strip_tags($this->input->post('description')),
                );
                $result=$this->Common_model->add($data,'banners');
                if($result>0){
                    $this->session->set_flashdata('success', 'Banner Inserted Successfully');
                    redirect('admin/banner_management');
                    exit();

                }else{
                    $this->session->set_flashdata('error', 'Banner Insertion Failed');
                    redirect('admin/banner_management/add');
                    exit();
                }
            } else{
                $this->session->set_flashdata('error', 'Please Upload Banner Image');
                redirect('admin/banner_management/add');
                exit();
            }
            
               
            
        }
        
        $cont = $this->load->view('banners/manage_banners', $data, true);
        $this->admin->load_view($cont, 'Banner management');
    }
     public function update($id='')
    {
        
        if($this->input->post()){
            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $file_name = $this->input->post('img_val');
            if($_FILES['image']['name']!=''){
                $config['upload_path']          = FCPATH."uploads/banners/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_width']            = 810;
                $config['max_height']           = 500;
                $config['min_width']            = 810;
                $config['min_height']           = 500;
                $file_name = $this->upload_image($config,'image','banner_management/update/'.$id);
               
            }
            $data=array(
                'image' => $file_name,
                'title1' => $this->input->post('title1'),
                'title2' => $this->input->post('title2'),
                'description' => $this->input->post('description'),
            );
            $condition = array('id'=>$id);
            // printr($data);exit;
            $result=$this->Common_model->update($data,'banners',$condition);
            //printr($result);exit;
            if($result>0){
                $this->session->set_flashdata('success', 'Banner Updated Successfully');
                redirect('admin/banner_management');
                exit();

            }else{
                $this->session->set_flashdata('error', 'Banner Updation Failed');
                redirect('admin/banner_management/update/'.$id);
                exit();
            }
            
        }
       
        $condition = array('id'=>$id);
        $data['result']=$this->Common_model->findAllWithJoin($condition ,'banners','*');
        $data['result']= $data['result'][0];
     
        $this->id = $id;
        $cont = $this->load->view('banners/manage_banners', $data, true);
        $this->admin->load_view($cont, 'BRANDS');
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

        $result = $this->Common_model->findAllWithJoin($condition,'banners','*');
        $image = $result[0]['image'];

        $del = $this->Common_model->delete($condition,'banners');
        if($del){
            @unlink(FCPATH.'uploads/banners/'.$image);

            $this->session->set_flashdata('success', 'Deleted Successfully');
        }
    }
    
    public function change_status(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);
        $result = $this->Common_model->findAllWithJoin($condition,'banners','*');
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
            
        $upd=$this->Common_model->update($data,'banners',$cond);
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

 

    public function update_banner_logo($id){

        if(!empty($_FILES)){
         
            $logo_company     = $this->input->post('img_val_company');
            $logo_welcome     = $this->input->post('img_val_welcome');
            
            if($_FILES['logo_company']['name']!=''){
                $config['upload_path']          = FCPATH."uploads/banners/logo/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_width']            = 400;
                $config['max_height']           = 80;
                $config['minwidth']             = 400;
                $config['min_height']           = 80;
                $logo_company = $this->upload_image($config,'logo_company','banner_management/update_banner_logo/'.$id);
            }


            if($_FILES['logo_welcome']['name']!=''){
                $config['upload_path']          = FCPATH."uploads/banners/logo/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_width']            = 550;
                $config['max_height']           = 300;
                $config['minwidth']             = 550;
                $config['min_height']           = 300;
                $logo_welcome = $this->upload_image($config,'logo_welcome','banner_management/update_banner_logo/'.$id);
            }
            
            
          // printr($_FILES['pdf']['name']);exit;
            //if($logo_certificate!='' &&  $logo_company!=''){
                $data=array(
                   
                   'logo_company' => $logo_company,
                   'logo_welcome' => $logo_welcome,
                  
                );
              //  printr($data);exit;
                $condition = array('id'=>$this->input->post('id'));
                $result=$this->Common_model->update($data,'banner_logo',$condition);
              //  printr($result);exit;
                if($result>0){
                    $this->session->set_flashdata('success', 'Details Updated Successfully');
                    redirect('admin/Banner_management/update_banner_logo/'.$id);
                    exit();

                }else{
                    $this->session->set_flashdata('error', 'Details Updation Failed');
                    redirect('admin/Banner_management/update_banner_logo/'.$id);
                    exit();
                }
           // }
            
               
        }
       
        $condition = array('id'=>$id);
        $data['result']=$this->Common_model->findAllWithJoin($condition ,'banner_logo','*');
        $data['result']= $data['result'][0];
        $data['id'] = $id;
        //printr($data['result']);exit;
        $cont = $this->load->view('banners/update_banner_logo', $data, true);
        $this->admin->load_view($cont, '');
    }
   
    
}
    
    
    
    
    
    
  
    
    
    
    

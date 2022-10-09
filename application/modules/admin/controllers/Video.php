<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends MY_Controller 
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
    public function index($id='')
    { 
        $cond = ['category'=>$id];
        $data['result']=$this->Common_model->findAllWithJoin($cond,'video','*');
        $data['datatable'] = true;
        $data['delete_popup'] = true;
        $data['id']  = $id;

        $cont = $this->load->view('video/list', $data, true);
        $this->admin->load_view($cont, 'Video');
    }
   
    public function add($id='')
    {
       // printr($this->input->post());exit;
        if($this->input->post()){
            //if (preg_match('/^[a-zA-Z\s-]+$/', $this->input->post('slug'))) {
                $id=$this->input->post('id');
                $this->load->helper(array('form','url'));
                $this->form_validation->set_rules('title','Title','trim|required|max_length[100]');
                $this->form_validation->set_rules('url','url','trim|required|url');
                //$this->form_validation->set_rules('short_description','short description','trim|required');
               // $this->form_validation->set_rules('created_at','short description','trim|required');
               
                $data=array(
                    'title'=>$this->input->post('title'),
                    'slug'=> str_replace(' ', '-', $this->input->post('slug')),
                     'category'=> $this->input->post('category_id')!=''?$this->input->post('category_id'):0,
                    'description' =>$this->input->post('description'),
                    'url'=> $this->input->post('url'),
                    'short_description'=>strip_tags($this->input->post('short_description')),
                    'created_at'=>date('Y-m-d',strtotime($this->input->post('created_at')))
                );
                $result=$this->Common_model->add_with_insertid($data,'video');
                
                if($result>0) {
                    $this->session->set_flashdata('success', 'Video Inserted Successfully');
                    //redirect('admin/video/index');
                    redirect('admin/video/index/'.$this->input->post('category_id'));
                    exit();

                }else{
                    $this->session->set_flashdata('error', 'Video Insertion Failed');
                    redirect('admin/video/add');
                    exit();
                }
            /*}else{
                 $this->session->set_flashdata('error', 'URL KEY Contains only letters and space');
                     redirect('admin/video/add');
                    exit();
            }*/
            
        }
       // $data['keywords'] = getKeywords();
        $data['editor'] = true;
        $data['result']['category_id'] = $id;
        $cont = $this->load->view('video/manage_video', $data, true);
        $this->admin->load_view($cont, 'video');
    }
    
     public function update($id='')
    {
        
        if($this->input->post()){
            //if (preg_match('/^[a-zA-Z\s-]+$/', $this->input->post('slug'))) {
                $id=$this->input->post('id');
                $this->load->helper(array('form','url'));
                $this->form_validation->set_rules('title','Title','trim|required|max_length[100]');
                $this->form_validation->set_rules('url','url','trim|required');
                //$this->form_validation->set_rules('short_description','short description','trim|required');
               // $this->form_validation->set_rules('created_at','Date','trim|required');

                if($this->form_validation->run()==false)
                {
                    $this->session->set_flashdata('error', 'Please Fill Mandatory Fields');
                    redirect('admin/video/update/'.$id);
                    exit();
                }

               
                $data=array(
                    'title'=>$this->input->post('title'),
                    'slug'=> str_replace(' ', '-', $this->input->post('slug')),
                     'category'=> $this->input->post('category_id')!=''?$this->input->post('category_id'):0,
                    'description' =>$this->input->post('description'),
                    'url'=> $this->input->post('url'),
                    'short_description'=>strip_tags($this->input->post('short_description')),
                    'created_at'=>date('Y-m-d',strtotime($this->input->post('created_at')))
                );
                $condition = array('id'=>$id);
                $result=$this->Common_model->update($data,'video',$condition);
                if($result>0){
                  
                    $this->session->set_flashdata('success', 'Video Updated Successfully');
                    //redirect('admin/video/index');
                     redirect('admin/video/index/'.$this->input->post('category_id'));
                    exit();

                }else{
                    $this->session->set_flashdata('error', 'Video Updation Failed');
                    redirect('admin/video/update/'.$id);
                   
                    exit();
                }
           /* }else{
                 $this->session->set_flashdata('error', 'URL KEY Contains only letters and space');
                  redirect('admin/video/update/'.$id);
                   
                    exit();
            }*/
                 
        }
        $condition = array('id'=>$id);
        $data['result']=$this->Common_model->findAllWithJoin($condition ,'video','*');
        $data['result']= $data['result'][0];
        $data['editor'] = true;
        $this->id = $id;
        $data['result']['category_id'] =  $data['result']['category'];

        $cont = $this->load->view('video/manage_video', $data, true);
        $this->admin->load_view($cont, 'video');
    }
    
 
    
    
    public function delete(){
            $id = $this->input->post('id');
            $condition = array('id'=>$id);
            $del = $this->Common_model->delete($condition,'video');
            if($del){
                $this->session->set_flashdata('success', 'Video Deleted Successfully');
            }
       
    }
    
    public function change_status(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);
        $result = $this->Common_model->findAllWithJoin($condition,'video','*');
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
            
        $upd=$this->Common_model->update($data,'video',$cond);
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
    
    
    
    
    
    
  
    
    
    
    

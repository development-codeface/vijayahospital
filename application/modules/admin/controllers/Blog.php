<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller 
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
      
        $data['result']=$this->Common_model->findAllWithJoin('','blog','*');
        
        //printr( $data['result']);exit;
        $data['datatable'] = true;
        $data['delete_popup'] = true;
        $cont = $this->load->view('blog/list', $data, true);
        $this->admin->load_view($cont, 'blog');
    }
   
    public function add()
    {
       // printr($this->input->post());exit;
        if($this->input->post()){
            if (preg_match('/^[a-zA-Z\s-]+$/', $this->input->post('slug'))) {
                $id=$this->input->post('id');
                $this->load->helper(array('form','url'));
                $this->form_validation->set_rules('title','Title','trim|required');
                $this->form_validation->set_rules('slug','URL KEY','trim|required|');
                $this->form_validation->set_rules('short_description','short description','trim|required');
                $this->form_validation->set_rules('created_at','Date','trim|required');
                $file_name = '';
                if($_FILES['image']['name']!=''){
                    $config['upload_path']          = FCPATH."uploads/blog/";
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['max_width']            = 700;
                    $config['max_height']           = 400;
                    $config['min_width']            = 700;
                    $config['min_height']           = 400;
                    $file_name = $this->upload_image($config,'image','blog/add');
                }
                $data=array(
                     'type'=>$this->input->post('blog_type'),
                    'title'=>$this->input->post('title'),
                    'slug'=> str_replace(' ', '-', $this->input->post('slug')),
                    'description' =>$this->input->post('description'),
                    'short_description'=>strip_tags($this->input->post('short_description')),
                    'image' => $file_name,
                    'url' => ($this->input->post('url'))?$this->input->post('url'):'',
                    'created_at'=>date('Y-m-d',strtotime($this->input->post('created_at')))
                    
                );
                $result=$this->Common_model->add($data,'blog');
                if($result>0){
                   
                    $this->session->set_flashdata('success', 'blog Inserted Successfully');
                    redirect('admin/blog/index');
                    exit();

                }else{
                    $this->session->set_flashdata('error', 'blog Insertion Failed');
                    redirect('admin/blog/add');
                    exit();
                }
            }else{
                 $this->session->set_flashdata('error', 'URL KEY Contains only letters and space');
                     redirect('admin/blog/add');
                    exit();
            }
            
        }
       // $data['keywords'] = getKeywords();
        $data['editor'] = true;

        $cont = $this->load->view('blog/manage_blog', $data, true);
        $this->admin->load_view($cont, 'blog');
    }
    
     public function update($id='')
    {
        
        if($this->input->post()){
            if (preg_match('/^[a-zA-Z\s-]+$/', $this->input->post('slug'))) {
                $id=$this->input->post('id');
                $this->load->helper(array('form','url'));
                $this->form_validation->set_rules('title','Title','trim|required');
                $this->form_validation->set_rules('slug','URL Key','trim|required');
                $this->form_validation->set_rules('short_description','short description','trim|required');
                $this->form_validation->set_rules('created_at','Date','trim|required');
                if($this->input->post('blog_type')=='image'){
                    $file_name = $this->input->post('img_val');
                    if($_FILES['image']['name']!=''){
                        $config['upload_path']          = FCPATH."uploads/blog/";
                        $config['allowed_types']        = 'gif|jpg|png|jpeg';
                        $config['max_width']            = 700;
                        $config['max_height']           = 400;
                        $config['min_width']            = 700;
                        $config['min_height']           = 400;
                        $file_name = $this->upload_image($config,'image','blog/update/'.$id);
                    }
                }else{
                    @unlink(FCPATH.'uploads/blog/'.$this->input->post('img_val'));
                    $file_name ='';
                }
               
                $data=array(
                      'type'=>$this->input->post('blog_type'),
                    'title'=>$this->input->post('title'),
                    'slug'=> str_replace(' ', '-', $this->input->post('slug')),
                    'description' =>$this->input->post('description'),
                    'short_description'=>strip_tags($this->input->post('short_description')),
                    'image' => $file_name,
                    'url' => ($this->input->post('url'))?$this->input->post('url'):'',
                    'created_at'=>date('Y-m-d',strtotime($this->input->post('created_at')))
                );
                $condition = array('id'=>$id);
                $result=$this->Common_model->update($data,'blog',$condition);
                if($result>0){
                  
                    $this->session->set_flashdata('success', 'blog Updated Successfully');
                    redirect('admin/blog/index');
                    exit();

                }else{
                    $this->session->set_flashdata('error', 'blog Updation Failed');
                    redirect('admin/blog/update/'.$id);
                    exit();
                }
            }else{
                 $this->session->set_flashdata('error', 'URL KEY Contains only letters and space');
                    redirect('admin/blog/update/'.$id);
                    exit();
            }
                 
        }
        $condition = array('id'=>$id);
        $data['result']=$this->Common_model->findAllWithJoin($condition ,'blog','*');
        $data['result']= $data['result'][0];
        $data['editor'] = true;
        $this->id = $id;

        $cont = $this->load->view('blog/manage_blog', $data, true);
        $this->admin->load_view($cont, 'blog');
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

        $result = $this->Common_model->findAllWithJoin($condition,'blog','*');
        $image = $result[0]['image'];

        $del = $this->Common_model->delete($condition,'blog');
        if($del){
            @unlink(FCPATH.'uploads/blog/'.$image);
           
            
            $this->session->set_flashdata('success', 'blog Deleted Successfully');
        }
    }
    
    public function change_status(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);
        $result = $this->Common_model->findAllWithJoin($condition,'blog','*');
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
            
        $upd=$this->Common_model->update($data,'blog',$cond);
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
    
    
    
    
    
    
  
    
    
    
    

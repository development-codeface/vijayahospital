<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_care extends MY_Controller 
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
      
        //$data['result']=$this->Common_model->findAllWithJoin('','patient_care','*');
        
        //printr( $data['result']);exit;
        $data['datatable'] = true;
        $data['delete_popup'] = true;
        $cont = $this->load->view('patient_care/list', $data, true);
        $this->admin->load_view($cont, 'patient_care');
    }
   
    // public function add()
    // {
    //    // printr($this->input->post());exit;
    //     if($this->input->post()){
    //         $id=$this->input->post('id');
    //         $this->load->helper(array('form','url'));
    //         $this->form_validation->set_rules('title','Title','trim|required|max_length[100]');
           
    //         $file_name = '';
    //         if($_FILES['image']['name']!=''){
    //             $config['upload_path']          = FCPATH."uploads/patient_care/";
    //             $config['allowed_types']        = 'gif|jpg|png|jpeg';
    //             $config['max_width']            = 128;
    //             $config['max_height']           = 128;
    //             $config['min_width']            = 128;
    //             $config['min_height']           = 128;
    //             $file_name = $this->upload_image($config,'image','patient_care/add');
    //         }
    //         $data=array(
    //             'title'=>strip_tags($this->input->post('title')),
    //             'description' =>strip_tags($this->input->post('description')),
    //             'image' => $file_name,
                
                
    //         );
    //         $result=$this->Common_model->add($data,'patient_care');
    //         if($result>0){
               
    //             $this->session->set_flashdata('success', 'patient_care Inserted Successfully');
    //             redirect('admin/patient_care/index');
    //             exit();

    //         }else{
    //             $this->session->set_flashdata('error', 'patient_care Insertion Failed');
    //             redirect('admin/patient_care/add');
    //             exit();
    //         }
            
    //     }
    //    // $data['keywords'] = getKeywords();
    //     $data['editor'] = true;

    //     $cont = $this->load->view('patient_care/manage_patient_care', $data, true);
    //     $this->admin->load_view($cont, 'patient_care');
    // }
    
     public function update($id='')
    {
        
        if($this->input->post()){
            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $this->form_validation->set_rules('title','Title','trim|required|max_length[100]');
            $file_name = $this->input->post('img_val');
            if($_FILES['image']['name']!=''){
                $config['upload_path']          = FCPATH."uploads/patient_care/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_width']            = 1096;
                $config['max_height']           = 597;
                $config['min_width']            = 1096;
                $config['min_height']           = 597;
                $file_name = $this->upload_image($config,'image','patient_care/update/'.$id);
            }
           
            $data=array(
                'title'=>strip_tags($this->input->post('title')),
                'description' =>$this->input->post('description'),
                'section_title1' =>strip_tags($this->input->post('section_title1')),
                'section_description1' =>strip_tags($this->input->post('section_description1')),
                'section_title2' =>strip_tags($this->input->post('section_title2')),
                'section_description2' =>strip_tags($this->input->post('section_description2')),
                'image' => $file_name,
                'doctors' =>implode(",",$this->input->post('doctors')),

                             
            );
            $condition = array('id'=>$id);
            $result=$this->Common_model->update($data,'patient_care',$condition);
            if($result>0){
              
                $this->session->set_flashdata('success', 'Patient Care Updated Successfully');
                redirect('admin/patient_care/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'Patient Care Updation Failed');
                redirect('admin/patient_care/update/'.$id);
                exit();
            }
                 
        }
        $condition = array('id'=>$id);
        $data['result']=$this->Common_model->findAllWithJoin($condition ,'patient_care','*');
        $data['doctors']=$this->Common_model->findAllWithJoin(['status'=>'Active'] ,'doctor','*');
        $data['result']= $data['result'][0];
        $data['editor'] = true;
        $this->id = $id;
        //var_dump($data['result']);exit;
        $data['page_title'] = $data['result']['page'];
        $cont = $this->load->view('patient_care/manage_patient_care', $data, true);
        $this->admin->load_view($cont, 'patient_care');
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

        $result = $this->Common_model->findAllWithJoin($condition,'patient_care','*');
        $image = $result[0]['image'];

        $del = $this->Common_model->delete($condition,'patient_care');
        if($del){

            @unlink(FCPATH.'uploads/patient_care/'.$image);
            
            $this->session->set_flashdata('success', 'patient_care Deleted Successfully');
        }
    }
    
    public function change_status(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);
        $result = $this->Common_model->findAllWithJoin($condition,'patient_care','*');
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
            
        $upd=$this->Common_model->update($data,'patient_care',$cond);
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
    
    
    
    
    
    
  
    
    
    
    

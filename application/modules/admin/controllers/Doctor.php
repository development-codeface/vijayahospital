<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends MY_Controller 
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
      
        //$data['result']=$this->Common_model->findAllWithJoin('','doctor','*');
        $data['result'] =$this->Common_model->findAllWithJoin('','doctor','*','','','','','','','sort_id','ASC');
        //printr( $data['result']);exit;
        $data['datatable'] = true;
        $data['delete_popup'] = true;
        $cont = $this->load->view('doctor/list', $data, true);
        $this->admin->load_view($cont, 'doctor');
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
                $config['upload_path']          = FCPATH."uploads/doctor/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_width']            = 375;
                $config['max_height']           = 400;
                $config['min_width']            = 375;
                $config['min_height']           = 400;
                $file_name = $this->upload_image($config,'image','doctor/add');
            }
                $items =[];
                array_push($items, ($this->input->post('item1')!=''?$this->input->post('item1'):''));
                array_push($items, ($this->input->post('item2')!=''?$this->input->post('item2'):''));
                array_push($items, ($this->input->post('item3')!=''?$this->input->post('item3'):''));
                array_push($items, ($this->input->post('item4')!=''?$this->input->post('item4'):''));
                array_push($items, ($this->input->post('item5')!=''?$this->input->post('item5'):''));
                array_push($items, ($this->input->post('item6')!=''?$this->input->post('item6'):''));
                array_push($items, ($this->input->post('item7')!=''?$this->input->post('item7'):''));
                $consulting_time = json_encode($items);
            $data=array(
                'title'=>strip_tags($this->input->post('title')),
                'designation' =>strip_tags($this->input->post('designation')),
                'overall_consultation_time' =>strip_tags($this->input->post('overall_consultation_time')),
                'description' =>strip_tags($this->input->post('description')),
                'image' => $file_name,
                'description1' =>strip_tags($this->input->post('description1')),
                'departments' => implode(",",$this->input->post('departments')),
                'consulting_time' => ($consulting_time!='')?$consulting_time:''
                
            );
            $result=$this->Common_model->add($data,'doctor');
            
            if($result>0){
               
                $this->session->set_flashdata('success', 'Doctor Inserted Successfully');
                redirect('admin/doctor/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'Doctor Insertion Failed');
                redirect('admin/doctor/add');
                exit();
            }
            
        }
       // $data['keywords'] = getKeywords();
        $data['editor'] = true;
        
        $data['departments']=$this->Common_model->findAllWithJoin('','departments','*');
        
        $cont = $this->load->view('doctor/manage_doctor', $data, true);
        $this->admin->load_view($cont, 'doctor');
    }
    
     public function update($id='')
    {
        
        if($this->input->post()){
            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $this->form_validation->set_rules('title','Title','trim|required|max_length[100]');
            $file_name = $this->input->post('img_val');
            if($_FILES['image']['name']!=''){
                $config['upload_path']          = FCPATH."uploads/doctor/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_width']            = 375;
                $config['max_height']           = 400;
                $config['min_width']            = 375;
                $config['min_height']           = 400;
                $file_name = $this->upload_image($config,'image','doctor/update/'.$id);
            }
            
             $items =[];
                array_push($items, ($this->input->post('item1')!=''?$this->input->post('item1'):''));
                array_push($items, ($this->input->post('item2')!=''?$this->input->post('item2'):''));
                array_push($items, ($this->input->post('item3')!=''?$this->input->post('item3'):''));
                array_push($items, ($this->input->post('item4')!=''?$this->input->post('item4'):''));
                array_push($items, ($this->input->post('item5')!=''?$this->input->post('item5'):''));
                array_push($items, ($this->input->post('item6')!=''?$this->input->post('item6'):''));
                array_push($items, ($this->input->post('item7')!=''?$this->input->post('item7'):''));
                $consulting_time = json_encode($items);
           
            $data=array(
                'title'=>strip_tags($this->input->post('title')),
                'designation' =>strip_tags($this->input->post('designation')),
                'overall_consultation_time' =>strip_tags($this->input->post('overall_consultation_time')),
                'description' =>strip_tags($this->input->post('description')),
                'image' => $file_name,
                'description1' =>strip_tags($this->input->post('description1')),
                'departments' =>implode(",",$this->input->post('departments')),
                'consulting_time' => ($consulting_time!='')?$consulting_time:''
                             
            );
            $condition = array('id'=>$id);
            $result=$this->Common_model->update($data,'doctor',$condition);
            if($result>0){
              
                $this->session->set_flashdata('success', 'Doctor Updated Successfully');
                redirect('admin/doctor/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'Doctor Updation Failed');
                redirect('admin/doctor/update/'.$id);
                exit();
            }
                 
        }
        $condition = array('id'=>$id);
        $data['result']=$this->Common_model->findAllWithJoin($condition ,'doctor','*');
        $data['result']= $data['result'][0];
        $data['editor'] = true;
        $this->id = $id;
        $data['departments']=$this->Common_model->findAllWithJoin('','departments','*');
       
        $cont = $this->load->view('doctor/manage_doctor', $data, true);
        $this->admin->load_view($cont, 'doctor');
    }
    
    public function doctors_order()
    {
        $json   = file_get_contents('php://input');
        $values = json_decode($json, true);
        $count  = count($values);
        /*for ($i=0; $i < $count; $i++) { 
            $cond['id']         = $values[$i]['id'];
            $update['sort_id']  = $i;
            $this->Common_model->update($update,'teachers',$cond); 
        }*/
        for ($i=0; $i < $count; $i++) { 
            $data[] = array('id'      => $values[$i]['id'],
                            'sort_id' => $i);          
        }
        $this->Common_model->db_update_batch('doctor',$data); 
        
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

        $result = $this->Common_model->findAllWithJoin($condition,'doctor','*');
        $image = $result[0]['image'];

        $del = $this->Common_model->delete($condition,'doctor');
        if($del){
            @unlink(FCPATH.'uploads/doctor/'.$image);
            $this->session->set_flashdata('success', 'Doctor Deleted Successfully');
        }
    }
    
    public function change_status(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);
        $result = $this->Common_model->findAllWithJoin($condition,'doctor','*');
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
            
        $upd=$this->Common_model->update($data,'doctor',$cond);
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
    
    
    
    
    
    
  
    
    
    
    

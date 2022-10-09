<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departments extends MY_Controller 
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
      
        $data['result']=$this->Common_model->findAllWithJoin('','departments','*');
        
        //printr( $data['result']);exit;
        $data['datatable'] = true;
        $data['delete_popup'] = true;
        $cont = $this->load->view('departments/list', $data, true);
        $this->admin->load_view($cont, 'departments');
    }
   
    public function add()
    {
        if($this->input->post()){
        //var_dump($this->input->post(),$_FILES);exit;

            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $this->form_validation->set_rules('title','Title','trim|required|max_length[100]');
           
            $file_name = '';
            if($_FILES['image']['name']!=''){
                $config['upload_path']          = FCPATH."uploads/departments/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_width']            = 63;
                $config['max_height']           = 63;
                $config['min_width']            = 63;
                $config['min_height']           = 63;
                $file_name = $this->upload_image($config,'image','departments/add');
            }
            $file_name1 = '';
            if($_FILES['img_val_new']['name']!=''){
                $config['upload_path']          = FCPATH."uploads/departments/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_width']            = 142;
                $config['max_height']           = 420;
                $config['min_width']            = 142;
                $config['min_height']           = 420;
                $file_name1 = $this->upload_image($config,'img_val_new','departments/add');
            }
            $data=array(
                'title'=>strip_tags($this->input->post('title')),
                'slug' => $this->urlSafeString(strip_tags($this->input->post('title'))),
                'short_description' =>strip_tags($this->input->post('short_description')),
                'description' =>$this->input->post('description'),
                'image' => $file_name,
                'image_large' => $file_name1,
                'key_highlight_title' =>$this->input->post('key_highlight_title'),
                // 'key_highlights' =>$this->input->post('key_highlights'),
                'section_title1' =>$this->input->post('section_title1'),
                'section_desc1' =>$this->input->post('section_desc1'),
                'section_title2' =>$this->input->post('section_title2'),
                'section_desc2' =>$this->input->post('section_desc2'),
               
                
                'metaTitle' =>($this->input->post('metaTitle'))?strip_tags($this->input->post('metaTitle')):'',
                    'metaKeywords' =>($this->input->post('metaKeywords'))?strip_tags($this->input->post('metaKeywords')):'',
                    'metaDescription' =>($this->input->post('metaDescription'))?strip_tags($this->input->post('metaDescription')):'',
                
                
            );
            $result=$this->Common_model->add($data,'departments');
          //  var_dump($this->db->last_query());exit;
            if($result>0){
               
                $this->session->set_flashdata('success', 'department Inserted Successfully');
                redirect('admin/departments/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'department Insertion Failed');
                redirect('admin/departments/add');
                exit();
            }
            
        }
       // $data['keywords'] = getKeywords();
        $data['editor'] = true;

        $cont = $this->load->view('departments/manage_departments', $data, true);
        $this->admin->load_view($cont, 'departments');
    }
    
   
    
     public function update($id='')
    {
        
        if($this->input->post()){
            //var_dump($_POST,$_FILES);exit;
            $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $this->form_validation->set_rules('title','Title','trim|required|max_length[100]');
            $file_name = $this->input->post('img_val');
            $file_name1 = $this->input->post('img_val_new');
            if($_FILES['image']['name']!=''){
                $config['upload_path']          = FCPATH."uploads/departments/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_width']            = 63;
                $config['max_height']           = 63;
                $config['min_width']            = 63;
                $config['min_height']           = 63;
                $file_name = $this->upload_image($config,'image','departments/add');
            }
            if($_FILES['img_val_new']['name']!=''){
                $config['upload_path']          = FCPATH."uploads/departments/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_width']            = 142;
                $config['max_height']           = 420;
                $config['min_width']            = 142;
                $config['min_height']           = 420;
                $file_name1 = $this->upload_image($config,'img_val_new','departments/add');
            }
            
            $data=array(
                'title'=>strip_tags($this->input->post('title')),
                'slug' => $this->urlSafeString(strip_tags($this->input->post('title'))),
                 'short_description' =>strip_tags($this->input->post('short_description')),
                 'description' =>$this->input->post('description'),
                'image' => $file_name,
                'image_large' => $file_name1,           
                'key_highlight_title' =>$this->input->post('key_highlight_title'),     
                // 'key_highlights' =>$this->input->post('key_highlights'),
                'section_title1' =>$this->input->post('section_title1'),
                'section_desc1' =>$this->input->post('section_desc1'),
                'section_title2' =>$this->input->post('section_title2'),
                'section_desc2' =>$this->input->post('section_desc2'),
                
                'metaTitle' =>($this->input->post('metaTitle'))?strip_tags($this->input->post('metaTitle')):'',
                    'metaKeywords' =>($this->input->post('metaKeywords'))?strip_tags($this->input->post('metaKeywords')):'',
                    'metaDescription' =>($this->input->post('metaDescription'))?strip_tags($this->input->post('metaDescription')):'',
                             
            );
            $condition = array('id'=>$id);
            $result=$this->Common_model->update($data,'departments',$condition);
            if($result>0){
              
                $this->session->set_flashdata('success', 'department Updated Successfully');
                redirect('admin/departments/index');
                exit();

            }else{
                $this->session->set_flashdata('error', 'department Updation Failed');
                redirect('admin/departments/update/'.$id);
                exit();
            }
                 
        }
        $condition = array('id'=>$id);
        $data['result']=$this->Common_model->findAllWithJoin($condition ,'departments','*');
        $data['key_highlights']=$this->Common_model->findAllWithJoin(['dept_id'=>$id] ,'department_highlights','*');

        $data['result']= $data['result'][0];
        $data['editor'] = true;
        $this->id = $id;
       
        $cont = $this->load->view('departments/manage_departments', $data, true);
        $this->admin->load_view($cont, 'departments');
    }
    public function add_highlight()
    {
        if($_POST){
            $dept_id  = $this->input->post('dept_id');
            $highlight_desc  = $this->input->post('highlight_desc');
            $details = array('dept_id'=>$dept_id,
                                'description'=>$highlight_desc);
            $last_id = $this->Common_model->add($details,'department_highlights');
            $result =$this->Common_model->findAllWithJoin(['dept_id'=>$dept_id] ,'department_highlights','*');
            $html = $this->renderHtml($result);
            echo $html;

        }
    }
     public function delete_highlight()
    {
        if($_POST){
            $dept_id  = $this->input->post('dept_id');
            $h_id  = $this->input->post('h_id');
            $this->Common_model->delete(['id'=>$h_id],'department_highlights');
            $result =$this->Common_model->findAllWithJoin(['dept_id'=>$dept_id] ,'department_highlights','*');
            $html = $this->renderHtml($result);
            echo $html;

        }
    }

    public function edit_highlight()
    {
        if($_POST){
            $desc  = $this->input->post('desc');
            $h_id  = $this->input->post('h_id');
            $dept_id  = $this->input->post('dept_id');
            $this->Common_model->update(['description'=>$desc],'department_highlights',['id'=>$h_id]);
            $result =$this->Common_model->findAllWithJoin(['dept_id'=>$dept_id] ,'department_highlights','*');
            $html = $this->renderHtml($result);
           // var_dump($html);
            echo $html;

        }
    }
    public function renderHtml($result='')
    {
       // var_dump($result);exit;
        if($result){
            $html = '<ul>';
            foreach ($result  as $key => $res) {
               $html .= '<li>'.$res['description'].' <a data-highlight-id="'.$res['id'].'" id="deleteHighlightBtn" > <i class="fa fa-trash"></i></a> <a data-highlight-id="'.$res['id'].'" > <i class="fa fa-edit" data-toggle="modal" data-target="#editKeyHighlights'.$key.'" ></i></a> </li>
                   <div class="modal" id="editKeyHighlights'.$key.'">
                      <div class="modal-dialog">
                        <div class="modal-content"> 
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Hightlight  </h4>
                            <input type="hidden" id="dept_id" value="'.$res['dept_id'].'">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div> 
                          <div class="modal-body">
                            <div class="option_msg"></div> 
                            <textarea name="" class="form-control" id="edithighlight'.$res['id'].'" cols="30" rows="10">'.$res['description'].'</textarea>
                          </div> 
                          <div class="modal-footer">
                            <a id="edithighlightBtn" data-editId="'.$res['id'].'" style="color:white;" class="btn btn-primary">Edit</a>
                          </div>

                        </div>
                      </div>
                    </div>
               ';
            }
            $html .= '</ul>';
            return $html;
        }
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

        $result = $this->Common_model->findAllWithJoin($condition,'departments','*');
        $image = $result[0]['image'];

        $del = $this->Common_model->delete($condition,'departments');
        if($del){

            @unlink(FCPATH.'uploads/departments/'.$image);
            
            $this->session->set_flashdata('success', 'Department Deleted Successfully');
        }
    }
    
    public function change_status(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);
        $result = $this->Common_model->findAllWithJoin($condition,'departments','*');
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
            
        $upd=$this->Common_model->update($data,'departments',$cond);
        if($upd){
            $this->session->set_flashdata('success', 'Status Changed Successfully');
        }
    }
    
     public function change_featured(){
        $id = $this->input->post('id');
        $condition = array('id'=>$id);
        $result = $this->Common_model->findAllWithJoin($condition,'departments','*');
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
            
        $upd=$this->Common_model->update($data,'departments',$cond);
        if($upd){
            $this->session->set_flashdata('success', 'Featured Status Changed Successfully');
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
    
    
    
    
    
    
  
    
    
    
    

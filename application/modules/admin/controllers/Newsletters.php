<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletters extends MY_Controller 
{
/*
 * This file is part of the YourCompany.Package package.
 *
 * (c) YourCompany
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */
    
    
    /**
     * Default constructor for controller.
     *
     * @return constructor
     */
    public function __construct() 
    {
        parent::__construct();  
        require APPPATH . '/libraries/phpmailer/class.phpmailer.php';
        require APPPATH . '/libraries/phpmailer/class.smtp.php';
       
        $this->load->model('Common_model');
    }
    /**
     * Returns the name of the currently set context.
     *
     * @return newsletter listing View
     */
    public function index()
    { 
       
        $data['result']=$this->Common_model->findAllWithJoin('','newsletters','*');
        $data['datatable'] = true;
        $data['delete_popup'] = true;
        $cont = $this->load->view('newsletter/newsletter_list', $data, true);
        $this->admin->load_view($cont, 'newsletters');
    }
    
   
    
    public function add()
    {
        if($this->input->post())
        {
            $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('description','Description','trim|required');
            if($this->form_validation->run()==false)
            {
                $this->session->set_flashdata('error', 'Please Fill Mandatory Fields');
                redirect('admin/newsletters/add');
                exit();
            }else {
                $value= array(
                    'title'=>$this->input->post('title'),
                    'description'=>$this->input->post('description')
                 );
            
                $result=$this->Common_model->add($value,'newsletters');
                if($result>0){
                    $this->session->set_flashdata('success', 'Inserted Successfully');
                    redirect('admin/newsletters');
                        exit();
                }else{
                    $this->session->set_flashdata('error', 'Error Occured While Adding');
                    redirect('admin/newsletters/add');
                    exit();
                }
            }
        }
        
        $data['editor'] =true;
        $cont = $this->load->view('newsletter/manage_newsletters', $data, true);
        $this->admin->load_view($cont, 'subscribers');
    }
   
    public function update($id='')
    {
       
        if($this->input->post())
        {
            //printr($this->input->post());exit;
            $id=$this->input->post('id');
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('title','Title','trim|required|max_length[250]');
            $this->form_validation->set_rules('description','Description','trim|required');
                if($this->form_validation->run()==false)
                {
                    $this->session->set_flashdata('error', 'Please Fill mandatory Fields');
                    redirect('admin/newsletters/update/'.$id);
                    exit();
                }else{
                    $update= array(
                        'title'=>$this->input->post('title'),
                        'description'=>$this->input->post('description'),
                    );
                    $cond = array('id'=>$id);
                    $result=$this->Common_model->update($update,'newsletters',$cond);
                    if($result>0){
                        $this->session->set_flashdata('success', 'Inserted Successfully');
                        redirect('admin/newsletters');
                        exit();
                        
                    }else{
                        $this->session->set_flashdata('error', 'Error occured while update');
                        redirect('admin/newsletters/update/'.$id);
                        exit();
                    }
                }
                
        }
        $data['editor'] =true;
        $cond = array('id'=>$id);
        $data['result']=$this->Common_model->findAllWithJoin($cond,'newsletters','*','','single');
       // printr( $data['result']);exit;
        $cont = $this->load->view('newsletter/manage_newsletters', $data, true);
        $this->admin->load_view($cont, 'newsletters');
    
       }
       public function delete(){
        $id = $this->input->post('id');
        $cond = array('id'=>$id);
        $del = $this->Common_model->delete( $cond,'newsletters');
        if($del){
            $this->session->set_flashdata('success', 'Deleted Successfully');
        }
    }
    
    public function change_status(){
        $id = $this->input->post('id');
        $cond = array('id'=>$id);
        $result = $this->Common_model->findAllWithJoin($cond,'newsletters','*');
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
            
        $upd=$this->Common_model->update($data,'newsletters',$cond);
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
    
   
    
    public function view($id=''){
      
        if($this->input->post()){
            //printr($this->input->post());exit;
            $id      = $this->input->post('id');
            $email   =  $this->input->post('email');
            //printr($email);exit;
            $cn =array('id'=>$id);
            $data['newsletter_details'] = $this->Common_model->findAllWithJoin($cn,'newsletters','*','','single');
            $em_ar =array();
            
            if($email[0] == 'all'){
                $cn =array('status'=>'Active');
                $all_subscibers = $this->Common_model->findAllWithJoin($cn,'subscribers','*');
                //unset($email[0]);
                foreach($all_subscibers as $sub){
                    $emails= $data['emailid'] = $sub['email'];
                    $content = $this->load->view('newsletter/mail_content',$data,true);
                    $subject = "NEWS LETTER";
                    $this->send_mail($emails,$subject,$content);
                }
                $this->session->set_flashdata('success', 'News Letter Send Successfully');
                redirect('admin/newsletters/view/'.$id);
                exit();
               
            }else{
                foreach($email as $em){
                    $email= $data['emailid'] = $em;
                    $content = $this->load->view('newsletter/mail_content',$data,true);
                    $subject = "NEWS LETTER";
                    $this->send_mail($email,$subject,$content);
                }
                $this->session->set_flashdata('success', 'News Letter Send Successfully');
                redirect('admin/newsletters/view/'.$id);
                exit();
            }
         
        }
        $cond = array('id'=>$id);
        $data['result']=$this->Common_model->findAllWithJoin($cond,'newsletters','*','','single');
        $cond = array('status'=>'Active');
        $data['subscribers'] = $this->Common_model->findAllWithJoin($cond,'subscribers','*');
        $data['id'] = $id;
       // printr( $data['result']);exit;
        $cont = $this->load->view('newsletter/view_newsletter', $data, true);
        $this->admin->load_view($cont, 'newsletters');
    }
    

    
    function send_mail($to_email, $subject, $content,$file_tmp=NULL,$file_name=NULL, $cc=NULL) {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Timeout  = MAIL_TIMEOUT;
        $mail->Host = MAIL_HOST;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = MAIL_PORT;
        $mail->Username = MAIL_USER;
        $mail->Password = MAIL_PASSWORD;
        $mail->FromName = WEBSITE_NAME;
        $mail->From = MAIL_USER;
        $mail->Subject = $subject;
        if (is_array($to_email)){
            foreach ($to_email as $email) {
                $mail->addBCC($email);
            }
        }else{
                $mail->addBCC($to_email);
            }
        $mail->SMTPDebug = 0;
        $mail->SMTPAutoTLS = false;
        $mail->SetLanguage( 'en', 'libraries/phpmailer/language/' );
        $mail->Body = $content;
        if($file_tmp!='' && $file_name!='') {
        $mail->AddAttachment($file_tmp, $file_name);
        }
        $mail->IsHTML(true);
        return $mail->Send();
    }
    
    
    

}



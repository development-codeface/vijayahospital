<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends MX_Controller 
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
        $this->load->model('Login_model');
        $this->load->model('Common_model');
        $this->load->model('web/Web_model');
        require APPPATH . '/libraries/phpmailer/class.phpmailer.php';
        require APPPATH . '/libraries/phpmailer/class.smtp.php';
    }
     /**
     * Admin Authentication
     */
    public function index()
    { 
        
        if($this->input->post()) {
            $this->form_validation->set_rules('username','User Name','trim|required');
            $this->form_validation->set_rules('password','Password','trim|required');
            if($this->form_validation->run()==false){
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Mandatory fields cannot be empty!!</div>'); 
                redirect('admin');
            }else{
                 //printr($this->input->post());exit;
                $username=$this->input->post('username');
                $pass=$this->input->post('password');
                $login=$this->Login_model->check_login($username,$pass);
                if(count($login)>0){
                     $userData = array(
                        'id'=>$login[0]['id'],
                        'firstname'=>$login[0]['firstname'],
                        'lastname'=>$login[0]['lastname'],
                        'username'=>$login[0]['username'],
                        'email'=>$login[0]['email'],
                        'image'=>$login[0]['image'],
                        'created_at'=>$login[0]['created_at'],
                        'updated_at'=>$login[0]['updated_at'],
                        'logged_in'=>(bool)true
                    );

                    $this->session->set_userdata('userdata', $userData);
                    redirect('admin/dashboard');
                } else{
                    $this->session->set_flashdata('error', 'Please check username and password is correct or not');
                    redirect('admin');
                }       
            }
        }else{
            $this->load->view('authentication/login');
        }
    }
    
    public function dashboard(){  
        if (!$this->session->userdata['userdata']['logged_in'])
        { 
            redirect('admin/authentication');
        }

        $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');

        $book =$this->Common_model->findAllWithJoin('','booking','*');
        $data['booking'] = (!empty($book))? count($book): 0;

        $cn = array('status'=>'New');
        $pending = $this->Common_model->findAllWithJoin($cn ,'booking','*');
        $data['pending'] = (!empty($pending))? count($pending):0;
        $cn = array('status'=>'Checked');
        $approved = $this->Common_model->findAllWithJoin($cn ,'booking','*');
        $data['approved']  = (!empty($approved))? count( $approved):0; 

        $enquiry =$this->Common_model->findAllWithJoin('','contact','*');
        $data['enquiry'] = (!empty($enquiry))? count($enquiry): 0;
        $cn = array('status'=>'New');
        $pending1 = $this->Common_model->findAllWithJoin($cn ,'contact','*');
        $data['pending1'] = (!empty($pending1))? count($pending1):0;
        $cn = array('status'=>'Checked');
        $approved1 = $this->Common_model->findAllWithJoin($cn ,'contact','*');
        $data['approved1']  = (!empty($approved1))? count( $approved1):0; 


        $cont = $this->load->view('dashboard',$data, true);
        $this->admin->load_view($cont, 'Dashboard');
    }
    
    public function logout(){
        // create the data object
            if($this->session->has_userdata('userdata')) {
              //  print_r($this->session->userdata('userdata'));die();
            $this->session->sess_destroy();
            redirect('admin');

        }else {
	       redirect('dashboard');
        }
   }
   
   public function change_password(){
        if (!$this->session->userdata['userdata']['logged_in'])
        { 
            redirect('admin/authentication');
        }
        $cont = $this->load->view('authentication/change_password', '', true);
        $this->admin->load_view($cont, 'change_password');
   }
   public function change_password_action(){
    if (!$this->session->userdata['userdata']['logged_in'])
    { 
        redirect('admin/authentication');
    }
      //printr($this->input->post());
      $pwd = $this->input->post('password');
      $update = array('password'=>$pwd);
      $cond   = array('username'=>'admin');
      $upd = $this->Login_model->update($update,'users',$cond);
     // printr($upd);exit;
      if($upd){
          echo 1;exit;
      }else{
          echo 0;exit;
      }
   }
   
   public function forgot_password_action(){
       $email = $this->input->post('email');
       $condition = array('adminEmail'=>$email);
       $r = $this->Login_model->findAllWithJoin($condition, 'site_settings', '*');
       $cond = array('id'=>1);
       $res = $this->Login_model->findAllWithJoin($cond, 'users', '*');
       $data['settings'] = $this->Login_model->findAllWithJoin('','site_settings','*')[0];
       if(count($r)>0){
           $data['result'] = $res[0];
           $to = $data['settings']['adminEmail'];
           $subject = 'Password Recovery From '.SITE_NAME;
           $content = $this->load->view('includes/forgot-mail',$data,true);
           if($this->send_mail($to,$subject,$content)){
                echo 'success';
            }  else {
                echo 'failed';
            }
       }
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
        $mail->AddAddress($to_email);
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


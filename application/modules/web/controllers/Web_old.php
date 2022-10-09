<?php

// application/controllers/Validation.php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Web extends MY_Controller {
    public function __construct() 
    {
        parent::__construct();
        header("Cache-Control: no-cache, must-revalidate, max-age=0");        
        header("Cache-Control: post-check=0, pre-check=0", false);       
        header("Pragma: no-cache");
        $this->load->model('Web_model');
        require APPPATH . '/libraries/phpmailer/class.phpmailer.php';
        require APPPATH . '/libraries/phpmailer/class.smtp.php';
        $this->load->helper('captcha');
        require APPPATH . '/libraries/antispam.php';
        $this->load->library("pagination");
       
        //$this->load->library('antispam');
       
    }
    
    public function index(){
        $cond = array('status'=>'Active');
        $data['banners'] = $this->Web_model->findAllWithJoin($cond,'banners','*','','');

        $c = array('departments.status'=>'Active','featured' => 1);
        $data['departments'] = $this->Web_model->findAllWithJoin($c,'departments','departments.*','','','','','','','',4,0);
        
        $c = array('gallery.category!='=>'2');
        $data['gallery'] = $this->Web_model->findAllWithJoin($c,'gallery','gallery.*','','','','','','','',6,0);

        $c = array('blog.status'=>'Active');
        $data['blogs'] = $this->Web_model->findAllWithJoin($c,'blog','blog.*','','','','','','','',3,0);

        $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');

        $data['banner_logo'] = $this->Web_model->findAllWithJoin('','banner_logo','*','','single');

        $c = array('cms.status'=>'Active');
        $data['aboutus'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');

        $c = array('testimonial.status'=>'Active');
        $data['testimonials'] = $this->Web_model->findAllWithJoin($c,'testimonial','testimonial.*','','','','','','','',3,0);

        $data['partner_logos'] = $this->Web_model->findAllWithJoin(null,'partner','partner.*','','','','','','','','','');

       //echo "<pre>"; print_r($data); die;
       
        echo $this->load->view('index',$data);
    }
   
    public function about_us(){
        $conds = array('doctor.status'=>'Active');
        $data['doctors'] = $this->Web_model->findAllWithJoin($conds,'doctor','doctor.*','','','','','','','',4,0);
       
        $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');

        $data['banner_logo'] = $this->Web_model->findAllWithJoin('','banner_logo','*','','single');

        $c = array('cms.status'=>'Active');
        $data['aboutus'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');
        //echo "<pre>"; print_r($data); die;
        echo $this->load->view('about',$data);
    }

    public function doctors(){
        $conds = array('doctor.status'=>'Active');
        $data['doctors'] = $this->Web_model->findAllWithJoin($conds,'doctor','doctor.*','','','','','','','','','');
       
        $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');

        $data['banner_logo'] = $this->Web_model->findAllWithJoin('','banner_logo','*','','single');

        $c = array('cms.status'=>'Active');
        $data['aboutus'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');

        echo $this->load->view('doctors',$data);
    }

    public function departments()
    {
        if($this->input->post('id')!='' && $this->input->post('type')=='department') {
            $data['type'] = $this->input->post('type');
            $conds = array('departments.status'=>'Active','id'=>$this->input->post('id'));
        } else{
            $conds = array('departments.status'=>'Active');
        }
        
        $data['departments'] = $this->Web_model->findAllWithJoin($conds,'departments','departments.*','','','','','','','','','');
        
        if($this->input->post('id')!='' && $this->input->post('type')=='facility') {
             $data['type'] = $this->input->post('type');
            $conds = array('facility.status'=>'Active','id'=>$this->input->post('id'));
        } else{
             $conds = array('facility.status'=>'Active');
        }
        
        $data['facilities'] = $this->Web_model->findAllWithJoin($conds,'facility','facility.*','','','','','','','','','');
       
        $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');

        $c = array('cms.status'=>'Active');
        $data['aboutus'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');

        $data['banner_logo'] = $this->Web_model->findAllWithJoin('','banner_logo','*','','single');
        
        if($this->input->post('id')!='') {
            echo $this->load->view('popup',$data,TRUE);die;
        }else{
            echo $this->load->view('departments',$data);
        }

        
    }

    public function gallery()
    {

        

        $c = array('gallery_category.status'=>'Active');
        $data['gallery_category'] = $this->Web_model->findAllWithJoin($c,'gallery_category','gallery_category.*','','','','','','','','','');
        
        
        $join=['gallery_category'=>'gallery.category=gallery_category.id'];
        $data['gallery'] = $this->Web_model->findAllWithJoin($c,'gallery','gallery.*', $join,'','','','','','','','');

        $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');

        $c = array('cms.status'=>'Active');
        $data['aboutus'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');

        $data['banner_logo'] = $this->Web_model->findAllWithJoin('','banner_logo','*','','single');

        echo $this->load->view('gallery', $data);
    }


    public function blog_list()
    {

        $condition = array('blog.status'=>'Active');
        $config = array();
        $config["base_url"] = base_url()."web/blog_list";
        $total_row = $this->Web_model->findAllWithJoin( $condition,'blog','blog.*','','','','','','','','', '','',1);
        $config["total_rows"] = $total_row;
        $config["per_page"] = PAGINATION_LIMIT;
        $per_page = $config["per_page"];
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li  class="active"><a href="javascript:void(0);">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = '<span >&raquo;</span>';
        $config['prev_link'] = '<span >&laquo;</span>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        //echo $this->uri->segment(1);exit;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
        //echo $page;exit;
        $data["links"] = $this->pagination->create_links();



        $c = array('blog.status'=>'Active');
        $data['blogs'] = $this->Web_model->findAllWithJoin($c,'blog','blog.*','','','','','','','',$config["per_page"], $page);

        $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');

        $c = array('cms.status'=>'Active');
        $data['aboutus'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');

        $data['banner_logo'] = $this->Web_model->findAllWithJoin('','banner_logo','*','','single');




        echo $this->load->view('blog_list', $data);
    }


    public function blog_detail($slug)
    {

        $c = array('blog.slug'=>$slug);
        $blog_details = $this->Web_model->findAllWithJoin($c,'blog','blog.*','','','','','','','','','');


        $data['blog'] = $blog_details[0];

        $c = array('blog.status'=>'Active');
        $data['blogs'] = $this->Web_model->findAllWithJoin($c,'blog','blog.*','','','','','','','',3,0);

        $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');

        $c = array('cms.status'=>'Active');
        $data['aboutus'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');

        $data['banner_logo'] = $this->Web_model->findAllWithJoin('','banner_logo','*','','single');

        echo $this->load->view('blog_details', $data);
    }


    public function video_list()
    {

        /*$condition = array('video.status'=>'Active');
        $config = array();
        $config["base_url"] = base_url()."web/video_list";
        $total_row = $this->Web_model->findAllWithJoin( $condition,'video','video.*','','','','','','','','', '','',1);
        $config["total_rows"] = $total_row;
        $config["per_page"] = PAGINATION_LIMIT;
        $per_page = $config["per_page"];
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li  class="active"><a href="javascript:void(0);">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = '<span >&raquo;</span>';
        $config['prev_link'] = '<span >&laquo;</span>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
        //$data["links"] = $this->pagination->create_links();*/

        $c = array('video_category.status'=>'Active');
        $data['video_category'] = $this->Web_model->findAllWithJoin($c,'video_category','video_category.*','','','','','','','','','');

         $c = array('video.status'=>'Active','video_category.status'=>'Active');
        $join=['video_category'=>'video.category=video_category.id'];
        $data['videos'] = $this->Web_model->findAllWithJoin($c,'video','video.*',$join,'','','','','','','', '');
        
        

        $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');

        $c = array('cms.status'=>'Active');
        $data['aboutus'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');

        $data['banner_logo'] = $this->Web_model->findAllWithJoin('','banner_logo','*','','single');




        echo $this->load->view('video_list', $data);
    }





    public function video_detail($slug)
    {

        $c = array('video.slug'=>$slug);
        $video_details = $this->Web_model->findAllWithJoin($c,'video','video.*','','','','','','','','','');


        $data['video'] = $video_details[0];

        $c = array('blog.status'=>'Active');
        $data['blogs'] = $this->Web_model->findAllWithJoin($c,'blog','blog.*','','','','','','','',3,0);

        $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');

        $c = array('cms.status'=>'Active');
        $data['aboutus'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');

        $data['banner_logo'] = $this->Web_model->findAllWithJoin('','banner_logo','*','','single');

        echo $this->load->view('video_details', $data);
    }

    public function contact()
    {
        $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');

        $data['banner_logo'] = $this->Web_model->findAllWithJoin('','banner_logo','*','','single');
       
        $c = array('cms.status'=>'Active');
        $data['aboutus'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');

        if(!empty($this->input->post())){
            $post = $this->input->post();
           // printr($post);exit;
           /***********RECAPTCHA*********** */ 
                /*$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
                $userIp=$this->input->ip_address();
                $secret = $this->config->item('google_secret');
                $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
                $ch = curl_init(); 
                curl_setopt($ch, CURLOPT_URL, $url); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                $output = curl_exec($ch); 
                curl_close($ch);      
                $status= json_decode($output, true);
                // printr($status);exit;
                if ($status['success']) {
                    
                }else{
                    echo json_encode(array('msg'=>'<div style="color:red;">Captcha is invalid.</div>','status'=>'error'));
                    exit;
                }   */
        /***********RECAPTCHA*********** */      
            $data['post_data'] =$post;
            $subject="Contact Us";
            $to = $data['settings']['adminEmail'];
            $subject = 'Contact Us';
            $data['type'] = 'contact';
            $content = $this->load->view('includes/mail',$data,true);
            //echo $content;exit;
            if($this->send_mail( $to,$subject,$content)){
                $array = array(
                    'name' =>$post['name'],
                    'email'=>$post['email'],
                    'mobile'=>$post['mobile'],
                    'message' =>$post['message'],
                    'subject'=>$post['subject']
                );
               // printr($array);exit;
                $this->Web_model->add($array,'contact');

                echo json_encode(array('msg'=>'<div style="color:green;">Thank you for your enquiry,we will contact you soon.</div>','status'=>'success'));
              
               exit;
            } else{
                echo json_encode(array('msg'=>'<div style="color:red;">Something went wrong,please try again later.</div>','status'=>'error'));
              
                exit;
            }
            
        } 
        
        
       
        echo $this->load->view('contact',$data);
    }

    public function book()
    {
        if(!empty($this->input->post())){
            $post = $this->input->post();
           // printr($post);exit;
           /***********RECAPTCHA*********** */ 
               /* $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
                $userIp=$this->input->ip_address();
                $secret = $this->config->item('google_secret');
                $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
                $ch = curl_init(); 
                curl_setopt($ch, CURLOPT_URL, $url); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                $output = curl_exec($ch); 
                curl_close($ch);      
                $status= json_decode($output, true);
                // printr($status);exit;
                if ($status['success']) {
                    
                }else{
                    echo json_encode(array('msg'=>'<div style="color:red;">Captcha is invalid.</div>','status'=>'error'));
                    exit;
                }   */
        /***********RECAPTCHA*********** */      
            $data['post_data'] =$post;
            $subject="Appointment Booking";
            $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');
            $to = $data['settings']['adminEmail'];
            $subject = 'Appointment Booking';
            $data['type'] = 'booking';
            $content = $this->load->view('includes/mail',$data,true);
            //echo $content;exit;
            if($this->send_mail( $to,$subject,$content)){
                $array = array(
                    'name' =>$post['name'],
                    'email'=>$post['email'],
                    'mobile' =>$post['mobile'],
                    'appointment_date'=>date('Y-m-d',strtotime($post['appointment_date']))
                );
                $this->Web_model->add($array,'booking');

                echo json_encode(array('msg'=>'<div style="color:green;">Thank you for your booking,we will contact you soon.</div>','status'=>'success'));
              
               exit;
            } else{
                echo json_encode(array('msg'=>'<div style="color:red;">Something went wrong,please try again later.</div>','status'=>'error'));
              
                exit;
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




    public function page_not_found(){
       
        echo $this->load->view('404','');
    }

    public function refresh()
    {
        $config = array(
            'img_url' => base_url() . 'image_for_captcha/',
            'img_path' => 'image_for_captcha/',
            'word_length' => 4,
            
            'font_path'     => 'fonts/',

            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' =>array(255, 182, 182)
                 
            )
        );
        $cp = new Antispam();
        $captcha =  $cp->get_antispam_image($config);
        //$captcha = create_captcha($config);
        $this->session->unset_userdata('valuecaptchaCode');
        $this->session->set_userdata('valuecaptchaCode', $captcha['word']);
       echo $data['captchaImg'] = $captcha['image'];
    }  

    
    
    
}
     
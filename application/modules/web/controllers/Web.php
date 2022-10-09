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
    
        $this->departments_menu = $this->Web_model->findAllWithJoin(['departments.status'=>'Active'],'departments','departments.*','','','','','menuorder','ASC','');
        $this->doctors_for_form = $this->Web_model->findAllWithJoin(['status'=>'Active'],'doctor','*');
        $this->site_settings = $this->Web_model->findAllWithJoin(['id'=>1],'site_settings','*','','single');

    }
    
    public function index(){
      // $cond = array('status'=>'Active');
        $data['site_settings']  =$this->site_settings;
        $data['banners'] = $this->Web_model->findAllWithJoin(['status'=>'Active'],'banners','*','','');
        
        
        $c = array('departments.status'=>'Active','featured' => 1);
        $data['departments'] = $this->Web_model->findAllWithJoin($c,'departments','departments.*','','','','','','','',4,0);

        $conds = array('doctor.status'=>'Active');
        $data['doctors'] = $this->Web_model->findAllWithJoin($conds,'doctor','doctor.*','','','','','sort_id','ASC','',3,0);

        $c = array('gallery.category!='=>'2');
        $data['gallery'] = $this->Web_model->findAllWithJoin($c,'gallery','gallery.*','','','','','','','',6,0);

        $c = array('blog.status'=>'Active');
        //$data['blogs'] = $this->Web_model->findAllWithJoin($c,'blog','blog.*','','','','','','','',3,0);
        $data['blogs'] = $this->Web_model->findAllWithJoin($c,'blog','blog.*');

        $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');

        $data['banner_logo'] = $this->Web_model->findAllWithJoin('','banner_logo','*','','single');

        $c = array('cms.status'=>'Active');
        $data['aboutus'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');
        $data['whychoose'] = $this->Web_model->findAllWithJoin(['cms.status'=>'Active','id'=>4],'cms','*','','single');
        $data['our_services_finddoctor'] = $this->Web_model->findAllWithJoin(['cms.status'=>'Active','id'=>10],'cms','*','','single');
        $data['our_services_contactus'] = $this->Web_model->findAllWithJoin(['cms.status'=>'Active','id'=>11],'cms','*','','single');
        $data['our_services_appointmentform'] = $this->Web_model->findAllWithJoin(['cms.status'=>'Active','id'=>12],'cms','*','','single');
        $data['eye_care'] = $this->Web_model->findAllWithJoin(['cms.status'=>'Active','id'=>13],'cms','*','','single');
        $c = array('testimonial.status'=>'Active');
        $data['testimonials'] = $this->Web_model->findAllWithJoin($c,'testimonial','testimonial.*','','','','','','','',10,0);

        $data['depts'] = $this->Web_model->findAllWithJoin(['status'=>'Active'],'departments','departments.*','','','','','','','','','');

       // var_dump($data['blogs']); die;
        $data['departments_menu'] = $this->departments_menu;
        $data['appointment_doctors'] = $this->doctors_for_form;

        echo $this->load->view('index',$data);
    }
   
    public function about_us(){
        $data['site_settings']  =$this->site_settings;
        // $conds = array('doctor.status'=>'Active');
        // $data['doctors'] = $this->Web_model->findAllWithJoin($conds,'doctor','doctor.*','','','','','sort_id','ASC','',4,0);
       
        $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');

        // $data['banner_logo'] = $this->Web_model->findAllWithJoin('','banner_logo','*','','single');

        // $c = array('cms.status'=>'Active');
        // $data['aboutus'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');
        $c = array('cms.status'=>'Active','id'=>1);
        $data['aboutus'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');
        $data['chairman_message'] = $this->Web_model->findAllWithJoin(['cms.status'=>'Active','id'=>2],'cms','*','','single');
        $data['visechairman_message'] = $this->Web_model->findAllWithJoin(['cms.status'=>'Active','id'=>3],'cms','*','','single');
        $data['why_patient_choose'] = $this->Web_model->findAllWithJoin(['cms.status'=>'Active','id'=>4],'cms','*','','single');
        $data['awards'] = $this->Web_model->findAllWithJoin(['cms.status'=>'Active','id'=>5],'cms','*','','single');
        $data['vision'] = $this->Web_model->findAllWithJoin(['cms.status'=>'Active','id'=>6],'cms','*','','single');
        $data['mission'] = $this->Web_model->findAllWithJoin(['cms.status'=>'Active','id'=>7],'cms','*','','single');
        $data['hospital_history'] = $this->Web_model->findAllWithJoin(['status'=>'Active'],'hospitalhistory','*','','','','','','','',4,0);

       // var_dump($data['hospital_history']);exit;
        $data['departments_menu'] = $this->departments_menu;

        //echo "<pre>"; print_r($data); die;
        echo $this->load->view('about',$data);
    }
    public function patientcare($id='')
    {
        $data['site_settings']  =$this->site_settings;
        $data['departments_menu'] = $this->departments_menu;

         if($id =='find-a-doctor'){
             
             $data['doctors'] = $this->Web_model->findAllWithJoin(['status'=>'Active'],'doctor','*','','','','','sort_id','ASC');
             
             $data['departments'] = $this->Web_model->findAllWithJoin(['status'=>'Active'],'departments','*');
             echo $this->load->view('finddoctor',$data);
         } else if($id =='our-team'){
            $data['doctors'] = $this->Web_model->findAllWithJoin(['status'=>'Active'],'doctor','*','','','','','sort_id','ASC');
             
             $data['departments'] = $this->Web_model->findAllWithJoin(['status'=>'Active'],'departments','*');
             echo $this->load->view('ourteam',$data); 
         } else{
             $data['patient_care'] = $this->Web_model->findAllWithJoin(['id'=>$id],'patient_care','*','','single');
             // var_dump($data['patient_care']);exit;
             $docsIds = explode(",",$data['patient_care']['doctors']);
             $data['tagged_doctors'] = $this->Web_model->findDoctorsById($docsIds); 
             echo $this->load->view('patientcare',$data);
             
         }
    }
    public function searchDocsByDepartment()
    {
        $data['site_settings']  =$this->site_settings;
        $department_id = $this->input->post('id');
        $doctors= $this->Web_model->findDoctors($department_id); 
        //echo json_encode($doctors);
        $html = '<option value="">-Select a Doctor-</option>';
        foreach ($doctors as $key => $docs) {
            $html .= '<option value="'.$docs['id'].'" data-doc-image="'.$docs['image'].'" >'.$docs['title'].'</option>';
        } 

        echo $html;
    }
     public function searchDepartments()
    {
       // var_dump($_POST);exit;
        $dept_ids = $this->input->post('deptIds');
        $ids = explode(',', $dept_ids); 
        $departments = $this->Web_model->findDepartments($ids);   
        $selected = (count($departments)<=1)?'selected':'';
        $html = '<option value="">-Select a Department-</option>';
        foreach ($departments as $key => $dept) {
            $html .= '<option value="'.$dept['id'].'"  '.$selected.' >'.$dept['title'].'</option>';
        } 

        echo $html;
         
    }
    public function searchDocs()
    {
        
        $data['site_settings']  =$this->site_settings;        
        $dept = $this->input->post('dept');
        $doc = $this->input->post('doc');
        $html = '';
        if(!$doc){
            $doctors= $this->Web_model->findDoctors($dept);            
            foreach ($doctors as $key => $doct) {
 

                        $html .= '<div class="col-md-4"> 
                                    <div class="blog-post-single-item bg_gray border-radius-10 ">
                                            <div class="thumb text-center doc_imgbox">
                                                <img class="width-100" src="'.base_url('uploads/doctor/').$doct['image'].'">
                                            </div>
                                            <div class="content margin-five-top">
                                                
                                                <h3 class="title padding-ten-lr">
                                                    <a href="#">'.$doct['title'].'</a>
                                                </h3>  <ul class="post-meta doc" >
                                                    
                                                    <li>'.$doct['description'].' </li></ul>
                                                    <ul class="post-meta doc" >
                                                    <li>'.$doct['designation'].' </li>
                                                </ul>                              
                                                <p class="padding-ten-lr padding-five-top padding-ten-bottom">  <a id="open-form-popupnew" href="#" style="color:#ab1c1c!important; "
                                                    data-doctor-id="'.$doct['id'].'" 
                                                data-doctor-title="'.$doct['title'].'"                                 
                                                data-doctor-designation="'.$doct['description'].'" 
                                                data-doctor-description="'.$doct['designation'].'"
                                                data-doctor-image="'.$doct['image'].'"
                                                data-doctor-description1="'
                                            .$doct['description1'].'"    

                                                    >Read More</a>&nbsp; | &nbsp;  <a id="open-form-popup"
                                        class="doc_appointment"
                                    data-doctor-id="'.$doct['id'].'"
                                    data-doctor-title="'.$doct['title'].'"                                 
                                    data-department-ids="'.$doct['departments'].'"
                                    data-doctor-image="'.$doct['image'].'"
                                                     href="#" style="color:#ab1c1c!important; ">Make an appointment</a> </p>
                                           
                                            </div>
                                        </div> </div>';
            }
        }else{
            $doctors= $this->Web_model->findDoctorsById($doc);            
            foreach ($doctors as $key => $doct) {
                $html .= '<div class="col-md-4"> 
                                    <div class="blog-post-single-item bg_gray border-radius-10 ">
                                            <div class="thumb text-center doc_imgbox">
                                                <img class="width-100" src="'.base_url('uploads/doctor/').$doct['image'].'">
                                            </div>
                                            <div class="content margin-five-top">
                                                
                                                <h3 class="title padding-ten-lr">
                                                    <a href="#">'.$doct['title'].'</a>
                                                </h3>  <ul class="post-meta doc" >
                                                    <li>'.$doct['description'].' </li> 
                                                    </ul>
                                                    <ul class="post-meta doc" >
                                                    <li>'.$doct['designation'].' </li>
                                                </ul>                              
                                                <p class="padding-ten-lr padding-five-top padding-ten-bottom"><a id="open-form-popupnew" href="#" style="color:#ab1c1c!important; "
                                                    data-doctor-id="'.$doct['id'].'" 
                                                data-doctor-title="'.$doct['title'].'"                                 
                                                data-doctor-designation="'.$doct['description'].'" 
                                                data-doctor-description="'.$doct['designation'].'"
                                                data-doctor-image="'.$doct['image'].'"
                                                data-doctor-description1="'
                                            .$doct['description1'].'" 

                                                    >Read More</a>&nbsp; | &nbsp;  <a id="open-form-popup" href="#" 
                                                    class="doc_appointment"
                                    data-doctor-id="'.$doct['id'].'"
                                    data-doctor-title="'.$doct['title'].'"                                 
                                    data-department-ids="'.$doct['departments'].'"
                                    data-doctor-image="'.$doct['image'].'" style="color:#ab1c1c!important; ">Make an appointment</a> </p>
                                           
                                            </div>
                                        </div> </div>';
 
            }
        }
        echo $html;
    }
    public function doctors(){
        $data['site_settings']  =$this->site_settings;

        $conds = array('doctor.status'=>'Active');
        $data['departments'] = $this->Web_model->findAllWithJoin(['status'=>'Active'],'departments','departments.id,departments.title');
        $data['doctors'] = $this->Web_model->findAllWithJoin($conds,'doctor','doctor.*','','','','','sort_id','ASC');
       
        $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');

        $data['banner_logo'] = $this->Web_model->findAllWithJoin('','banner_logo','*','','single');

        $c = array('cms.status'=>'Active');
        $data['aboutus'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');
        $data['departments_menu'] = $this->departments_menu;

        echo $this->load->view('doctors',$data);
    }
    public function events()
    {
        $data['site_settings']  =$this->site_settings;

        $data['galleries'] = $this->Web_model->findAllWithJoin(['status'=>'Active'],'events','*');
        $data['departments_menu'] = $this->departments_menu;
        echo $this->load->view('gallery',$data);
    }
    public function career()
    {
        $data['site_settings']  =$this->site_settings;
        $c = array('id'=>8);
        $data['career_cms'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');

        $data['jobs'] = $this->Web_model->findAllWithJoin(['status'=>'Active'],'jobs','*');
        $data['departments_menu'] = $this->departments_menu;
        echo $this->load->view('career',$data);
    }
    public function departments()
    {
        $data['site_settings']  =$this->site_settings;
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
        $data['departments_menu'] = $this->departments_menu;
        
        if($this->input->post('id')!='') { 
            echo $this->load->view('popup',$data,TRUE);die;
        }else{
            echo $this->load->view('departments',$data);
        }

        
    }
    public function department_doctors()
    { 
        $data['site_settings']  =$this->site_settings;
        $data['departments_menu'] = $this->departments_menu;
        
        $department_id = $this->input->post('dept_id');
       
        if(!empty($department_id)) { 
           $doctors= $this->Web_model->findDoctors($department_id); 
        }else{
            $conds = array('doctor.status'=>'Active');
            $doctors = $this->Web_model->findAllWithJoin($conds,'doctor','doctor.*','','','','','sort_id','ASC');
        }
        if($doctors){
            $html = '';
            foreach ($doctors as $key => $dvalue) {
                $html .= ' 
                <div class="box-md-3 box-sm-6">
                    <div class="team-thumb">
                        <figure><img src="'.base_url().'uploads/doctor/'.$dvalue['image'].'" alt="'.$dvalue['image'].'">
                        </figure>
                        <div class="text mt-min-55">
                            <h5 class="title">'.$dvalue['title'].'</h5>
                            <h6 class="designation th-cl2"> <b>'.(($dvalue['description'])?'('.$dvalue['description'].')':'').'</b></h6>
                            <h6 class="designation th-cl2"> <b>'.$dvalue['designation'].'</b></h6>
                            <h6 class="designation th-cl2">'.$dvalue['overall_consultation_time'].'</h6>
                        </div>
                    </div>
                </div>';
            }
            echo $html;  
       }else{
           echo '<div class="alert" style="padding-top:50px;padding-bottom:50px;" role="alert">
                  <h4 class="alert-heading">Sorry! Doctors Unavailable! </h4> 
                  <hr>
                  <p class="mb-0">Department doctors are currently unavailable, De-select to see other doctors .</p>
                </div>';
       }
    }
     public function department_details($slug='')
    {
       //printr($slug);exit;
        $data['site_settings']  =$this->site_settings;
        $data['departments_menu'] = $this->departments_menu;

        $conds = array('departments.status'=>'Active', 'slug' =>$slug );
        $data['department_details'] = $this->Web_model->findAllWithJoin($conds,'departments','departments.*','','single','','','','','','','');
       // var_dump($data['department_details']);exit;
        //printr($this->db->last_query());exit;
        
        $department_id  = isset($data['department_details']['id']) && $data['department_details']['id']!=''?$data['department_details']['id']:'';
        $data['doctors']='';
        if(!empty($department_id)) {
            $data['slider_images']= $this->Web_model->findAllWithJoin(['category'=>'department','product'=>$department_id],'gallery','*');
            $data['dept_highlights'] = $this->Web_model->findAllWithJoin(['dept_id'=>$department_id],'department_highlights','*');
           $data['doctors']= $this->Web_model->findDoctors($department_id);
        }
        
        $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');

        $c = array('cms.status'=>'Active');
        $data['aboutus'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');

        $data['banner_logo'] = $this->Web_model->findAllWithJoin('','banner_logo','*','','single');
        
     //  echo'<pre>'; print_r($data); die;
        // printr($data); die();
        echo $this->load->view('department',$data);
       

        
    }


    public function gallery()
    {

        
        $data['site_settings']  =$this->site_settings;
        $data['departments_menu'] = $this->departments_menu;

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
        $data['site_settings']  =$this->site_settings;
        $data['departments_menu'] = $this->departments_menu;
        //var_dump(PAGINATION_LIMIT)
        $condition = array('blog.status'=>'Active');
        $config = array();
        $config["base_url"] = base_url()."blog";
        $total_row = $this->Web_model->findAllWithJoin( $condition,'blog','blog.*','','','','','','','','', '','',1);
        $config["total_rows"] = $total_row;
        $config["per_page"] = 1;
        $per_page = $config["per_page"];
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li  class="active"><a href="javascript:void(0);">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = '<i class="flaticon-right-arrow-angle"></i>';
        $config['prev_link'] = '<i class="flaticon-left-arrow-angle"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $this->pagination->initialize($config);
       // echo $this->uri->segment(2);exit;
        $page = ($this->uri->segment(2)) ? ($this->uri->segment(2)) : 0;
        //echo $page;exit;

        $data["links"] = $this->pagination->create_links();



        $c = array('blog.status'=>'Active');
        $data['blogs'] = $this->Web_model->findAllWithJoin($c,'blog','blog.*','','','','','id','desc','',$config["per_page"], $page);

        $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');

        $c = array('cms.status'=>'Active');
        $data['aboutus'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');

        $data['banner_logo'] = $this->Web_model->findAllWithJoin('','banner_logo','*','','single');


       // var_dump($data['blogs']);exit;

        echo $this->load->view('blog', $data);
    }


    public function blog_detail($slug)
    {
        $data['site_settings']  =$this->site_settings;
        $data['departments_menu'] = $this->departments_menu;

        $c = array('blog.slug'=>$slug);
        $blog_details = $this->Web_model->findAllWithJoin($c,'blog','blog.*','','','','','','','','','');
       //var_dump($blog_details); exit;

        $data['blog'] = $blog_details[0];

        $c = array('blog.status'=>'Active');
        $data['blogs'] = $this->Web_model->findAllWithJoin($c,'blog','blog.*','','','','','','','',3,0);

        $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');

        $c = array('cms.status'=>'Active');
        $data['aboutus'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');

        $data['banner_logo'] = $this->Web_model->findAllWithJoin('','banner_logo','*','','single');
       // var_dump($data['blogs']);exit;
        echo $this->load->view('blog-details', $data);
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

        $data['site_settings']  =$this->site_settings;
        $c = array('video_category.status'=>'Active');
        $data['video_category'] = $this->Web_model->findAllWithJoin($c,'video_category','video_category.*','','','','','','','','','');

         $c = array('video.status'=>'Active','video_category.status'=>'Active');
        $join=['video_category'=>'video.category=video_category.id'];
        $data['videos'] = $this->Web_model->findAllWithJoin($c,'video','video.*',$join,'','','','','','','', '');
        
        

        $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');

        $c = array('cms.status'=>'Active');
        $data['aboutus'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');

        $data['banner_logo'] = $this->Web_model->findAllWithJoin('','banner_logo','*','','single');


        $data['departments_menu'] = $this->departments_menu;


        echo $this->load->view('video_list', $data);
    }





    public function video_detail($slug)
    {
        $data['site_settings']  =$this->site_settings;
        $data['departments_menu'] = $this->departments_menu;

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
        // $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');

        // $data['banner_logo'] = $this->Web_model->findAllWithJoin('','banner_logo','*','','single');
       
        // $c = array('cms.status'=>'Active');
        // $data['aboutus'] = $this->Web_model->findAllWithJoin($c,'cms','*','','single');
        $data['site_settings']  =$this->site_settings;
        $data['departments_menu'] = $this->departments_menu;

        if(!empty($this->input->post())){

            //var_dump($_POST);exit;
            $post = $this->input->post();
           // printr($post);exit;
           /***********RECAPTCHA*********** */ 
                // $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
                // $userIp=$this->input->ip_address();
                // $secret = $this->config->item('google_secret');
                // $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
                // $ch = curl_init(); 
                // curl_setopt($ch, CURLOPT_URL, $url); 
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                // $output = curl_exec($ch); 
                // curl_close($ch);      
                // $status= json_decode($output, true);
                // // printr($status);exit;
                // if ($status['success']) {
                    
                // }else{
                //     echo json_encode(array('msg'=>'<div style="color:red;">Sorry! Google Recaptcha Unsuccessful.</div>','status'=>'error'));
                //     exit;
                // }   
        /***********RECAPTCHA*********** */      
            // $data['post_data'] =$post;
            // $subject="Contact Us";
            // $to = $data['settings']['adminEmail'];
            // $subject = 'Contact Us';
            // $data['type'] = 'contact';
            // $content = $this->load->view('includes/mail',$data,true);
            //echo $content;exit;
            //if($this->send_mail( $to,$subject,$content)){
                $array = array(
                    'name' =>$post['name'],
                    'email'=>$post['email'],
                    'mobile'=>$post['mobile'],
                    'message' =>$post['message'],
                    'subject'=>$post['subject']
                );
               // printr($array);exit;
                $this->Web_model->add($array,'contact');

                echo json_encode(array('msg'=>'<div class="alert alert-success" role="alert"><strong> Successfully Sent!</strong>Thank you for your enquiry,we will contact you soon.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button> 
                    </div>','status'=>'success'));
              
               exit;
            // } else{
            //     echo json_encode(array('msg'=>'<div style="color:red;">Something went wrong,please try again later.</div>','status'=>'error'));
              
            //     exit;
            // }
            
        } 
        
        
       
        echo $this->load->view('contact',$data);
    }

    public function book()
    {
        $data['site_settings']  =$this->site_settings;
        $data['departments_menu'] = $this->departments_menu;

        if(!empty($this->input->post())){
            //var_dump($_POST);exit;
            $post = $this->input->post();
           // printr($post);exit;
           /***********RECAPTCHA*********** */ 
                // $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
                // $userIp=$this->input->ip_address();
                // $secret = $this->config->item('google_secret');
                // $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
                // $ch = curl_init(); 
                // curl_setopt($ch, CURLOPT_URL, $url); 
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                // $output = curl_exec($ch); 
                // curl_close($ch);      
                // $status= json_decode($output, true);
                // // printr($status);exit;
                // if ($status['success']) {
                    
                // }else{
                //     echo json_encode(array('msg'=>'<div style="color:red;">Sorry! Google Recaptcha Unsuccessful.</div>','status'=>'error'));
                //     exit;
                // }   
        /***********RECAPTCHA*********** */      
            $data['post_data'] =$post;
            $department = $this->Web_model->findAllWithJoin(['id'=>$post['department'],'status'=>'Active'],'departments','*','','single')['title'];
            $doctor = $this->Web_model->findAllWithJoin(['id'=>$post['doctor'],'status'=>'Active'],'doctor','*','','single')['title'];

            //var_dump($department,$doctor);
            // $subject="Appointment Booking";
            // $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');
            // $to = $data['settings']['adminEmail'];
            // $subject = 'Appointment Booking';
            // $data['type'] = 'booking';
            // $content = $this->load->view('includes/mail',$data,true);
            
            // $user_email = $post['email'];
            // $data['type'] = 'customer_message';
            // $user_content = $this->load->view('includes/mail',$data,true);
            //echo $content;exit;
            //printr(date('Y-m-d',strtotime($post['appointment_date']))); exit;
            // if($this->send_mail( $to,$subject,$content)){
                //$this->send_mail( $user_email,$subject,$user_content);
                $array = array(
                    'name' =>$post['name'],
                    'email'=>$post['email'],
                    'department'=>$department,
                    'gender'=>$post['gender'],
                    'doctor'=>$doctor,
                    'mobile' =>$post['mobile'],
                    'appointment_date'=> date('Y-m-d',strtotime($post['appointment_date']))
                );
                $this->Web_model->add($array,'booking');
                //echo $this->db->last_query();  exit;      
                echo json_encode(array('msg'=>'<div class="alert alert-success" role="alert">
                          Thank you for your booking, we will contact you soon.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>','status'=>'success'));
              
               exit;
            // } else{
            //     echo json_encode(array('msg'=>'<div style="color:red;">Something went wrong,please try again later.</div>','status'=>'error'));
              
            //     exit;
            // }
            
        } 
    }
   public function subscription(){
        $data['settings'] = $this->Web_model->findAllWithJoin('','site_settings','*','','single');
        $post = $this->input->post();
        $data['post_data'] = $post['values'];
       // $subject = "Request For News Letter";
        //$data['type'] = 'news_letter';
        $to = $data['post_data'][0]['value'];
       // $content = $this->load->view('includes/news_letter_mail',$data,true);
        $cn = array('email'=>$to);
        $alreadyExist = $this->Web_model->findAllWithJoin($cn ,'subscribers','*','','single');
        if(empty($alreadyExist)){
            $ar=array(
                'email'=> $to 
            
            );
            $result=$this->Web_model->add($ar,'subscribers');
            if($this->send_mail( $to ,$subject,$content)){
                echo '<div style="color:green;">Thank you for subscription, we will contact you soon.</div>';
                exit;
            } else{
                echo '<div style="color:red;">Something went wrong,please try again later.</div>';
                exit;
            }
        } else{
            echo '<div style="color:red;">You already subscribed for newsletter.</div>';
            exit;
        }
        
    }
    public function send_resume()
    {
        //var_dump($this->input->post(),$_FILES);exit;
         if($this->input->post()){
           // $id=$this->input->post('id');
            $this->load->helper(array('form','url'));
            $file_name = ''; 

            if($_FILES['file']['name']!=''){
                // removeSpaceWithHiphen
                $fname = $_FILES['file']['name'];                
                // removeSpaceWithHiphen end
                $config['upload_path']          = FCPATH."uploads/resume/";
                $config['allowed_types']        = 'jpg|png|jpeg|pdf|docx'; 
                $file_name = $this->upload_image($config,'file','career');
                $data=array( 
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'career_id ' => $this->input->post('career_id'),
                    'mobile' => $this->input->post('mobile'),
                    'file_name' =>$file_name,
                    'date' => date('Y-m-d'),
                    'status' =>'New'
                );
                $result=$this->Web_model->add($data,'career_enquiry');
                if($result>0){
                    $this->session->set_flashdata('success', 'Successfully Saved Your Resume, We Will Get Back You Soon.');
                    redirect('career');
                    exit();

                }else{
                    $this->session->set_flashdata('error', 'Resume Insertion Failed');
                    redirect('career');
                    exit();
                }
            } else{
                $this->session->set_flashdata('error', 'Please Upload File Properly');
                redirect('career');
                exit();
            }
        }
    }
     function upload_image($config,$file,$url)
    {
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($file))
        {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);exit;
            $this->session->set_flashdata('error', $error['error']);

            redirect($url);
            exit();
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
           // var_dump($data);exit;
            return $file_name = $data['upload_data']['file_name'];
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
    
    public function patient_care_team(){
        $data['doctors'] = $this->Web_model->findAllWithJoin(['status'=>'Active'],'doctor','*','','','','','sort_id','ASC');
             
        $data['departments'] = $this->Web_model->findAllWithJoin(['status'=>'Active'],'departments','*');
             
        echo $this->load->view('ourteam',$data);
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
     
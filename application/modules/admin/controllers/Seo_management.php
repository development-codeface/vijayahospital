<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo_management extends MY_Controller 
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
  
    public function manageseo($module='',$pid='')
    {
        if($this->input->post()){
            //if (preg_match('/^[a-zA-Z\s-]+$/', $this->input->post('slug'))) {
                $data=array(
                    'module'=>$module,
                    'product_id' =>$pid,
                    'metadescription' =>$this->input->post('metadescription'),
                    'metatitle' => $this->input->post('metatitle'),
                    'metakeyword'=>$this->input->post('metakeyword'),
                    //'atl_tags'=>$this->input->post('atl_tags'),
                    //'URL_slug'=>str_replace(' ', '-', $this->input->post('slug')),
                );
                $condi=array(
                     'module'=>$module,
                     'product_id'=>$pid
                );
                $exits=$this->Common_model->findAllWithJoin($condi,'seo_keywords','*');
                //printr($exits); exit;
                if(!empty($exits)){
                    $result=$this->Common_model->update($data,'seo_keywords',$condi);
                }
                else{
                    $result=$this->Common_model->add($data,'seo_keywords');
                }
                
                if($result>0){
                    //echo"yesss"; exit;
                    $this->session->set_flashdata('success', 'SEO Details Inserted Successfully');
                    redirect('admin/'.$module.'/index');
                    exit();

                }else{
                   // echo"nooo"; exit;
                    $this->session->set_flashdata('error', 'SEO Details Insertion Failed');
                    redirect('admin/Seo_management/manageseo/'.$module."/".$pid);
                    exit();
                }
            /*}else{
                $this->session->set_flashdata('error', 'URL KEY Contains only letters and space');
                    redirect('admin/Seo_management/manageseo/'.$module."/".$pid);
                    exit();
            }*/
            
        }
        $data['Pid'] = $pid;
        $data['module'] = $module;
        $condition=array(
             'module'=>$module,
             'product_id'=>$pid
        );
      
        $data['result'] = $this->Common_model->findAllWithJoin($condition,'seo_keywords','*');
        if(!empty($data['result'])){
            $data['result']= $data['result'][0];
        }
       //printr($data['result'] ); exit;
        $cont = $this->load->view('seo/manage_seo', $data, true);
        $this->admin->load_view($cont, 'Company');
    }
   
    
}
    
    
    
    
    
    
  
    
    
    
    

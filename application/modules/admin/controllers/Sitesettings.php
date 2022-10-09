<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitesettings extends MY_Controller 
{
 
    public function __construct() 
    {
        parent::__construct();  
       
        $this->load->model('Common_model');
        if (!$this->session->userdata['userdata']['logged_in'])
        { 
            redirect('admin/authentication');
        }
       
      
    } 
   
     public function update($id='')
    {
        
        if($this->input->post()){
            $id=$this->input->post('id');
            $data=array(
                'siteName'=>$this->input->post('siteName'),
                'siteEmail' =>$this->input->post('siteEmail'),
                'siteAddress' =>$this->input->post('siteAddress'),
                'phoneNumber'=>$this->input->post('phoneNumber1'),
                'phoneNumber2'=>$this->input->post('phoneNumber2'),
                'phoneNumber3'=>$this->input->post('phoneNumber3'),
                'opening_time'=>$this->input->post('opening_time'),
                'doctors'=>$this->input->post('doctors'),
                'staffs'=>$this->input->post('staffs'),
                'happy_patient'=>$this->input->post('happy_patient'),
                'year_of_exp'=>$this->input->post('year_of_exp'),
                'beds'=>$this->input->post('beds'),
                'storeyed_buildings'=>$this->input->post('storeyed_buildings'),
                'ambulances'=>$this->input->post('ambulances'),
                'special'=>$this->input->post('special'),
                'facility'=>$this->input->post('facility'),
                'farmAddress'=>$this->input->post('farmAddress'),
                'webUrl' =>$this->input->post('webUrl'),
                'metaTitle'=>$this->input->post('metaTitle'),
                'metaKeyword' =>$this->input->post('metaKeyword'),
                'schemaScript'=>$this->input->post('schemaScript'),
                'analytics' =>$this->input->post('analytics'),
                'metaContent'=>$this->input->post('metaContent'),
                'facebook' =>$this->input->post('facebook'),
                'twitter' =>$this->input->post('twitter'),
                'instagram'=>$this->input->post('instagram'),
                'youtube' =>$this->input->post('youtube'),
                'googlePlus' =>$this->input->post('googlePlus'),
                'linkedin' =>$this->input->post('linkedin'),
                'pinterest' =>$this->input->post('pinterest'),
                'google_ads' => $this->input->post('google_ads'),
                'careerEmail'=>$this->input->post('careerEmail'),
                'adminEmail'=>$this->input->post('adminEmail'),
            );
          

            $condition = array('id'=>$id);
            $result=$this->Common_model->update($data,'site_settings',$condition);
            if($result>0){
                $this->session->set_flashdata('success', 'Site Settings Updated Successfully');
                redirect('admin/sitesettings/update/'.$id);
                exit();

            }else{
                $this->session->set_flashdata('error', 'Site Settings Updation Failed');
                redirect('admin/sitesettings/update/'.$id);
                exit();
            }
              
        }
        $cond = array('id'=>$id);
        $data['result']=$this->Common_model->findAllWithJoin( $cond,'site_settings','*');
        $data['result']= $data['result'][0];
        $this->id = $id;
        $data['editor'] =true;
        $cont = $this->load->view('manage_settings', $data, true);
        $this->admin->load_view($cont, 'Site Settings');
    }


    public function update_address($id='')
    {
        
        if($this->input->post()){
            $id=$this->input->post('id');
            $data=array(
                'country'=>$this->input->post('country'),
                'address'=>$this->input->post('address'),
                'phone_number'=>$this->input->post('phone_number'),
                'email'=>$this->input->post('email'),
                'fax'=>$this->input->post('fax')
            );
          

            $condition = array('id'=>$id);
            $result=$this->Common_model->update($data,'address_settings',$condition);
            if($result>0){
                $this->session->set_flashdata('success', 'Address Settings Updated Successfully');
                redirect('admin/sitesettings/list_address');
                exit();

            }else{
                $this->session->set_flashdata('error', 'Address Settings Updation Failed');
                redirect('admin/sitesettings/update_address/'.$id);
                exit();
            }
              
        }
        $cond = array('id'=>$id);
        $data['result']=$this->Common_model->findAllWithJoin($cond,'address_settings','*');
        $data['result']= $data['result'][0];
        $this->id = $id;
        $cont = $this->load->view('update_address_settings', $data, true);
        $this->admin->load_view($cont, 'Address Settings');
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

    public function list_address(){
        $data['address'] = $this->Common_model->findAllWithJoin('','address_settings','*');
        $cont = $this->load->view('manage_adress_settings', $data, true);
        $this->admin->load_view($cont, 'Site Settings');
    }
   
    
}
    
    
    
    
    
    
  
    
    
    
    

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MY_Controller 
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
    public function index(){

            $data['result'] = $this->Common_model->findAllWithJoin('' ,'gallery','*');
            $cont = $this->load->view('gallery/list', $data, true);
            $this->admin->load_view($cont, 'Gallery');
    }
    
    public function delete($id){
        $cond = array('id'=>$id);

        $result = $this->Common_model->findAllWithJoin($cond,'gallery','*');
        $image = $result[0]['image'];

        echo $del = $this->Common_model->delete($cond,'gallery');


        @unlink(FCPATH.'uploads/gallery/'.$image);
        @unlink(FCPATH.'uploads/gallery/thumbs/'.$image);
        @unlink(FCPATH.'uploads/gallery/front/'.$image);

    }
     public function delete1($id){
        $cond = array('id'=>$id);

        $result = $this->Common_model->findAllWithJoin($cond,'partner','*');
        $image = $result[0]['image'];

        echo $del = $this->Common_model->delete($cond,'partner');

        @unlink(FCPATH.'uploads/partner/'.$image);
        @unlink(FCPATH.'uploads/partner/thumbs/'.$image);
        @unlink(FCPATH.'uploads/partner/front/'.$image);

    }
   
    public function add($module='',$product='')
    {  

       //FOR MULTIPLE UPLOADER BLUEIMP
        if(!empty($module)&&($module == 'department')&&!empty($product)){
            $cond = array('id'=>$product); 
            $res = $this->Common_model->findAllWithJoin($cond,'departments','*','','single');
            $data['gallery_title'] = $res['title'];
        }
        if($this->input->post()){
            $upload_path_url = FCPATH."uploads/gallery/";
            $config['upload_path'] = FCPATH."uploads/gallery/";
            $config['allowed_types'] = 'jpg|png|jpeg';
           /*  $config['max_width']            = 50;
            $config['max_height']           = 50; */
            //$config['max_size']     = 350;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('userfile'))
            {
                $error = strip_tags($this->upload->display_errors());
                $fileArray['error'] = $error;
                $filejson = new stdClass();
                $filejson->files[] = $fileArray;
                echo json_encode($filejson);
            }
            else
            { 	
                $data = $this->upload->data();
                $config1 = array(
                          'source_image' => $data['full_path'],
                          'new_image' => $upload_path_url.'thumbs/',
                          'maintain_ration' => true,
                          'width' => 80,
                          'height' => 80
                    );

                $config2 = array(
                    'source_image' => $data['full_path'],
                    'new_image' => $upload_path_url.'front/',
                    'maintain_ratio' => false,
                    'width' => 390,
                    'height' => 625,
                    //'master_dim'=> 'height'
                );
                
                if($data['file_name']!=''){
                    $ins_arr = array(
                                  'image' => $data['file_name'],
                                  'category' => ($this->input->post('id') && $this->input->post('id')!='')?$this->input->post('id'):'',
                                  'product'=>  ($this->input->post('product') && $this->input->post('product')!='')?$this->input->post('product'):''
                            );
                    $result=$this->Common_model->add_with_insertid($ins_arr,'gallery');
                }
                if($result){
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config1);
                    $this->image_lib->resize();
                    $this->image_lib->initialize($config2);
                    $this->image_lib->resize();
                    
                    $info = new \stdClass();
                    $fileArray['name'] = $data['file_name'];
                    $fileArray['size'] = $data['file_size'];
                    $fileArray['type'] = $data['file_type'];
                    $fileArray['url'] = $upload_path_url .$data['file_name'];
                    $fileArray['thumbnailUrl'] =base_url() .'uploads/gallery/thumbs/'.$data['file_name'];
                    $fileArray['deleteUrl'] = base_url().'admin/gallery/delete/'.$result;
                    $fileArray['deleteType'] = 'DELETE';
                    $filejson = new stdClass();
                    $filejson->files[] = $fileArray;
                    echo json_encode($filejson);
                }else{
                    $fileArray['error'] = 'Something went wrong please try again';
                    $filejson = new stdClass();
                    $filejson->files[] = $fileArray;
                    echo json_encode($filejson);
                }
            }
        }else{ 
            $data['multiple_uploader'] = true;

            $cond = ['category'=>$module,'product'=> $product];
            $data['gallery_images'] = $this->Common_model->findAllWithJoin($cond ,'gallery','*');
            
           // printr( $gallery_images );
            $data['editor'] = true;
            $data['id'] = $module;
            $data['product'] = $product; 
            $cont = $this->load->view('gallery/manage_gallery', $data, true);
            $this->admin->load_view($cont, 'Gallery');
        }
        
    }


    public function partner()
    {
        
       //FOR MULTIPLE UPLOADER BLUEIMP
        if($this->input->post()){
            $upload_path_url = FCPATH."uploads/partner/";
            $config['upload_path'] = FCPATH."uploads/partner/";
            $config['allowed_types'] = 'jpg|png|jpeg';
           /*  $config['max_width']            = 50;
            $config['max_height']           = 50; */
            //$config['max_size']     = 350;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('userfile'))
            {
                $error = strip_tags($this->upload->display_errors());
                $fileArray['error'] = $error;
                $filejson = new stdClass();
                $filejson->files[] = $fileArray;
                echo json_encode($filejson);
            }
            else
            {   
                $data = $this->upload->data();
                $config1 = array(
                          'source_image' => $data['full_path'],
                          'new_image' => $upload_path_url.'thumbs/',
                          'maintain_ration' => true,
                          'width' => 80,
                          'height' => 80
                    );

                $config2 = array(
                    'source_image' => $data['full_path'],
                    'new_image' => $upload_path_url.'front/',
                    'maintain_ratio' => false,
                    'width' => 200,
                    'height' => 90,
                    //'master_dim'=> 'height'
                );
                
                if($data['file_name']!=''){
                    $ins_arr = array(
                                  'image' => $data['file_name']
                            );
                    $result=$this->Common_model->add_with_insertid($ins_arr,'partner');
                }
                if($result){
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config1);
                    $this->image_lib->resize();
                    $this->image_lib->initialize($config2);
                    $this->image_lib->resize();
                    
                    $info = new \stdClass();
                    $fileArray['name'] = $data['file_name'];
                    $fileArray['size'] = $data['file_size'];
                    $fileArray['type'] = $data['file_type'];
                    $fileArray['url'] = $upload_path_url .$data['file_name'];
                    $fileArray['thumbnailUrl'] =base_url() .'uploads/partner/thumbs/'.$data['file_name'];
                    $fileArray['deleteUrl'] = base_url().'admin/gallery/delete1/'.$result;
                    $fileArray['deleteType'] = 'DELETE';
                    $filejson = new stdClass();
                    $filejson->files[] = $fileArray;
                    echo json_encode($filejson);
                }else{
                    $fileArray['error'] = 'Something went wrong please try again';
                    $filejson = new stdClass();
                    $filejson->files[] = $fileArray;
                    echo json_encode($filejson);
                }
            }
        }else{
            //$data['prod_id'] =$id;
            $data['multiple_uploader'] = true;
            $data['partner_images'] = $this->Common_model->findAllWithJoin(null ,'partner','*');
            
           // printr( $gallery_images );
            $data['editor'] = true;
            $cont = $this->load->view('gallery/manage_partner', $data, true);
            $this->admin->load_view($cont, 'Partner');
        }
        
    }
        
   
    
   
    
    
   
    
}
    
    
    
    
    
    
  
    
    
    
    

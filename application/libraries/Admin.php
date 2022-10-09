<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin{

    function  __construct()
    {
    	$this->CI = &get_instance();

	    			
    }
    function load_view($cont,$title=''){
          $this->CI->load->view('layout',array('content'=>$cont,'title' => $title));
    }
	
	 
}

/* End of file library Admin.php */
/* Location: ./application/libraries/Admin.php */

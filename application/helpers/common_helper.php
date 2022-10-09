<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*

  |--------------------------------------------------------------------------

  | Helper Files: Flashdata Message helper

  |--------------------------------------------------------------------------

  |created at : 07 06 2015

  |created by : Anju

  |

 */

if (!function_exists('printr')) {



    function printr($result) {

        if (count((array)$result) > 0) {

            echo '<pre>';

            print_r($result);

           // exit;
        }
    }

}

if (!function_exists('get_youtube_thumb')) {
    function get_youtube_thumb($link){
        $tmp = explode("/", $link);
        $video_id =end($tmp);
        $thumbnail="https://img.youtube.com/vi/".$video_id."/0.jpg";
        return $thumbnail;
    }
}
/**
* asset_url
*/
if (!function_exists('asset_path_dashboard')) {

    function asset_path_dashboard($path = '')
    {
            $CI = & get_instance();
            $asset_path = $CI->config->item('asset_path_dashboard');

            return site_url($asset_path.$path);
    }

}
if (!function_exists('asset_path_web')) {

    function asset_path_web($path = '')
    {
            $CI = & get_instance();
            $asset_path = $CI->config->item('asset_path_web');

            return site_url($asset_path.$path);
    }

}   
if (!function_exists('randomString')) {

    function randomString($limit) {

        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $randstring = '';

        for ($i = 0; $i < $limit; $i++) {

            $randstring .= $characters[rand(0, (strlen($characters) - 1))];
        }

        return $randstring;
    }

}
if (!function_exists('getDepartment')) {
    function getDepartment($departments=[]) {
       
        if(count($departments)>0) {
            $CI = & get_instance(); 
            $sql = "select title,slug from departments where id IN (".implode(',',$departments).") and status='Active'";
           
         $query = $CI->db->query($sql);
        // $query = $this->db->get();
          return $query->result_array();
        }
        
       
        

    }
}
if (!function_exists('getKeywords')) {

    function getKeywords()
    {
        $CI = & get_instance();
        $CI->load->model('Common_model');
       
        $fields = 'keywords.*';
        $c = array('products.status'=>'Active');
        $keywords= $CI->Common_model->findAllWithJoin('','keywords',$fields);
       
        return $keywords;
    }

}  



if (!function_exists('urlSafeString')) {

    function urlSafeString($value)
    {
        $CI = & get_instance();
        $str = preg_replace("/[^A-Za-z0-9\-]/", '-',$value);
        return $str;
    }

} 
if (!function_exists('encodeurlSafeString')) {

    function encodeurlSafeString($value)
    {
        $CI = & get_instance();
        $str = preg_replace('/[^A-Za-z0-9\-]/', '',$value);
        return $str;
    }

} 

if (!function_exists('subdescription')) {

    function subdescription($value,$limit='')
    {
        $CI = & get_instance();
        $max_char 	= ($limit!='')?$limit:200;
        $text = $value;
        $cut_text 	= substr($text, 0, $max_char);
        if ($text{$max_char - 1} != ' ') { // if the 45th character not a space
            $new_pos 	= strrpos($cut_text, ' '); // find the space from the last character
            $cut_text 	= substr($text, 0, $new_pos);
        }
        return $cut_text ;
    }

} 
if (!function_exists('getCms')) {

    function getCms($id)
    {
        $CI = & get_instance();
        $cn = array('id'=>$id);
        $cms= $CI->Web_model->findAllWithJoin($cn,'cms','*','','single'); 
        return $cms;
    }

} 

if (!function_exists('getAd')) {

    function getAd($position,$where)
    {
        $CI = & get_instance();
        $cn = array('post'=>$where,'position'=>$position);
        $ad = $CI->Web_model->findAllWithJoin( $cn,'advertisement','advertisement.*','','single');
        return  $ad;
    }

} 


if (!function_exists('add_seo_url_slug'))
{
	function add_seo_url_slug($value, $update = '')
	{
		$CI = & get_instance();
		if ($update != '')
		{
			$module = $value['module'];
			$product_id = $value['product_id'];
			$condition = array(
				'product_id' => $product_id,
				'module' => $module
			);
			$update = array(
				'URL_slug' => urlSafeString($value['URL_slug'])
			);
			$CI->Common_model->update($update, 'seo_keywords', $condition);
		}
		else
		{
			$value['URL_slug'] = urlSafeString($value['URL_slug']);
			$CI->Common_model->add($value, 'seo_keywords');
		}
	}
}

if (!function_exists('getDataFromSub')) {

    function getDataFromSub($cat_id)
    {
        $CI = & get_instance();
        $conds = array('category'=>$cat_id,'posts.status'=>'Active');
        $review  = $CI->Web_model->findAllWithJoin($conds,'posts','posts.*','','','','','id','desc');
        if(!empty($review)){
            $review_sub = $review[0]['subcategory'];
            $cond = array('subcategory'=>$review_sub,'category'=>$cat_id,'posts.status'=>'Active');
            $join = array('category'=>'category.id = posts.category','subcategory'=>'subcategory.id = posts.subcategory','seo_keywords'=>'seo_keywords.product_id = posts.id');
            $review_sub_list  = $CI->Web_model->findAllWithJoin($cond,'posts','posts.*,,category.title as cat_title,subcategory.title as sub_title,seo_keywords.URL_slug',$join,'','','','posts.id','desc','');
            //printr($review_sub_list);exit;
            return $review_sub_list;
           
        }
    }

} 
if (!function_exists('getMenus')) {
    function add3dots($string, $repl, $limit) 
    {
    if(strlen($string) > $limit) 
    {
        return substr($string, 0, $limit) . $repl; 
    }
    else 
    {
        return $string;
    }
    }
}
if (!function_exists('getCompany')) {
    function getCompany() {
        $CI = & get_instance(); 
        $cond = array('status'=>'Active');
        return $company  = $CI->Web_model->findAllWithJoin($cond,'companies','*');
    }
}


if (!function_exists('getSeoMetaContent')) {
    function getSeoMetaContent($segment=null) {
        $CI = & get_instance(); 
        if($segment == null) {
            $segment='home';
        }
        $cond = array('product_id'=>$segment);
        $meta_content  = $CI->Web_model->findAllWithJoin($cond,'seo_keywords','*');
        return !empty($meta_content[0])?$meta_content[0]:[];

    }
}


if (!function_exists('getSeoMetaContentByDefault')) {
    function getSeoMetaContentByDefault($type=null) {
        $CI = & get_instance(); 
        $meta_content = $CI->Web_model->findAllWithJoin('','site_settings','*','','single');
        if($type=='title') {
            return !empty($meta_content['metaTitle'])?$meta_content['metaTitle']:'';
        }elseif($type=='keyword') {
             return !empty($meta_content['metaKeyword'])?$meta_content['metaKeyword']:'';
        }elseif($type=='description') {
             return !empty($meta_content['metaContent'])?$meta_content['metaContent']:'';
        }
        

    }
}
if (!function_exists('getAllPages')) {	
    function getAllPages() {	
        $CI = & get_instance(); 	
        $pages  = $CI->Web_model->findAllWithJoin(null,'pages','*');	
        if(count($pages)>0) {	
            $page = array_column($pages, 'page');	
        }else{	
            $page =[];	
        }	
        	
        return $page;	
    }	
}	
if (!function_exists('getSeoMetaContentByDepartment')) {	
    function getSeoMetaContentByDepartment($segment=null) {	
        $CI = & get_instance(); 	
        $cond = array('slug'=>$segment);	
        $meta_content  = $CI->Web_model->findAllWithJoin($cond,'departments','*');	
        return !empty($meta_content[0])?$meta_content[0]:[];	
    }	
}


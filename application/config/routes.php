<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

/*$route['default_controller'] = 'web';
$route['404_override'] = 'web/page_not_found';
$route['translate_uri_dashes'] = FALSE;

$route['sitemap.xml'] = 'seo/sitemap';
if($this->uri->segment(1) == 'admin'){
    $route['admin'] = 'admin/authentication/index';
    $route['dashboard'] = 'admin/authentication/index';
    $route['admin/dashboard'] = 'admin/authentication/dashboard';
    //CMS
    $route['(:any)/index'] = 'admin/$1/index';
    $route['(:any)/add'] = 'admin/$1/add';
    $route['(:any)/add'] = 'admin/$1/add';
    $route['(:any)/update/(:any)'] = 'admin/$1/update/$2';
    $route['botdetect/captcha-handler'] = 'botdetect/captcha_handler/index';
    $route['team']='admin/team/index';
    $route['team/(:num)']='admin/team/index/$1';
    
}else {
   
    $route['index'] = 'web/index';
    $route['about-us'] = 'web/about_us';
    $route['departments-facilities'] = 'web/departments';
    $route['departments'] = 'web/departments';
    $route['doctors'] = 'web/doctors';

    $route['blog'] = 'web/blog_list';
    $route['blog/(:any)'] = 'web/blog_detail/$1';
    
    $route['video'] = 'web/video_list';
    $route['video/(:any)'] = 'web/video_detail/$1';
    
    $route['contact-us'] = 'web/contact';
    $route['gallery'] = 'web/gallery';
   
}
*/

$route['default_controller'] = 'web';
$route['404_override'] = 'web/page_not_found';
$route['translate_uri_dashes'] = FALSE;

$route['sitemap.xml'] = 'seo/sitemap';
if($this->uri->segment(1) == 'admin'){
    $route['admin'] = 'admin/authentication/index';
    $route['dashboard'] = 'admin/authentication/index';
    $route['admin/dashboard'] = 'admin/authentication/dashboard';
    //CMS
    $route['(:any)/index'] = 'admin/$1/index';
    $route['(:any)/add'] = 'admin/$1/add';
    $route['(:any)/add'] = 'admin/$1/add';
    $route['(:any)/update/(:any)'] = 'admin/$1/update/$2';
    $route['botdetect/captcha-handler'] = 'botdetect/captcha_handler/index';
    $route['team']='admin/team/index';
    $route['team/(:num)']='admin/team/index/$1';
    $route['admin/doctors-order'] 	= 'admin/doctor/doctors_order';
    
}else {
   
    $route['index'] = 'web/index';
    $route['about-us'] = 'web/about_us';
    $route['departments-facilities'] = 'web/departments';
    // $route['department-details'] = 'web/department_details';
    $route['departments'] = 'web/departments';
    $route['doctors'] = 'web/doctors';
    $route['patient-care/(:any)'] = 'web/patientcare/$1';
    $route['news-and-events'] = 'web/events';
    $route['career'] = 'web/career';
   
    $route['blog'] = 'web/blog_list';
    $route['blog/(:num)'] = 'web/blog_list/$1';
    $route['blog-details/(:any)'] = 'web/blog_detail/$1';
    
    $route['video'] = 'web/video_list';
    $route['video/(:any)'] = 'web/video_detail/$1';
    
    $route['contact-us'] = 'web/contact';
    $route['gallery'] = 'web/gallery';
    $route['patientcareteam'] = 'web/patient_care_team';
   $route['department/(:any)']   = 'web/department_details/$1';
}




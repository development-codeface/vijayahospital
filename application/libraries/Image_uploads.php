<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Library: Import / Export
|--------------------------------------------------------------------------
|
*/
class Image_uploads {

  

	public function _construct() {
        $CI = & get_instance();
               
    }
    
    /**
     * Image upload
     */
    public function uploads($image,$original_path) {

        $allowed  = array('png', 'jpg','jpeg', 'gif');
        $upload_dir = $original_path;
        if(!is_dir($upload_dir)){
            mkdir($upload_dir, 0777, TRUE);
        }
        $imagename = rand().$image['name'];
        if(isset($image) && $image['error'] == 0){

            $extension = pathinfo( $imagename, PATHINFO_EXTENSION);

            if(!in_array(strtolower($extension), $allowed)){
                echo false;
                exit();
            }

            if(move_uploaded_file($image['tmp_name'],$upload_dir. $imagename)){
                $img = $imagename;
                return $img;
               }

        }

    }

    public function img_crop($original_path,$new_path,$image,$Thumbheight,$Thumbwidth)
    {
        require_once FCPATH.'third_party/easyphpthumbnail/example/inc/easyphpthumbnail.class.php';
        $new_path=FCPATH.$new_path;
        if(!is_dir($new_path)){
            mkdir($new_path, 0777, TRUE);
        }
        $thumb = new easyphpthumbnail;
        $height=$Thumbheight/2;
        $width=$Thumbwidth/2;
        $thumb -> Thumbheight = $Thumbheight;
        $thumb -> Thumbwidth  = $Thumbwidth;
        /* $thumb -> Thumbheight = 116;
        $thumb -> Thumbwidth  = 198;*/
        //$thumb -> Thumbsize = 565;
        $thumb -> Cropimage = array(2,1,$width,$width,$height,$height);
        $thumb -> Thumblocation = $new_path;
        $thumb -> Thumbfilename = $image;
        $path = $original_path.$image;
        $thumb -> Createthumb($path,'file');

    }

    public function img_copy_right($original_path,$new_path,$image,$Thumbheight,$Thumbwidth)
    {
        require_once FCPATH.'third_party/easyphpthumbnail/example/inc/easyphpthumbnail.class.php';
        $new_path=FCPATH.$new_path;
        if(!is_dir($new_path)){
            mkdir($new_path, 0777, TRUE);
        }
        $thumb = new easyphpthumbnail;
        $height=  285/2;
        $width =  328/2;
        $thumb -> Thumbheight = 285;
        $thumb -> Thumbwidth  = 328;
        $thumb -> Cropimage = array(2,1,$width,$width,$height,$height);
        $thumb -> Copyrighttext = 'MYWEBMYMAIL.COM';
        $thumb -> Copyrightposition = '50% 90%';
        //$thumb -> Copyrightfonttype = 'handwriting.ttf';
        $thumb -> Copyrightfontsize = 30;
        $thumb -> Copyrighttextcolor = '#FFFFFF';
        $thumb -> Thumblocation = $new_path;
        $thumb -> Thumbfilename = $image;
        $path = $original_path.$image;
        $thumb -> Createthumb($path,'file');

    }

    public function img_water_mark($original_path,$new_path,$image,$Thumbheight,$Thumbwidth)
    {
        require_once FCPATH.'third_party/easyphpthumbnail/example/inc/easyphpthumbnail.class.php';
        $new_path=FCPATH.$new_path;
        if(!is_dir($new_path)){
            mkdir($new_path, 0777, TRUE);
        }
        $thumb = new easyphpthumbnail;
        $height=  285/2;
        $width =  328/2;
        $thumb -> Thumbheight = 285;
        $thumb -> Thumbwidth  = 328;
        $thumb -> Cropimage = array(2,1,$width,$width,$height,$height);
        //$thumb -> Framewidth = 5;
        //$thumb -> Framecolor = '#00000';
       // $thumb -> Backgroundcolor = '#000000';
        //$thumb -> Clipcorner = array(2,15,0,1,1,1,1);
        $thumb -> Shadow = false;
        $thumb -> Watermarkpng = FCPATH.'uploads/watermark.png';
        $thumb -> Watermarkposition = '50% 80%';
        $thumb -> Watermarktransparency = 70;
        $thumb -> Thumblocation = $new_path;
        $thumb -> Thumbfilename = $image;
        $path = $original_path.$image;
        $thumb -> Createthumb($path,'file');

    }



    
}
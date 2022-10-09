var FormValidation = function () {
    // advance validation
    var cms = function() { 

            var form3 = $('#cms');
            var error3 = $('.alert-danger', form3);
            var success3 = $('.alert-success', form3);
            form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                   title: {
                        maxlength: 100,
                        required: !0
                    },
                    description: {
                        required: !0
                    }
                   
                },

                messages: { // custom messages for radio buttons and checkboxes
                    membership: {
                        required: "Please select a Membership type"
                    },
                   
                },

              

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success3.hide();
                    error3.show();
                    App.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success3.show();
                    error3.hide();
                    form[0].submit(); // submit the form
                }

            });

            
    }

var category = function() { 

        var form3 = $('#category');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);
        var img_val  = $('.img_val').val();
        var img_front_val = $('.img_front_val').val();
        var imgs='';
        var img_val_front = '';
        if(img_val!=''){
            imgs = '';
        } else{
            imgs = !0;
        }
        if(img_front_val!=''){
            img_val_front = '';
        } else{
            img_val_front = !0;
        }
        form3.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
               title: {
                    maxlength: 100,
                    required: !0
                },
                description: {
                    required: !0
                },
                image: {
                    required: imgs
                },
                image_front: {
                    required: img_val_front
                },
               
            },

            messages: { // custom messages for radio buttons and checkboxes
                membership: {
                    required: "Please select a Membership type"
                },
               
            },

          

            invalidHandler: function (event, validator) { //display error alert on form submit   
                success3.hide();
                error3.show();
                App.scrollTo(error3, -200);
            },

            highlight: function (element) { // hightlight error inputs
               $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function (form) {
                success3.show();
                error3.hide();
                form[0].submit(); // submit the form
            }

        });

        
}

    var banners = function() { 

        var form3 = $('#banners');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);
        var img_val  = $('.img_val').val();
        var imgs='';
        if(img_val!=''){
            imgs = '';
        } else{
            imgs = !0;
        }
        form3.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
                title1: {
                    required: !0
                },
                // title2: {
                //     required: !0
                // },
                // description:{
                //     required: !0
                // },
                image: {
                    required: imgs
                },
               
            },

            messages: { // custom messages for radio buttons and checkboxes
                membership: {
                    required: "Please select a Membership type"
                },
               
            },

          

            invalidHandler: function (event, validator) { //display error alert on form submit   
                success3.hide();
                error3.show();
                App.scrollTo(error3, -200);
            },

            highlight: function (element) { // hightlight error inputs
               $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function (form) {
                success3.show();
                error3.hide();
                form[0].submit(); // submit the form
            }

        });

        
}
    

 
 
   
   
var testimonials = function() {  

    var form3 = $('#testimonials');
    var error3 = $('.alert-danger', form3);
    var success3 = $('.alert-success', form3);
    var img_val  = $('.img_val').val();
    var imgs='';
    if(img_val!=''){
        imgs = '';
    } else{
        imgs = !0;
    }
    form3.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "", // validate all fields including form hidden input
        rules: {
            name: {
                maxlength: 100,
                required: !0
            },
            description: {
                required: !0
            },
            image:{
                required: imgs
            },
          
            
        },

        messages: { // custom messages for radio buttons and checkboxes
            membership: {
                required: "Please select a Membership type"
            },
            
        },

        
        invalidHandler: function (event, validator) { //display error alert on form submit   
            success3.hide();
            error3.show();
            App.scrollTo(error3, -200);
        },

        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.form-group').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function (label) {
            label
                .closest('.form-group').removeClass('has-error'); // set success class to the control group
        },

        submitHandler: function (form) {
            success3.show();
            error3.hide();
            form[0].submit(); // submit the form
        }

    });

}
   
  


    


    var site_settings = function() { 

            var form3 = $('#site_settings');
            var error3 = $('.alert-danger', form3);
            var success3 = $('.alert-success', form3);
            var img_val  = $('.img_val').val();
            /*var imgs='';
            if(img_val!=''){
                imgs = '';
            } else{
                imgs = !0;
            }*/
            form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    siteName: {
                        maxlength: 100,
                        required: !0,
                    },
                    siteEmail: {
                        required: !0,
                        email : true,
                    },
                    adminEmail: {
                        email : true,
                    },
                   /* image:{
                        required: imgs
                    },*/
                    siteAddress:{
                        required: !0
                    },
                    phoneNumber:{
                        required: !0
                    },
                    facebook:{
                     
                       url:true
                    },

                    twitter:{
                     
                       url:true
                    },
                    instagram:{
                     
                       url:true
                    },
                    youtube:{
                     
                       url:true
                    },
                    linkedin:{
                     
                       url:true
                    },
                     pinterest:{
                     
                       url:true
                    }
                  
                },

                messages: { // custom messages for radio buttons and checkboxes
                    membership: {
                        required: "Please select a Membership type"
                    },
                   
                },

                

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success3.hide();
                    error3.show();
                    App.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success3.show();
                    error3.hide();
                    form[0].submit(); // submit the form
                }

            });

            
    }

    
    var gallery_content = function() { 

        var form3 = $('#gallery_content');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);
        var img_val  = $('.img_val').val();
            var imgs='';
            if(img_val!=''){
                imgs = '';
            } else{
                imgs = !0;
            }
        form3.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
               title: {
                    maxlength: 100,
                    required: !0
                },
                date: {
                    required: !0
                },
                image:{
                    required: imgs
                }
               
            },

            messages: { // custom messages for radio buttons and checkboxes
                membership: {
                    required: "Please select a Membership type"
                },
               
            },

          

            invalidHandler: function (event, validator) { //display error alert on form submit   
                success3.hide();
                error3.show();
                App.scrollTo(error3, -200);
            },

            highlight: function (element) { // hightlight error inputs
               $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function (form) {
                success3.show();
                error3.hide();
                form[0].submit(); // submit the form
            }

        });

        
}


 
    

    
      
    var handleWysihtml5 = function() {
        if (!jQuery().wysihtml5) {
            
            return;
        }

        if ($('.wysihtml5').size() > 0) {
            $('.wysihtml5').wysihtml5({
                "stylesheets": ["http://localhost/ntv-site/assets/admin/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css"],
            });
        }
    }

   
    var seo = function() { 

        var form3    = $('#seo');
        var error3   = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);
      
        form3.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
                url_slug: {
                    required: !0
                },
              
               
               
               
            },
    
            messages: { // custom messages for radio buttons and checkboxes
                membership: {
                    required: "Please select a Membership type"
                },
               
            },
    
          
    
            invalidHandler: function (event, validator) { //display error alert on form submit   
                success3.hide();
                error3.show();
                App.scrollTo(error3, -200);
            },
    
            highlight: function (element) { // hightlight error inputs
               $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
    
            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },
    
            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
    
            submitHandler: function (form) {
                success3.show();
                error3.hide();
                form[0].submit(); // submit the form
            }
    
        });
       
    }

    var departments = function() { 

        var form3 = $('#departments');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);
        var img_val  = $('.img_val').val();
        var imgs='';
        if(img_val!=''){
            imgs = '';
        } else{
            imgs = !0;
        }
        form3.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
               title: {
                    maxlength: 100,
                    required: !0
                },
              
                image: {
                    required: imgs
                },
                
            },

            messages: { // custom messages for radio buttons and checkboxes
                membership: {
                    required: "Please select a Membership type"
                },
               
            },

          

            invalidHandler: function (event, validator) { //display error alert on form submit   
                success3.hide();
                error3.show();
                App.scrollTo(error3, -200);
            },

            highlight: function (element) { // hightlight error inputs
               $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function (form) {
                success3.show();
                error3.hide();
                form[0].submit(); // submit the form
            }

        });

        
}

 var facility = function() { 

        var form3 = $('#facility');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);
        var img_val  = $('.img_val').val();
        var imgs='';
        if(img_val!=''){
            imgs = '';
        } else{
            imgs = !0;
        }
        form3.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
               title: {
                    maxlength: 100,
                    required: !0
                },
              
                image: {
                    required: imgs
                },
                
            },

            messages: { // custom messages for radio buttons and checkboxes
                membership: {
                    required: "Please select a Membership type"
                },
               
            },

          

            invalidHandler: function (event, validator) { //display error alert on form submit   
                success3.hide();
                error3.show();
                App.scrollTo(error3, -200);
            },

            highlight: function (element) { // hightlight error inputs
               $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function (form) {
                success3.show();
                error3.hide();
                form[0].submit(); // submit the form
            }

        });

        
}

 var doctor = function() { 

        var form3 = $('#doctor');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);
        var img_val  = $('.img_val').val();
        var imgs='';
        if(img_val!=''){
            imgs = '';
        } else{
            imgs = !0;
        }
        form3.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
               title: {
                    maxlength: 100,
                    required: !0
                },
              
                image: {
                    required: imgs
                },
               
              
            },

            messages: { // custom messages for radio buttons and checkboxes
                membership: {
                    required: "Please select a Membership type"
                },
               
            },

          

            invalidHandler: function (event, validator) { //display error alert on form submit   
                success3.hide();
                error3.show();
                App.scrollTo(error3, -200);
            },

            highlight: function (element) { // hightlight error inputs
               $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function (form) {
                success3.show();
                error3.hide();
                form[0].submit(); // submit the form
            }

        });

        
}
var video = function() { 

        var form3 = $('#video');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);
       /* var img_val  = $('.img_val').val();
        var imgs='';
        if(img_val!=''){
            imgs = '';
        } else{
            imgs = !0;
        }*/
        form3.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
                title: {
                    maxlength: 255,
                    required: !0
                },
                /*slug: {
                    maxlength: 255,
                    required: !0
                },
                short_description: {
                    maxlength: 255,
                    required: !0
                },*/
                url: {
                    maxlength: 255,
                    required: !0,
                    url:true
                },

                /*created_at: {
                   
                    required: !0,
                },*/
              
                /*description: {
                    required: !0
                },*/
               
              
            },

            messages: { // custom messages for radio buttons and checkboxes
                membership: {
                    required: "Please select a Membership type"
                },
               
            },

          

            invalidHandler: function (event, validator) { //display error alert on form submit   
                success3.hide();
                error3.show();
                App.scrollTo(error3, -200);
            },

            highlight: function (element) { // hightlight error inputs
               $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function (form) {
                success3.show();
                error3.hide();
                form[0].submit(); // submit the form
            }

        });

        
}

var blog = function() { 

        var form3 = $('#blog');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);
        var img_val  = $('.img_val').val();
        var imgs='';
        if(img_val!=''){
            imgs = '';
        } else{
            imgs = !0;
        }

        

        form3.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
                title: {
                    maxlength: 255,
                    required: !0
                },
/*
                slug: {
                    maxlength: 255,
                    required: !0
                },*/
                short_description: {
                    maxlength: 255,
                    required: !0
                },
                /* image: {
                    required: imgs
                },*/

                url:{
                    url : true
                },

                created_at: {
                   
                    required: !0,
                },
              
                /*description: {
                    required: !0
                },*/
               
              
            },

            messages: { // custom messages for radio buttons and checkboxes
                membership: {
                    required: "Please select a Membership type"
                },
               
            },

          

            invalidHandler: function (event, validator) { //display error alert on form submit   
                success3.hide();
                error3.show();
                App.scrollTo(error3, -200);
            },

            highlight: function (element) { // hightlight error inputs
               $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function (form) {
                success3.show();
                error3.hide();
                if($("input[name='blog_type']:checked").val() == 'video') {
                    if($("#url").val() == ''){
                        $("#url").css('border-color','red');
                        return false;
                    }else{
                         $("#url").css('border-color','');
                         form[0].submit();
                    }
                }else if($("input[name='blog_type']:checked").val() == 'image') {
                    var id= $('#id').val();
                    //if(id !='') {
                        if($("#image").val() == '' && $("#img_val").val()=='' ){
                            $(".thumbnail").css('border-color','red');
                            return false;
                        }else{
                             $(".thumbnail").css('border-color','');
                             form[0].submit();
                        }
                    /*} else {
                         $(".thumbnail").css('border-color','');
                             form[0].submit();
                    }*/
                   
                }

                 // submit the form
            }

        });

        
}


var banners = function() { 

    var form3 = $('#banners');
    var error3 = $('.alert-danger', form3);
    var success3 = $('.alert-success', form3);
    var img_val  = $('.img_val').val();
    var imgs='';
    if(img_val!=''){
        imgs = '';
    } else{
        imgs = !0;
    }
    form3.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "", // validate all fields including form hidden input
        rules: {
            // title1: {
            //     required: !0
            // },
            
            image: {
                required: imgs
            },
            // description:{
            //     required: imgs
            // },
             title2: {
                
                url:true
            }
           
        },

        messages: { // custom messages for radio buttons and checkboxes
            membership: {
                required: "Please select a Membership type"
            },
           
        },

      

        invalidHandler: function (event, validator) { //display error alert on form submit   
            success3.hide();
            error3.show();
            App.scrollTo(error3, -200);
        },

        highlight: function (element) { // hightlight error inputs
           $(element)
                .closest('.form-group').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function (label) {
            label
                .closest('.form-group').removeClass('has-error'); // set success class to the control group
        },

        submitHandler: function (form) {
            success3.show();
            error3.hide();
            form[0].submit(); // submit the form
        }

    });

    
}

var testimonial = function() { 

    var form3 = $('#testimonial');
    var error3 = $('.alert-danger', form3);
    var success3 = $('.alert-success', form3);
    var img_val  = $('.img_val').val();
    /*var imgs='';
    if(img_val!=''){
        imgs = '';
    } else{
        imgs = !0;
    }*/
    form3.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "", // validate all fields including form hidden input
        rules: {
            name: {
                required: !0
            },
            
           /* image: {
                required: imgs
            },*/
            description:{
                required: !0
            }
           
        },

        messages: { // custom messages for radio buttons and checkboxes
            membership: {
                required: "Please select a Membership type"
            },
           
        },

      

        invalidHandler: function (event, validator) { //display error alert on form submit   
            success3.hide();
            error3.show();
            App.scrollTo(error3, -200);
        },

        highlight: function (element) { // hightlight error inputs
           $(element)
                .closest('.form-group').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function (label) {
            label
                .closest('.form-group').removeClass('has-error'); // set success class to the control group
        },

        submitHandler: function (form) {
            success3.show();
            error3.hide();
            form[0].submit(); // submit the form
        }

    });

    
}

var gallery_category = function() { 

    var form3 = $('#gallery_category');
    var error3 = $('.alert-danger', form3);
    var success3 = $('.alert-success', form3);

    form3.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "", // validate all fields including form hidden input
        rules: {
            title: {
                required: !0
            },

           
        },

        messages: { // custom messages for radio buttons and checkboxes
            membership: {
                required: "Please select a Membership type"
            },
           
        },

      

        invalidHandler: function (event, validator) { //display error alert on form submit   
            success3.hide();
            error3.show();
            App.scrollTo(error3, -200);
        },

        highlight: function (element) { // hightlight error inputs
           $(element)
                .closest('.form-group').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function (label) {
            label
                .closest('.form-group').removeClass('has-error'); // set success class to the control group
        },

        submitHandler: function (form) {
            success3.show();
            error3.hide();
            form[0].submit(); // submit the form
        }

    });

    
}

var video_category = function() { 

    var form3 = $('#video_category');
    var error3 = $('.alert-danger', form3);
    var success3 = $('.alert-success', form3);

    form3.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "", // validate all fields including form hidden input
        rules: {
            title: {
                required: !0
            },

           
        },

        messages: { // custom messages for radio buttons and checkboxes
            membership: {
                required: "Please select a Membership type"
            },
           
        },

      

        invalidHandler: function (event, validator) { //display error alert on form submit   
            success3.hide();
            error3.show();
            App.scrollTo(error3, -200);
        },

        highlight: function (element) { // hightlight error inputs
           $(element)
                .closest('.form-group').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function (label) {
            label
                .closest('.form-group').removeClass('has-error'); // set success class to the control group
        },

        submitHandler: function (form) {
            success3.show();
            error3.hide();
            form[0].submit(); // submit the form
        }

    });

    
}

    return {
        //main function to initiate the module
        init: function () {
            cms();
            handleWysihtml5();
            site_settings();
            gallery_content();
            departments();
            facility();
            banners();
            seo();
            doctor();
            video();
            blog();
            testimonial();
            gallery_category();
            video_category();
            
           

        }

    };

}();

jQuery(document).ready(function() {
    FormValidation.init();
     $(".form-control").on("keypress", function(e) {
        if (e.which === 32 && !this.value.length)
            e.preventDefault();
    });
    
     $(".copy-slug").keyup(function(event) {
      var stt = $(this).val();
      stt = stt.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();
      $("input[name='slug']").val(stt);
    });


    if($("input[name='blog_type']:checked").val() == 'video') {
            $('#blog_url').removeClass('hide');
            $('#blog_img').addClass('hide');

    }else{
        $('#blog_img').removeClass('hide');
        $('#blog_url').addClass('hide');
    }
     
    $('input[type=radio][name=blog_type]').change(function() { 
        if($("input[name='blog_type']:checked").val() == 'video') {
            $('#blog_url').removeClass('hide');
            $('#blog_img').addClass('hide')
            
            
        }else{
            $('#blog_img').removeClass('hide');
            $('#blog_url').addClass('hide');
        }
    });
   
});

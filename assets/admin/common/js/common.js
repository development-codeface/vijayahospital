/*
|--------------------------------------------------------------------------
| Admin Products Scripts : Loyalty cards 
|--------------------------------------------------------------------------
|created at : 18 May 2017
|created by : Anju A
|
*/

var Common = function ($) {
   
   var showDeletePopup = function() {
        $('body').on('click', '.delete_list_item', function () {
            console.log('hiii')
            var $t =$(this);
            var module = $(this).attr('data-module');
            var id  = $(this).attr('data-id');
            var params = {
                module: module,
                id :id,
                category:'show_delete'
            }
            //var $t = $('.showDeletePopup').html('')
            $.post(site_url+ 'admin/'+module+'/showPopup', $.param(params), function (res) {
                $('.showPopup').html(res);
                $('#delete').modal();
            });
        });
   }
  
   var Delete = function(){
       $('body').on('click','.delete_popup', function(){
           console.log('hhh')
            var $t  = $(this);
            var id    = $t.attr('data-id');
            var module = $t.attr('data-module');
            $.ajax({
                type: "POST",
                url:site_url + 'admin/'+module+'/delete',
                data: {id:id,module:module},
                success: function(data) {
                  $('#delete').modal('toggle');
                  window.location.reload();
                },
                error: function() {
                   
                }
            });
       });
    }
    var showStatusPopup = function() {
        $('body').on('click', '.change_status_btn', function () {
            console.log('hiii')
            var $t =$(this);
            var module = $(this).attr('data-module');
            var id  = $(this).attr('data-id');
            var params = {
                module: module,
                id :id,
                category:'show_status'
            }
            //var $t = $('.showDeletePopup').html('')
            $.post(site_url+ 'admin/'+module+'/showPopup', $.param(params), function (res) {
                $('.showPopup').html(res);
                $('#status').modal();
            });
        });
   }
   
   var showApprovePopup = function() {
        $('body').on('click', '.show_approve_pop_up', function () {
            console.log('hiii')
            var $t =$(this);
            var module = $(this).attr('data-module');
            var id  = $(this).attr('data-id');
            var params = {
                module: module,
                id :id,
                category:'show_approve'
            }
            //var $t = $('.showDeletePopup').html('')
            $.post(site_url+ 'admin/'+module+'/showPopup', $.param(params), function (res) {
                $('.showPopup').html(res);
                $('#approve').modal();
            });
        });
   }

var showRejectPopup = function() {
        $('body').on('click', '.show_reject_pop_up', function () {
            console.log('hiii')
            var $t =$(this);
            var module = $(this).attr('data-module');
            var id  = $(this).attr('data-id');
            var params = {
                module: module,
                id :id,
                category:'show_reject'
            }
            //var $t = $('.showDeletePopup').html('')
            $.post(site_url+ 'admin/'+module+'/showPopup', $.param(params), function (res) {
                $('.showPopup').html(res);
                $('#reject').modal();
            });
        });
}
var show_view_uploads_popup = function() {
        $('body').on('click', '.show_view_uploads_popup', function () {
            console.log('hiii')
            var $t =$(this);
            var module = $(this).attr('data-module');
            var id  = $(this).attr('data-id');
            var params = {
                module: module,
                id :id,
                category:'show_view_uploads'
            }
           
            $.post(site_url+ 'admin/'+module+'/showPopup', $.param(params), function (res) {
                //return false;
                $('.showPopup').html(res);
                $('#show_view_uploads').modal();
            });
        });
   }
 var changeStatus = function(){
       $('body').on('click','.change_status', function(){
            var $t  = $(this);
            var id    = $t.attr('data-id');
            var module = $t.attr('data-module');
            $t.text('Please Wait...');
            $t.attr('disabled',true);
            $.ajax({
                type: "POST",
                url:site_url + 'admin/'+module+'/change_status',
                data: {id:id,module:module},
                success: function(data) {
                  $('#status').modal('toggle');
                  $t.text('Submit');
                  $t.attr('disabled',false);
                  window.location.reload();
                },
                error: function() {
                   
                }
            });
       });
    }
 
   var approvePopup = function(){
       $('body').on('click','.approve_request', function(){
            var $t  = $(this);
            var id    = $t.attr('data-id');
            var module = $t.attr('data-module');
            $.ajax({
                type: "POST",
                url:site_url + 'admin/'+module+'/approve_request',
                data: {id:id,module:module},
                success: function(data) {
                   // console.log(data);return false;
                  $('#approve').modal('toggle');
                  window.location.reload();
                },
                error: function() {
                   
                }
            });
       });
    }
 
var rejectPopup = function(){
       $('body').on('click','.reject_request', function(){
            var $t  = $(this);
            var id    = $t.attr('data-id');
            var module = $t.attr('data-module');
            $t.text('Please Wait...');
            $t.attr('disabled',true);
            $.ajax({
                type: "POST",
                url:site_url + 'admin/'+module+'/reject_request',
                data: {id:id,module:module},
                success: function(data) {
                  $('#reject').modal('toggle');
                  $t.text('Submit');
                  $t.attr('disabled',false);
                  window.location.reload();
                },
                error: function() {
                   
                }
            });
       });
    }
var addInputField = function(){
    $('body').on('click','.add_input', function(){
        $('.more_div').removeClass('hide');
    });
}
 
var deleteEnquiry =function(){
    $('body').on('click','.delete_enquiry', function(){
        var id    = $(this).attr('data-ref');
        var table = $(this).attr('data-table');
        $.ajax({
            type: "POST",
            url:site_url + 'admin/enquiries/delete_enquiry',
            data: {id:id,table:table},
            success: function(data) {
               $('#enq_delete').modal('toggle');
               window.location.reload();
            },
            error: function() {
            }
        });
    });
}

var change_password = function() {
    $('body').on('click','.change_pwd', function(){
        var new_pwd       = $('#new_password').val();
        var new_again_pwd = $('#new_again_pwd').val();
        $('.alert').removeClass('alert-danger');
        $('.alert').removeClass('alert-success');
        $(".alert").css("display", "none");
        if(new_pwd == '' || new_again_pwd == '') {
            $(".alert").css("display", "block");
            $('.alert').addClass('alert-danger').text('Please Fill Mandtory Fields');
            setTimeout(function(){
                $('.alert').css("display", "none");
            }, 3000);
            return false;
        }
        if(new_pwd != new_again_pwd){
            $(".alert").css("display", "block");
            $('.alert').addClass('alert-danger').text('Password Mismatch Error');
            setTimeout(function(){
                $('.alert').css("display", "none");
            }, 3000);
            return false;
        }
        $.ajax({
            type: "POST",
            url:site_url + 'admin/authentication/change_password_action',
            data: {password:new_pwd},
            success: function(data) {
                if(data==1){
                    $(".alert").css("display", "block");
                    $('.alert').removeClass('alert-danger').addClass('alert-success').text('Password Changed Successfully');
                    setTimeout(function(){
                        $('.alert').css("display", "none");
                        $('#new_password').val('');
                        $('#new_again_pwd').val('');
                    }, 3000);
                } else {
                    $(".alert").css("display", "block");
                    $('.alert').addClass('alert-danger').text('Something went wrong,please try again.');
                    setTimeout(function(){
                        $('.alert').css("display", "none");
                        $('#new_password').val('');
                        $('#new_again_pwd').val('');
                    }, 3000);
                }
            },
            error: function() {
            }
        });
    });
}

var setRewardsTabSession = function(){
    $('body').on('click','.tb_rewards', function(){
        var ref = $(this).attr('data-ref');
        $.ajax({
            type: "POST",
            url:site_url + 'admin/loyalty_program/setSession',
            data: {rewrd_type:ref},
            success: function(data) {
                window.location.href = site_url + 'admin/loyalty_program/';
            },
            error: function() {
            }
        });
    });
}

var imageValidation = function(){
    //console.log('hhh')
    var _URL = window.URL || window.webkitURL;
    $(".img_valid").change(function(e) {
        var $t = $(this);
        var w  =  $t.attr('data-width');
        var h  =  $t.attr('data-height');
        var file, img;
        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {
               // alert(this.width + " " + this.height);
                if(this.width!=w || this.height!=h){
                   $('#img_msg').addClass('note note-warning').html('The image you are attempting to upload does not fit into the allowed dimension');
                   $("button[type=submit]").prop("disabled", true);
                   return false;
                } else {
                    $('#img_msg').removeClass('note note-warning').html('');
                    $("button[type=submit]").prop("disabled",false);
                }
            };
            img.onerror = function() {
                $('#img_msg').addClass('note note-warning').html('File type not allowed');
                $("button[type=submit]").prop("disabled", true);
            };
            img.src = _URL.createObjectURL(file);


        }
    });
}
var spaceRestrict = function(){
    $('.space_res').keypress(function(e) {
        if(e.which === 32) 
            return false;
    });
}

var fileTypeValidation = function(){
    $(".file_valid").change(function(e) {
        var file = $(this).val();
        var type = $(this).attr('data-ref');
        var exts = [type];
        // first check if file field has any value
        if ( file ) {
          // split file name at dot
          var get_ext = file.split('.');
          // reverse name to check extension
          get_ext = get_ext.reverse();
          // check file type is valid as given in 'exts' array
          if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
            $('#img_msg').removeClass('note note-warning').html('');
            $("button[type=submit]").prop("disabled",false);
          } else {
            $('#img_msg').addClass('note note-warning').html('File type not allowed');
            $("button[type=submit]").prop("disabled", true);
          }
        }
      });
}
$(document).ready(function(){
  $("#inputTextBox").keypress(function(event){
                                  var inputValue = event.which;
                                  // allow letters and whitespaces only.
                                  if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)&& inputValue != 45) { 
                                      event.preventDefault(); 
                                  }
                              });
  });
  $('.departments_featured').change(function() {
     
      if($(":checkbox:checked").length<5) {
        //if(this.checked) {
           var ref = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                url:site_url + 'admin/departments/change_featured',
                data: {id:ref},
                success: function(data) {
                  location.reload();
                    //window.location.href = site_url + 'admin/loyalty_program/';
                },
                error: function() {
                }
            });
        }else{
            $(this).attr('checked',false);
            alert('you cannot set more than 4 items in Featured section');
            return false;
        }
        //}      
    });
/* var handleCategorySelection = function(){
    $('body').on('change','#category', function(){
       var value = $(this).val();
       if(value == 2){
          
       }
    });
}
 */

return {
    init : function () {      
       showDeletePopup();
       Delete();
       showStatusPopup();
       changeStatus();
       showApprovePopup();
       approvePopup();
       showRejectPopup();
       rejectPopup();
       addInputField();
       show_view_uploads_popup();
       deleteEnquiry();
       change_password();
       setRewardsTabSession();
       imageValidation();
       fileTypeValidation();
       spaceRestrict();
       //handleCategorySelection();
       
    },
 }

} (jQuery)
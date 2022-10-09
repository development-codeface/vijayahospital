var Login = function() {
    var r = function() {
        $(".login-form").validate({
            errorElement: "span",
            errorClass: "help-block",
            focusInvalid: !1,
            rules: {
                username: {
                    required: !0
                },
                password: {
                    required: !0
                },
                remember: {
                    required: !1
                }
            },
            messages: {
                username: {
                    required: "Username is required."
                },
                password: {
                    required: "Password is required."
                }
            },
            invalidHandler: function(r, e) {
                $(".alert-danger", $(".login-form")).show()
            },
            highlight: function(r) {
                $(r).closest(".form-group").addClass("has-error")
            },
            success: function(r) {
                r.closest(".form-group").removeClass("has-error"), r.remove()
            },
            errorPlacement: function(r, e) {
                r.insertAfter(e.closest(".input-icon"))
            },
            submitHandler: function(r) {
                r.submit()
            }
        }), $(".login-form input").keypress(function(r) {
            if (13 == r.which) return $(".login-form").validate().form() && $(".login-form").submit(), !1
        }), $(".forget-form input").keypress(function(r) {
            if (13 == r.which) return $(".forget-form").validate().form() && $(".forget-form").submit(), !1
        }), $("#forget-password").click(function() {
            $(".login-form").hide(), $(".forget-form").show()
        }), $("#back-btn").click(function() {
            $(".login-form").show(), $(".forget-form").hide()
        })
    };
    
    
    var forgot_password = function(){
        $('body').on('click','.forgot_pwd', function(){
            var email = $('#email').val();
            
            if(email !=''){
                $.ajax({
                    type: "POST",
                    url:site_url + 'admin/authentication/forgot_password_action',
                    data: {email:email},
                    success: function(data) {
                       $('.msg').css("display", "block");
                      if(data == 'success'){
                          $('.msg').html('<span style="color:green;">Password Sent To Your Mail</span>');
                          $('#email').val('');
                          setTimeout(function(){
                            $('.msg').css("display", "none");
                          }, 3000);
                      } else {
                          $('.msg').removeClass('note note-success').addClass('note note-warning').html('Please check your email id is proper');
                          
                      }
                    },
                    error: function() {
                    }
               });
                setTimeout(function(){
                  $('.msg').css("display", "none");
                }, 3000);
            }
        });
    }
    return {
        init: function() {
            r(), $(".login-bg").backstretch([site_url+"assets/admin/pages/img/login/bg1.jpg", site_url+"assets/admin/pages/img/login/bg2.jpg", site_url+"assets/admin/pages/img/login/bg3.jpg"], {
                fade: 1e3,
                duration: 8e3
            }), $(".forget-form").hide()
            forgot_password();
        }
    }
}();
jQuery(document).ready(function() {
    Login.init()
});
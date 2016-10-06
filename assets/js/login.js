$(function() {
    
    var $formLogin = $('#login-form');
    var $formLost = $('#lost-form');
    var $formRegister = $('#register-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 2000;

    $("form").submit(function () {
        switch(this.id) {
            case "login-form":
                var $lg_username=$('#login_username').val();
                var $lg_password=$('#login_password').val();

                $.post("/wgc/index.php/Welcome/verPass",
                {
                    "userid": $lg_username,
                    "password": $lg_password
                },
                function(data, status){
                    //console.log(JSON.stringify(data));
                    data = JSON.parse(data);
                    if(data.verified == true){
                        // User and Password correct.
                        location.reload();
                    } else{
                        msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Please verify your user or password.");
                    }
                });
                /*
                if ($lg_username == "ERROR") {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
                } else {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "Login OK");
                }
                return false;
                */
                break;
            case "lost-form":
                var $ls_email=$('#lost_email').val();
                if ($ls_email == "ERROR") {
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", "Send error");
                } else {
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "success", "glyphicon-ok", "Send OK");
                }
                return false;
                break;
            case "register-form":
                var $rg_username=$('#register_username').val();
                var $rg_email=$('#register_email').val();
                var $rg_firstname=$('#register_firstname').val();
                var $rg_middlename=$('#register_middlename').val();
                var $rg_lastname=$('#register_lastname').val();
                var $rg_password=$('#register_password').val();
                var $rg_c_password=$('#register_confirm_password').val();
                var $rg_phone=$('#register_phone').val();
                var $rg_gender=$('#register_gender').val();
                var $rg_profile=$('#register_profile').val();
                if ($rg_firstname==="" || $rg_firstname.trim()==="") {
                    $('#register_firstname').val("");
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Please provide the first name.");
                    return false;
                }
                if ($rg_lastname==="" || $rg_lastname.trim()==="") {
                    $('#register_lastname').val("");
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Please provide the last name.");
                    return false;
                }
                if ($rg_username==="" || $rg_username.trim()==="") {
                    $('#register_username').val("");
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Please provide the username.");
                    return false;
                }
                if ($rg_email==="" || $rg_email.trim()==="") {
                    $('#register_email').val("");
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Please provide the email.");
                    return false;
                }
                if ($rg_password==="" || $rg_password.trim()==="") {
                    $('#register_password').val("");
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Please provide the password.");
                    return false;
                }
                if ($rg_c_password==="" || $rg_c_password.trim()==="") {
                    $('#register_confirm_password').val("");
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Please provide the cofirmation of password.");
                    return false;
                }
                if ($rg_c_password!=$rg_password) {
                    $('#register_confirm_password').val("");
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Passwords do not match!");
                    return false;
                }
                if ($rg_phone==="" || $rg_phone.trim()==="") {
                    $('#register_phone').val("");
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Please provide the phone number.");
                    return false;
                }
                if ($rg_gender==-1) {
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Please provide the gender.");
                    return false;
                }
                if ($rg_profile==-1) {
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Please provide the profile.");
                    return false;
                }
                //msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "success", "glyphicon-ok", "Register OK");
                var rg_data = {
                    'rg_firstname':$rg_firstname, 'rg_lastname':$rg_lastname ,'rg_middlename':$rg_middlename ,'rg_username':$rg_username,
                    'rg_email':$rg_email ,'rg_password':$rg_password ,'rg_phone':$rg_phone ,
                    'rg_gender':$rg_gender ,'rg_profile':$rg_profile
                };
                /*
                $.post("/wgc/index.php/welcome/register_user", rg_data)
                    .done(function(data){
                        console.log(JSON.stringify(data));
                        location.reload();
                    });
                */
                $('#register-form').attr('action', '/wgc/index.php/welcome/register_user');
                $('#register-form').submit();
                break;
            case "form-busca":
                $('#form-busca').submit();
                
            case "form-post-job":   
                $('#form-post-job').submit();
            default:
                return false;
        }
        return false;
    });
    
    $('#login_register_btn').click( function () { modalAnimate($formLogin, $formRegister) });
    $('#register_login_btn').click( function () { modalAnimate($formRegister, $formLogin); });
    $('#login_lost_btn').click( function () { modalAnimate($formLogin, $formLost); });
    $('#lost_login_btn').click( function () { modalAnimate($formLost, $formLogin); });
    $('#lost_register_btn').click( function () { modalAnimate($formLost, $formRegister); });
    $('#register_lost_btn').click( function () { modalAnimate($formRegister, $formLost); });
    
    function modalAnimate ($oldForm, $newForm) {
        $newForm.trigger('reset');
        var $oldH = $oldForm.height();
        var $newH = $newForm.height();
        $divForms.css("height",$oldH);
        $oldForm.fadeToggle($modalAnimateTime, function(){
            $divForms.animate({height: $newH}, $modalAnimateTime, function(){
                $newForm.fadeToggle($modalAnimateTime);
            });
        });
    }
    
    function msgFade ($msgId, $msgText) {
        $msgId.fadeOut($msgAnimateTime, function() {
            $(this).text($msgText).fadeIn($msgAnimateTime);
        });
    }
    
    function msgChange($divTag, $iconTag, $textTag, $divClass, $iconClass, $msgText) {
        var $msgOld = $divTag.text();
        msgFade($textTag, $msgText);
        $divTag.addClass($divClass);
        $iconTag.removeClass("glyphicon-chevron-right");
        $iconTag.addClass($iconClass + " " + $divClass);
        setTimeout(function() {
            msgFade($textTag, $msgOld);
            $divTag.removeClass($divClass);
            $iconTag.addClass("glyphicon-chevron-right");
            $iconTag.removeClass($iconClass + " " + $divClass);
  		}, $msgShowTime);
    }

    $("#login-modal").on('show.bs.modal', function(event){
        // Clean up everythhing!
        $('#login-form').trigger('reset');
        $('#lost-form').trigger('reset');
        $('#register-form').trigger('reset');
    });

    $("#logout").click(function() {
        $.post("/wgc/index.php/welcome/destroy",
            function(data, status){
                // Session destroyd.
                location.reload();
            });
    });

    $("#confirm_btn").click (function(event) {
        var gy = $("#graduation_year").val();
        var current_year = new Date().getFullYear();
        if (gy<1900 || gy>current_year) {
            msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Please provide a valid graduation year.");
            $("#graduation_year").focus();
            event.preventDefault();
            return;
        }
        var stat = $("#status option:selected" ).val();
        if (stat=="" || stat==-1) {
            msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Please provide a valid student status.");
            $("#status").focus();
            event.preventDefault();
            return;
        }
        var oc = $("#origin_country option:selected" ).val();
        if (oc=="" || oc==-1) {
            msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Please provide a origin country.");
            $("#origin_country" ).focus();
            event.preventDefault();
            return;
        }
        var ocy = $("#origin_city option:selected" ).val();
        if (ocy=="" || ocy==-1) {
            msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Please provide a origin city.");
            $("#origin_city" ).focus();
            event.preventDefault();
            return;
        }
        var cc = $("#current_country option:selected" ).val();
        if (cc=="" || cc==-1) {
            msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Please provide a current country.");
            $("#current_country" ).focus();
            event.preventDefault();
            return;
        }
        var ccy = $("#current_city option:selected" ).val();
        if (ccy=="" || ccy==-1) {
            msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Please provide a current city.");
            $("#current_city" ).focus();
            event.preventDefault();
            return;
        }
        var ocp = $("#occupation option:selected" ).val();
        if (ocp=="" || ocp==-1) {
            msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Please provide an occupation.");
            $("#occupation" ).focus();
            event.preventDefault();
            return;
        }
        var comp = $("#company option:selected" ).val();
        if (comp=="" || comp==-1) {
            msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Please provide a company.");
            $("#company" ).focus();
            event.preventDefault();
            return;
        }
        var elevel = $("#ed_level option:selected" ).val();
        if (elevel=="" || elevel==-1) {
            msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Please provide a education level.");
            $("#ed_level" ).focus();
            event.preventDefault();
            return;
        }
        $.post($("#confirm-form").attr("action"),
            {
                "university": $("#university").val(),
                "status": $("#status").val(),
                "graduation_year": $("#graduation_year").val(),
                "origin_country": $("#origin_country").val(),
                "origin_city": $("#origin_city").val(),
                "current_country": $("#current_country").val(),
                "current_city": $("#current_city").val(),
                "occupation": $("#occupation").val(),
                "company": $("#company").val(),
                "ed_level": $("#ed_level").val()
            },
            function(data, status){
                alert("Your profile has been created successfully, please wait for it to be authorized.");
                window.location.href = "/wgc/";
            });
    });
});

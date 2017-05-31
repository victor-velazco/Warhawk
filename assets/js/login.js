$(function() {
    
    var $formLogin = $('#login-form');
    var $formLost = $('#lost-form');
    var $formRegister = $('#register-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 2000;

    $("form").submit(function (event) {
        switch(this.id) {
            case "login-form":
                var $lg_username=$('#login_username').val();
                var $lg_password=$('#login_password').val();
				var $g_recaptcha_response = grecaptcha.getResponse();

                $.post("/wgc/index.php/Welcome/verLogin",
                {
                    "userid": $lg_username,
                    "password": $lg_password,
					"g_recaptcha_response": $g_recaptcha_response
                },
                function(data, status){
                    //console.log(JSON.stringify(data));
                    data = JSON.parse(data);
                    if(data.verified == true){
                        // User and Password correct.
                        location.href='/wgc/index.php/Welcome/dashboard';
                    } else{
                        msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Please verify your user, password or reCAPTCHA.");
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
                $.post("/wgc/index.php/Welcome/lostPass",
                {
                    "email": $ls_email,
                },
                function(data, status){
                    data = JSON.parse(data);
                    if(data.sent === true){
                        // User and Password correct.
                        msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", "Your pasword has been sent to your email.");
                        setTimeout(function() {
                            modalAnimate($formLost, $formLogin);
                        }, 1500);
                    } else{
                        msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", "Your email address is not registered.");
                    }
                });
                return false;
                break;
            case "register-form":
                if ($('#register-form').attr('action') == '/wgc/index.php/welcome/register_user') {
                    return true;
                }
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
                // Validate if username and or email already exists

                var userdata = {'email':$rg_email, 'username':$rg_username };
                $.post("/wgc/index.php/welcome/validate_user", userdata
                ,function(data, status){
                    data = JSON.parse(data);
                    if (data.res==='error') {
                        msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", data.message);
                        if (data.message.indexOf("Email")<0) {
                            $('#register_username').val("");
                            $('#register_username').focus();
                        } else {
                            $('#register_email').val("");
                            $('#register_email').focus();
                        }
                        return false;
                    } else {
                        //event.preventDefault();
                        $('#register-form').attr('action', '/wgc/index.php/welcome/register_user');
                        $('#register-form').submit();
                        return true;
                    }
                });
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

    $("#linkedin-signin").click(function() {
        window.location.href = "https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=784u6wvxgqz9bg&redirect_uri=http://www.quimeratech.com/wgc/index.php/auth/linkedin&state=0123456789&scope=r_basicprofile%20r_emailaddress";
    });

    var orig_country = $('#origin_country').selectize({
        allowEmptyOption: false,
        create: true
    });
    var orig_city = $('#origin_city').selectize({
        allowEmptyOption: false,
        create: true
    });
    var curr_country = $('#current_country').selectize({
        allowEmptyOption: false,
        create: true
    });
    var curr_city = $('#current_city').selectize({
        allowEmptyOption: false,
        create: true
    });
    $('#status').selectize({
        allowEmptyOption: false,
        create: true
    });
    $('#occupation').selectize({
        allowEmptyOption: false,
        create: true
    });
    $('#company').selectize({
        allowEmptyOption: false,
        create: true
    });
    $('#ed_level').selectize({
        allowEmptyOption: false,
        create: true
    });

    $("#origin_country").change (function() {
        $( "#origin_country option:selected" ).each(function() {
            var country_id = $(this).val();
            if (isNaN(country_id)) return;
            $.post("/wgc/index.php/welcome/loadCities",
            {
                "country_id": country_id
            })
            .done(function( cities ) {
                // $("#origin_city").empty();
                var oCitySel = orig_city[0].selectize;
                oCitySel.clearOptions();
                if (cities!=null) {
                    $.each($.parseJSON(cities), function(key,value){
                       //$("#origin_city").append('<option id="' + value.city_id + '">' + value.city_name + '</option>');
                       oCitySel.addOption({ value: value.city_id, text: value.city_name});
                    });
                    oCitySel.renderCache['option'] = {};
                    oCitySel.renderCache['item'] = {};
                }
            });            
        });
    });


    $("#current_country").change (function() {
        $( "#current_country option:selected" ).each(function() {
            var country_id = $(this).val();
            if (isNaN(country_id)) return;
            $.post("/wgc/index.php/welcome/loadCities",
            {
                "country_id": country_id
            })
            .done(function( cities ) {
                //$("#current_city").empty();
                var oCityCSel = curr_city[0].selectize;
                oCityCSel.clearOptions();
                if (cities!=null)
                    $.each($.parseJSON(cities), function(key,value){
                       //$("#current_city").append('<option id="' + value.city_id + '">' + value.city_name + '</option>');
                        oCityCSel.addOption({ value: value.city_id, text: value.city_name});
                    });
                    oCityCSel.renderCache['option'] = {};
                    oCityCSel.renderCache['item'] = {};
            });            
        });
    });

});

        <!-- /.footer -->
            <div class="row footer">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        &copy; 2016 University of Wisconsin-Whitewater
                    </div>
                    <div class="col-lg-offset-1 col-lg-4 col-md-4 col-sm-4 text-center">
                        Developed by Alpha Programmers, LLC
                    </div>
                    <div class="col-lg-offset-1 col-lg-3 col-md-3 col-sm-3 text-right">
                        Account Settings&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Privacy Policy&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Help
                    </div>
                </div>
            </div>            
        <!-- /.footer -->                       
    </div>                   
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo $this->config->base_url(); ?>assets/webroot/js/vendor/jquery-1.11.2.js"><\/script>');</script>
        <script src="<?php echo $this->config->base_url(); ?>assets/webroot/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo $this->config->base_url(); ?>assets/webroot/js/main.js"></script>     
        <script src="https://use.fontawesome.com/01d14e3d66.js"></script>     
        <script src="<?php echo $this->config->base_url(); ?>assets/webroot/slick/slick.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.3/js/standalone/selectize.min.js"></script>
        <script src="<?php echo $this->config->base_url(); ?>assets/js/login.js"></script>
        <script src="<?php echo $this->config->base_url(); ?>assets/js/reset_pass.js"></script>
        <script src="<?php echo $this->config->base_url(); ?>assets/js/authorize.js"></script>
        <script src="<?php echo $this->config->base_url(); ?>assets/js/wgc.js"></script>  
        <script src="<?php echo $this->config->base_url(); ?>assets/js/file_upload.js"></script>
        <script src="<?php echo $this->config->base_url(); ?>assets/js/register_user.js"></script>

 <!-- Custom Theme JavaScript -->            
        <script>
            $(document).ready(function(){              

            $('.carousel').carousel({
                interval: 5000 //changes the speed
            });
            
            $('.aluminis').slick({
              dots: true,
              infinite: false,
              speed: 300,
              slidesToShow: 5,
              slidesToScroll: 1,
              autoplay: true,
              autoplaySpeed: 2000,
              infinite: true,
              responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                  }
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 200,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                  }
                }                
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
              ]
            });            
            

                $('#mes').on('change', function() {
                  window.location.href = '<?= base_url() . "index.php/agenda/index/" . $this->uri->segment(3) ?>/' + this.value;
                });
                
                $('#anio').on('change', function() {
                  window.location.href = '<?= base_url() . "index.php/agenda/index/" ?>' + this.value + '/<?=  $this->uri->segment(4) ?>';
                });                 
                
                $("#calendario").on("click", "td", function(event) {        
                    event.preventDefault();
                    //obtenemos el número del día
                    var num_dia = $(this).find('.num_dia').html();                             
                    var hoy = $(this).find('.highlight').html();    
                    //obtenemos el año a través del campo oculto del formulario
                    var year = $(".year").val();
                    //obtenemos el mes a través del campo oculto del formulario
                    var month = $(".month").val();
                    //anteponemos el 0 si es un sólo número para poder trabajar
                    //correctamente la fecha
                    if(hoy){                    
                        if(hoy.length === 1){
                            hoy = '0'+hoy;
                        }
                        //anteponemos el 0 si es un sólo número para poder trabajar
                        //correctamente la fecha
                        if(month.length === 1){
                            month = '0'+month;
                        }
                        //creamos la fecha sobre la que el usuario ha pulsado
                        var fecha = year + '-' + month  + '-' +  hoy;                        
                    }else if(num_dia){
                        if(num_dia.length === 1){
                            num_dia = '0'+num_dia;
                        }
                        //anteponemos el 0 si es un sólo número para poder trabajar
                        //correctamente la fecha
                        if(month.length === 1){
                            month = '0'+month;
                        }
                        //creamos la fecha sobre la que el usuario ha pulsado
                        var fecha = year + '-' + month  + '-' +  num_dia;                     
                    }
                    $('#event_date').val(fecha);
                    
                   <?php
                   if ($this->session->userdata('data') && $this->session->userdata('data')['profile_desc']) {
                   ?>
                    $('#event-modal').modal("show");
                   <?php
                   }
                   ?>
                });
            
                
                $( '#addEvent' ).click(function(event) { 
                    event.preventDefault();                                                            
                    var fecha = $("input#event_date").val();
                    var evento = $("input#detail_event").val(); 
                                          
                    $.ajax({
                        url:        '<?= base_url(); ?>index.php/agenda/add',
                        type:       'POST',
                        //dataType:   'json',
                        data:       {fecha:fecha, evento:evento},
                        success:    function(code){                                
                            $("input#evento").val('');
                            setTimeout(function(){
                               window.location.reload(1);
                            }, 800);                                
                        }
                    }); 
                        
                });                    
                
                $( '#profile_btn' ).click(function(event) { 
                    event.preventDefault();
					var url = $("#type").val();
                    $.ajax({
                        url:        '<?= base_url(); ?>index.php/welcome/profileUpdate',
                        type:       'POST',
                        //dataType:   'json',
                        data:       {
                          id:$("#id").val(), 
                          firstname:$("#profile_firstname").val(),
                          lastname:$("#profile_lastname").val(),
                          email:$("#profile_email").val(),
                          phone:$("#profile_phone").val(),
                          about:$("#profile_about").val(),
                        },
                        success:    function(result){
                          console.log(result);        
							if(url == 'alumni'){
								window.location.href="<?= base_url(); ?>index.php/alumni/dashboard";  
							}else{
								window.location.href="<?= base_url(); ?>index.php/welcome/dashboard";
							}
                        }
                    }); 
                }); 

                $( '#donate_btn' ).click(function(event) { 
                    event.preventDefault();
                    $.ajax({
                        url:        '<?= base_url(); ?>index.php/welcome/donate',
                        type:       'POST',
                        //dataType:   'json',
                        data:       {
                          id:$("#id").val(),
                        },
                        success:    function(result){
                          console.log(result);                             
                          window.location.href="<?= base_url(); ?>index.php/welcome/about/"+$("#id").val();
                        }
                    }); 
                });  

                $( '#referal_btn' ).click(function(event) { 
                    event.preventDefault();
                    $.ajax({
                        url:        '<?= base_url(); ?>index.php/welcome/refer',
                        type:       'POST',
                        //dataType:   'json',
                        data:       {
                          email:$("#email").val(),
                        },
                        success:    function(result){
                          console.log(result);
                          alert('An invitation email has been sent to your friend.');
                          window.location.href="<?= base_url(); ?>index.php/welcome/dashboard";
                        }
                    }); 
                });   

		var url_administrator = "<?php //echo site_url('/' . $profile . '/') ?>";
		$("button").click(function() {
	        var real_id = this.id.substring(5);
	        var id = $("#"+this.id);
	        var id_icon = $("#icon_"+this.id);
	        $.post(url_administrator + "feature/" + real_id + "/" + id.val(),
	            function(data, status) {
	                var resUpdate = JSON.parse(data).result;
	                console.log(id.val());
	                if (id.val()=='1') {
	                	console.log("going for 1");
	                	id.val('0');
						id.removeClass('btn btn-no-feat').addClass('btn btn-feat');
	                	id_icon.removeClass('glyphicon glyphicon-remove-sign').addClass('glyphicon glyphicon-ok-sign');
	                } else {
	                	console.log("going for 0");
	                	id.val('1');
	                	id.removeClass('btn btn-feat').addClass('btn btn-no-feat');
						id_icon.removeClass('glyphicon glyphicon-ok-sign').addClass('glyphicon glyphicon-remove-sign');
	                }
	                
                    });                                                
                
                });      
            
            
			
			
			
			
			
$('#nickname').keyup(function() {
	var nickname = $(this).val();

	if(nickname == ''){
		$('#msg_block').hide();
	}else{
		$('#msg_block').show();
	}
});

// initial nickname check
$('#nickname').trigger('keyup');
			
			
var request_timestamp = 0;

var setCookie = function(key, value) {
	var expires = new Date();
	expires.setTime(expires.getTime() + (5 * 60 * 1000));
	document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}

var getCookie = function(key) {
	var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
	return keyValue ? keyValue[2] : null;
}

var guid = function() {
	function s4() {
		return Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1);
	}
	return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
}

if(getCookie('user_guid') == null || typeof(getCookie('user_guid')) == 'undefined'){
	var user_guid = guid();
	setCookie('user_guid', user_guid);
}


// https://gist.github.com/kmaida/6045266
var parseTimestamp = function(timestamp) {
	var d = new Date( timestamp * 1000 ), // milliseconds
		yyyy = d.getFullYear(),
		mm = ('0' + (d.getMonth() + 1)).slice(-2),	// Months are zero based. Add leading 0.
		dd = ('0' + d.getDate()).slice(-2),			// Add leading 0.
		hh = d.getHours(),
		h = hh,
		min = ('0' + d.getMinutes()).slice(-2),		// Add leading 0.
		ampm = 'AM',
		timeString;
			
	if (hh > 12) {
		h = hh - 12;
		ampm = 'PM';
	} else if (hh === 12) {
		h = 12;
		ampm = 'PM';
	} else if (hh == 0) {
		h = 12;
	}

	timeString = yyyy + '-' + mm + '-' + dd + ', ' + h + ':' + min + ' ' + ampm;
		
	return timeString;
}



var sendChat = function (message, from, to, callback) {

	$.getJSON('<?php echo base_url(); ?>index.php/api/send_message?message=' + message + '&from=' + from + '&to=' + to + '&nickname=' + $('#nickname').val() + '&guid=' + getCookie('user_guid'), function (data){
		callback();
	});
}

var append_chat_data = function (chat_data) {
	chat_data.forEach(function (data) {
		var is_me = data.guid == getCookie('user_guid');
		
		if(is_me){
			var html = '<li class="right clearfix">';
			html += '	<span class="chat-img pull-right">';
			html += '		<img src="http://placehold.it/50/FA6F57/fff&text=' + data.nickname.slice(0,2) + '" alt="User Avatar" class="img-circle" />';
			html += '	</span>';
			html += '	<div class="chat-body clearfix">';
			html += '		<div class="header">';
			html += '			<small class="text-muted"><span class="glyphicon glyphicon-time"></span>' + parseTimestamp(data.timestamp) + '</small>';
			html += '			<strong class="pull-right primary-font">' + data.nickname + '</strong>';
			html += '		</div>';
			html += '		<p>' + data.message + '</p>';
			html += '	</div>';
			html += '</li>';
		}else{
		  
			var html = '<li class="left clearfix">';
			html += '	<span class="chat-img pull-left">';
			html += '		<img src="http://placehold.it/50/55C1E7/fff&text=' + data.nickname.slice(0,2) + '" alt="User Avatar" class="img-circle" />';
			html += '	</span>';
			html += '	<div class="chat-body clearfix">';
			html += '		<div class="header">';
			html += '			<strong class="primary-font">' + data.nickname + '</strong>';
			html += '			<small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span>' + parseTimestamp(data.timestamp) + '</small>';
			
			html += '		</div>';
			html += '		<p>' + data.message + '</p>';
			html += '	</div>';
			html += '</li>';
		}
		$("#received").html( $("#received").html() + html);
	});
  
	$('#received').animate({ scrollTop: $('#received').height()}, 1000);
}

var update_chats = function () {
	var from = $('#from_person_id').val();
	var to = 33;

	if(typeof(request_timestamp) == 'undefined' || request_timestamp == 0){
		var offset = 60*15; // 15min
		request_timestamp = parseInt( Date.now() / 1000 - offset );
	}
	$.getJSON('<?php echo base_url(); ?>index.php/api/get_messages?timestamp=' + request_timestamp + '&from=' + from + '&to=' + to, function (data){
		append_chat_data(data);	

		var newIndex = data.length-1;
		if(typeof(data[newIndex]) != 'undefined'){
			request_timestamp = data[newIndex].timestamp;
		}
	});      
}



var update_chats_to = function () {
	var from = $('#to_person_id').val();
	var to = 33;

	if(typeof(request_timestamp) == 'undefined' || request_timestamp == 0){
		var offset = 60*15; // 15min
		request_timestamp = parseInt( Date.now() / 1000 - offset );
	}
	$.getJSON('<?php echo base_url(); ?>index.php/api/get_messages?timestamp=' + request_timestamp + '&from=' + from + '&to=' + to, function (data){
		append_chat_data_to(data);	

		var newIndex = data.length-1;
		if(typeof(data[newIndex]) != 'undefined'){
			request_timestamp = data[newIndex].timestamp;
		}
	});      
}


var append_chat_data_to = function (chat_data) {
	chat_data.forEach(function (data) {
		var is_me = data.guid == getCookie('user_guid');
		

			var html = '<li class="left clearfix">';
			html += '	<span class="chat-img pull-left">';
			html += '		<img src="http://placehold.it/50/55C1E7/fff&text=' + data.nickname.slice(0,2) + '" alt="User Avatar" class="img-circle" />';
			html += '	</span>';
			html += '	<div class="chat-body clearfix">';
			html += '		<div class="header">';
			html += '			<strong class="primary-font">' + data.nickname + '</strong>';
			html += '			<small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span>' + parseTimestamp(data.timestamp) + '</small>';
			
			html += '		</div>';
			html += '		<p>' + data.message + '</p>';
			html += '	</div>';
			html += '</li>';
	
		$("#received_to").html( $("#received_to").html() + html);
	});
  
	$('#received_to').animate({ scrollTop: $('#received_to').height()}, 1000);
}


$('#submit-msg').click(function (e) {
	e.preventDefault();
	
	var $field = $('#message');
	var data = $field.val();
	var from_person = $('#from_person_id').val();
	var to_person = 33;

	$field.addClass('disabled').attr('disabled', 'disabled');
	sendChat(data, from_person, to_person , function (){
		$field.val('').removeClass('disabled').removeAttr('disabled');
	});
});

$('#message').keyup(function (e) {
	if (e.which == 13) {
		$('#submit-msg').trigger('click');
	}
});

setInterval(function (){
	update_chats();
}, 1500);			
			
			
			
			
			
			
			
			
			
			
			
            });
            
            
        </script>        
    </body>
</html>
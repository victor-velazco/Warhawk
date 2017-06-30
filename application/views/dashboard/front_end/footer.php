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
        <!--script src="<?php echo $this->config->base_url(); ?>assets/webroot/js/vendor/bootstrap.min.js"></script-->
        <script src="<?php echo $this->config->base_url(); ?>assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
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
        <script src="<?php echo $this->config->base_url(); ?>assets/webroot/js/moment.js"></script>     
        <script src="<?php echo $this->config->base_url(); ?>assets/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=nl0on0826tedgyxntzbg5el8aofndpnifj58qd3lnklyqerk"></script>
        <!-- Custom Theme JavaScript -->            
         <script>
            $(document).ready(function(){              
            
            $('.carousel').carousel({
                interval: 5000 //changes the speed
            });
            
            tinymce.init({
              selector: 'textarea',
              inline: false,
              height: 150,
              menubar: true,
              plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
              ],
              toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
              content_css: '//www.tinymce.com/css/codepen.min.css'
            });

            $('#datetimepicker1').datetimepicker({format: "YYYY-MM-DD HH:mm"});
            $('#datetimepicker2').datetimepicker({format: "YYYY-MM-DD HH:mm"});

            $('.aluminis').slick({
              dots: true,
              infinite: false,
              speed: 300,
              slidesToShow: 5,
              slidesToScroll: 5,
              responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true,
                    dots: true
                  }
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                  }
                },
                {
                  breakpoint: 200,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
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
            
                
                $( '#addEvent' ).click(function() { 
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
                
		var url_administrator = "<?php //echo site_url('/' . $profile . '/') ?>";
		$("button").click(function() {
            if (this.id=='submitAnnouncement') {
                console.log("submitting...");
                //$('#announcement-form').submit();
                $("form")[0].submit();
                return true;
            } else {
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
            }
        });      
    });
            
            
        </script>        
    </body>
</html>
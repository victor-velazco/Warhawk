 <style type="text/css">
 	#form-group input[type=text], input[type=text], input[type=number], input[type=password], input[type=tel], input[type=email], select {
		margin-top: 10px;
	}
 </style>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.3/css/selectize.bootstrap2.min.css" rel="stylesheet" />
 <section id="main" role="main">
            <div class="container-fluid">
                    <div class="row">
                    	<div class="col-md-8 col-md-offset-2" style="text-align: center;">
                    		<img src="<?php echo $this->config->base_url(); ?>assets/img/uwwLogo.jpg" />
                        	<h4>Please complete the following information to complete the login process</h4>
                    	</div>
                        <div class="col-md-4 col-md-offset-4">
                        	
                        	<form id="confirm-form" method="POST" action="<?php echo $this->config->base_url(); ?>index.php/welcome/confirm_user">
			    				<div id="div-register-msg">
		                            <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
		                            <span id="text-register-msg">Provide Alumni specific information:</span>
		                        </div>
		                        <div class="form-group">
				    				<input id="university" name="university" class="form-control" type="text" value="Whitewater" disabled>
			                        <input id="graduation_year" name="graduation_year" class="form-control" type="number" placeholder="Graduation Year">
			                        <select  id="status" name="status" required>
			                            <option value="-1">Select your Student Status</option>
			                            <?php foreach ($statuses as $value) {
			                            ?>
			                                <option value="<?=$value->status_id?>"><?=$value->status?></option>
			                            <?php 
			                            }
			                            ?>
			                        </select>
			                        <select  id="origin_country" name="origin_country" required>
			                            <option value="-1">Select your country of origin</option>
			                            <?php foreach ($countries as $value) {
			                            ?>
			                                <option value="<?=$value->country_id?>"><?=$value->country_name?></option>
			                            <?php 
			                            }
			                            ?>
			                        </select>
			                        <select  id="origin_city" name="origin_city" required>
			                            <option value="-1">Select your city of origin</option>
			                        </select>
			                        <select  id="current_country" name="current_country" required>
			                            <option value="-1">Select the current country</option>
			                            <?php foreach ($countries as $value) {
			                            ?>
			                                <option value="<?=$value->country_id?>"><?=$value->country_name?></option>
			                            <?php 
			                            }
			                            ?>
			                        </select>
			                        <select  id="current_city" name="current_city" required>
			                            <option value="-1">Select the current city</option>
			                        </select>
			                        <select  id="occupation" name="occupation" required>
			                            <option value="-1">Select your occupation</option>
			                            <?php foreach ($occupations as $value) {
			                            ?>
			                                <option value="<?=$value->occupation_id?>"><?=$value->description?></option>
			                            <?php 
			                            }
			                            ?>
			                        </select>
			                        <select  id="company" name="company" required>
			                            <option value="-1">Select your company</option>
			                            <?php foreach ($companies as $value) {
			                            ?>
			                                <option value="<?=$value->company_id?>"><?=$value->company_name?></option>
			                            <?php 
			                            }
			                            ?>
			                        </select>
			                        <select  id="ed_level" name="ed_level" required>
			                            <option value="-1">Select your education level</option>
			                            <?php foreach ($levels as $value) {
			                            ?>
			                                <option value="<?=$value->education_level_id?>"><?=$value->level?></option>
			                            <?php 
			                            }
			                            ?>
			                        </select>
			                        
			                        <br />
		                            <button id="confirm_btn" type="button" class="btn btn-default btn-lg btn-block">Confirm</button>
		                    	</div>
			                </form>
			                <!-- End | Register Form -->
                        </div>
                    </div>
            </div>
            <br />
            <br />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.3/js/standalone/selectize.min.js"></script>
            <script src="<?php echo $this->config->base_url(); ?>assets/js/login.js"></script>
            <script>
            	$(document).ready(function () {
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
            </script>

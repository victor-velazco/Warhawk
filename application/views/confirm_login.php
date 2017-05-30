 <style type="text/css">
 	#form-group input[type=text], input[type=text], input[type=number], input[type=password], input[type=tel], input[type=email], select {
		margin-top: 10px;
	}
 </style>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.3/css/selectize.bootstrap3.min.css" rel="stylesheet" />
 <section id="main" role="main" class="background_wgc" style="top:107px; position: absolute; color: #fff; width: 100%;">
            <div class="container-fluid">
                    <div class="row">
                    	<div class="col-md-8 col-md-offset-2" style="text-align: center;">
                        	<h4 class="wh">Please complete the following information to complete the login process</h4>
                    	</div>
                        <div class="col-md-4 col-md-offset-4">
                        	
                        	<form id="confirm-form" method="POST" action="<?php echo $this->config->base_url(); ?>index.php/welcome/confirm_user">
			    				<div id="div-register-msg">
		                            <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
		                            <span id="text-register-msg">Provide Alumni specific information:</span>
		                        </div>
		                        <div class="form-group">
				    				<input id="university" name="university" class="form-control input-modal" type="text" value="Whitewater" disabled>
			                        <input id="graduation_year" name="graduation_year" class="form-control input-modal" type="number" placeholder="Graduation Year">
			                        <select  id="status" name="status" class="form-control input-modal"required>
			                            <option value="-1">Select your Student Status</option>
			                            <?php foreach ($statuses as $value) {
			                            ?>
			                                <option value="<?=$value->status_id?>"><?=$value->status?></option>
			                            <?php 
			                            }
			                            ?>
			                        </select>
			                        <select  id="origin_country" name="origin_country" class="form-control input-modal" required>
			                            <option value="-1">Select your country of origin</option>
			                            <?php foreach ($countries as $value) {
			                            ?>
			                                <option value="<?=$value->country_id?>"><?=$value->country_name?></option>
			                            <?php 
			                            }
			                            ?>
			                        </select>
			                        <select  id="origin_city" name="origin_city" class="form-control input-modal" required>
			                            <option value="-1">Select your city of origin</option>
			                        </select>
			                        <select  id="current_country" name="current_country" class="form-control input-modal" required>
			                            <option value="-1">Select the current country</option>
			                            <?php foreach ($countries as $value) {
			                            ?>
			                                <option value="<?=$value->country_id?>"><?=$value->country_name?></option>
			                            <?php 
			                            }
			                            ?>
			                        </select>
			                        <select  id="current_city" name="current_city" class="form-control input-modal" required>
			                            <option value="-1">Select the current city</option>
			                        </select>
			                        <select  id="occupation" name="occupation" class="form-control input-modal" required>
			                            <option value="-1">Select your occupation</option>
			                            <?php foreach ($occupations as $value) {
			                            ?>
			                                <option value="<?=$value->occupation_id?>"><?=$value->description?></option>
			                            <?php 
			                            }
			                            ?>
			                        </select>
			                        <select  id="company" name="company" class="form-control input-modal" required>
			                            <option value="-1">Select your company</option>
			                            <?php foreach ($companies as $value) {
			                            ?>
			                                <option value="<?=$value->company_id?>"><?=$value->company_name?></option>
			                            <?php 
			                            }
			                            ?>
			                        </select>
			                        <select  id="ed_level" name="ed_level" class="form-control input-modal" required>
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

<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="col-md-offset-2 col-md-5 container" style="top:102px; padding-left:2px; padding-right:2px;">
	        <!-- Begin | Register Form -->
	        <form id="register-form" method="POST" ACTION="createUser">
			    <div class="modal-body">
					<div id="div-register-msg">
	                    <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
	                    <span id="text-register-msg">Register an account.</span>
	                </div>
					<input id="register_firstname" name="register_firstname" class="form-control" type="text" placeholder="First Name" required>
	                <input id="register_middlename" name="register_middlename" class="form-control" type="text" placeholder="Middle Name [Optional]">
	                <input id="register_lastname" name="register_lastname" class="form-control" type="text" placeholder="Last Name" required>
	                <input id="register_username" name="register_username" class="form-control" type="text" placeholder="Username" required>
	                <input id="register_email" name="register_email" class="form-control" type="email" placeholder="E-Mail" required>
	                <div class="form-group">
	                    <input id="register_phone" name="register_phone" class="form-control" type="tel" pattern="^\d{3}-\d{3}-\d{4}$" placeholder="Phone Number (xxx-xxx-xxxx)" data-error="Please match format (xxx-xxx-xxxx)" required>
	                    <div class="help-block with-errors"></div>
	                </div>
	                <select class="form-control" id="register_gender" name="register_gender" required>
	                    <option value="-1">Select a Gender</option>
	                    <?php foreach ($genders as $value) {
	                    ?>
	                        <option value="<?=$value->gender_id?>"><?=$value->gender?></option>
	                    <?php 
	                    }
	                    ?>
	                </select>
	                <select class="form-control" id="register_status" name="register_status" required>
	                    <option value="-1">Select an Alumni Status</option>
	                    <?php foreach ($statuses as $value) {
	                    ?>
	                        <option value="<?=$value->status_id?>"><?=$value->status?></option>
	                    <?php 
	                    }
	                    ?>
	                </select>
				</div>
			    <div class="modal-footer">
	                <div>
	                    <button id="register_btn" type="submit" class="btn btn-default btn-lg btn-block">Register</button>
	                </div>
			    </div>
	        </form>
	        <!-- End | Register Form -->	        
		</div>
	</div>
	<script src="<?php echo $this->config->base_url(); ?>assets/js/register_user.js"></script>
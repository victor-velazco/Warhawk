<!-- BEGIN # MODAL LOGIN -->
<link href="<?php echo $this->config->base_url(); ?>assets/css/login.css" rel="stylesheet">
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <img id="img_logo" src="<?php echo $this->config->base_url(); ?>assets/img/logo_sqr.png">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </div>
            
            <!-- Begin # DIV Form -->
            <div id="div-forms">            
                <!-- Begin # Login Form -->
                <form id="login-form">
                    <div class="modal-body">
                    <div id="div-login-msg">
                        <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                        <span id="text-login-msg">Type your username and password.</span>
                    </div>
                        <input id="login_username" class="form-control input-modal" type="text" placeholder="Username" required>
                        <input id="login_password" class="form-control input-modal" type="password" placeholder="Password" required>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-default btn-lg btn-block">Login</button>
                        </div>
                        <div>
                            <button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                            <button id="login_register_btn" type="button" class="btn btn-link">Register</button>
                        </div>
                    </div>
                </form>
                <!-- End # Login Form -->
                
                <!-- Begin | Lost Password Form -->
                <form id="lost-form" style="display:none;">
                    <div class="modal-body">
                        <div id="div-lost-msg">
                            <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-lost-msg">Type your e-mail.</span>
                        </div>
                        <input id="lost_email" class="form-control input-modal" type="text" placeholder="email" required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-default btn-lg btn-block">Send</button>
                        </div>
                        <div>
                            <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                            <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
                        </div>
                    </div>
                </form>
                <!-- End | Lost Password Form -->
                
                <!-- Begin | Register Form -->
                <form id="register-form" method="POST" style="display:none;">
        		    <div class="modal-body">
	    				<div id="div-register-msg">
                            <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-register-msg">Register an account.</span>
                        </div>
	    				<input id="register_firstname" name="register_firstname" class="form-control input-modal" type="text" placeholder="First Name" required>
                        <input id="register_middlename" name="register_middlename" class="form-control input-modal" type="text" placeholder="Middle Name [Optional]">
                        <input id="register_lastname" name="register_lastname" class="form-control input-modal" type="text" placeholder="Last Name" required>
                        <input id="register_username" name="register_username" class="form-control input-modal" type="text" placeholder="Username" required>
                        <input id="register_email" name="register_email" class="form-control input-modal" type="email" placeholder="E-Mail" required>
                        <input id="register_password" name="register_password" class="form-control input-modal" type="password" placeholder="Password" required>
                        <input id="register_confirm_password" class="form-control input-modal" type="password" placeholder="Confirm Password" required>
                        <input id="register_phone" name="register_phone" class="form-control input-modal" type="tel" placeholder="Phone Number">
                        <select class="form-control input-modal" id="register_gender" name="register_gender" required>
                            <option value="-1">Select a Gender</option>
                            <?php foreach ($genders as $value) {
                            ?>
                                <option value="<?=$value->gender_id?>"><?=$value->gender?></option>
                            <?php 
                            }
                            ?>
                        </select>
                        <select class="form-control input-modal" id="register_profile" name="register_profile" required>
                            <option value="-1">Select a Profile</option>
                            <?php foreach ($profiles as $value) {
                            ?>
                                <option value="<?=$value->profile_id?>"><?=$value->profile_desc?></option>
                            <?php 
                            }
                            ?>
                        </select>
        			</div>
	    		    <div class="modal-footer">
                        <div>
                            <button id="register_btn" type="submit" class="btn btn-default btn-lg btn-block">Register</button>
                        </div>
                        <div>
                            <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                            <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                        </div>
	    		    </div>
                </form>
                <!-- End | Register Form -->
                
            </div>
            <!-- End # DIV Form -->
            
		</div>
	</div>
</div>
<!-- END # MODAL LOGIN -->
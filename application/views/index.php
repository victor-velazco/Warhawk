<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Warhawk Global Connect</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= $this->config->base_url(); ?>assets/webroot/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= $this->config->base_url(); ?>assets/webroot/css/main.css">
        <link href='https://fonts.googleapis.com/css?family=Oswald:300,400' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>        
        <script src="<?= $this->config->base_url(); ?>assets/webroot/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <link rel="shortcut icon" href="<?= $this->config->base_url(); ?>favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?= $this->config->base_url(); ?>favicon.ico" type="image/x-icon">
		<style >
			#capatcha {
				margin: 0 auto;
				width: 304px;
			}			
		</style>

    </head>
    <body class="background_wgc">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div class="container"> 
        <br />
        <br />       
        <div class="row">
            <img src="<?= $this->config->base_url(); ?>assets/webroot/img/logo_white.png">
        </div>
        <br />
        <h2 style="color: white; text-shadow: -3px 3px 3px #000000;">Warhwak Global Connect</h2>
        <br />
        <div class="row">
            <div id="div-forms"  class="small_login">
                <form id="login-form">
                    <div class="modal-body">
                        <div id="div-login-msg" style="color: white;">
                            <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-login-msg">Type your username and password.</span>
                        </div>
                        <input id="login_username" class="form-control input-modal" type="text" placeholder="Username" required>
                        <input id="login_password" class="form-control input-modal" type="password" placeholder="Password" required>
                        <br>
						<div id="capatcha">
						<div class="g-recaptcha" data-sitekey="6LewXyMUAAAAACoIk7wqjlws8J3hwbeG9QwNmIHJ"></div>
						</div>
						<br>
						<button type="submit" class="btn btn-default btn-lg btn-block" style="margin-top: 5px;" >Login</button>
                        <button type="button" id="linkedin-signin" class="btn btn-linkedin" style="margin-top: 5px;" >
                        </button>
                        <div style="padding-top: 10px;">
                            <button id="login_lost_btn" type="button" class="btn btn-default">Lost Password?</button>
                            <button id="login_register_btn" type="button" class="btn btn-default">Register</button>
                        </div>
                    </div>					
                </form>
			
				
                <!-- Begin | Lost Password Form -->
                <form id="lost-form" style="display:none;">
                    <div class="modal-body">
                        <div id="div-lost-msg" style="color: white;">
                            <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-lost-msg">Type your e-mail.</span>
                        </div>
                        <input id="lost_email" class="form-control input-modal" type="text" placeholder="email" required>
                        <div>
                            <button type="submit" class="btn btn-default btn-lg btn-block">Send</button>
                        </div>
                        <div style="padding-top: 10px;">
                            <button id="lost_login_btn" type="button" class="btn btn-default">Log In</button>
                            <button id="lost_register_btn" type="button" class="btn btn-default">Register</button>
                        </div>
                    </div>
                </form>
                <!-- End | Lost Password Form -->
                
                <!-- Begin | Register Form -->
                <form id="register-form" method="POST" style="display:none;">
                    <div class="modal-body">
                        <div id="div-register-msg" style="color: white;">
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
                        <div>
                            <button id="register_btn" type="submit" class="btn btn-default btn-lg btn-block">Register</button>
                        </div>
                        <div style="padding-top: 10px;">
                            <button id="register_login_btn" type="button" class="btn btn-default">Log In</button>
                            <button id="register_lost_btn" type="button" class="btn btn-default">Lost Password?</button>
                        </div>
                    </div>
                </form>
                <!-- End | Register Form -->
            </div>
        </div>
        <footer class="index-footer" style="padding: 5px;">
            <h4>Powered by Alpha Programmers, LLC</h4>
        </footer>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
    <script src="<?= $this->config->base_url(); ?>assets/js/login.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>

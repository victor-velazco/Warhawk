<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <br><br><br><br>
    <div class="container-fluid">
		
		<form id="update-form" method="post" action="<?= base_url() ?>/userProfile">
        <?php
        if (isset($about->alumni_id)) {
        ?>
        <input type="hidden" value="<?= $about->alumni_id ?>" name="id" id="id" />
        <?php
        } else {
        ?>
        <input type="hidden" value="<?= $about->person_id ?>" name="id" id="id" />
        <?php
        }
        ?>
	<div class="row">
        <h1 style="text-align: center">Alumni Profile</h1>
        
    		<div class="col-md-4 text-center panel-body">
                <div class="div-scroller-about">
                    <h3 class="oswald"><strong>ABOUT</strong></h3>
                    <div class="raleway text-left">
                    <textarea cols=45 rows=10 id="profile_about" name="profile_about"><?php
                            if (is_null($about->about)) {
                                ?>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.
Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem
                                <?php
                            } else {
                                echo $about->about;
                            }
                        ?>
                    </textarea>                     
                    </div>
                </div>
    		</div>
    		<div class="col-md-4 text-center panel-body">
                <div class="div-scroller-about">
                    <div class="panel-body middle-panel">                            
                        <div class="row text-left">
                            <h4 class="oswald"><strong>FIRST NAME</strong></h4>
                            <input id="profile_firstname" name="profile_firstname" value="<?= $about->first_name ?>" class="form-control input-modal" type="text" placeholder="First Name" required />
                        </div>
                        <div class="row text-left">
                             <h4 class="oswald"><strong>LAST NAME</strong></h4>
                            <input id="profile_lastname" name="profile_lastname" value="<?= $about->last_name ?>" class="form-control input-modal" type="text" placeholder="Last Name" required />
                        </div>
                        <div class="row text-left">
                             <h4 class="oswald"><strong>EMAIL</strong></h4>
                            <input id="profile_email" name="profile_email" value="<?= $about->email ?>" class="form-control input-modal" type="text" placeholder="Email" required />
                        </div>
                    </div>
                </div>                                          
            </div>
            <div class="col-md-4 text-center panel-body">
                <div class="div-scroller-about">
                    <div class="panel-body middle-panel">   
                        <div class="row text-left">
                             <h4 class="oswald"><strong>PHONE</strong></h4>
                            <input id="profile_phone" name="profile_phone" value="<?= $about->phone_number ?>" class="form-control input-modal" type="text" placeholder="Phone" />
                        </div>
                        <div class="row text-left">
                            <h4 class="oswald"><strong>LANGUAGES</strong></h4>
                            English<br>
                            Arabic<br>
                            French<br>
                            Spanish
                        </div>
                        <!--
                        <div class="row text-left">
                             <h4 class="oswald"><strong>PROFILE IMAGE</strong></h4>
                            <input id="profile_image" name="profile_image" class="form-control input-modal" type="file" placeholder="Profile Image" />
                        </div>
                        -->
                    </div>
                </div>                                          
    		</div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-3 text-center panel-body">
                <div>
                    <button id="profile_btn" type="submit" class="btn btn-default btn-lg btn-block">Update Profile</button>
                </div>
            </div>
            <!--
            <div class="col-md-2 col-md-offset-2 text-center panel-body">
                <div>
                    <button id="donate_btn" type="button" class="btn btn-success btn-lg btn-block">
                        <span class="glyphicon glyphicon-usd"></span> Pledge to Donate
                    </button>
                </div>
            </div>
            -->
        </div>
    </form>
    <br><br>

 <!-- /.footer -->
            <div class="row footer">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        &copy; 2016 University of Wisconsin-Whitewater
                    </div>
                    <div class="col-lg-offset-1 col-lg-4 col-md-4 col-sm-4 text-center">
                        Developed by DS Contact Alumni Network
                    </div>
                    <div class="col-lg-offset-1 col-lg-3 col-md-3 col-sm-3 text-right">
                        Account Settings&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Privacy Policy&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Help
                    </div>
                </div>
            </div>
            <!-- /.footer -->                        
    </div>
            <!-- /.featured alumni -->
        <?php
        $this->load->view('template/login.php');
        ?>        

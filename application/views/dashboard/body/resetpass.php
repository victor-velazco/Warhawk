<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- START Template Main -->
            <section id="main" role="main">
            <!-- START Template Container -->
            <section class="container">
                <!-- START row -->
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4">
                        <!-- Brand -->
                        <div class="text-center" style="margin-bottom:40px;">
                            <span class="logo-figure inverse"></span>
                        </div>
                        <!--/ Brand -->

                        <hr><!-- horizontal line -->
						<section id="main" role="main">
					            <!-- START Template Container -->
					            <div class="container-fluid">
					                
					                <div class="row">
					                    <!-- START Right Side -->
					                    <div class="col-md-12">
					                        <div class="panel panel-minimal">
					                            <div class="panel">
					                                <div class="panel-body">
					                                    <h4 class="semibold nm">Change your password here</h4><br />
					                                    <form id="form-change" action="<?php echo base_url(); ?>index.php/welcome/changepassword" data-parsley-validate>
															<input type="hidden" id="userid" name="userid" value="<?php echo $userid ?>"/>
					                                        <label class="input-group">
					                                                <span class="input-group-addon">New</span>
					                                                <input name="newpass" id="newpass" type="password" class="form-control" placeholder="Password" data-parsley-errors-container="#parsley-error" data-parsley-error-message="Please fill in your New Password" required = "true">
					                                                <span class="input-group-addon"><i class="ico-key2"></i></span>
					                                        </label>
					                                        <label class="input-group">
					                                                <span class="input-group-addon">Confirm</span>
					                                                <input id="newpassc" name="newpassc" type="password" class="form-control" placeholder="New Password" data-parsley-errors-container="#parsley-error" data-parsley-error-message="Please Confirm New Password" required = "true">
					                                                <span class="input-group-addon"><i class="ico-key2"></i></span>
					                                        </label>
					                                            <p class="alert alert-info" id="message-error"></p>
					                                            <p id="parsley-error"></p>
					                                        <label class="input-group">
					                                            <button id="change" class=" form-control btn btn-danger">Change Password</button>
					                                        </label>
					                                    </form>
					                                    <div id="error-container" class="mb15"></div>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
					                    <!--/ END Right Side -->
					                </div>
					            </div>
					            <!--/ END Template Container -->
					
					            <!-- START To Top Scroller -->
					            <a href="#" class="totop animation animated" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
					            <!--/ END To Top Scroller -->
					        </section>

                        </div>
                </div>
                <!--/ END row -->
            </section>
            <!--/ END Template Container -->
        </section>
        <!--/ END Template Main -->
					        
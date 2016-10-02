<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <div style="height: 100px;"></div>
        <!-- 4 Panels for info. -->
        <div class="row" >

            <div class="col-lg-4 col-md-6 col-sm-12 no-padding">
                <div class="col-lg-12 col-md-12 no-padding">
                    <div class="panel panel-gray3">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-offset-4 col-xs-offset-4 col-xs-4">
                                    <h2 align="center" class="oswald upper">About</h2>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body middle-panel">
                            <p class="text-justify raleway">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>

                            <p class="text-justify raleway">Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 no-padding">
                <div class="col-lg-12 col-md-12 no-padding">
                    <div class="panel panel-gray1">         
                        <div style="height: 73px;"></div>
                        <div class="panel-body middle-panel">
                            
                            <div class="row margin10">
                                <strong style="color: white;" class="oswald upper">LOCATION</strong><br/>
                                <?= $about->city_name . " " . $about->country_name ?>
                            </div>
                            <hr />
                            <div class="row margin10">
                                 <strong style="color: white;" class="oswald upper">FIELD</strong><br/>
                                <?= $about->description; ?>
                            </div>
                            <hr />
                            <div class="row margin10">
                                <strong style="color: white;" class="oswald upper">LANGUAGES</strong><br/>
                                English<br>
                                Arabic<br>
                                French<br>
                                Spanish
                            </div>
                        </div>
                        <div style="height: 10px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 no-padding">
                <div class="col-lg-12 col-md-12 no-padding">
                    <div class="panel">
                        <div class="panel-heading padding-profile-picture">
                            <div class="row">
                                <img src="<?= base_url() ?>assets/img/profile-img.png" style="height: 278px" />
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <strong class="oswald upper"><?= $about->first_name . ' ' . $about->last_name ; ?></strong>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1">
                                    <i class="fa fa-user fa-2x fa-inverse panel-gray2 padding-icons"></i>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1">
                                   <i class="fa fa-cogs fa-2x fa-inverse panel-gray3 padding-icons"></i> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 3 Panels for info. -->
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 no-padding">
                <div class="col-lg-12 col-md-12 no-padding">
                    <div class="panel panel-gray1">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-offset-4 col-xs-offset-4 col-xs-4">
                                    <i class="fa fa-users fa-5x fa-inverse"></i>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body middle-panel">
                            <div class="row margin10">
                                <img src="<?= base_url() ?>assets/img/profile-small1.png">
                                <strong class="oswald upper">Jane Smith</strong><br>
                                Updated her current job
                            </div>
                            <hr />
                            <div class="row margin10">
                                <img src="<?= base_url() ?>assets/img/profile-small2.png">
                                <strong class="oswald upper">Chris Johnson</strong><br>
                                Is traveling to Mexico
                            </div>
                            <hr />
                            <div class="row margin10">
                                <img src="<?= base_url() ?>assets/img/profile-small3.png">
                                <strong class="oswald upper">Amanda McCarthy</strong><br>
                                Added a new picture
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 no-padding">
                <div class="col-lg-12 col-md-12 no-padding">
                    <div class="panel panel-gray2">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-offset-4 col-xs-offset-4 col-md-1">
                                    <i class="fa fa-briefcase fa-5x fa-inverse"></i>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body middle-panel">
                            <div class="row margin10">
                                <strong class="oswald upper">Marketing Director</strong><br/>
                                ABC Marketing company
                            </div>
                            <hr />
                            <div class="row margin10">
                                 <strong class="oswald upper">Accounting Manager</strong><br/>
                                Smith Finance, LLC
                            </div>
                            <hr />
                            <div class="row margin10">
                                <strong class="oswald upper">Lead Systems Analyst</strong><br/>
                                Apex Technology, Inc
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 no-padding">
                <div class="col-lg-12 col-md-12 no-padding">
                    <div class="panel panel-gray3">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-offset-4 col-xs-offset-4 col-xs-4">
                                    <i class="fa fa-comments fa-5x fa-inverse"></i>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body middle-panel">
                            <div class="row margin10">
                                <strong class="oswald upper">Recent Discussion</strong><br/>
                                The most recent one....
                            </div>
                            <hr />
                            <div class="row margin10">
                                 <strong class="oswald upper">New Discussion Topic</strong><br/>
                                The new discussion topic is....
                            </div>
                            <hr />
                            <div class="row margin10">
                                <strong class="oswald upper">Discussion with recent comments</strong><br/>
                                The last comment is.....
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php
            include_once('template/login.php');
        ?>
        <!-- /.featured alumni -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="col-lg-2 col-md-3 col-sm-6 featured-alumni-panel purple-on-white  text-center" style="line-height:180px;">
                   <span class="centered-vertically"><h2 class="oswald upper">Connections</h2></span>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 featured-alumni-panel">
                    <img src="<?= base_url() ?>assets/img/profile-img.png" style="height: 220px;" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 featured-alumni-panel">
                    <img src="<?= base_url() ?>assets/img/profile-img.png" style="height: 220px" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 featured-alumni-panel">
                    <img src="<?= base_url() ?>assets/img/profile-img.png" style="height: 220px" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 featured-alumni-panel">
                    <img src="<?= base_url() ?>assets/img/profile-img.png" style="height: 220px" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 featured-alumni-panel">
                    <img src="<?= base_url() ?>assets/img/profile-img.png" style="height: 220px" />
                </div>
            </div>
        </div>

        <!-- /.featured alumni -->
        <script src="<?php echo $this->config->base_url(); ?>assets/js/login.js"></script>

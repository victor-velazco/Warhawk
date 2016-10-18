<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    
        <div class="row medium-size">
            <div class="col-lg-10 col-md-6 col-sm-12 slider">
                <div><img class="all-width" src="<?= base_url() ?>assets/img/slider1.jpg" /></div>
                <div><img class="all-width" src="<?= base_url() ?>assets/img/group1.jpg" /></div>
                <div><img class="all-width" src="<?= base_url() ?>assets/img/group2.jpg" /></div>
            </div>
            <div class="fixed back-purple">
                <h2 align="center" class="oswald upper">First University Update Headline</h4>
                <p class="text-justify raleway">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p>

                <p class="text-justify raleway">Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. </p>
                <div class="row" style="position: absolute; right:10px; left:15px; bottom:10px;">
                    <div class="col-sm-1">
                        <i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-1">
                        <i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-1 col-xs-offset-7">
                        <i class="fa fa-newspaper-o fa-2x" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search bar -->
        <div class="row">
            <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-5 col-md-5 col-sm-5 no-padding">
                <input type="text" name="search" placeholder="Search" id="search" class="form-input light-gray"/>
            </div>
             <div class="col-lg-3 col-md-6 col-sm-10 no-padding">
                <select name="category" class="form-input dark-gray special-select">
                    <option value="-1">No Category</option>
                    <?php   
                    foreach ($categories as $key => $value) {  
                        echo "<option value=". $value->category_id. ">". $value->category_desc . "</option>";
                    }
                    ?>   
                </select>
            </div>
            <div class="col-sm-1 no-padding width80">
                <button class="form-input-no-padding" >
                <i class="fa fa-search fa-inverse"></i>
                </button>
            </div>
        </div>

        <!-- 4 Panels for info. -->
        <div class="row oswald" >
            <div class="col-lg-3 col-md-6 col-sm-12 no-padding">
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
                                <strong>Jane Smith</strong>
                                Updated her current job
                            </div>
                            <hr />
                            <div class="row margin10">
                                <img src="<?= base_url() ?>assets/img/profile-small2.png">
                                <strong>Chris Johnson</strong>
                                Is traveling to Mexico
                            </div>
                            <hr />
                            <div class="row margin10">
                                <img src="<?= base_url() ?>assets/img/profile-small3.png">
                                <strong>Amanda McCarthy</strong>
                                Added a new picture
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 no-padding">
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
                                <strong>Marketing Director</strong><br/>
                                ABC Marketing company
                            </div>
                            <hr />
                            <div class="row margin10">
                                 <strong>Accounting Manager</strong><br/>
                                Smith Finance, LLC
                            </div>
                            <hr />
                            <div class="row margin10">
                                <strong>Lead Systems Analyst</strong><br/>
                                Apex Technology, Inc
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 no-padding">
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
                                <strong>Recent Discussion</strong><br/>
                                The most recent one....
                            </div>
                            <hr />
                            <div class="row margin10">
                                 <strong>New Discussion Topic</strong><br/>
                                The new discussion topic is....
                            </div>
                            <hr />
                            <div class="row margin10">
                                <strong>Discussion with recent comments</strong><br/>
                                The last comment is.....
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 no-padding">
                <div class="col-lg-12 col-md-12 no-padding">
                    <div class="panel">
                        <div class="panel-heading padding-profile-picture">
                            <img src="<?= base_url() ?>assets/img/profile-img.png" />
                        </div>
                        <div class="panel-body" style="padding-top: 5px">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <strong>Sara Amiri</strong>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <i class="fa fa-user fa-2x fa-inverse panel-gray2 padding-icons"></i>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 ">
                                   <i class="fa fa-cogs fa-2x fa-inverse panel-gray3 padding-icons"></i> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
            include_once('template/login.php');
        ?>
        <!-- /.map -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <img src="<?= base_url() ?>assets/img/map_demo.png" />
            </div>
        </div>
        <!-- /.map -->
        <!-- /.featured alumni -->
        <div class="row" style="padding-bottom: 1px;">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="col-lg-2 col-md-3 col-sm-6 featured-alumni-panel purple-on-white  text-center" style="line-height:180px;">
                   <span class="centered-vertically"><h2 class="oswald upper">Featured Alumni</h2></span>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 featured-alumni-panel">
                    Alumni 1
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 featured-alumni-panel">
                    Alumni 2
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 featured-alumni-panel">
                    Alumni 3
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 featured-alumni-panel">
                    Alumni 4
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 eatured-alumni-panel">
                    Alumni 5
                </div>
            </div>
        </div>
        <!-- /.featured alumni -->
        <script src="<?php echo $this->config->base_url(); ?>assets/js/login.js"></script>

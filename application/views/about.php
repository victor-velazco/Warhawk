<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <br><br><br><br>
    <br><br><br><br>
    <div class="container-fluid"> 
	<div class="row">
		<div class="col-md-4 panel-eeeee8 text-center panel-body">
                    <div class="div-scroller-about">
                        <h3 class="oswald"><strong>ABOUT</strong></h3>
                        <br>
                        <div class="raleway text-left">
                        <p><?=is_null($about->about)?'No about information':$about->about?></p>                        
                        </div>
                    </div>
		</div>
		<div class="col-md-4 panel-eeeee8 text-center panel-body">
                    <div class="div-scroller-about">
                            <div class="panel-body middle-panel">                            
                            <div class="row text-left">
                                <h4 class="oswald"><strong>LOCATION</strong></h4>
                                <?= $about->city_name . " " . $about->country_name ?>
                            </div>
                            <div class="row text-left">
                                 <h4 class="oswald"><strong>FIELD</strong></h4>
                                <?= $about->description; ?>
                            </div>
                            <div class="row text-left">
                                <h4 class="oswald"><strong>LANGUAGES</strong></h4>
                                English<br>
                                Arabic<br>
                                French<br>
                                Spanish
                            </div>
                        </div>                         
                    </div>                                          
		</div>
		<div class="col-md-4">
                    <div class="row">
                        <img src="<?= base_url() ?>assets/img/<?= $about->image ?>" class="img-responsive">
                    </div>
                    <div class="row">
                        <table class="table-responsive">
                            <tr class="padding-0">
                                <td style="width: 70%" class="padding-0"><h4 class="oswald">&nbsp;&nbsp;<strong><?= $about->first_name . " " . $about->last_name ?></strong></h4></td>
                                <td class="padding-0">
                                    <a class="btn btn-user" href="#">
                                      <i class="fa fa-user fa-inverse" aria-hidden="true"></i>
                                    </a>
                                    <a class="btn btn-config" href="#">
                                      <i class="fa fa-cogs fa-inverse" aria-hidden="true"></i>
                                    </a>                                    
                                </td>
                            </tr>
                        </table>                                                
                    </div>                    
		</div>
	</div>
        
        
	<div class="row">
		<div class="col-md-4 panel-c8c8c8 text-center panel-body">
                    <i class="fa fa-users fa-inverse fa-3x" aria-hidden="true"></i>
                    <br><br>
                    <div class="div-scroller">
                        <table class="table-responsive table-user">
                            <?php
                            foreach ($feeds as $key => $value) {
                            ?>
                            <tr class="td-line">
                                <td style="width: 60px;"><img width="60" height="60" src="<?= base_url() ?>assets/img/<?= $value->image ?>"></td>
                                <td class="text-left">
                                    <h4 class="oswald"><strong><?= $value->first_name . ' ' . $value->last_name ?></strong></h4>
                                    <p class="raleway"><?= $value->feed ?></p>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>                            
                        </table>                     
                    </div>
		</div>
		<div class="col-md-4 panel-a588ca text-center panel-body">
                     <i class="fa fa-briefcase fa-inverse fa-3x" aria-hidden="true"></i>
                    <br><br>
                    <div class="div-scroller">
                        <table class="table-responsive table-user">
                            <tr class="td-line">
                                <td class="text-left">
                                    <h4 class="oswald"><strong>Marketing Director</strong></h4>
                                    <p class="raleway">ABC Marketing company</p>
                                </td>
                            </tr>
                            <tr class="td-line">
                                <td class="text-left">
                                    <h4 class="oswald"><strong>Accounting Manager</strong></h4>
                                    <p class="raleway">Smith Finance, LLC</p>
                                </td>
                            </tr>       
                            <tr class="td-line">
                                <td class="text-left">
                                    <h4 class="oswald"><strong>Lead Systems Analyst</strong></h4>
                                    <p class="raleway">Apex Technology, Inc</p>
                                </td>
                            </tr>
                            <tr class="td-line">
                                <td class="text-left">
                                    <h4 class="oswald"><strong>Marketing Director</strong></h4>
                                    <p class="raleway">ABC Marketing company</p>
                                </td>
                            </tr>
                            <tr class="td-line">
                                <td class="text-left">
                                    <h4 class="oswald"><strong>Accounting Manager</strong></h4>
                                    <p class="raleway">Smith Finance, LLC</p>
                                </td>
                            </tr>       
                            <tr class="td-line">
                                <td class="text-left">
                                    <h4 class="oswald"><strong>Lead Systems Analyst</strong></h4>
                                    <p class="raleway">Apex Technology, Inc</p>
                                </td>
                            </tr>                        
                        </table>                     
                    </div>                                                                                                        
		</div>
		<div class="col-md-4 panel-eeeee8 text-center panel-body">
                     <i class="fa fa-comments fa-3x fa-inverse" aria-hidden="true"></i>
                    <br><br>
                    <div class="div-scroller">
                        <table class="table-responsive table-user">
                            <tr>
                                <td class="text-left">
                                    <h4 class="oswald"><strong>Marketing Director</strong></h4>
                                    <p class="raleway">ABC Marketing company</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left">
                                    <h4 class="oswald"><strong>Accounting Manager</strong></h4>
                                    <p class="raleway">Smith Finance, LLC</p>
                                </td>
                            </tr>       
                            <tr>
                                <td class="text-left">
                                    <h4 class="oswald"><strong>Lead Systems Analyst</strong></h4>
                                    <p class="raleway">Apex Technology, Inc</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left">
                                    <h4 class="oswald"><strong>Marketing Director</strong></h4>
                                    <p class="raleway">ABC Marketing company</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left">
                                    <h4 class="oswald"><strong>Accounting Manager</strong></h4>
                                    <p class="raleway">Smith Finance, LLC</p>
                                </td>
                            </tr>       
                            <tr>
                                <td class="text-left">
                                    <h5 class="oswald"><strong>Lead Systems Analyst</strong></h5>
                                    <p class="raleway">Apex Technology, Inc</p>
                                </td>
                            </tr>                        
                        </table>                     
                    </div>                                          
		</div>
	</div>        
        
        
	<!-- Featured Alumni section -->
    <div class="row">
            <div class="col-md-1 col-sm-1 col-xs-1 div-feat-alumni">
              <img src="<?= base_url() ?>assets/img/alumini-index.jpg" alt=""/>
            </div>                
            <div class="aluminis" class="col-md-11 col-sm-11 col-xs-11">
            <?php
                if (!is_null($featured))  {
                    foreach ($featured as $key => $value) {  
            ?>
                <div>
                    <a href='<?= base_url() ?>index.php/welcome/about/<?=$value->alumni_id?>'>
                        <img src="<?= base_url() ?>assets/img/<?= $value->image ?>" alt=""/>
                    </a>
                </div>
            <?php
                    }
                } else {
            ?>
                <div>
                    <h3>No featured alumni!</h3>
                </div>
            <?php
        }
            ?>
            </div>
    </div>
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

<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <!-- Half Page Image Background Carousel Header -->
    <br><br><br><br>
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
            <li data-target="#myCarousel" data-slide-to="6"></li>
            <li data-target="#myCarousel" data-slide-to="7"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div>
                <div class="carousel-caption">
                    <div class="trans"></div> 
					<?php
					foreach ($headline->result() as $row) { 
					?>
                    <h2 class="oswald upper">  
						<?php
						
						if (empty($headline)) {
							echo "No announcements";
						}else{
							echo $row->header;
						}						
						?>
                    </h2>                    
                    <p class="text-justify raleway" >
						<?php
						if (empty($headline)) {
							echo "---";
						}else{
							echo substr($row->short_desc,0, 35) . ' ...';
						}						
						?>						
                    </p>
					<?php
					}
					?>
                    <span style="text-align:right;position: absolute;bottom: 0px;width: 49%;">
						<a href="<?= base_url() ?>index.php/welcome/announcements" style="color:white;">read more <span class="glyphicon glyphicon-chevron-right"></span></a></span>
                </div> 
            </div> 
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->      
                <div class="fill" style="background-image:url('<?= base_url() ?>assets/img/slider/slider1.jpg');"></div>

            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->              
                <div class="fill" style="background-image:url('<?= base_url() ?>assets/img/slider/slider2.jpg');"></div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->         
                <div class="fill" style="background-image:url('<?= base_url() ?>assets/img/slider/slider3.jpg');"></div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->    
                <div class="fill" style="background-image:url('<?= base_url() ?>assets/img/slider/slider4.jpg');"></div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->                 
                <div class="fill" style="background-image:url('<?= base_url() ?>assets/img/slider/slider5.jpg');"></div>
            </div>            
            <div class="item">
                <!-- Set the sixth background image using inline CSS below. -->                
                <div class="fill" style="background-image:url('<?= base_url() ?>assets/img/slider/slider6.jpg');"></div>
            </div>            
            <div class="item">
                <!-- Set the seventh background image using inline CSS below. -->                
                <div class="fill" style="background-image:url('<?= base_url() ?>assets/img/slider/slider7.jpg');"></div>
            </div>            
            <div class="item">
                <!-- Set the eighth background image using inline CSS below. -->               
                <div class="fill" style="background-image:url('<?= base_url() ?>assets/img/slider/slider8.jpg');"></div>
            </div>            
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>
    <!-- Page Content -->  
    <div class="space-blank"></div>
    <div class="container">        
        <div class="row">
        <form action="#" id="form-busca" method="post" accept-charset="utf-8">
            <div class="form-group">
                <div class="col-xs-6 col-sm-7 col-md-7 col-lg-7 div-job">
                    <input class="form-control input-lg bg-f2f1ea" type="text" name="title" id="title" value="" placeholder="search">
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 div-job">
                    <select name="category" class="form-control input-lg bg-c6c5c2">
                        <option disabled selected>category</option>
                    <?php   
                    foreach ($categories as $key => $value) {  
                        echo "<option value=". $value->category_id. ">". $value->category_desc . "</option>";
                    }
                    ?>  
                    </select>              
                </div>
                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 div-job">
                    <button type="submit" id="form-job-search" class="btn btn-custom btn-lg btn-block"><i class="fa fa-search fa-inverse" aria-hidden="true"></i></button>
                </div>                
                <br><br>
            </div>                     
          </form>                        
        </div>
        <div class="space-blank"></div>
    </div>    
    <div class="container-fluid"> 
	<div class="row">
		<div class="col-md-3 panel-c8c8c8 text-center panel-body">
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
		<div class="col-md-3 panel-a588ca text-center panel-body">
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
		<div class="col-md-3 panel-eeeee8 text-center panel-body">
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
		<div class="col-md-3">
                    <div class="row">
                        <img src="<?= base_url() ?>assets/img/perfil.jpg" class="img-responsive">
                    </div>
                    <div class="row">
                        <table class="table-responsive" style="white-space: nowrap;">
                            <tr class="padding-0">
                                <td style="width: 90%" class="padding-0"><h4 class="oswald">&nbsp;&nbsp;<strong><?= $this->session->userdata('data')['first_name'] . " " . $this->session->userdata('data')['last_name'] ?></strong></h4></td>
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
    <iframe frameborder=0 style='width:100%;height:500px;' src='//www.zeemaps.com/pub?group=2268973'> </iframe>
    <!--
        <div class="row"> 
            <img src="<= base_url() ?>assets/img/mapa.jpg" class="img-responsive">
        </div>
    -->
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
        <!-- /.featured alumni -->
        <?php
        $this->load->view('template/login.php');
        ?>        


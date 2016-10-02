<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <div style="height: 140px;"></div>
        <!-- 4 Panels for info. -->
        <div class="row" >            
            <div class="col-lg-10 col-md-10 no-padding col-md-offset-1">
                <div class="panel panel-gray3">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-offset-4 col-xs-offset-4 col-xs-4 text-center">
                                <i class="fa fa-calendar fa-2x"></i> <strong style="font-size: 28px;" class="oswald upper"> CALENDAR EVENTS</strong>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="section" id="acciones">
                            <?= $calendario ?>
                            <input type="hidden" value="<?=$this->uri->segment(3)?>" class="year" />
                            <input type="hidden" value="<?=$this->uri->segment(4)?>" class="month" />   
                            <br>
                        </div>                            
                    </div>
                </div>
            </div>   
            <div class="row">
                
            </div>
        </div>

        <?php
            include_once('template/login.php');
        ?>


        <!-- /.featured alumni -->
        <script src="<?php echo $this->config->base_url(); ?>assets/js/login.js"></script>
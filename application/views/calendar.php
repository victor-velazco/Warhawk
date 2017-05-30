<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <div style="height: 140px;"></div>
        <!-- 4 Panels for info. -->
        <div class="row" id="acciones">            
            <div class="col-lg-10 col-md-10 no-padding col-md-offset-1">
                <div class="panel panel-gray3">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-offset-4 col-xs-offset-4 col-xs-4 text-center">
                                <i class="fa fa-calendar fa-2x"></i> <strong style="font-size: 28px;" class="oswald upper"> CALENDAR EVENTS</strong>
                            </div>
                        </div>
                    </div>             
                    <div class="section">
                        <div class="section">                         
                            <div class="row" >
                                <form class="form-inline">
                                    <div class="form-group col-md-offset-2">
                                        <a href="<?= base_url().'index.php/agenda/index/' ?>" class="btn btn-default btn-lg btn-block" role="button">TODAY</a>

                                    </div>    
                                    <div class="form-group col-md-offset-1">
                                        <label>Month:</label>
                                        <select  name="mes" id="mes" class="form-control">
                                            <option value="" disabled selected>Go to Month:</option>
                                            <option value="1" <?= $this->GeneralModel->setSelect('1', $this->uri->segment(4)); ?>>Enero</option>
                                            <option value="2" <?= $this->GeneralModel->setSelect('2', $this->uri->segment(4)); ?>>February</option>
                                            <option value="3" <?= $this->GeneralModel->setSelect('3', $this->uri->segment(4)); ?>>March</option>
                                            <option value="4" <?= $this->GeneralModel->setSelect('4', $this->uri->segment(4)); ?>>April</option>
                                            <option value="5" <?= $this->GeneralModel->setSelect('5', $this->uri->segment(4)); ?>>May</option>
                                            <option value="6" <?= $this->GeneralModel->setSelect('6', $this->uri->segment(4)); ?>>June</option>
                                            <option value="7" <?= $this->GeneralModel->setSelect('7', $this->uri->segment(4)); ?>>July</option>
                                            <option value="8" <?= $this->GeneralModel->setSelect('8', $this->uri->segment(4)); ?>>August</option>
                                            <option value="9" <?= $this->GeneralModel->setSelect('9', $this->uri->segment(4)); ?>>September</option>
                                            <option value="10" <?= $this->GeneralModel->setSelect('10', $this->uri->segment(4)); ?>>October</option>
                                            <option value="11" <?= $this->GeneralModel->setSelect('11', $this->uri->segment(4)); ?>>November</option>
                                            <option value="12" <?= $this->GeneralModel->setSelect('12', $this->uri->segment(4)); ?>>December</option>
                                        </select>                                                                                                 
                                    </div>
                                    <div class="form-group">
                                        <label>Year:</label>
                                        <select name="anio" id="anio" class="form-control">
                                            <option value="" disabled selected>Choose one</option>
                                            <?php
                                            for ($i = 2016; $i <= date("Y") + 10; $i++) {
                                                if($i == $this->uri->segment(3)){
                                            ?>
                                            <option value="<?= $i ?>" selected="selected"><?= $i ?></option>
                                            <?php
                                                }else{
                                            ?>
                                            <option value="<?= $i ?>" ><?= $i ?></option>                                                    
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>                                                                                                 
                                    </div>
                                </form>
                                <br>   
                            </div>                                   
                        </div>
                        <br>
                    </div>
                    <div>
                        <?= $calendario ?>
                        <input type="hidden" value="<?=$this->uri->segment(3)?>" class="year" />
                        <input type="hidden" value="<?=$this->uri->segment(4)?>" class="month" />   
                        <br>
                    </div>
                    </div>                            
                   
                </div>
            </div> 
        <div class="space-blank"></div><div class="space-blank"></div><div class="space-blank"></div>

        <?php       
             $this->load->view('template/login.php');
              $this->load->view('template/event.php');
        ?>


        </div>
</div>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <div style="height: 140px;"></div>
            <!-- 4 Panels for info. -->  
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 panel-gray5 text-center">
                    <a href="" class="job"><h3 class="oswald upper">Find a Job</h3></a>
                </div>
                <div class="col-md-4 panel-gray2 text-center">                  
                    <a href="" class="job"><h3 class="oswald upper ">Post a Job</h3></a>               
                </div>
                <div class="col-md-4 panel-gray6 text-center">                    
                    <a href="" class="job"><h3 class="oswald upper ">Job Archive</h3></a>                    
                </div>
            </div>  
        </div>    
        <br><br>      
        <div class="container">
          <?= form_open(base_url().'index.php/jobs/index/', 'id="form-busca"'); ?> 
            <div class="form-group">
                <div class="col-xs-7 div-job">
                    <input class="form-control input-lg bg-f2f1ea" type="text" name="title" id="title" value="<?= $this->input->post('title') ?>" placeholder="job title or keyword">
                </div>
                <div class="col-xs-4 div-job">
                    <select name="category" class="form-control input-lg select-job bg-c6c5c2">
                        <option disabled selected>category</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>              
                </div>
                <div class="col-xs-1 div-job">
                    <button type="submit" id="form-job-search" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-search"></span></button>
                </div>                
                <br><br>
            </div>        
            <div class="form-group">
                <div class="col-xs-5 div-job">
                    <input name="location" value="<?= $this->input->post('location') ?>" class="form-control input-lg bg-c6c5c2" type="text" placeholder="location">
                </div>
                <div class="col-xs-7 div-job">
                    <label class="checkbox-inline chk-f2f1ea"><input type="checkbox" name="full-time" value="full time">full time</label>
                    <label class="checkbox-inline chk-c6c5c2"><input type="checkbox" name="part-time" value="part time">part time</label>
                    <label class="checkbox-inline chk-f2f1ea"><input type="checkbox" name="internship" value="internship">internship</label>                       

                </div>              
            </div>               
          <?= form_close() ?>
        </div>
        <br><br>
        <div class="container-fluid">
            <?php   
            $count = 0;
            foreach ($jobs->result() as $row) {  
                if(($count % 2) == 0){
                    $style = 'bg-f2f1ea';
                }else{
                    $style = '';
                }
            ?>            
            <div class="row">
                <div class="col-md-12 table-responsive ">
                      <table class="table <?= $style ?> table-borderless table-condensed">
                        <tbody>
                          <tr>
                              <td colspan="4"></td>
                          </tr>                            
                          <tr>
                              <td class="text-center oswald upper"><strong style="font-size:20px;"><?= $row->title ?></strong></td>
                            <td  class="text-center raleway"><?= $row->city_name ?>, <?= $row->country_name ?></td>
                            <td  class="text-center raleway">Posted: <?= $row->date_posted ?> by <?= $row->first_name ?> <?= $row->last_name ?></td>
                            <td  class="text-center pagination-centered text-center td-row" rowspan="2">
                                <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span></button> 
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-arrow-right"></span></button>
                            </td>
                          </tr>
                          <tr>
                            <td  class="text-center raleway"><?= $row->company ?></td>
                            <td  class="text-center raleway"><?= $row->working_hours ?></td>
                            <td  class="text-center raleway">Expire <?= $row->date_exp ?></td>
                            
                          </tr> 
                          <tr>
                              <td colspan="4"></td>
                          </tr>
                        </tbody>
                      </table>                        
                </div>
            </div>
            <?php
                $count++;
            }
            ?>
            <div class="row">
                <div class="col-md-12"><?php // $pagination; ?></div>
            </div>    
       
        </div>                                  
        <?php       
            include_once('template/login.php');
        ?>
        <!-- /.featured alumni -->
        <script src="<?php echo $this->config->base_url(); ?>assets/js/login.js"></script>            
   
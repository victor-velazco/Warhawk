<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <div style="height: 140px;"></div>
            <!-- 4 Panels for info. -->  
            <?php
            $this->load->view('include/jobs-menu.php');
            ?>            
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
                        <option>Category 1</option>
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
                    <label class="checkbox-inline chk-f2f1ea"><input type="checkbox" name="full-time" value="full time" <?= $this->GeneralModel->setCheck('full time', $this->input->post('full-time')); ?>>full time</label>
                    <label class="checkbox-inline chk-c6c5c2"><input type="checkbox" name="part-time" value="part time" <?= $this->GeneralModel->setCheck('part time', $this->input->post('part-time')); ?>>part time</label>
                    <label class="checkbox-inline chk-f2f1ea"><input type="checkbox" name="internship" value="internship" <?= $this->GeneralModel->setCheck('internship', $this->input->post('internship')); ?>>internship</label>                       

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
                            <td class="oswald upper col-md-4"><strong style="font-size:20px;"><?= $row->title ?></strong></td>
                            <td  class="raleway col-md-3"><?= $row->city_name ?>, <?= $row->country_name ?></td>
                            <td  class="text-center raleway col-md-3">Posted: <?= $row->date_posted ?> by <?= $row->first_name ?> <?= $row->last_name ?></td>
                            <td  class="text-center pagination-centered text-center td-row" rowspan="2">
                                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#job<?= $row->jobs_id ?>"><span class="glyphicon glyphicon-plus"></span></button> 
                               <?php
                               if ($this->session->userdata('data') && $this->session->userdata('data')['profile_desc']) {
                               ?>
                                <button type="button" onclick="if (confirm(&quot;Really you want to apply for the position of [ <?= $row->title ?> ]?&quot;)) { window.location.href = '<?= base_url() . "index.php/jobs/apply/" . $row->jobs_id ?>' } event.returnValue = false; return false;" id="apply" class="btn btn-default"><span class="glyphicon glyphicon-arrow-right"></span></button>
                               <?php
                               }
                               ?>                                                                
                            </td>
                          </tr>
                          <tr>
                            <td  class="raleway"><?= $row->company ?></td>
                            <td  class="raleway"><?= $row->working_hours ?></td>
                            <td  class="text-center raleway"><strong>Expire: <?= $row->date_exp ?></strong></td>
                            
                          </tr> 
                          <tr>
                              <td colspan="4">
                                <div id="job<?= $row->jobs_id ?>" class="collapse col-md-8 col-md-offset-2">
                                    <br><br>
                                    <p class="oswald upper"><strong style="font-size:20px;">Description</strong></p>
                                    <?= nl2br($row->description) ?>
                                    <br><br>                                    
                                </div>                                                                                                                         
                              </td>
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
        $this->load->view('template/login.php');
        ?>        

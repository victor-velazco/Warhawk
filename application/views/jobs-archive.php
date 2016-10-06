<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <div style="height: 140px;"></div>
            <!-- 4 Panels for info. -->  
            <?php
            $this->load->view('include/jobs-menu.php');
            ?>            

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
                               ?>                              </td>
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
                <div class="col-md-12"><?php  $pagination; ?></div>
            </div>    
       
        </div>                                  
        <?php       
            include_once('template/login.php');
        ?>
        <!-- /.featured alumni -->
        <script src="<?php echo $this->config->base_url(); ?>assets/js/login.js"></script>            
   
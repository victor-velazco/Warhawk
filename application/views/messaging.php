<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	$from_person_id = $this->session->userdata('data')['person_id'];
	$nickname = $this->session->userdata('data')['first_name'];
	
?>
		<div class="col-md-offset-1 col-md-10 container" style="top:102px; padding-left:2px; padding-right:2px;">
	    <div class="modal-body">
			<div id="div-announcement-msg">
                <h3><div id="icon-announcement-msg" class="glyphicon glyphicon-chevron-right"></div>
                <span id="text-announcement-msg">University messaging system</span></h3>
                    <div class="col-md-4">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                      <div style="text-align: right; position: absolute; right: 30px;"><img width="24" height="24" src="<?= base_url() ?>assets/img/alumini1.jpg"></div>
                      Administrator: Hi There!
                      </div>
                      <div class="panel-body">
                        Please check your messages.
                      </div>
                    </div>
                    </div>
                    <div class="col-md-4 col-md-offset-6">
                        <div class="panel panel-info">
                          <div class="panel-heading">
                          <div style="text-align: right; position: absolute; right: 30px;"><img width="24" height="24" src="<?= base_url() ?>assets/img/alumini2.jpg">
                          </div>
                            <h3 class="panel-title">	
								<?= $nickname ?>
								<input id="nickname" type="hidden" value="<?= $nickname ?>" />							
							</h3>
                          </div>                          
							<div class="panel-body">
								<ul class="chat" id="received">

								</ul>
							</div>							  							                            
                          <div class="panel-footer">
								<input type="hidden" id="from_person_id" name="from_person_id" value="<?= $from_person_id ?>">
								<input id="message" type="text" class="form-control input-sm" placeholder="Type your message here..." />
								<div class="btn-group">								 
									<button class="btn btn-default btn-xs" type="button" id="submit-msg">
										Respond <span class="fa fa-bullhorn"></span>
									</button>									
                                </div>
                          </div>
                        </div>
                    </div>
                    </div>
            </div>
		</div>
        <div class="space-blank"></div>
        <div class="space-blank"></div>
		

	
	

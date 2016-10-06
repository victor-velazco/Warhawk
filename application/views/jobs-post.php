<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <div style="height: 140px;"></div>
            <!-- 4 Panels for info. -->  
        <?php $this->load->view('include/jobs-menu.php'); ?>            
        <br><br>      
        <div class="container">
            <div class="col-md-offset-3 col-md-6 container" style="padding-left:2px; padding-right:2px;">
	        <?= form_open(base_url().'index.php/jobs/post/', 'id="form-post-job"'); ?> 
			    <div class="modal-body">
					<div id="div-register-msg">
	                    <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
	                    <span id="text-register-msg">Register an Job.</span>
	                </div>
                        <input id="title" name="title" class="form-control" type="text" placeholder="Title" required>
	                <input id="company" name="company" class="form-control" type="text" placeholder="Company">
                        <textarea class="form-control" rows="5" id="description" name="description" required placeholder="Description"></textarea>                        
	                <select class="form-control" id="working_hours" name="working_hours" required>
                            <option selected disabled>Select a Working Hours</option>
                            <option value="half time">Half Time</option>
                            <option value="part time">Part Time</option>
                            <option value="full time">Full Time</option>
	                </select>
	                <select class="form-control" id="city_id" name="city_id" required>
	                    <option value="-1">Select an Cities</option>
	                    <?php foreach ($cities as $value) {
	                    ?>
	                        <option value="<?=$value->city_id?>"><?=$value->city_name?></option>
	                    <?php 
	                    }
	                    ?>
	                </select>                        
	                <select class="form-control" id="country_id" name="country_id" required>
	                    <option value="-1">Select an Country</option>
	                    <?php foreach ($countries as $value) {
	                    ?>
	                        <option value="<?=$value->country_id?>"><?=$value->country_name?></option>
	                    <?php 
	                    }
	                    ?>
	                </select>
                        </div>
			    <div class="modal-footer">
	                <div>
	                    <button id="job-post-submit" type="submit" class="btn btn-default btn-lg btn-block">Register</button>
	                </div>
			    </div>
	        </form> 
            </div>    
        </div>
        <br><br>                              
        <?php $this->load->view('template/login.php'); ?>
        <!-- /.featured alumni -->
        <script src="<?php echo $this->config->base_url(); ?>assets/js/login.js"></script>            
   
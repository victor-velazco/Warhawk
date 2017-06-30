<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="col-md-offset-3 col-md-6 container" style="top:102px; padding-left:2px; padding-right:2px;">
	        <!-- Begin | Announcements Form -->
	        <form id="announcement-form" name="announcement-form" method="POST" ACTION="<?= base_url() ?>index.php/administrator/registerAnnouncement">
			    <div class="modal-body">
					<div id="div-announcement-msg">
	                    <h3><div id="icon-announcement-msg" class="glyphicon glyphicon-chevron-right"></div>
	                    <span id="text-announcement-msg">University announcements</span></h3>
	                </div>
                        <input id="header" name="header" maxlength="25" class="form-control input-modal" type="text" placeholder="Header (25 chars max)" required>
	                <input id="short_desc" name="short_desc" maxlength="255" class="form-control input-modal" type="text" placeholder="Short Description (255 chars max)" required />
	                DESCRIPTION
	                <textarea id="description" name="description">
	                	Please type your description here!
	                </textarea>
	                <div class='input-group date' id='datetimepicker1'>
	                    <input type='text' id='start_dt' name='start_dt' class="form-control" required />
	                    <span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                </div>
   	                <div class='input-group date' id='datetimepicker2'>
	                    <input type='text' id='end_dt' name='end_dt' class="form-control" required />
	                    <span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                </div>

				</div>
			    <div class="modal-footer">
	                <div>
	                    <button type="submit" id="submitAnnouncement" class="btn btn-default btn-lg btn-block">Submit</button>
	                </div>
			    </div>
	        </form>
	        <!-- End | Register Form -->	        
        <div class="space-blank"></div>
        <div class="space-blank"></div>
		</div>
	</div>	
	</div>        
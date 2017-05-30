<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	if (isset($list) && !empty($list)) {
?>
		<div class="col-md-9 container oswald" style="top:102px; padding-left:2px; padding-right:2px;">
	        <h3 align="center">Reset User Password</h3>
			<table class="datatable table table-striped table-bordered">
				<thead>
					<tr>
						<th class="thead-centered">Id</th>
						<th class="thead-centered">Name</th>
						<th class="thead-centered">Grad Year</th>
						<th class="thead-centered">Origin Country/City</th>
						<th class="thead-centered">Current Country/City</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($list as $key => $value) {
							$featured = ($value->featured!=0)?"ok-sign":"remove-sign";
							$btn_type = ($value->featured!=0)?"success":"danger";
							$val = ($value->featured!=0)?'0':'1';
							echo "<tr><td>". $value->alumni_id .
								"</td><td><a id='resP".$value->person_id."' href='#'>". $value->first_name . " " . 
							$value->last_name ."</a></td><td>". $value->graduation_yr ."</td><td>". 
							$value->orig_country_name ." - ". $value->orig_city_name ."</td><td>".
							$value->curr_country_name ." - ". $value->curr_city_name ."</td></tr>";
						}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th class="thead-centered">Id</th>
						<th class="thead-centered">Name</th>
						<th class="thead-centered">Grad Year</th>
						<th class="thead-centered">Origin Country/City</th>
						<th class="thead-centered">Current Country/City</th>
					</tr>
				</tfoot>
			</table>

			<form id="reset-form" style="display:none;">
	            <div class="modal-body">
	                <div id="div-lost-msg">
	                    <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
	                    <span id="text-lost-msg">Type the new password.</span>
	                </div>
	                <input id="lost_email" class="form-control input-modal" type="text" placeholder="new password" required>
	                <input id="lost_email_cnfr" class="form-control input-modal" type="text" placeholder="confirm password" required>
	                <div>
	                    <button type="submit" class="btn btn-default btn-lg btn-block">Send</button>
	                </div>
	            </div>
	        </form>
		</div>
		
<?php
	} else {
?>
		<div class="col-md-9 container" style="top:102px; padding-left:2px; padding-right:2px;">
	        <h3 align="center">No Alumni data in DB</h3>
	    </div>
<?php
	}
?>
	    <div class="space-blank"></div>
	    <div class="space-blank"></div>
	</div>
</div>
<script>
	
</script>

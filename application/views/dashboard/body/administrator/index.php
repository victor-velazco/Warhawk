<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	if (isset($list) && !empty($list)) {
?>
		<div class="col-md-9 container" style="top:102px; padding-left:2px; padding-right:2px;">
	        <h3 align="center">Outstanding Alumni to be authorized</h3>
			<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Grad Year</th>
						<th>Origin Country/City</th>
						<th>Current Country/City</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($list as $key => $value) {
							$featured = ($value->featured!=0)?"ok-sign":"remove-sign";
							$btn_type = ($value->featured!=0)?"success":"danger";
							$val = ($value->featured!=0)?'0':'1';
							echo "<tr><td>". $value->alumni_id .
								"</td><td><a href='show_outstanding_alumni_data/". 
							$value->alumni_id ."'>". $value->first_name . " " . 
							$value->last_name ."</a></td><td>". $value->graduation_yr ."</td><td>". 
							$value->orig_country_name ." - ". $value->orig_city_name ."</td><td>".
							$value->curr_country_name ." - ". $value->curr_city_name ."</td></tr>";
						}
					
					?>
				</tbody>
				<tfoot>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Grad Year</th>
						<th>Origin Country/City</th>
						<th>Current Country/City</th>
					</tr>
				</tfoot>
			</table>
		</div>
<?php
	} else {
?>
		<div class="col-md-9 container" style="top:102px; padding-left:2px; padding-right:2px;">
	        <h3 align="center">No Outstanding Alumni to be authorized</h3>
	    </div>
<?php
	}
?>
	</div>
	<script src="<?php echo $this->config->base_url(); ?>assets/js/login.js"></script>
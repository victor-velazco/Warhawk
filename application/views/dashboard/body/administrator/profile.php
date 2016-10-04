<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	if (isset($alumni)) {
?>
		<div class="col-md-9 container" style="top:102px; padding-left:2px; padding-right:2px;">
	        <h3 align="center">Profile</h3>
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="width:60%">
				<tr>
					<td><b>Id</b></td><td><?php echo $alumni[0]->alumni_id ?></td>
				</tr>
				<tr>
					<td><b>Name</b></td><td><?php echo $alumni[0]->first_name . " " . $alumni[0]->last_name ?></td>
				</tr>
				<tr>
					<td><b>Grad Year</b></td><td><?php echo $alumni[0]->graduation_yr ?></td>
				</tr>
				<tr>
					<td><b>Occupation</b></td><td><?php echo $alumni[0]->occupation ?></td>
				</tr>
				<tr>
					<td><b>Company</b></td><td><?php echo $alumni[0]->company_name ?></td>
				</tr>
				<tr>
					<td><b>Education Level</b></td><td><?php echo $alumni[0]->level ?></td>
				</tr>
				<tr>
					<td><b>Origin Country</b></td><td><?php echo $alumni[0]->orig_country_name ?></td>
				</tr>
				<tr>
					<td><b>Origin City</b></td><td><?php echo $alumni[0]->orig_city_name ?></td>
				</tr>
				<tr>
					<td><b>Current Country</b></td><td><?php echo $alumni[0]->curr_country_name ?></td>
				</tr>
				<tr>
					<td><b>Current City</b></td><td><?php echo $alumni[0]->curr_city_name ?></td>
				</tr>

			</table>
		</div>
<?php
	}
?>
	</div>
	<script src="<?php echo $this->config->base_url(); ?>assets/js/login.js"></script>
	<scr
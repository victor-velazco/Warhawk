<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	if (isset($alumni)) {
?>
		<div class="col-md-9 container" style="top:102px; padding-left:2px; padding-right:2px;">
	        <h3 align="center">Outstanding Alumni to be authorized</h3>
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
				<tr>
					<form method="POST" name="frm_authorize" id="frm_authorize" ACTION="<?php echo site_url("/" . $profile . '/authorizeAlumni') ?>">
						<input type="hidden" value="<?php echo $alumni[0]->alumni_id ?>" name="id" />
						<input type="hidden" value="" name="authorize" />
						<input type="hidden" value="" name="reason" />
						<td align="center"><button class="btn btn-success" id="authorize_btn" name="authorize">Authorize</button></td>
						<td align="center"><button class="btn btn-danger" id="deny_btn" name="deny">Deny</button></td>
					</form>
				</tr>
			</table>
		</div>
<?php
	}
?>
	</div>
	<script src="<?php echo $this->config->base_url(); ?>assets/js/login.js"></script>
	<script src="<?php echo $this->config->base_url(); ?>assets/js/authorize.js"></script>
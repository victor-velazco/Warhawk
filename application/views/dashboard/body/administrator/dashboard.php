<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	if (isset($list) && !empty($list)) {
?>
		<div class="col-md-9 container oswald" style="top:102px; padding-left:2px; padding-right:2px;">
	        <h3 align="center">Alumni list</h3>
			<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Grad Year</th>
						<th>Origin Country/City</th>
						<th>Current Country/City</th>
						<th>Featured</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($list as $key => $value) {
							$featured = ($value->featured!=0)?"ok-sign":"remove-sign";
							$btn_type = ($value->featured!=0)?"success":"danger";
							$val = ($value->featured!=0)?'0':'1';
							echo "<tr><td>". $value->alumni_id .
								"</td><td><a href='". base_url() . "index.php/welcome/about/".$value->alumni_id . "'>". $value->first_name . " " . 
							$value->last_name ."</a></td><td>". $value->graduation_yr ."</td><td>". 
							$value->orig_country_name ." - ". $value->orig_city_name ."</td><td>".
							$value->curr_country_name ." - ". $value->curr_city_name .
							"</td><td style='text-align:center;'>".
							"<button type='button' id='feat_".$value->alumni_id."' class='btn btn-".$btn_type."' value=".$val."> " .
  							"<span id='icon_feat_".$value->alumni_id."' class='glyphicon glyphicon-" . $featured . "'></span></button></td></tr>";
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
						<th>Featured</th>
					</tr>
				</tfoot>
			</table>
		</div>
<?php
	} else {
?>
		<div class="col-md-9 container" style="top:102px; padding-left:2px; padding-right:2px;">
	        <h3 align="center">No Alumni authorized</h3>
	    </div>
<?php
	}
?>
	</div>
	<script>
		var url_administrator = "<?php echo site_url('/' . $profile . '/') ?>";
		$("button").click(function() {
	        var real_id = this.id.substring(5);
	        var id = $("#"+this.id);
	        var id_icon = $("#icon_"+this.id);
	        $.post(url_administrator + "feature/" + real_id + "/" + id.val(),
	            function(data, status) {
	                var resUpdate = JSON.parse(data).result;
	                console.log(id.val());
	                if (id.val()=='1') {
	                	console.log("going for 1");
	                	id.val('0');
						id.removeClass('btn btn-danger').addClass('btn btn-success');
	                	id_icon.removeClass('glyphicon glyphicon-remove-sign').addClass('glyphicon glyphicon-ok-sign');
	                } else {
	                	console.log("going for 0");
	                	id.val('1');
	                	id.removeClass('btn btn-success').addClass('btn btn-danger');
						id_icon.removeClass('glyphicon glyphicon-ok-sign').addClass('glyphicon glyphicon-remove-sign');
	                }
	                
	        });
    	});

	</script>
	<script src="<?php echo $this->config->base_url(); ?>assets/js/login.js"></script>
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	if (isset($list) && !empty($list)) {
?>

		<div class="col-md-9 container oswald" style="top:102px; padding-left:2px; padding-right:2px;">
	        <h3 align="center">Alumni list</h3>
			<table  class="datatable responsive table table-striped table-bordered">
				<thead>
					<tr>
						<th class="thead-centered">Id</th>
						<th class="thead-centered">Name</th>
						<th class="thead-centered">Grad Year</th>
						<th class="thead-centered">Origin Country/City</th>
						<th class="thead-centered">Current Country/City</th>
						<th class="thead-centered">Featured</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($list as $key => $value) {
							$featured = ($value->featured!=0)?"ok-sign":"remove-sign";
							$btn_type = ($value->featured!=0)?"feat":"no-feat";
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
						<th class="thead-centered">Id</th>
						<th class="thead-centered">Name</th>
						<th class="thead-centered">Grad Year</th>
						<th class="thead-centered">Origin Country/City</th>
						<th class="thead-centered">Current Country/City</th>
						<th class="thead-centered">Featured</th>
					</tr>
				</tfoot>
			</table>
                        <div class="space-blank"></div>
                        <div class="space-blank"></div>
              
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
</div>

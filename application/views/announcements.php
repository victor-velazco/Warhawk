<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$user_id = $this->session->userdata('data')['person_id'];
?>
		<div class="col-md-offset-1 col-md-10 container" style="top:102px; padding-left:2px; padding-right:2px;">		
	    <div class="modal-body">
			<div id="div-announcement-msg">
                <h3><div id="icon-announcement-msg" class="glyphicon glyphicon-chevron-right"></div>
                <span id="text-announcement-msg">University Announcements</span></h3>
				<div>
				<button type="button" class="btn btn-default btn-md">
					<span class="glyphicon glyphicon-plus"></span> New Announcements 
				</button>					
				</div>
				<br><br>
                <?php

					foreach ($headlines->result() as $row) { 
					?> 
						<div class="paperbox">
							<h2><?= $row->header ?></h2>
							<span style="text-align: right !important; width: 100%"><small>published by:</small></span>
							<hr />
							<p>
								<?= $row->description ?>
							</p>			
							<?php
							if($row->publisher_id == $user_id){
							?>
							<div class="row">
								<button type="button" class="btn btn-default btn-md">
									<span class="glyphicon glyphicon-pencil"></span> Update 
								</button>
								
								<button type="button" class="btn btn-default btn-md">
									<span class="glyphicon glyphicon-remove"></span> Delete 
								 </button>
							</div>	
							<?php
							}
							?>							
						</div>
				
					<?php
					}
			
                ?>
            </div>
		</div>
        <div class="space-blank"></div>
        <div class="space-blank"></div>
		</div>
	</div>	
	</div>        
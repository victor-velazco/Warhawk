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
					<a href="<?= base_url().'index.php/administrator/announcements'  ?>" type="button" class="btn btn-default btn-md" role="button">
					<span class="glyphicon glyphicon-plus"></span> New Announcements 
					</a>					
				</div>
				<br><br>
                <?php

				$this->session->flashdata('msg');
				
					foreach ($headlines->result() as $row) { 
					?> 
						<div class="paperbox">
							<h2><?= $row->header ?></h2>
							<span style="text-align: right !important; width: 100%"><small>published by: <?= $row->first_name ?></small></span>
							<hr />
							<p>
								<?= $row->description ?>
							</p>			
							<?php
							if($row->publisher_id == $user_id){
							?>
							<div class="row">
								<a href="<?= base_url().'index.php/administrator/updateAnnouncement/'.$row->headline_id  ?>" type="button" class="btn btn-default btn-md" role="button">
									<span class="glyphicon glyphicon-pencil"></span> Update 
								</a>
								
								<a onclick="if (confirm('&quot;Are you sure you want to delete it # <?= $row->headline_id ?>?&quot;')) { window.location.href = '<?= base_url() . "index.php/administrator/delAnnouncements/" . $row->headline_id  ?>' } event.returnValue = false; return false;" href="#" type="button" class="btn btn-default btn-md" role="button">
									<span class="glyphicon glyphicon-remove"></span> Delete 
								 </a>
								
								
								
								
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
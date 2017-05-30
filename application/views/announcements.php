<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="col-md-offset-1 col-md-10 container" style="top:102px; padding-left:2px; padding-right:2px;">
	    <div class="modal-body">
			<div id="div-announcement-msg">
                <h3><div id="icon-announcement-msg" class="glyphicon glyphicon-chevron-right"></div>
                <span id="text-announcement-msg">University announcements</span></h3>
                <?php
                foreach ($headlines as $headline) { 
                ?> 
                    <div class="paperbox">
                    <h2><?= $headline->header ?></h2>
                    <span style="text-align: right !important; width: 100%"><small>published by:</small></span>
                    <hr />
                    <p>
                    	<?= $headline->description ?>
                    </p>
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
<!-- BEGIN # MODAL LOGIN -->
<link href="<?php echo $this->config->base_url(); ?>assets/css/login.css" rel="stylesheet">
<div class="modal fade" id="event-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="div-forms">                    
                <div class="modal-header" align="center">
                    <img id="img_logo" src="<?php echo $this->config->base_url(); ?>assets/img/logo_sqr.png">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>               
                <form id="add-event-form">
                    <div class="modal-body">
                        <div id="div-lost-msg">
                        <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                        <span id="text-lost-msg">Add event</span>
                        </div>
                        <input id="event_date" class="form-control" type="text" placeholder="Date" required>
                        <br>
                        <input id="detail_event" class="form-control" type="text" placeholder="Event details" required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="button" id="addEvent" class="btn btn-default btn-lg btn-block">Save</button>
                        </div>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>
<!-- END # MODAL LOGIN -->
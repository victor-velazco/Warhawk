    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0; min-height:100px;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/index.html"><img src="<?php echo $this->config->base_url(); ?>assets/img/uwwLogo.jpg" /></a>
            </div>
            <!-- /.navbar-header -->

        </nav>
        <!-- Modal -->

        <div id="wgc-modal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
            <!-- Modal content-->
                <div class="modal-content">
                    <div id="m-header" class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 id="m-title" class="modal-title"></h4>
                    </div>
                    <div id="m-message" class="modal-body">
                    </div>
                    <div id="m-footer" class="modal-footer">
                        <button type="button" class="btn btn-success btn-outline" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <div id="page-wrapper" class="to-100">
            <!-- load file div -->
            <form id="frm-upload">
                <input type="hidden" id="url-server" value="<?php echo $this->config->base_url(); ?>" />
                <div class="row medium-size">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <label for="file-upload">Select the XLS file to upload.</label>
                                <input class="form-input" type="file" name="file-upload" id="file-upload" style="font-size: 1.2em;"/>
                            </div>
                            <!--
                            <div class="col-lg-1 col-md-1 col-sm-1 no-padding width80">
                                <button id="btn-file-upload" class="form-input-no-padding" >
                                    <i class="fa fa-search fa-inverse"></i>
                                </button>
                            </div>
                            -->
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                               <button type="button" id="load-file" class="btn btn-primary">Load file</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>

        <script src="<?php echo $this->config->base_url(); ?>assets/js/file_upload.js">
        </script>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <br><br><br><br>
    <div class="container-fluid">
    <form id="update-form" method="POST">
	<div class="row">
        <h1 style="text-align: center">Program referal</h1>
        
    		<div class="col-md-4 col-md-offset-4 text-center panel-body">
                <div class="div-scroller-about">
                    <div class="panel-body middle-panel">                            
                        <div class="row text-left">
                            <h4 class="oswald"><strong>Type your friend's email</strong></h4>
                            <input id="email" name="email" class="form-control input-modal" type="text" placeholder="Email" required />
                        </div>
                    </div>
                </div>                                          
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-5 text-center panel-body">
                <div>
                    <button id="referal_btn" type="submit" class="btn btn-default btn-lg btn-block">Send email</button>
                </div>
            </div>
        </div>
    </form>
    <br><br>

 <!-- /.footer -->
            <div class="row footer">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        &copy; 2016 University of Wisconsin-Whitewater
                    </div>
                    <div class="col-lg-offset-1 col-lg-4 col-md-4 col-sm-4 text-center">
                        Developed by DS Contact Alumni Network
                    </div>
                    <div class="col-lg-offset-1 col-lg-3 col-md-3 col-sm-3 text-right">
                        Account Settings&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Privacy Policy&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Help
                    </div>
                </div>
            </div>
            <!-- /.footer -->                        
    </div>
    <?php
    $this->load->view('template/login.php');
    ?>        
